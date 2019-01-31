<?php

namespace App\Boilerplates;

use Github\Client;
use Gitonomy\Git\Repository;
use GitWrapper\GitWrapper;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\HttpFoundation\StreamedResponse;
use ZipStream\ZipStream;

abstract class BaseBoilerplate implements Boilerplate
{
    public function path(): string
    {
        return storage_path('app/boilerplates/'.str_random().'/');
    }

    public function getFiles(): Finder
    {
        return (new Finder())
            ->ignoreDotFiles(false)
            ->in($this->location());
    }

    public function writeToDisk(string $path, array $input)
    {
        mkdir($path, 0755, true);

        $replacements = $this->replacements($input);

        /** @var SplFileInfo $file */
        foreach ($this->getFiles() as $file)
        {
            if ($file->isFile()) {
                $fileContent = str_replace(array_keys($replacements), array_values($replacements), $file->getContents());

                file_put_contents($path . $file->getRelativePathname(), $fileContent);
            } else {
                @mkdir($path . $file->getRelativePathname(), 0755, true);
            }

        }
    }

    public function zip(array $input)
    {

        return new StreamedResponse(function () use ($input) {
            $zip = new ZipStream('example.zip');

            $replacements = $this->replacements($input);

            foreach ($this->getFiles() as $file)
            {
                if ($file->isFile()) {
                    $fileContent = str_replace(array_keys($replacements), array_values($replacements), $file->getContents());

                    $zip->addFile($file->getRelativePathname(), $fileContent);
                } else {
                    $zip->addFile($file->getRelativePathname().'/', '');
                }
            }

            $zip->finish();
        });
    }

    public function github(array $input)
    {
        $path = $this->path();

        $pathname = str_replace(storage_path(), '', $path);

        $token = auth()->user()->github_token;

        try {
            $this->writeToDisk($path, $input);

            $githubClient = new Client();

            $githubClient->authenticate($token, null, Client::AUTH_HTTP_TOKEN);

            $repo = $githubClient->api('repo')
                ->create($input['packageName'], $input['packageDescription']);

            $repositoryUrl = "https://{$repo['owner']['login']}:{$token}@github.com/{$repo['full_name']}.git";

            $gitWrapper = new GitWrapper(config('git.executable'));

            $git = $gitWrapper->workingCopy($path);

            $git->init();

            $git->remote('add', 'origin', $repositoryUrl);

            $git->add('.');

            $git->config('user.name', 'PHP Package Boilerplate');
            $git->config('user.email', 'hello@beyondco.de');

            $args = [
                'm' => 'Another awesome package 📦',
                'a' => true,
                'author' => 'PHP Package Boilerplate <hello@beyondco.de>'
            ];

            $git->commit($args);

            $git->push('origin', 'master');

            Storage::disk('base')->deleteDirectory($pathname);
        } catch (\Exception $e) {
            Storage::disk('base')->deleteDirectory($pathname);

            throw($e);
        }
    }
}
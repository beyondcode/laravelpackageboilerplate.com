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

    public function replacements(array $input): array
    {
        return [
            ':vendor_namespace_escaped' => studly_case(array_get($input, 'vendorName')) . '\\\\' . studly_case(array_get($input, 'packageName')),
            ':vendor_namespace' => studly_case(array_get($input, 'vendorName')) . '\\' . studly_case(array_get($input, 'packageName')),
            ':vendor' => strtolower(array_get($input, 'vendorName')),
            ':studly_package_name' => studly_case(array_get($input, 'packageName')),
            ':package_name' => strtolower(array_get($input, 'packageName')),
            ':package_description' => array_get($input, 'packageDescription'),
            ':author_username' => array_get($input, 'authorUsername'),
            ':author_name' => array_get($input, 'authorName'),
            ':author_email' => array_get($input, 'authorEmail'),
            ':license_shortname' => $this->getLicenseShortname(array_get($input, 'license')),
        ];
    }

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
                $fileContent = str_replace(array_keys($replacements), array_values($replacements), $this->getFileContent($file, $input));

                file_put_contents($path . $this->getFilename($file, $input), $fileContent);
            } else {
                @mkdir($path . $file->getRelativePathname(), 0755, true);
            }

        }
    }

    public function getLicense($licenseName): string
    {
        if (file_exists(resource_path('licenses/'.$licenseName.'.txt'))) {
            return file_get_contents(resource_path('licenses/'.$licenseName.'.txt'));
        }

        return '';
    }

    public function getLicenseShortname($licenseName)
    {
        $licenses = [
            'mit' => 'MIT License (MIT)',
            'agpl-3' => 'GNU AGPLv',
            'gpl-3' => 'GNU GPLv3',
            'lgpl-3' => 'GNU LGPLv',
            'mozilla-public-2' => 'Mozilla Public License 2.0',
            'apache-2' => 'Apache License 2',
            'unlicense' => 'The Unlicense',
        ];

        return array_get($licenses, $licenseName);
    }

    public function zip(array $input)
    {

        return new StreamedResponse(function () use ($input) {
            $zip = new ZipStream('example.zip');

            $replacements = $this->replacements($input);

            foreach ($this->getFiles() as $file)
            {
                if ($file->isFile()) {
                    $fileContent = str_replace(array_keys($replacements), array_values($replacements), $this->getFileContent($file, $input));

                    $zip->addFile($this->getFilename($file, $input), $fileContent);
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

    protected function getFileContent(SplFileInfo $file, array $input): string
    {
        if ($file->getFilename() === 'LICENSE.md') {
            return $this->getLicense($input['license']);
        }
        return $file->getContents();
    }

    protected function getFilename(SplFileInfo $file, array $input): string
    {
        $filename = str_replace('Skeleton', studly_case($input['packageName']), $file->getFilename());

        return $file->getRelativePath() . '/' . $filename;
    }
}
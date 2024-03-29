<?php

namespace App\Boilerplates;

use DrewM\MailChimp\MailChimp;
use Github\Client;
use Gitonomy\Git\Repository;
use GitWrapper\GitWrapper;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use ZipStream\ZipStream;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

abstract class BaseBoilerplate implements Boilerplate
{

    public function replacements(array $input): array
    {
        return [
            ':vendor_namespace_escaped' => Str::studly(Arr::get($input, 'vendorName')) . '\\\\' . Str::studly(Arr::get($input, 'packageName')),
            ':vendor_namespace' => Str::studly(Arr::get($input, 'vendorName')) . '\\' . Str::studly(Arr::get($input, 'packageName')),
            ':vendor' => strtolower(Arr::get($input, 'vendorName')),
            ':studly_package_name' => Str::studly(Arr::get($input, 'packageName')),
            ':package_name' => strtolower(Arr::get($input, 'packageName')),
            ':package_description' => Arr::get($input, 'packageDescription'),
            ':author_username' => Arr::get($input, 'authorUsername'),
            ':author_name' => Arr::get($input, 'authorName'),
            ':author_email' => Arr::get($input, 'authorEmail'),
            ':license_shortname' => $this->getLicenseShortname(Arr::get($input, 'license')),
            ':license_composer' => $this->getLicenseComposername(Arr::get($input, 'license')),
        ];
    }

    public function path(): string
    {
        return storage_path('app/boilerplates/'.Str::random().'/');
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

    public function subscribeToNewsletter($email)
    {
        $mailchimp = new MailChimp(config('services.mailchimp.key'));

        $mailchimp->post("lists/".config('services.mailchimp.list_id')."/members", [
            'email_address' => $email,
            'status'        => 'pending',
        ]);
    }

    public function getLicense($licenseName): string
    {
        if (file_exists(resource_path('licenses/'.$licenseName.'.txt'))) {
            return file_get_contents(resource_path('licenses/'.$licenseName.'.txt'));
        }

        return '';
    }

    public function getLicenseComposername($licenseName)
    {
        $licenses = [
            'mit' => 'MIT',
            'agpl-3' => 'GNU AGPLv',
            'gpl-3' => 'GPL-2.0-or-later',
            'lgpl-3' => 'LGPL-3.0-or-later',
            'mozilla-public-2' => 'Mozilla Public License 2.0',
            'apache-2' => 'Apache-2.0',
            'unlicense' => 'The Unlicense',
        ];

        return Arr::get($licenses, $licenseName);
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

        return Arr::get($licenses, $licenseName);
    }

    public function zip(array $input)
    {
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

            $git->config('user.name', 'Laravel Package Boilerplate');
            $git->config('user.email', 'hello@beyondco.de');

            $args = [
                'm' => 'Another awesome package 📦',
                'a' => true,
                'author' => 'Laravel Package Boilerplate <hello@beyondco.de>'
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
        $filename = str_replace('Skeleton', Str::studly($input['packageName']), $file->getFilename());

        return $file->getRelativePath() . '/' . $filename;
    }
}

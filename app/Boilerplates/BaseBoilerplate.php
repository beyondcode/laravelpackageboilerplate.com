<?php

namespace App\Boilerplates;

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
}
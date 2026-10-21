<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\TemporaryDirectory\TemporaryDirectory;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

#[\Illuminate\Console\Attributes\Description('Update the given skeleton with the latest version on GitHub.')]
#[\Illuminate\Console\Attributes\Signature('skeleton:update {skeleton}')]
class UpdateSkeletonFromGitHub extends Command
{
    /** @var Spatie\TemporaryDirectory\TemporaryDirectory */
    private $temporaryDirectory;

    private $skeleton;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->temporaryDirectory = new TemporaryDirectory('/tmp/' . Str::random());
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->skeleton = $this->argument('skeleton');
        $this->info('📦 Update skeleton for ' . strtoupper($this->skeleton));

        $this->info('🐙 Downloading repository zip from GitHub ...');
        $localZipFile = $this->downloadZipFromGitHub();

        $this->info('📂 Unzipping repository ...');
        $localRepositoryPath = $this->extractRepository($localZipFile);

        if (is_null($localRepositoryPath)) {
            $this->error("🚨 Skipping update, no path detected.");
            return;
        }

        $this->info('☕️ Copying repository to storage ... ');

        File::copyDirectory($localRepositoryPath, storage_path('/skeletons/' . $this->skeleton));

        $this->info('✅ Updated skeleton!');

    }


    private function downloadZipFromGitHub(): string
    {
        $gitHubZip = fopen("https://github.com/beyondcode/skeleton-" . $this->skeleton . "/archive/refs/heads/main.zip", 'rb');

        $localZipPath = $this->temporaryDirectory->path('skeleton-' . $this->skeleton . '.zip');
        touch($localZipPath);
        $localZip = fopen($localZipPath, 'wb');

        stream_copy_to_stream($gitHubZip, $localZip);

        fclose($gitHubZip);
        fclose($localZip);

        return $localZipPath;
    }

    private function extractRepository(string $localZipFile): ?string
    {
        $pathToUnzippedRepo = $this->temporaryDirectory->path('unzipped');

        $zip = new \ZipArchive();

        $zip->open($localZipFile);

        $zip->extractTo($pathToUnzippedRepo);

        $zip->close();
        return $pathToUnzippedRepo . "/skeleton-" . $this->skeleton . "-main";
        return $this->getPathToUnzippedRepository($pathToUnzippedRepo);
    }

    private function getPathToUnzippedRepository(string $pathToUnzippedRepo): ?string
    {
        $directories = iterator_to_array((new Finder())->directories()->depth(1)->in($pathToUnzippedRepo)->filter(fn(SplFileInfo $file) => true));

        return array_key_first($directories);
    }


    public function __destruct()
    {
        $this->temporaryDirectory->delete();
    }

}

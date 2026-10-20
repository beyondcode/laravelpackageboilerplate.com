<?php

namespace App\Jobs;

use App\Console\Commands\UpdateSkeletonFromGitHub;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class UpdateSkeletonJob implements ShouldQueue
{
    use \Illuminate\Foundation\Queue\Queueable;

    /**
     * Create a new job instance.
     *
     * @param string $skeleton
     * @return void
     */
    public function __construct(private string $skeleton)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Artisan::call(UpdateSkeletonFromGitHub::class, ["skeleton" => $this->skeleton]);
    }
}

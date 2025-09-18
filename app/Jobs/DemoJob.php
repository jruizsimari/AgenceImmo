<?php

namespace App\Jobs;

use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DemoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // use this if you program your job to be executed on long delay,
    // usecase: you execute the job and this $property was removed
    public $deleteWhenMissingModels = true;

    /**
     * Create a new job instance.
     */
    public function __construct(private Property $property)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo $this->property->title;
    }
}

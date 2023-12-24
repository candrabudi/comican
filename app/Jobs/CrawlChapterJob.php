<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\ComicChapterLink;
use App\Events\CrawlChapterEvent;
class CrawlChapterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $chapters = ComicChapterLink::where('status', 0)
            ->orderBy('id', 'DESC')
            ->get();

        foreach ($chapters as $chapter) {
            event(new CrawlChapterEvent($chapter->id));
        }
    }

}

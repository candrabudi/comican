<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Events\CrawlChapterEvent;

use Log;
class CrawlAllChapterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $chapter;

    public function __construct($chapter)
    {
        $this->chapter = $chapter;
    }

    public function handle()
    {
        Log::info("kodok job");
        event(new CrawlChapterEvent($this->chapter->id));
    }
}

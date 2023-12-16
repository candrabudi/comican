<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Log;
class CrawlChapterEvent
{
    use Dispatchable, SerializesModels;

    public $chapterId;

    public function __construct($chapterId)
    {
        Log::info("Kodok event");
        $this->chapterId = $chapterId;
    }
}
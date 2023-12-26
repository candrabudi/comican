<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
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
    public $batchId; // Menambahkan properti batchId

    public function __construct($chapter)
    {
        $this->chapter = $chapter;
    }

    public function handle()
    {
        if ($this->chapter) {
            if (isset($this->batchId)) {
                Log::info("Batch ID: " . $this->batchId); // Menggunakan batchId di dalam handle()
            }
            event(new CrawlChapterEvent($this->chapter->id));
        } else {
            Log::info("Tidak ada data yang diberikan. Job tidak dijalankan.");
        }
    }
}
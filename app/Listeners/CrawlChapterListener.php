<?php

namespace App\Listeners;

use App\Events\CrawlChapterEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Comic;
use App\Models\ComicChapter;
use App\Models\ComicChapterLink;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;
class CrawlChapterListener implements ShouldQueue
{
    public function handle(CrawlChapterEvent $event)
    {
        Log::info("Kodok 1");
        $chapterId = $event->chapterId;

        $chapter = ComicChapterLink::find($chapterId);
        if (!$chapter) {
            Log::error('Chapter not found: ' . $chapterId);
            return;
        }

        DB::beginTransaction();
        try {
            $comic = Comic::find($chapter->comic_id);
            $comicTitle = $comic ? $comic->title : null;

            $crawlChapter = $this->crawlImageChapter($chapter->link);
            $existingChapter = ComicChapter::where('chapter_number', "Chapter " . $chapter->chapter)
                ->where('chapter_title', str_replace(' Bahasa Indonesia', '', $crawlChapter['title_text']))
                ->exists();

            if (!$existingChapter) {
                $slug = $this->createSlug(($comicTitle ?? '') . ' ' . "Chapter " . $chapter->chapter);

                $storeChapter = new ComicChapter();
                $storeChapter->fill([
                    'comic_id' => $chapter->comic_id,
                    'chapter_number' => "Chapter " . $chapter->chapter,
                    'chapter_slug' => $slug,
                    'chapter_title' => str_replace(' Bahasa Indonesia', '', $crawlChapter['title_text']),
                    'chapter_realease' => $chapter->chapter_realease,
                    'chapter_content' => json_encode($crawlChapter['images']),
                ])->save();

                ComicChapterLink::where('id', $chapter->id)->update(['status' => 1]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed processing chapter ' . $chapter->id . ': ' . $e->getMessage());
        }
    }

    public function crawlImageChapter($url)
    {
        $response = Http::get($url);

        if ($response->ok()) {
            $html = $response->body();
            $crawler = new Crawler($html);
            $result = [];

            $crawler->filter('#readerarea img')->each(function ($node) use (&$result) {
                // Ambil tag HTML dari setiap gambar
                $imageHTML = $node->attr('src');

                // Simpan tag HTML yang telah dibersihkan ke dalam array
                $result[] = $imageHTML;
            });

            // Menambahkan logika untuk mendapatkan teks dari class entry-title
            $titleText = $crawler->filter('.entry-title')->text();

            return [
                'images' => $result,
                'title_text' => $titleText // Menambahkan teks dari class entry-title ke respons JSON
            ];
        }

        return response()->json([
            'error' => 'Gagal mendapatkan HTML'
        ], 500);
    }

    function createSlug($text) 
    {
        // Mengganti spasi dengan tanda "-"
        $slug = strtolower(str_replace(' ', '-', $text));
        
        // Menghapus karakter khusus kecuali huruf dan angka
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        
        return $slug;
    }
}
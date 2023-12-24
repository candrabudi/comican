<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comic;
use App\Models\ComicChapterLink;
use App\Models\ComicChapter;
use App\Models\ComicGenre;
use App\Models\Genre;
use DataTables;
use DB;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;

use Carbon\Carbon;
use DateTime; 
use DOMDocument;
use Str;
use Auth;

use App\Jobs\CrawlAllChapterJob;
class MangaController extends Controller
{
    public function index()
    {
        $chapterLink = ComicChapterLink::where('status', 0)
            ->select('id')
            ->count();

        return view('admin.comic.index', compact('chapterLink'));
    }

    public function datatable()
    {
        $comics = Comic::get()
            ->toArray();
        
        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'title' => $new['title'],
                'description' => substr($new['description'], 0, 250),
                'status' => $new['status'],
                'rating' => $new['rating'],
                'thumb' => asset('/storage/'.$new['thumb']),
            ]; 
        }, $comics);

        return DataTables::of($reform)->make(true);
    }

    public function create()
    {
        return view('admin.comic.create');
    }

    public function edit($id)
    {
        $comic = Comic::where('id', $id)
            ->first();

        $comicChapterLink = ComicChapterLink::where('comic_id', $id)
            ->where('status', 0)
            ->count();

        return view('admin.comic.edit', compact('comic', 'comicChapterLink'));
    }

    public function comicProcess(Request $request)
    {
        DB::beginTransaction();
        try{

            $url = $request->url;
            if(!$url){
                session()->flash('error', 'Mohon masukan URL yang benar');
                return redirect()->back();
            }

            $comic = $this->crawlComic($request->url);
            $comicChapter = $this->crawlComicChapter($url);
            $comicTitle = $comic['title'];
            $checkComic = Comic::where('title', $comicTitle)
                ->select('id')
                ->first();

            if($checkComic){
                session()->flash('error', 'Maaf, ada duplikasi komik');
                return redirect()->back();
            }    

            $storeComic = new Comic();
            $storeComic->user_id = 1;
            $storeComic->title = $comicTitle;
            $storeComic->slug = $this->createSlug($comicTitle);
            $storeComic->alternative = $comic['seriestualt'];
            $storeComic->status = $comic['comic_detail']['status'] == 'Ongoing' ? 'Ongoing' : 'Completed';
            $storeComic->author = $comic['comic_detail']['author'];
            
            if(isset($comic['comic_detail']['serialization'])){
                $storeComic->serialization = $comic['comic_detail']['serialization'];
            }else{
                $storeComic->serialization = '-';
            }
            if(isset($comic['comic_detail']['artist'])){
                $storeComic->artist = $comic['comic_detail']['artist'];
            }else{
                $storeComic->artist = '-';
            }
            $storeComic->type = $comic['comic_detail']['type'];
            $storeComic->rating = $comic['rating'];
            $storeComic->description = $comic['description'];
            $storeComic->color = ($comic['comic_detail']['type'] == 'Manga') ? 'No' : 'Yes';
            $storeComic->posted_on = Carbon::createFromFormat('F j, Y', $this->formatDate($comic['comic_detail']['posted_on']))->format('Y-m-d');
            $storeComic->updated_on = Carbon::createFromFormat('F j, Y', $this->formatDate($comic['comic_detail']['updated_on']))->format('Y-m-d');
            if(isset($comic['comic_detail']['released'])){
                if($comic['comic_detail']['released'] != '-'){
                    if(ctype_digit($comic['comic_detail']['released'])){
                        $storeComic->released = $comic['comic_detail']['released'];
                    }else{
                        if (preg_match('/(\d{4})/', $comic['comic_detail']['released'], $matches)) {
                            $tahun = $matches[0];
                            $storeComic->released = $tahun;
                        } else {
                            $storeComic->released = 2023;
                        }
                    }
                }else{
                    $storeComic->released = 2023;
                }
            }else{
                $storeComic->released = 2023;
            }
            $storeComic->thumb = $comic['path_image'];
            $storeComic->save();
            $storeComic->fresh();

            $genres = explode(", ", $comic['genre']);
            foreach($genres as $genre){
                $checkGenre = Genre::where('name', $genre)
                    ->first();
                if($checkGenre){
                    $genre_id = $checkGenre->id;
                }else{
                    $storeGenre = new Genre();
                    $storeGenre->name = $genre;
                    $storeGenre->slug = $this->createSlug($genre);
                    $storeGenre->save();
                    $storeGenre->fresh();

                    $genre_id = $storeGenre->id; 
                }

                $storeComicGenre = new ComicGenre();
                $storeComicGenre->comic_id = $storeComic->id;
                $storeComicGenre->genre_id = $genre_id;
                $storeComicGenre->save();
            }

            foreach($comicChapter as $chapter){
                if($chapter['chapter'] !== "Chapter {{number}}"){
                    $storeChapterLink = new ComicChapterLink();
                    $storeChapterLink->comic_id = $storeComic->id;
                    $storeChapterLink->chapter = str_replace('Chapter ', '', $chapter['chapter']);
                    $storeChapterLink->link = $chapter['chapter_link'];
                    $storeChapterLink->chapter_realease =  Carbon::parse($chapter['chapter_date'])->addMinutes(2)->format('Y-m-d H:i:s');
                    $storeChapterLink->status = 0;
                    $storeChapterLink->save();
                }
            }

            DB::commit();
            session()->flash('success', 'Berhasil menambahkan komik baru');
            return redirect()->back();
        }catch(\Except $e){
            DB::rollback();
            session()->flash('error', 'Maaf ada kesalahan internal');
            return redirect()->back();
        }
    }

    public function comicChapterProcess(Request $request)
    {
        $comicTitle = $request->comic_title;
        if(!$comicTitle){
            return response()
                ->json([
                    'status' => 'failed', 
                    'code' => 422, 
                    'message' => 'Please input comic title'
                ], 422);
        }
        
        $checkComic = Comic::where('title', $comicTitle)
            ->select('id')
            ->first();

        if(!$checkComic){
            return response()
                ->json([
                    'status' => 'failed', 
                    'code' => 400, 
                    'message' => 'no data comic.'
                ]);
        }   

        $chapters = ComicChapterLink::where('comic_id', $checkComic->id)
            ->where('status', 0)
            ->orderBy('id', 'DESC')
            ->get();

        foreach ($chapters as $chapter) {
            $crawlChapter = $this->crawlImageChapter($chapter->link);
            $check = ComicChapter::where('chapter_number', "Chapter ".$chapter->chapter)
                ->where('chapter_title', str_replace(' Bahasa Indonesia', '',$crawlChapter['title_text']))
                ->select('id')
                ->first();
            if(!$check){
                $slug = $this->createSlug($comicTitle.' '."Chapter ".$chapter->chapter);
                $storeChapter = new ComicChapter();
                $storeChapter->comic_id = $checkComic->id;
                $storeChapter->chapter_number = "Chapter ".$chapter->chapter;
                $storeChapter->chapter_slug = $slug;
                $storeChapter->chapter_title = str_replace(' Bahasa Indonesia', '',$crawlChapter['title_text']);
                $storeChapter->chapter_realease = $chapter->chapter_realease;
                $storeChapter->chapter_content = json_encode($crawlChapter['images']);
                $storeChapter->save();

                ComicChapterLink::where('id', $chapter->id)
                    ->update([
                        'status' => 1
                    ]);
            }
        }
            
        return response()
            ->json([
                'status' => 'success', 
                'code' => 201, 
                'mesage' => 'Success crawl image chapter'
            ], 201);
    }

    public function updateComic(Request $request, $id)
    {
        Comic::where('id', $id)
            ->update([
                'slider' => $request->comic_slider
            ]);

        return redirect()->back();
    }

    public function crawlAllChapter(Request $request)
    {   
        $chapters = ComicChapterLink::where('status', 0)
            ->orderBy('id', 'DESC')
            ->get();

        foreach ($chapters as $chapter) {
            CrawlAllChapterJob::dispatch($chapter);
        }

        session()->flash('success', 'Proses crawl data chapter telah dimulai di latar belakang.');
        return redirect()->back();
        
    }

    public function crawlComicKomikindo($url){
        $response = Http::get($url);
    
        if ($response->ok()) {
            $html = $response->body();
            $crawler = new Crawler($html);

            $returnData = [];

            $titles = $crawler->filter('.entry-title')->extract(['_text']);
            $description = $crawler->filter('.entry-content')->extract(['_text']);
            $seriestualt = $crawler->filter('.seriestualt')->extract(['_text']);
            $rating = $crawler->filter('.archiveanime-rating i')->extract(['_text']);
            $dom = new DOMDocument();
            @$dom->loadHTML($html);
            $xpath = new \DOMXPath($dom);
            $elements = $xpath->query('//div[contains(@class, "spe")]/span');

            $result = [];

            foreach ($elements as $element) {
                $text = $element->nodeValue;
            
                // Pisahkan teks menjadi kunci dan nilai menggunakan ':'
                $split = explode(':', $text, 2);
            
                if (count($split) === 2) {
                    // Gunakan teks sebelum ':' sebagai kunci dan teks setelahnya sebagai nilai
                    $key = trim($split[0]);
            
                    // Ubah teks sebelum ':' menjadi snake_case dan lowercase
                    $key = strtolower(str_replace(' ', '_', $key));
            
                    $value = trim($split[1]);
            
                    $result[$key] = $value;
                }
            }
            $comicDetail = [];
            // return $result;
            $comicDetail['seriestualt'] = $result['judul_alternatif'];
            $comicDetail['status'] = $result['status'] == 'Tamat' ? 'Completed' : 'Ongoing';
            $comicDetail['author'] = $result['pengarang'];
            $comicDetail['artist'] = $result['ilustrator'];
            $comicDetail['type'] = $result['jenis_komik'];

            $genres = $xpath->query("//div[contains(@class, 'genre-info ')]/a");

            $genreList = [];

            foreach ($genres as $genre) {
                $genreList[] = $genre->nodeValue;
                if(count($genreList) === 4) {
                    break;
                }
            }
            $combinedGenres = implode(", ", $genreList);
            $thumbElement = $xpath->query('//div[contains(@class, "thumb")]/img/@src');

            if ($thumbElement->length > 0) {
                $imageUrl = $thumbElement[0]->nodeValue;

                // Hapus parameter yang tidak diperlukan dari URL gambar
                $cleanImageUrl = strtok($imageUrl, '?');

                // Ambil nama file dari URL gambar
                $fileName = basename($cleanImageUrl);

                // Path tujuan penyimpanan di storage Laravel
                $storagePath = storage_path('app/public/media/' . $fileName);

                // Unduh gambar dan simpan ke storage Laravel
                $imageContent = file_get_contents($cleanImageUrl);
                file_put_contents($storagePath, $imageContent);

                // Path file gambar di storage Laravel
                $storageFilePath = 'media/' . $fileName;

                // Tampilkan path file gambar di storage Laravel
                $path = $storageFilePath;
            }else{
                $path = "";
            }

            $returnData['title'] = trim(str_replace('Komik', '',$titles[0]));
            $returnData['description'] = trim(str_replace('\n','',$description[0]));
            $returnData['seriestualt'] = "-";
            $returnData['comic_detail'] = $comicDetail;
            $returnData['genre'] = $combinedGenres;
            $returnData['rating'] = trim($rating[0]);
            $returnData['path_image'] = $path;

            return $returnData;
        }else{
            return [];
        }
        
    }

    public function crawlComic($url){
        $response = Http::get($url);
    
        if ($response->ok()) {
            $html = $response->body();
            $crawler = new Crawler($html);
            $result = [];

            $titles = $crawler->filter('.entry-title')->extract(['_text']);
            $description = $crawler->filter('.entry-content')->extract(['_text']);
            $seriestualt = $crawler->filter('.seriestualt')->extract(['_text']);
            $rating = $crawler->filter('.num')->extract(['_text']);
            $dom = new DOMDocument();
            @$dom->loadHTML($html);
    
            $table = $dom->getElementsByTagName('table')->item(0);
            $tbody = $table->getElementsByTagName('tbody')->item(0);
            $rows = $tbody->getElementsByTagName('tr');
    
            $result = [];
            $returnData = [];
            foreach ($rows as $row) {
                $cells = $row->getElementsByTagName('td');
                $key = trim($cells->item(0)->nodeValue);
                $value = trim($cells->item(1)->nodeValue);
                $key = Str::snake(strtolower($key));
    
                $result[$key] = $value;
            }

            $xpath = new \DOMXPath($dom);
            $genres = $xpath->query("//div[contains(@class, 'seriestugenre')]/a");

            $genreList = [];

            foreach ($genres as $genre) {
                $genreList[] = $genre->nodeValue;
                if(count($genreList) === 4) {
                    break;
                }
            }

            $combinedGenres = implode(", ", $genreList);

            $startPos = strpos($html, 'class="thumb"');
            if ($startPos !== false) {
                $startPos = strpos($html, 'src="', $startPos) + 5;
                $endPos = strpos($html, '"', $startPos);

                if ($endPos !== false) {
                    $imageUrl = substr($html, $startPos, $endPos - $startPos);
                    $imageContent = file_get_contents($imageUrl);
                    $filename = basename($imageUrl);
                    $path = storage_path('app/public/media/' . $filename);
                    file_put_contents($path, $imageContent);

                    $storagePrefix = storage_path('app/public/');
                    $relativePath = str_replace($storagePrefix, '', $path);

                    $path = $relativePath;
                }else{
                    $path = "";
                }
            }else{
                $path = "";
            }

            $returnData['title'] = str_replace(' Bahasa Indonesia', '',$titles[0]);
            $returnData['description'] = str_replace('\n','',$description[0]);
            if($seriestualt){
                $returnData['seriestualt'] = str_replace('\n','',$seriestualt[0]);
            }else{
                $returnData['seriestualt'] = "-";
            }
            $returnData['comic_detail'] = $result;
            $returnData['genre'] = $combinedGenres;
            $returnData['rating'] = $rating[0];
            $returnData['path_image'] = $path;

            return $returnData;
        }else{
            return [];
        }
        
    }

    public function crawlComicChapter($url){
        try {
            $response = Http::get($url);
            $html = $response->body();
    
            $crawler = new Crawler($html);
            Carbon::setLocale('id');
            Carbon::setUtf8(true);
            setlocale(LC_TIME, 'id_ID.utf8');
            // Ambil informasi dari class .chapternum dan .chapterdate beserta nilai dari tag <a>
            $chapters = $crawler->filter('.eph-num')->each(function (Crawler $node, $i) {
                $dateString = $node->filter('.chapterdate')->extract(['_text'])[0];
                $exploded = explode(' ', $dateString);
                $month = strtolower($exploded[0]);
            
                $translatedMonth = Lang::get('months.' . $month);
                
                $exploded[0] = ucfirst($translatedMonth);
                $newDateString = implode(' ', $exploded);
                if($translatedMonth == "months.{{date}}") {
                    $translatedMonth = "December";
                    $exploded[0] = ucfirst($translatedMonth);
                    $newDateString = implode(' ', [ucfirst($translatedMonth), "4,", 2023]);
                }
                // return $newDateString;
                $date = Carbon::createFromFormat('F j, Y', $newDateString);
                
                return [
                    'chapter' => $node->filter('.chapternum')->extract(['_text'])[0],
                    'chapter_date' => $date->format('Y-m-d').' '.Carbon::now()->format('H:i:s'),
                    'chapter_link' => $node->filter('a')->attr('href'),
                ];
            });

            return $chapters;
        } catch (\Exception $e) {
            return "Terjadi kesalahan: " . $e->getMessage();
        }
    }
    
    public function crawlComicChapterKomikindo($url){
        try {
            $response = Http::get($url);
            $html = $response->body();
    
            $crawler = new Crawler($html);
            Carbon::setLocale('id');
            Carbon::setUtf8(true);
            setlocale(LC_TIME, 'id_ID.utf8');
            // Ambil informasi dari class .chapternum dan .chapterdate beserta nilai dari tag <a>
            $chapters = $crawler->filter('.eph-num')->each(function (Crawler $node, $i) {
                $dateString = $node->filter('.chapterdate')->extract(['_text'])[0];
                $exploded = explode(' ', $dateString);
                $month = strtolower($exploded[0]);
            
                $translatedMonth = Lang::get('months.' . $month);
                
                $exploded[0] = ucfirst($translatedMonth);
                $newDateString = implode(' ', $exploded);
                if($translatedMonth == "months.{{date}}") {
                    $translatedMonth = "December";
                    $exploded[0] = ucfirst($translatedMonth);
                    $newDateString = implode(' ', [ucfirst($translatedMonth), "4,", 2023]);
                }
                // return $newDateString;
                $date = Carbon::createFromFormat('F j, Y', $newDateString);
                
                return [
                    'chapter' => $node->filter('.chapternum')->extract(['_text'])[0],
                    'chapter_date' => $date->format('Y-m-d').' '.Carbon::now()->format('H:i:s'),
                    'chapter_link' => $node->filter('a')->attr('href'),
                ];
            });
            
            return $chapters;
        } catch (\Exception $e) {
            return "Terjadi kesalahan: " . $e->getMessage();
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

    function formatDate($date)
    {
        $dateString = $date;
        $exploded = explode(' ', $dateString);
        $month = strtolower($exploded[0]);
    
        $translatedMonth = Lang::get('months.' . $month);
        
        $exploded[0] = ucfirst($translatedMonth);
        $newDateString = implode(' ', $exploded);
        return $newDateString;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Models\ComicView;
use App\Models\Genre;
use App\Models\ComicChapter;
use App\Models\ComicGenre;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Crawler\Crawler;
use App\Models\Setting;
use DB;
use SEO;
class ReaderController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $siteTitle = $setting->site_title;
        $siteDescription = $setting->site_description;
        $siteKeywords = $setting->site_keywords;
        $comics = Comic::orderBy('updated_at', 'DESC')
            ->take(20)
            ->get();

        $comicSlider = Comic::where('slider', 'Yes')
            ->with('comicGenres')
            ->get();

        return view('comics.home.index', compact('comics', 'comicSlider', 'siteTitle', 'siteDescription', 'siteKeywords'));
    }
    
    public function searchComic(Request $request)
    {
        $setting = Setting::first();
        $siteTitle = $setting->site_title;
        $siteDescription = $setting->site_description;
        $siteKeywords = $setting->site_keywords;
        $comics = Comic::where('title', 'LIKE', '%'.$request->search.'%')
            ->orderBy('updated_at', 'DESC')
            ->take(20)
            ->get();

        return view('comics.pages.search', compact('comics', 'siteTitle', 'siteDescription', 'siteKeywords'));
    }

    public function comicDetail(Request $request, $type,$slug)
    {
        $browserId = $request->session()->getId();

        $comic = Comic::where('slug', $slug)
            ->where('type', $type)
            ->first();

        if (!$comic) {
           return view('pages.404');
        }

        SEO::setTitle('Komiksea - '.$comic->title);
        SEO::setDescription('Komiksea - '.$comic->title);
        SEO::metatags()->addKeyword(['Komiksea', 'Komiksea me', 'Komikcast','Komiku', $comic->title]);

        $viewed = ComicView::where('comic_id', $comic->id)
            ->where('browser_id', $browserId)
            ->count();

        if ($viewed === 0) {
            $comic->increment('view_count');

            ComicView::create([
                'comic_id' => $comic->id,
                'browser_id' => $browserId,
            ]);
        }

        $widthRating = $this->formatNumber($comic->rating);
        return view('comics.pages.detail', compact('comic', 'widthRating'));
    }


    public function viewComicType($type)
    {
        $originalType = $type;
        $type = ucfirst(strtolower($type));
        $siteTitle = "Komiksea - Baca Manhwa Bahasa Indonesia";
        $siteDescription = "Komikcast - Tempatnya Baca Komik Online Terlengkap Bahasa Indonesia, Baca Manga Bahasa Indonesia, Baca Manhwa Bahasa Indonesia, Baca Manhua Bahasa Indonesia";
        $siteKeywords = "Komiksea', 'Komiksea me', 'Komikcast','Komiku', 'Baca Komik lengkap', 'Baca Manga', 'Baca Manhua', 'Baca Manhwa";
        $perPage = 20;
        $totalComics = Comic::count();
        $comics = Comic::skip(0)->take($perPage)
            ->where('type', $type)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('comics.pages.typecomic', compact('type', 'comics', 'totalComics', 'siteTitle', 'siteDescription', 'siteKeywords', 'originalType'));
    }

    public function viewComicTypePagination($type,$page)
    {
        $originalType = $type;
        $type = ucfirst(strtolower($type));
        $siteTitle = "Komiksea - Baca Manhwa Bahasa Indonesia";
        $siteDescription = "Komikcast - Tempatnya Baca Komik Online Terlengkap Bahasa Indonesia, Baca Manga Bahasa Indonesia, Baca Manhwa Bahasa Indonesia, Baca Manhua Bahasa Indonesia";
        $siteKeywords = "Komiksea', 'Komiksea me', 'Komikcast','Komiku', 'Baca Komik lengkap', 'Baca Manga', 'Baca Manhua', 'Baca Manhwa";
        $perPage = 20;
        $offset = ($page - 1) * $perPage;
    
        $totalComics = Comic::count();
        $comics = Comic::skip($offset)->take($perPage)
            ->where('type', 'Manhwa')
            ->orderBy('updated_at', 'DESC')
            ->get();
    
        $lastPage = ceil($totalComics / $perPage);
        $isLastPage = false;
        $nextPage = $page + 1;
        $previousPage = $page - 1;
        if ($page >= $lastPage) {
            $isLastPage = true;
            $nextPage = 1;
            return view('comics.pages.typecomic', compact('comics', 'isLastPage', 'nextPage', 'previousPage','page', 'siteTitle', 'siteDescription', 'siteKeywords', 'originalType'));
        }
    
        return view('comics.pages.typecomic', compact('comics', 'isLastPage', 'nextPage', 'previousPage','page', 'siteTitle', 'siteDescription', 'siteKeywords', 'originalType'));
    }

    public function pageComic($page)
    {
        $siteTitle = "Komiksea - Baca Manhwa Bahasa Indonesia";
        $siteDescription = "Komikcast - Tempatnya Baca Komik Online Terlengkap Bahasa Indonesia, Baca Manga Bahasa Indonesia, Baca Manhwa Bahasa Indonesia, Baca Manhua Bahasa Indonesia";
        $siteKeywords = "Komiksea', 'Komiksea me', 'Komikcast','Komiku', 'Baca Komik lengkap', 'Baca Manga', 'Baca Manhua', 'Baca Manhwa";
        $perPage = 20;
        $offset = ($page - 1) * $perPage;
    
        $totalComics = Comic::count();
        $comics = Comic::skip($offset)->take($perPage)
            ->orderBy('updated_at', 'DESC')
            ->get();
    
        $lastPage = ceil($totalComics / $perPage);
        $isLastPage = false;
        $nextPage = $page + 1;
        $previousPage = $page - 1;
        if ($page >= $lastPage) {
            $isLastPage = true;
            $nextPage = 1;
            return view('reader.page-comic', compact('comics', 'isLastPage', 'nextPage', 'previousPage','page', 'siteTitle', 'siteDescription', 'siteKeywords'));
        }
    
        return view('reader.page-comic', compact('comics', 'isLastPage', 'nextPage', 'previousPage','page', 'siteTitle', 'siteDescription', 'siteKeywords'));
    }

    public function viewAll($page)
    {
        $siteTitle = "Komiksea - Baca Manhwa Bahasa Indonesia";
        $siteDescription = "Komikcast - Tempatnya Baca Komik Online Terlengkap Bahasa Indonesia, Baca Manga Bahasa Indonesia, Baca Manhwa Bahasa Indonesia, Baca Manhua Bahasa Indonesia";
        $siteKeywords = "Komiksea', 'Komiksea me', 'Komikcast','Komiku', 'Baca Komik lengkap', 'Baca Manga', 'Baca Manhua', 'Baca Manhwa";
        $perPage = 20;
        $offset = ($page - 1) * $perPage;
    
        $totalComics = Comic::count();
        $comics = Comic::skip($offset)->take($perPage)
            ->orderBy('updated_at', 'DESC')
            ->get();
    
        $lastPage = ceil($totalComics / $perPage);
        $isLastPage = false;
        $nextPage = $page + 1;
        $previousPage = $page - 1;
        if ($page >= $lastPage) {
            $isLastPage = true;
            $nextPage = 1;
            return view('comics.pages.viewall', compact('comics', 'isLastPage', 'nextPage', 'previousPage','page', 'siteTitle', 'siteDescription', 'siteKeywords'));
        }
    
        return view('comics.pages.viewall', compact('comics', 'isLastPage', 'nextPage', 'previousPage','page', 'siteTitle', 'siteDescription', 'siteKeywords'));
    }

    public function readChapter($slug)
    {
        $chapter = ComicChapter::where('chapter_slug', $slug)
            ->first();
        if(!$chapter){
            return view('pages.404');
        }
        $comic = Comic::where('id', $chapter->comic_id)
            ->first();
        
        $allChapters = ComicChapter::where('comic_id', $chapter->comic_id)
            ->get();

        if ($chapter->hasPreviousChapter()) {
            $previousChapter = $chapter->getPreviousChapter();
        } else {
            $previousChapter = null;
        }
        
        if ($chapter->hasNextChapter()) {
            $nextChapter = $chapter->getNextChapter();
        } else {
            $nextChapter = null;
        }
        SEO::setTitle('Komiksea - '.$comic->title);
        SEO::setDescription('Komiksea - '.$comic->title);
        SEO::metatags()->addKeyword(['Komiksea', 'Komiksea me', 'Komikcast','Komiku', $comic->title]);
        return view('comics.pages.chapter', compact('chapter', 'comic', 'allChapters', 'nextChapter', 'previousChapter'));
    }

    public function pageGenre($slug, $page)
    {
        $perPage = 20;
        $offset = ($page - 1) * $perPage;

        // Menggunakan relasi jika ada
        $genre = Genre::where('slug', ucfirst($slug))->first();
        if (!$genre) {
            abort(404); // Menangani jika genre tidak ditemukan
        }

        $totalComics = $genre->comics()->count();
        $comics = $genre->comics()
            ->skip($offset)->take($perPage)
            ->orderBy('updated_at', 'DESC')
            ->get();

        $lastPage = ceil($totalComics / $perPage);
        $isLastPage = false;
        $nextPage = $page + 1;
        $previousPage = $page - 1;

        // Variabel deklarasi awal
        $siteTitle = "Komiksea - " . $genre->name;
        $siteDescription = "Komikcast - Tempatnya Baca Komik Online Terlengkap Bahasa Indonesia, Baca Manga Bahasa Indonesia, Baca Manhwa Bahasa Indonesia, Baca Manhua Bahasa Indonesia";
        $siteKeywords = "Komiksea', 'Komiksea me', 'Komikcast','Komiku', 'Baca Komik lengkap', 'Baca Manga', 'Baca Manhua', 'Baca Manhwa";

        if ($page >= $lastPage) {
            $isLastPage = true;
            $nextPage = 1;
        }

        return view('comics.pages.genre', compact('genre','comics', 'isLastPage', 'nextPage', 'previousPage','page', 'slug', 'siteTitle', 'siteDescription', 'siteKeywords'));
    }


    function formatNumber($number)
    {
        if (strpos($number, '/') !== false) {
            [$whole, $fraction] = explode('/', $number);
            $formatted_fraction = rtrim(number_format($fraction / 10, 1, ',', ''), '0');
            $number = $whole . str_replace(',', '', $formatted_fraction);
    
            if(strlen($number) === 1) {
                $number .= '0';
            }
    
            $formatted_number = $number;
        } else {
            if (strlen($number) === 1 && strpos($number, ',') === false) {
                $number .= '0';
            }
    
            $formatted_number = ceil($number * 10) / 10;
            $formatted_number = rtrim(number_format($formatted_number, 1, ',', ''), '0');
            $formatted_number = rtrim($formatted_number, ',');
            $formatted_number = str_replace(',', '', $formatted_number);
    
            if(strlen($formatted_number) === 1) {
                $formatted_number .= '0';
            }
        }
    
        return $formatted_number;
    }
}

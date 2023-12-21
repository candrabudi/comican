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

        return view('reader.index', compact('comics', 'comicSlider', 'siteTitle', 'siteDescription', 'siteKeywords'));
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

        return view('reader.search', compact('comics', 'siteTitle', 'siteDescription', 'siteKeywords'));
    }

    public function pageManga()
    {
        $type = 'Manga';
        $siteTitle = "Komiksea - Baca Manga Bahasa Indonesia";
        $siteDescription = "Komikcast - Tempatnya Baca Komik Online Terlengkap Bahasa Indonesia, Baca Manga Bahasa Indonesia, Baca Manhwa Bahasa Indonesia, Baca Manhua Bahasa Indonesia";
        $siteKeywords = "Komiksea', 'Komiksea me', 'Komikcast','Komiku', 'Baca Komik lengkap', 'Baca Manga', 'Baca Manhua', 'Baca Manhwa";
        $perPage = 20;
        $totalComics = Comic::count();
        $comics = Comic::skip(0)->take($perPage)
            ->where('type', 'Manga')
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('reader.page-manga', compact('type', 'comics', 'totalComics', 'siteTitle', 'siteDescription', 'siteKeywords'));
    }

    public function pageMangaPagination($page)
    {
        $type = "Manga";
        $siteTitle = "Komiksea - Baca Manga Bahasa Indonesia";
        $siteDescription = "Komikcast - Tempatnya Baca Komik Online Terlengkap Bahasa Indonesia, Baca Manga Bahasa Indonesia, Baca Manhwa Bahasa Indonesia, Baca Manhua Bahasa Indonesia";
        $siteKeywords = "Komiksea', 'Komiksea me', 'Komikcast','Komiku', 'Baca Komik lengkap', 'Baca Manga', 'Baca Manhua', 'Baca Manhwa";
        $perPage = 20;
        $offset = ($page - 1) * $perPage;
    
        $totalComics = Comic::count();
        $comics = Comic::skip($offset)->take($perPage)
            ->where('type', 'Manga')
            ->orderBy('updated_at', 'DESC')
            ->get();
    
        $lastPage = ceil($totalComics / $perPage);
        $isLastPage = false;
        $nextPage = $page + 1;
        $previousPage = $page - 1;
        if ($page >= $lastPage) {
            $isLastPage = true;
            $nextPage = 1;
            return view('reader.page-manga-pagination', compact('comics', 'isLastPage', 'nextPage', 'previousPage','page', 'siteTitle', 'siteDescription', 'siteKeywords'));
        }
    
        return view('reader.page-manga-pagination', compact('comics', 'isLastPage', 'nextPage', 'previousPage','page', 'siteTitle', 'siteDescription', 'siteKeywords'));
    }
    
    public function pageManhwa()
    {
        $type = "Manhwa";
        $siteTitle = "Komiksea - Baca Manhwa Bahasa Indonesia";
        $siteDescription = "Komikcast - Tempatnya Baca Komik Online Terlengkap Bahasa Indonesia, Baca Manga Bahasa Indonesia, Baca Manhwa Bahasa Indonesia, Baca Manhua Bahasa Indonesia";
        $siteKeywords = "Komiksea', 'Komiksea me', 'Komikcast','Komiku', 'Baca Komik lengkap', 'Baca Manga', 'Baca Manhua', 'Baca Manhwa";
        $perPage = 20;
        $totalComics = Comic::count();
        $comics = Comic::skip(0)->take($perPage)
            ->where('type', 'Manhwa')
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('reader.page-manga', compact('type', 'comics', 'totalComics', 'siteTitle', 'siteDescription', 'siteKeywords'));
    }

    public function pageManhwaPagination($page)
    {
        $type = "Manhwa";
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
            return view('reader.page-manga-pagination', compact('comics', 'isLastPage', 'nextPage', 'previousPage','page', 'siteTitle', 'siteDescription', 'siteKeywords'));
        }
    
        return view('reader.page-manga-pagination', compact('comics', 'isLastPage', 'nextPage', 'previousPage','page', 'siteTitle', 'siteDescription', 'siteKeywords'));
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
    
    public function manhwaDetail(Request $request, $slug)
    {
        
        $browserId = $request->session()->getId();

        $comic = Comic::where('slug', $slug)->first();

        if (!$comic) {
           return view('pages.404');
        }

        SEO::setTitle('Komiksea - '.$comic->title);
        SEO::setDescription('Komiksea - '.$comic->title);
        SEO::metatags()->addKeyword(['Komiksea', 'Komiksea me', 'Komikcast','Komiku', $comic->title]);

        // Check if the browser ID has already viewed the comic
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
        return view('reader.detail', compact('comic', 'widthRating'));
    }

    public function manhuaDetail($slug)
    {
        $comic = Comic::where('slug', $slug)
            ->first();
        if(!$comic){
            return view('pages.404');
        }
        SEO::setTitle('Komiksea - '.$comic->title);
        SEO::setDescription('Komiksea - '.$comic->title);
        SEO::metatags()->addKeyword(['Komiksea', 'Komiksea me', 'Komikcast','Komiku', $comic->title]);
        $widthRating = $this->formatNumber($comic->rating);
        return view('reader.detail', compact('comic', 'widthRating'));
    }

    public function mangaDetail($slug)
    {
        $comic = Comic::where('slug', $slug)
            ->first();
        if(!$comic){
            return view('pages.404');
        }
        SEO::setTitle('Komiksea - '.$comic->title);
        SEO::setDescription('Komiksea - '.$comic->title);
        SEO::metatags()->addKeyword(['Komiksea', 'Komiksea me', 'Komikcast','Komiku', $comic->title]);
        $widthRating = $this->formatNumber($comic->rating);
        return view('reader.detail', compact('comic', 'widthRating'));
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
        return view('reader.chapter', compact('chapter', 'comic', 'allChapters', 'nextChapter', 'previousChapter'));
    }

    public function pageGenre($slug, $page)
    {
        $perPage = 20;
        $offset = ($page - 1) * $perPage;
    
        $totalComics = Comic::count();
        $comics = Comic::skip($offset)->take($perPage)
            ->select('comics.*')
            ->join('comic_genres as cg', 'cg.comic_id', '=', 'comics.id')
            ->join('genres as g', 'g.id', '=', 'cg.genre_id')
            ->where('g.slug', ucfirst($slug))
            ->orderBy('comics.updated_at', 'DESC')
            ->get();

        $lastPage = ceil($totalComics / $perPage);
        $isLastPage = false;
        $nextPage = $page + 1;
        $previousPage = $page - 1;
        $genreName = Genre::where('slug', $slug)
            ->first()->name;
        if ($page >= $lastPage) {
            $isLastPage = true;
            $nextPage = 1;
            return view('reader.page-genre', compact('comics', 'isLastPage', 'nextPage', 'previousPage','page', 'genreName', 'slug'));
        }
        
        $siteTitle = "Komiksea - ". $genreName;
        $siteDescription = "Komikcast - Tempatnya Baca Komik Online Terlengkap Bahasa Indonesia, Baca Manga Bahasa Indonesia, Baca Manhwa Bahasa Indonesia, Baca Manhua Bahasa Indonesia";
        $siteKeywords = "Komiksea', 'Komiksea me', 'Komikcast','Komiku', 'Baca Komik lengkap', 'Baca Manga', 'Baca Manhua', 'Baca Manhwa";
        return view('reader.page-genre', compact('comics', 'isLastPage', 'nextPage', 'previousPage','page', 'genreName', 'slug', 'siteTitle', 'siteDescription', 'siteKeywords'));
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

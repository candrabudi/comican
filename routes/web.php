<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MangaController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\HtmlController;
use App\Http\Controllers\ReaderController;
use App\Jobs\GenerateSitemap;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ReaderController::class, 'index'])->name('reader');
Route::get('/cari', [ReaderController::class, 'searchComic'])->name('reader.search');
Route::get('/baca/{type}/{slug}', [ReaderController::class, 'comicDetail'])->name('reader.comic.detail');
Route::get('/baca/{type}/{page}', [ReaderController::class, 'viewComicTypePagination'])->name('reader.page.comic.pagination');
Route::get('/chapter/{slug}', [ReaderController::class, 'readChapter'])->name('reader.chapter');
Route::get('/semua/komik/{page}', [ReaderController::class, 'viewAll'])->name('reader.comic.page');
Route::get('/genre/{slug}/{page}', [ReaderController::class, 'pageGenre'])->name('reader.genre.page');
Route::get('/baca/{type}', [ReaderController::class, 'viewComicType'])->name('reader.page.comic');

Route::get('/error', [PageController::class, 'noFound'])->name('page.notfound');

Route::post('/login/process', [AuthController::class, 'loginProcess'])->name('login.process');
Route::get('/global/crawl/all/chapter', [MangaController::class, 'crawlAllChapterGlobal'])->name('sea.comic.crawl.chapter.all');

Route::get('/generate-sitemap', function () {
    GenerateSitemap::dispatch();
    
    return 'Sitemap generation has been triggered!';
});

Auth::routes();
Route::group(['prefix' => 'sea'], function($router) {
    $router->get('/dashboard', [DashboardController::class, 'index'])->name('sea.dashboard');
    Route::group(['prefix' => 'comic'], function($router) {
        $router->get('/', [MangaController::class, 'index'])->name('sea.comic');
        $router->get('/datatable', [MangaController::class, 'datatable'])->name('sea.comic.datatable');
        $router->get('/create', [MangaController::class, 'create'])->name('sea.comic.create');
        $router->get('/edit/{id}', [MangaController::class, 'edit'])->name('sea.comic.edit');
        $router->post('/update/{id}', [MangaController::class, 'updateComic'])->name('sea.comic.update');
        $router->post('/crawl/process', [MangaController::class, 'comicProcess'])->name('sea.comic.crawl.process');
        $router->post('/crawl/chapter/process', [MangaController::class, 'comicChapterProcess'])->name('sea.comic.crawl.chapter.process');
        $router->post('/crawl/all/chapter', [MangaController::class, 'crawlAllChapter'])->name('sea.comic.crawl.chapter.all');
        $router->get('/crawl/all/chapter/check/{comic_id}', [MangaController::class, 'crawlNewChapter'])->name('sea.comic.crawl.chapter.check');
    });
    Route::group(['prefix' => 'settings'], function($router) {
        $router->get('/', [SettingController::class, 'index'])->name('sea.setting');
    });
    Route::group(['prefix' => 'htmlscript'], function($router) {
        $router->get('/', [HtmlController::class, 'index'])->name('sea.htmlscript');
        $router->get('/datatable', [HtmlController::class, 'datatable'])->name('sea.htmlscript.datatable');
        $router->get('/create', [HtmlController::class, 'create'])->name('sea.htmlscript.create');
        $router->post('/store', [HtmlController::class, 'store'])->name('sea.htmlscript.store');
    });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

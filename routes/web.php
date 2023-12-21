<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MangaController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\ReaderController;
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
Route::get('/manhwa/{slug}', [ReaderController::class, 'manhwaDetail'])->name('reader.manhwa.detail');
Route::get('/manhua/{slug}', [ReaderController::class, 'mahuaDetail'])->name('reader.manhua.detail');
Route::get('/manga/{slug}', [ReaderController::class, 'mangaDetail'])->name('reader.manga.detail');
Route::get('/manga', [ReaderController::class, 'pageManga'])->name('reader.page.manga');
Route::get('/manga/{page}', [ReaderController::class, 'pageMangaPagination'])->name('reader.page.manga.pagination');
Route::get('/manhwa', [ReaderController::class, 'pageManhwa'])->name('reader.page.manhwa');
Route::get('/manhwa/{page}', [ReaderController::class, 'pageManhwaPagination'])->name('reader.page.manhwa.pagination');
Route::get('/chapter/{slug}', [ReaderController::class, 'readChapter'])->name('reader.chapter');
Route::get('/komik/{page}', [ReaderController::class, 'pageComic'])->name('reader.comic.page');
Route::get('/genre/{slug}/{page}', [ReaderController::class, 'pageGenre'])->name('reader.genre.page');

Route::get('/error', [PageController::class, 'noFound'])->name('page.notfound');

Route::post('/login/process', [AuthController::class, 'loginProcess'])->name('login.process');
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
    });
    Route::group(['prefix' => 'settings'], function($router) {
        $router->get('/', [SettingController::class, 'index'])->name('sea.setting');
    });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

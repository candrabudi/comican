<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Comic extends Model
{
    use HasFactory;

    public function comicGenres()
    {
        return $this->hasMany(ComicGenre::class, 'comic_id', 'id')
            ->join('genres as g', 'g.id', '=', 'comic_genres.genre_id')
            ->select('comic_genres.id', 'comic_id', 'genre_id', 'name', 'g.slug');
    }
    
    public function comicChapter()
    {
        return $this->hasMany(ComicChapter::class, 'comic_id', 'id')
            ->orderByRaw("LPAD(chapter_number_original, 10, '0') DESC")
            ->take(2);
    }
    public function comicChapterFirst()
    {
        return $this->hasONe(ComicChapter::class, 'comic_id', 'id')
            ->orderByRaw("LPAD(chapter_number_original, 10, '0') ASC");
    }
    public function comicChapterLast()
    {
        return $this->hasONe(ComicChapter::class, 'comic_id', 'id')
        ->orderByRaw("LPAD(chapter_number_original, 10, '0') DESC");
    }
    public function comicChapterAll()
    {
        return $this->hasMany(ComicChapter::class, 'comic_id', 'id')
            ->selectRaw("*, CAST(REGEXP_REPLACE(chapter_number_original, '[^0-9]', '') AS UNSIGNED) AS numeric_chapter_number")
            ->orderByRaw("CAST(REGEXP_REPLACE(chapter_number_original, '[^0-9]', '') AS UNSIGNED) + 0 DESC");
    }
    public function comicViews(): HasMany
    {
        return $this->hasMany(ComicView::class, 'comic_id', 'id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'comic_genres');
    }
}

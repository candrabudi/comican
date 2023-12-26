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
            ->selectRaw("*, 
                CAST(SUBSTRING_INDEX(REGEXP_REPLACE(chapter_number_original, '[^0-9\.]', ''), '.', 1) AS UNSIGNED) AS int_part,
                CAST(SUBSTRING_INDEX(REGEXP_REPLACE(chapter_number_original, '[^0-9\.]', ''), '.', -1) AS UNSIGNED) AS decimal_part")
            ->orderByDesc('int_part')
            ->orderByDesc('decimal_part')
            ->take(2);
    }
    public function comicChapterFirst()
    {
        return $this->hasONe(ComicChapter::class, 'comic_id', 'id')
            ->selectRaw("*, 
                CAST(SUBSTRING_INDEX(REGEXP_REPLACE(chapter_number_original, '[^0-9\.]', ''), '.', 1) AS UNSIGNED) AS int_part,
                CAST(SUBSTRING_INDEX(REGEXP_REPLACE(chapter_number_original, '[^0-9\.]', ''), '.', -1) AS UNSIGNED) AS decimal_part")
            ->orderBy('int_part')
            ->orderBy('decimal_part');
    }
    public function comicChapterLast()
    {
        return $this->hasONe(ComicChapter::class, 'comic_id', 'id')
            ->selectRaw("*, 
                CAST(SUBSTRING_INDEX(REGEXP_REPLACE(chapter_number_original, '[^0-9\.]', ''), '.', 1) AS UNSIGNED) AS int_part,
                CAST(SUBSTRING_INDEX(REGEXP_REPLACE(chapter_number_original, '[^0-9\.]', ''), '.', -1) AS UNSIGNED) AS decimal_part")
            ->orderByDesc('int_part')
            ->orderByDesc('decimal_part');
    }
    public function comicChapterAll()
    {
        return $this->hasMany(ComicChapter::class, 'comic_id', 'id')
            ->selectRaw("*, 
                CAST(SUBSTRING_INDEX(REGEXP_REPLACE(chapter_number_original, '[^0-9]', ''), '.', 1) AS UNSIGNED) AS int_part,
                CAST(SUBSTRING_INDEX(REGEXP_REPLACE(chapter_number_original, '[^0-9]', ''), '.', -1) AS UNSIGNED) AS decimal_part")
            ->orderByDesc('int_part')
            ->orderByDesc('decimal_part');
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

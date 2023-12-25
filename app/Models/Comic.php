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
            ->orderBy('chapter_realease', 'DESC')
            ->take(2);
    }
    public function comicChapterFirst()
    {
        return $this->hasONe(ComicChapter::class, 'comic_id', 'id')
            ->orderBy('chapter_realease', 'ASC');
    }
    public function comicChapterLast()
    {
        return $this->hasONe(ComicChapter::class, 'comic_id', 'id')
            ->orderBy('chapter_realease', 'DESC');
    }
    public function comicChapterAll()
    {
        return $this->hasMany(ComicChapter::class, 'comic_id', 'id')
            // ->orderByRaw("LENGTH(REPLACE(chapter_number, '.', '')), CAST(REPLACE(chapter_number, '.', '') AS UNSIGNED)")
            ->orderBy('chapter_number', 'DESC');
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

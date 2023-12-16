<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class ComicChapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'comic_id',
        'chapter_number',
        'chapter_slug',
        'chapter_title',
        'chapter_content',
        'chapter_realease',
    ];
    public function toSitemapTag(): Url | string | array
    {
        // Simple return:
        return route('reader.chapter', $this);

        // Return with fine-grained control:
        return Url::create(route('blog.post.show', $this))
            ->setLastModificationDate(Carbon::create($this->updated_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.8);
    }
    
    public function getNextChapter()
    {
        return self::where('id', '>', $this->id)
            ->orderBy('id', 'asc')
            ->first();
    }

    public function getPreviousChapter()
    {
        return self::where('id', '<', $this->id)
            ->orderBy('id', 'desc')
            ->first();
    }

    public function hasPreviousChapter()
    {
        return self::where('id', '<', $this->id)->exists();
    }

    public function hasNextChapter()
    {
        return self::where('id', '>', $this->id)->exists();
    }
}

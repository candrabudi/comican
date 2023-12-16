<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComicView extends Model
{
    use HasFactory;
    protected $fillable = [
        'comic_id',
        'browser_id',
    ];

    public function comic()
    {
        return $this->belongsTo(Comic::class);
    }
}

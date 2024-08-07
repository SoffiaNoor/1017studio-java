<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';

    protected $fillable = [
        'title',
        'description',
        'link_video',
        'image',
    ];

    public function newsImages()
    {
        return $this->hasMany(NewsImage::class, 'id_news');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'author',
        'excerpt',
        'content',
        'cover_image_path',
        'is_featured',
        'is_published',
        'published_at'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_post_tag');
    }
}

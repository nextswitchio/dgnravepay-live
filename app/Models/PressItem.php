<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'image_path',
        'category',
        'order',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'order' => 'integer',
    ];

    public const CATEGORIES = [
        'news' => 'Inside the News',
        'logo' => 'Logo',
        'team' => 'Team Pictures',
        'product' => 'Product Images',
        'featured' => 'Featured Businesses',
    ];
}

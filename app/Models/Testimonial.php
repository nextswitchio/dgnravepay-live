<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'content',
    'rating',
    'avatar_path',
    'variant',
    'icon',
    'is_featured',
    'is_published',
    'sort_order',
    'page',
  ];

  public const PAGES = [
    'home' => 'Home',
    'loan' => 'Loan',
    'pos' => 'POS',
    'virtual' => 'Virtual Card',
    'savings' => 'Savings',
    'travel' => 'Travel',
    'payroll' => 'Payroll',
    'business' => 'Business',
    'invoice' => 'Invoice',
    'business-management' => 'Business Management',
  ];

  protected $casts = [
    'is_featured' => 'boolean',
    'is_published' => 'boolean',
    'rating' => 'integer',
    'sort_order' => 'integer',
  ];

  public function scopePublished($query)
  {
    return $query->where('is_published', true);
  }

  public function getAvatarUrlAttribute(): ?string
  {
    return $this->avatar_path ? asset('storage/' . ltrim($this->avatar_path, '/')) : null;
  }
}

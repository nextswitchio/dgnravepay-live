<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    // Relationships
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Auto-generate slug from name
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($state) {
            if (empty($state->slug)) {
                $state->slug = Str::slug($state->name);
            }
        });
        
        static::updating(function ($state) {
            if ($state->isDirty('name') && empty($state->slug)) {
                $state->slug = Str::slug($state->name);
            }
        });
    }
}

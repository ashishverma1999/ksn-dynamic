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
        'role',
        'rating',
        'quote',
        'image',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order', 'asc')->orderBy('id', 'desc');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_active', true)->where('is_featured', true)->orderBy('sort_order', 'asc');
    }

    public function getImageUrlAttribute(): string
    {
        if (blank($this->image)) {
            return '';
        }

        $img = trim((string) $this->image);

        if (str_starts_with($img, 'http://') || str_starts_with($img, 'https://')) {
            return $img;
        }

        if (str_starts_with($img, '/storage/') || str_starts_with($img, 'storage/')) {
            return '/' . ltrim($img, '/');
        }

        if (str_starts_with($img, '/images/') || str_starts_with($img, 'images/')) {
            return '/' . ltrim($img, '/');
        }

        if (file_exists(public_path('images/' . ltrim($img, '/')))) {
            return '/images/' . ltrim($img, '/');
        }

        if (file_exists(public_path(ltrim($img, '/')))) {
            return '/' . ltrim($img, '/');
        }

        if (Storage::disk('public')->exists($img)) {
            return '/storage/' . ltrim($img, '/');
        }

        if (Storage::disk('public')->exists('testimonials/' . ltrim($img, '/'))) {
            return '/storage/testimonials/' . ltrim($img, '/');
        }

        if (str_contains($img, '/')) {
            return '/storage/' . ltrim($img, '/');
        }

        return '/images/' . ltrim($img, '/');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Birthday extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'class_or_role',
        'birth_date',
        'image',
        'wishes',
        'badge',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order', 'asc')->orderBy('birth_date', 'asc');
    }

    public function getImageUrlAttribute(): string
    {
        if (blank($this->image)) {
            return '/images/school_gallery.jpeg';
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

        if (Storage::disk('public')->exists('birthdays/' . ltrim($img, '/'))) {
            return '/storage/birthdays/' . ltrim($img, '/');
        }

        if (str_contains($img, '/')) {
            return '/storage/' . ltrim($img, '/');
        }

        return '/images/' . ltrim($img, '/');
    }
}

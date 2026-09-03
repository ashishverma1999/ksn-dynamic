<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'image',
        'published_at',
        'is_featured',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'date',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeRecent(Builder $query): Builder
    {
        return $query
            ->latest('published_at')
            ->latest();
    }

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }

        if (str_starts_with($this->image, '/images/') || str_starts_with($this->image, '/asset/image/') || str_starts_with($this->image, 'images/') || str_starts_with($this->image, 'asset/image/')) {
            return '/' . ltrim($this->image, '/');
        }

        return Storage::disk('public')->url($this->image);
    }
}

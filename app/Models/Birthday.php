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

        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://') || str_starts_with($this->image, '/images/')) {
            return $this->image;
        }

        return Storage::url($this->image);
    }
}

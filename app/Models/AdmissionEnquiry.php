<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AdmissionEnquiry extends Model
{
    protected $fillable = [
        'student_name',
        'guardian_name',
        'phone',
        'email',
        'class_applied',
        'student_age',
        'preferred_visit_date',
        'message',
        'status',
        'source',
        'read_at',
    ];

    protected function casts(): array
    {
        return [
            'preferred_visit_date' => 'date',
            'read_at' => 'datetime',
        ];
    }

    public function scopeUnread(Builder $query): Builder
    {
        return $query->whereNull('read_at');
    }
}

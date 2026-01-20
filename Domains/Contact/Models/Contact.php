<?php

namespace Domains\Contact\Models;

use Domains\Contact\Enums\ContactCategory;
use Domains\Contact\Enums\ContactStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'category',
        'subject',
        'message',
        'status',
    ];

    protected $casts = [
        'category' => ContactCategory::class,
        'status' => ContactStatus::class,
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Category options
    public static function getCategories(): array
    {
        return ContactCategory::values();
    }

    // Status options
    public static function getStatuses(): array
    {
        return ContactStatus::values();
    }

    // Scope for filtering by status
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Scope for filtering by category
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
} 
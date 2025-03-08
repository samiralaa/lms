<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;
    protected $appends = ['full_url'];

    protected $fillable = ['url'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getFullUrlAttribute()
    {
        return config('app.url') . '/storage/' . $this->attributes['url'];
    }
}

<?php

namespace Domains\Course\Models;

use App\Models\User;
use App\Models\Image;
use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, HasImage;

    protected $fillable = [
        'course_name',
        'description',
        'instructor_id',
        'type',
        'status',
        'start_date',
        'end_date',
        'duration',
        'price',
    ];
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

}

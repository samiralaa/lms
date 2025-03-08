<?php
namespace Domains\Course\Models;

use App\Models\Image;
use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory,HasImage;

    protected $fillable = ['title', 'description', 'instructor_id', 'price', 'status'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}

//

<?php
namespace Domains\Students\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Courses\Models\Course;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    // public function courses()
    // {
    //     return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id');
    // }
}

//

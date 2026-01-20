<?php

namespace Domains\Course\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Domains\Course\Repositories\CourseRepository;

class CourseService
{
    protected $coursetRepo;

    public function  __construct(CourseRepository  $coursetRepo)
    {
        $this->coursetRepo = $coursetRepo;
    }
public function getAllCourse()
{
    return $this->coursetRepo->getAllCourses();

}
    public function getCourse($course)

    {
        return $this->coursetRepo->getCourseById($course);
    }

    public function createCourse($data)
    {
        $course = $this->coursetRepo->createCourse($data);
        return $course;
    }

    public function updateCourse($course, $data)
    {
        $course = $this->coursetRepo->getCourseById($course);

        $course->update($data);

        // Handle image upload if provided
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {

            // Delete previous image if exists
            if ($course->image) {
                Storage::delete($course->image->url);
            }

            $imagePath = $data['image']->store('courses', 'public'); // Store image in "storage/app/public/courses"
            $course->images()->update(['url' => $imagePath]);
        }

        return $course;
    }

    public function deleteCourse($course)
    {
        $course = $this->coursetRepo->getCourseById($course);
        $course->delete();
        return response()->json("delete course", array("course" => $course));
    }
}


//

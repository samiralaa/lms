<?php

namespace Domains\Course\Repositories;

use Domains\Course\Models\Course;

class CourseRepository
{
    public function getAllCourses()
    {
        return Course::with('images')->paginate(10);
    }

    public function getCourseById($id)
    {
        return Course::with('images')->findOrFail($id);
    }

    public function createCourse(array $data)
    {
        return Course::create($data);
    }

    public function updateCourse($id, array $data)
    {
        $course = $this->getCourseById($id);
        $course->update($data);
        return $course;
    }

    public function deleteCourse($id)
    {
        $course = $this->getCourseById($id);
        return $course->delete();
    }

    public function getAllImagesByCourseId($courseId)
    {
        return $this->getCourseById($courseId)->images;
    }

    public function createImage($courseId, array $data)
    {
        $course = $this->getCourseById($courseId);
        return $course->images()->create($data);
    }
}

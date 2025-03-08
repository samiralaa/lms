<?php
namespace Domains\Course\Controllers;

use Domains\Course\Repositories\CourseRepository;
use Domains\Course\Requests\CourseRegisterRequest;
use Domains\Course\Services\CourseService;

class CourseController
{
    protected $courseService;
    protected $courseRerop;
    public function __construct(CourseService $courseService,CourseRepository $courseRerop)
    {
        $this->courseService = $courseService;
        $this->courseRerop=$courseRerop;
    }
public function index()
{
    return $this->courseRerop->getAllCourses();
}
    public function store(CourseRegisterRequest $request)
    {
        $course = $this->courseService->createCourse($request->validated());
        return response()->json(['message' => 'course registered successfully', 'course' => $course], 201);
    }

    public function show($id)
    {
        return $this->courseService->getCourse($id);
    }


}

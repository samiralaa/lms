<?php

namespace Domains\Course\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Domains\Course\Models\Course;
use Domains\Course\Services\CourseService;
use Domains\Course\Repositories\CourseRepository;
use Domains\Course\Requests\CourseRegisterRequest;

class CourseController
{
    protected $courseService;
    protected $courseRerop;
    public function __construct(CourseService $courseService, CourseRepository $courseRerop)
    {
        $this->courseService = $courseService;
        $this->courseRerop = $courseRerop;  
    }
    public function index()
    {
        $courses = $this->courseRerop->getAllCourses();

        return view('admin.coures.index', compact('courses'));
    }

    public function store(CourseRegisterRequest $request)
    {
         $data = $request->validated();

        // Create the course record
        $course = $this->courseService->createCourse($data);


        if ($request->hasFile('image')) {
            $course->uploadImage($request->file('image'), 'courses');
        }

        return redirect()->route('courses.index')->with('success', 'Course added successfully!');
    }


    public function edit($id)
    {
        $course = $this->courseRerop->getCourseById($id);
        $instructors = User::get();
        return view('admin.coures.edit', compact('course', 'instructors'));
    }
    public function update(CourseRegisterRequest $request, $id)
    {
        $course = $this->courseRerop->updateCourse($id, $request->validated());

        if ($request->hasFile('image')) {
            $course->uploadImage($request->file('image'), 'courses');
        }

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }
    public function destroy($id)
    {
        $course = $this->courseRerop->getCourseById($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
    public function show($id)
    {
        return $this->courseService->getCourse($id);
    }


    public function create()
    {

        $instructors = User::get();
        return view('admin.coures.create', compact('instructors'));
    }
}

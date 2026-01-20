<?php
namespace Domains\Students\Controllers;

use Domains\Students\Repositories\StudentRepository;
use Domains\Students\Requests\StudentRegisterRequest;
use Domains\Students\Services\StudentService;


class StudentController
{
    protected $studentService;
    protected $studentRerop;
    public function __construct(StudentService $studentService,StudentRepository $studentRerop)
    {
        $this->studentService = $studentService;
        $this->studentRerop=$studentRerop;
    }

    public function register(StudentRegisterRequest $request)
    {
        dd('Student');
        $student = $this->studentService->registerStudent($request->validated());
        return response()->json(['message' => 'Student registered successfully', 'student' => $student], 201);
    }
    public function allStudentsToDashboard()
    {
        return $this->studentRerop->getAllStudents();

    }
}

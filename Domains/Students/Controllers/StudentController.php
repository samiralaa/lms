<?php
namespace Domains\Students\Controllers;

use Domains\Students\Requests\StudentRegisterRequest;
use Domains\Students\Services\StudentService;


class StudentController
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function register(StudentRegisterRequest $request)
    {
        if (!class_exists(\Domains\Students\Requests\StudentRegisterRequest::class)) {
            dd('StudentRegisterRequest does not exist!');
        }



        $student = $this->studentService->registerStudent($request->validated());

        return response()->json(['message' => 'Student registered successfully', 'student' => $student], 201);
    }
}

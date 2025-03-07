<?php

namespace Domains\Students\Services;

use Domains\Students\Repositories\StudentRepository;
use Illuminate\Support\Facades\Hash;

class StudentService
{
    protected $studentRepo;

    public function  __construct(StudentRepository  $studentRepo )
    {
        $this->studentRepo = $studentRepo;
    }

    public function registerStudent($data)
    {

        $data['password'] = Hash::make($data['password']);

        return $this->studentRepo->createStudent($data);
    }

}

//

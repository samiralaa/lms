<?php
namespace Domains\Students\Repositories;

use Domains\Students\Models\Student;

class StudentRepository
{
    public function getAllStudents()
    {
        return Student::paginate(10);
    }

    public function getStudentById($id)
    {
        return Student::findOrFail($id);
    }

    public function createStudent(array $data)
    {
        return Student::create($data);
    }
}

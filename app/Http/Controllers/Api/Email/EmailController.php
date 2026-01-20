<?php

namespace App\Http\Controllers\Api\Email;

use Illuminate\Http\Request;
use App\Jobs\SendEmailToStudents;
use App\Http\Controllers\Controller;
use Domains\Students\Models\Student;

class EmailController extends Controller
{

    public function sendEmailsToAllStudents(Request $request)
    {
        $subject = $request->input('subject');
        $message = $request->input('message');

        // جلب جميع الطلاب من قاعدة البيانات
        $students = Student::all();

        foreach ($students as $student) {
            SendEmailToStudents::dispatch($student, $subject, $message);
        }

        return response()->json(['message' => 'Emails are being sent to all students!']);
    }
}

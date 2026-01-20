<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Mail;
use App\Mail\StudentNotificationMail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToStudents implements ShouldQueue
{
    use Queueable;
    public $student;
    public $subject;
    public $message;

    public function __construct($student, $subject, $message)
    {
        $this->student = $student;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function handle()
    {
        Mail::to($this->student->email)->send(new StudentNotificationMail($this->subject, $this->message));
    }
}

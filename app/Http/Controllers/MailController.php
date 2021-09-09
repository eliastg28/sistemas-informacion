<?php

namespace App\Http\Controllers;

use App\Mail\BirthMail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //

    public function sendMail($id)
    {
        $student = Student::find($id);
        $details = [
            'title' => 'Happy Birthday' . ' ' . $student->name . ' ' . $student->surname,
            'body' => 'we know that this month is special for you and we want to wish you a birthday full of laughter and happiness.'
        ];
        Mail::to($student->email)->send(new BirthMail($details));

        // usar mensaje ?????

        return redirect()->route('home');
    }
}

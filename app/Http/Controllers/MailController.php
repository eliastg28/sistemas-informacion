<?php

namespace App\Http\Controllers;

use App\Mail\BirthMail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $type = 'congratulation';
        $status = 'success'; // si se produce un validacion erron::ea sera (error, warning, ..)
        $this->au_modifications($type, $student->id, $status,Auth::user()->id );
        return redirect()->route('home');
    }

    private function au_modifications($type, $data, $status, $permanence)
    {
        $audit = session('audit');
        DB::table('audit_modifications')->insert([
            'type' => $type,
            'status' => $status,
            'data' => $data,
            'permanence' => $permanence,
            'audit_id' => $audit
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlController extends Controller
{
    //


    public function birthdayStudents()
    {
        // Fecha actual
        $datecurrent = date('d-m-Y');
        $day = date('d');
        $month = date('m');
        $year = date('Y');
        $birthdayStudent = DB::select('SELECT * FROM `students` WHERE MONTH(birth) = MONTH(CURRENT_DATE())');
        $url = 'Students';

        return view('student.birthday', compact('url', 'birthdayStudent'));

    }
}

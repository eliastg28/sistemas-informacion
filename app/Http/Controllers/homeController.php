<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index()
    {
        // Fecha actual
        $datecurrent = date('d-m-Y');
        $day = date('d');
        $month = date('m');
        $year = date('Y');
        // data
        $students = Student::all();
        $total = $students->count();
        $totalMale = DB::table('students')->where('gender', '=', 'M')->count();
        $totalFamale = DB::table('students')->where('gender', '=', 'F')->count();
        $birthday = DB::table('students')->whereMonth('birth', $month)->count();

        // return $birthday;
        return view('home', compact('students','total','totalMale', 'totalFamale', 'birthday'));
    }
}

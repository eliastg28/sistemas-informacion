<?php

namespace App\Http\Controllers;

// require_once __DIR__.'/vendor/autoload.php';

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $ages = array();
        // logic ages
        foreach ($students as $key => $student) {
            $birth_month = date("m", strtotime($student->birth));
            $birth_day = date("d", strtotime($student->birth));
            $birth_year = date("Y", strtotime($student->birth));

            $age = ($year - $birth_year);
            if ($birth_month > $month) {
                $age += 1;
            } else if ($birth_month == $month) {
                if ($birth_day > $day) {
                    $age += 1;
                }
            }
            // push array ages
            array_push($ages, $age);
        }
        asort($ages);
        $quantitieAges = array_count_values($ages);
        $labelAges = array_values(array_unique($ages));
        // end logic ages
        $totalMale = DB::table('students')->where('gender', '=', 'M')->count();
        $totalFamale = DB::table('students')->where('gender', '=', 'F')->count();
        $dataGender = array($totalMale, $totalFamale);
        $url = 'Home';
        return view('home', compact( 'url','total', 'totalMale', 'totalFamale', 'birthday', 'quantitieAges', 'labelAges', 'dataGender'));
    }
}

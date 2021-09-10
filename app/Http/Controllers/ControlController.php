<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $students = array();
        for ($i = 0; $i < sizeof($birthdayStudent); $i++) {

            array_push(
                $students,
                $this->hp($birthdayStudent[$i]->birth)
            );
        }
        // return $students;
        return view('student.birthday', compact('url', 'birthdayStudent', 'students'));
    }

    private function hp($birth)
    {

        $dateBirth = strtotime($birth);
        $daybirth = date('d', $dateBirth);
        $day = date('d');

        if($day == $daybirth){
            return 'true';
        }else{
            if($day > $daybirth){

                $days = $day - $daybirth;

                return 'Ago '.$days.' days';
            }else{
                $days = $daybirth - $day;

                return 'Missing '.$days.' days';
            }
        }
    }

    public function analytics()
    {

        $data_browser =  DB::select('SELECT browser, COUNT(browser) AS total FROM `audit_sessions` GROUP BY(browser)');
        $data_methods = DB::select('SELECT type, COUNT(type) AS total FROM `audit_modifications` GROUP BY(type)');
        $url = 'Analytics';

        return view('analytics', compact('url', 'data_browser', 'data_methods'));
    }


    public function history()
    {
        $audits = DB::select('SELECT us.name, COUNT(us.name) AS audit FROM `audits` AS au INNER JOIN users AS us on us.id = au.user_id GROUP BY(us.name) ORDER BY (us.name)');
        $users  =  DB::select('SELECT us.id FROM `audits` AS au INNER JOIN users AS us on us.id = au.user_id ORDER BY (us.name)');
        $url = 'History';
        return view('history.index', compact('url', 'audits', 'users'));
    }
    public function detail($user_id)
    {
        $audits = DB::select('SELECT id FROM `audits` WHERE user_id = ?', [$user_id]);
        $sessions = array();
        $time = 0;
        for ($i=0; $i < sizeof($audits); $i++) {
            $session = DB::select('SELECT * FROM `audit_sessions` WHERE audit_id = ?', [$audits[$i]->id]);

            if ($session[0]->date_init == $session[0]->date_final) {
                if ($session[0]->time_hours_init < $session[0]->time_hours_final) {
                    if ($session[0]->time_minutes_init < $session[0]->time_minutes_final) {
                        $minutes = $session[0]->time_minutes_final - $session[0]->time_minutes_init;
                        if($session[0]->time_seconds_init < $session[0]->time_seconds_final){
                            $second = $session[0]->time_seconds_final - $session[0]->time_seconds_init;
                        }else{
                            $second = $session[0]->time_seconds_init - $session[0]->time_seconds_final;
                        }
                        $time = ($minutes * 60) + $second;
                    } else {
                        if($session[0]->time_seconds_init < $session[0]->time_seconds_final){
                            $second = $session[0]->time_seconds_final - $session[0]->time_seconds_init;
                        }else{
                            $second = $session[0]->time_seconds_init - $session[0]->time_seconds_final;
                        }
                        $minutes = $session[0]->time_minutes_init - $session[0]->time_minutes_final;
                        $time = ($minutes * 60) + $second;
                    }
                } else {
                    $hour = $session[0]->time_hours_final - $session[0]->time_hours_init; // 1 * 60
                    if($session[0]->time_minutes_init < $session[0]->time_minutes_final){
                        $minutes = $session[0]->time_minutes_final - $session[0]->time_minutes_init;
                    }else{
                        $minutes = $session[0]->time_minutes_init - $session[0]->time_minutes_final;
                    }
                    if($session[0]->time_seconds_init < $session[0]->time_seconds_final){
                        $second = $session[0]->time_seconds_final - $session[0]->time_seconds_init;
                    }else{
                        $second = $session[0]->time_seconds_init - $session[0]->time_seconds_final;
                    }
                    $time = ($hour * 60) + ($minutes * 60) + ($second);
                }
            }
            array_push($sessions, ["data" => $session, "time" =>  $time]);
        }

        $user = User::find($user_id);

        $url = 'History';
        // return $sessions[0]['time'];
        return view('history.detail', compact('url', 'sessions', 'user'));
    }

    public function methods($audit){

        $data = DB::select('SELECT * FROM `audit_modifications` WHERE audit_id = ? ORDER BY(id)', [$audit]);

        $url = 'History';
        // return $data[0]->ids;
        return view('history.method', compact('url', 'data'));

    }
}

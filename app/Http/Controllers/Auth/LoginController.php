<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Audit;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UAParser\Parser;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {

            return $response;
        }
        // Register audit session
        $this->au_session();
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }


    public function logout(Request $request)
    {
        $permanence = session('audit');
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }
        // return $permanence;
        $this->au_session_final($permanence);
        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }


    private function au_session()
    {

        $agentUser = $_SERVER["HTTP_USER_AGENT"];
        $parser = Parser::create();
        $result = $parser->parse($agentUser);
        $browser = $result->ua->toString();
        $device = $result->device->toString();
        $system = $result->os->toString();

        $audit = Audit::create(['user_id' => Auth::user()->id]);

        $audit_session = DB::table('audit_sessions')->insert([
            'browser' => $browser,
            'device' => $device,
            'system' => $system,
            'date_init' => $this->parser_datecurrent_integer(),
            'time_hours_init' => $this->parser_timecurrent_integer('hours'),
            'time_minutes_init' => $this->parser_timecurrent_integer('minutes'),
            'time_seconds_init' => $this->parser_timecurrent_integer('seconds'),
            'date_final' => 0,
            'time_hours_final' => 0,
            'time_minutes_final' => 0,
            'time_seconds_final' => 0,
            'audit_id' => $audit->id

        ]);
        session(['audit' => $audit->id]);
    }

    private function au_session_final($permanence){


        $audit_session = DB::table('audit_sessions')->where('audit_id','=', $permanence)->get('id');

        DB::table('audit_sessions')->where('id','=',$audit_session[0]->id)->update([
            'date_final' => $this->parser_datecurrent_integer(),
            'time_hours_final' => $this->parser_timecurrent_integer('hours'),
            'time_minutes_final' => $this->parser_timecurrent_integer('minutes'),
            'time_seconds_final' => $this->parser_timecurrent_integer('seconds'),
        ]);

    }

    private function parser_datecurrent_integer()
    {
        date_default_timezone_set('UTC');
        $year = intval(date('Y'));
        $month =  intval(date('m'));
        $day =  intval(date('d'));
        return $year + $month + $day;
    }
    private function parser_timecurrent_integer($date)
    {
        $hour = intval(date('H'));
        $minute = intval(date('i'));
        $second = intval(date('s'));
        if ($date == 'hours') {
            return $hour;
        } else if ($date == 'minutes') {
            return $minute;
        }
        return $second;
    }
}

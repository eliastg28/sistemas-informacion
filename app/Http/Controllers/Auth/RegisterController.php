<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Audit;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use UAParser\Parser;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        $this->au_session();
        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    public function au_session()
    {
        $agentUser = $_SERVER["HTTP_USER_AGENT"];
        $parser = Parser::create();
        $result = $parser->parse($agentUser);
        $browser = $result->ua->toString();
        $device = $result->device->toString();
        $system = $result->os->toString();

        $audit = Audit::create(['user_id' => Auth::user()->id]);

        DB::table('audit_sessions')->insert([
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
        if($date == 'hours'){
            return $hour;
        }else if($date == 'minutes'){
            return $minute;
        }
        return $second;
    }
}

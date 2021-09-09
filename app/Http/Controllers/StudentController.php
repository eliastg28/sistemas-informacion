<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\Promise\all;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();
        $url = 'Students';
        // valores para la auditoria
        $type = 'view';
        $status = 'success';
        $this->au_modifications($type, 0, $status, 0);
        return view('student.index', compact('url', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $url = 'Students';
        return view('student.create', compact('url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $student = Student::create($request->all());
        // valores para la auditoria
        $type = 'create';
        $status = 'success'; // si se produce un validacion erronea sera (error, warning, ..)
        $this->au_modifications($type, $student->id, $status, 0);
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        $url = 'Students';
        return view('student.edit', compact('url', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        $permanence = Student::find($student->id);
        $id = DB::table('audit_permanence')->insertGetId([
            'name' => $permanence->name,
            'surname' => $permanence->surname,
            'email' => $permanence->email,
            'gender' => $permanence->gender,
            'birth' => $permanence->birth
        ]);
        Student::find($student->id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'gender' => $request->gender,
            'birth' => $request->birth
        ]);

        $type = 'update';
        $status = 'success'; // si se produce un validacion erronea sera (error, warning, ...)
        $this->au_modifications($type, $student->id, $status, $id);
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
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

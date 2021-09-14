<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\AuditModification;
use App\Models\AuditPermanence;
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
        $student = $request->validate([
            'name' => 'required|string|max:40',
            'surname' => 'required|string|max:40',
            'email' => 'required|string|email|max:50|unique:students,email',
            'birth' => 'required'
        ]);

        $name = $request->old('name');
        $surname = $request->old('surname');
        $email = $request->old('email');
        $birth = $request->old('birth');

        $student = Student::create($request->all());
        // valores para la auditoria
        $type = 'create';
        $status = 'success'; // si se produce un validacion erronea sera (error, warning, ..)
        $this->au_modifications($type, $student->id, $status, $student->id);
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

        $permanence = $request->validate([
            'name' => 'required|string|max:40',
            'surname' => 'required|string|max:40',
            'birth' => 'required'
        ]);

        $permanence = Student::find($student->id);

        Student::find($student->id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'gender' => $request->gender,
            'birth' => $request->birth
        ]);

        $type = 'update';
        $status = 'success'; // si se produce un validacion erronea sera (error, warning, ...)
        $this->au_modifications($type, $student->id, $status, $permanence);
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
        $modification = AuditModification::create([
            'type' => $type,
            'status' => $status,
            'data' => $data,
            'audit_id' => $audit
        ]);

        AuditPermanence::create([
            'name' => $permanence->name,
            'surname' => $permanence->surname,
            'email' => $permanence->email,
            'gender' => $permanence->gender,
            'birth' => $permanence->birth,
            'audit_modification_id' => $modification->id
        ]);
    }
}

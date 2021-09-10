@extends('layouts.template')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fas fa-user-graduate"></i> Students</h1>
            {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fas fa-user-graduate fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="/student">Students</a></li>
            <li class="breadcrumb-item"><a href="/student/create">edit</a></li>
        </ul>
    </div>
    <div class="card py-2">
        <div class="row d-flex justify-content-center card-body">
            <div class="col-lg-10">
                <form method="POST" action="{{ route('student.update', $student) }}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="fullname">Full name</label>
                                <input class="form-control @error('name', 'post') is-invalid @enderror" id="fullname"
                                    type="text" name="name" value="{{ $student->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="surname">Surnames</label>
                                <input class="form-control @error('surname', 'post') is-invalid @enderror" id="surname" type="text" name="surname"
                                    value="{{ $student->surname }}">
                                @error('surname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="M" @if ($student->gender == 'M')
                                        selected
                                        @endif>Male</option>
                                    <option value="F" @if ($student->gender == 'F')
                                        selected
                                        @endif>Female</option>
                                </select>
                               
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <input class="form-control @error('email', 'post') is-invalid @enderror" id="email" type="email" name="email"
                                    value="{{ $student->email }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="birth_date">Date of birth</label>
                                <input class="form-control @error('birth', 'post') is-invalid @enderror" id="birth_date" type="text" name="birth"
                                    placeholder="Select Date" value="{{ $student->birth }}">
                                @error('birth')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-footer d-flex justify-content-around">
                <button class="btn btn-primary" type="submit">Update student</button>
                <a class="btn btn-danger" href="/student">Back</a>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="/js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="/js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="/js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $('#birth_date').datepicker({
            format: "yyyy/mm/dd",
            autoclose: true,
            todayHighlight: true
        });
    </script>
@endsection

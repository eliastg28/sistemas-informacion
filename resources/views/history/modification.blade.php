@extends('layouts.template')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fas fa-history"></i> History</h1>
            {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fas fa-history fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="/history">History</a></li>
            <li class="breadcrumb-item"><a href="/history/audit/detail/modification/{{ $id }}">Modification
                    details</a></li>

        </ul>
    </div>
    <div class="card py-2">
        <div class="row d-flex justify-content-center card-body">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6">
                        @if ($type == 'update')
                            <p class="h3">Modified Student</p>
                        @else
                        <p class="h3">Created Student</p>
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="fullname">Full name</label>
                                    <input class="form-control" type="text" value="{{ $student->name }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="surname">Surnames</label>
                                    <input class="form-control" type="text" value="{{ $student->surname }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="gender">Gender</label>
                                    <select class="form-control" disabled>
                                        <option value="M">{{ $student->gender }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email</label>
                                    <input class="form-control" type="email" value="{{ $student->email }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="birth_date">Date of birth</label>
                                    <input class="form-control" type="text" value="{{ $student->birth }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if ($type == 'update')
                            <p class="h3">Previous student</p>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="fullname">Full name</label>
                                        <input class="form-control" type="text" value="{{ $permanence->name }}"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="surname">Surnames</label>
                                        <input class="form-control" type="text" value="{{ $permanence->surname }}"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="gender">Gender</label>
                                        <select class="form-control" disabled>
                                            <option value="M">{{ $permanence->gender }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email</label>
                                        <input class="form-control" type="email" value="{{ $permanence->email }}"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="birth_date">Date of birth</label>
                                        <input class="form-control" type="text" value="{{ $permanence->birth }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

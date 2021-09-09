@extends('layouts.template')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fas fa-birthday-cake"></i> Birthday</h1>
            {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fas fa-birthday-cake fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="/student">Students</a></li>
            <li class="breadcrumb-item"><a href="/birthday">Birthday</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>surnames</th>
                                    <th>names</th>
                                    <th>email</th>
                                    <th>date of birth</th>
                                    <th>gender</th>
                                    <th>congratulate</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < sizeof($birthdayStudent); $i++)
                                    <tr>
                                        <td>{{ $birthdayStudent[$i]->surname }}</td>
                                        <td>{{ $birthdayStudent[$i]->name }}</td>
                                        <td>{{ $birthdayStudent[$i]->email }}</td>
                                        <td>{{ $birthdayStudent[$i]->birth }}</td>
                                        <td>{{ $birthdayStudent[$i]->gender }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('mail', $birthdayStudent[$i]->id) }}">
                                                <i class="fas fa-birthday-cake"></i>
                                                Happy Birthday
                                            </a>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

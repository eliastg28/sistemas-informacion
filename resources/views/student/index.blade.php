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
        </ul>
    </div>
    {{-- table --}}
    <div class="row m-3">
        <div class="col-md-12">
            <a class="btn btn-primary p-2" href="{{ route('student.create') }}">New Student</a>
        </div>
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
                                    <th>options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->surname }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->birth }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('student.edit', $student) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sampleTable').DataTable();
        });
    </script>
@endsection

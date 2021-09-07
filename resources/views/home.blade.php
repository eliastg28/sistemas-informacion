@extends('layouts.template')




@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i> Home</h1>
            {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Student</h4>
                    <p><b>{{ $total }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fas fa-birthday-cake fa-3x"></i>
                <div class="info">
                    <h4>Birthday</h4>
                    <p><b>{{ $birthday }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fas fa-male fa-3x"></i>

                <div class="info">
                    <h4>man</h4>
                    <p><b>{{ $totalMale }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fas fa-female fa-3x"></i>
                <div class="info">
                    <h4>woman</h4>
                    <p><b>{{ $totalFamale }}</b></p>
                </div>
            </div>
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

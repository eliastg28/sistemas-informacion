@extends('layout.template')


<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 px-5">
    {{-- <a class="navbar-brand" href="#">Information Systems</a> --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ml-auto" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/home">Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/chart">Chart</a>
            </li>
        </ul>
    </div>
</nav>

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Home</h1>
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
                    <p><b id="total"></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fas fa-birthday-cake fa-3x"></i>
                <div class="info">
                    <h4>Birthday</h4>
                    <p><b id="birthdayMonth"></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fas fa-male fa-3x"></i>

                <div class="info">
                    <h4>man</h4>
                    <p><b id="male"></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fas fa-female fa-3x"></i>
                <div class="info">
                    <h4>woman</h4>
                    <p><b id="female"></b></p>
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
                                    <th>date of birth</th>
                                    <th>gender</th>
                                </tr>
                            </thead>
                            <tbody id="dataTable">
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
    <script type="module">
        import {
            Estudiantes
        } from "/js/data.js"
        import {
            total,
            birthdayMonth,
            gender
        } from '/js/mapping.js'
        var data = ''
        for (let estudiante of Estudiantes) {
            const {
                nombre,
                apellidos,
                nacimiento,
                sexo
            } = estudiante
            data +=
                '<tr>' +
                `<td > ${apellidos} </td>` +
                `<td > ${nombre}</td>` +
                `<td > ${nacimiento} </td>` +
                `<td > ${sexo}</td>`
            '</tr>'
        }
        document.querySelector('#dataTable').innerHTML = data
        document.querySelector('#total').innerHTML = total()
        document.querySelector('#birthdayMonth').innerHTML = birthdayMonth()
        document.querySelector('#male').innerHTML = gender('M')
        document.querySelector('#female').innerHTML = gender('F')

    </script>
@endsection

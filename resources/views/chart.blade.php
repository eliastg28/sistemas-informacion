@extends('layouts.template')

<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 px-5">
    {{-- <a class="navbar-brand" href="#">Information Systems</a> --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ml-auto" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/home">Home</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/chart">Chart</a>
            </li>
        </ul>
    </div>
</nav>

@section('content')


    <div class="app-title">
        <div>
            <h1><i class="fa fa-chart-bar"></i> Chart</h1>
            {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="/chart">Chart</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Chart of Ages</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="ages"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Pie Chart</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="gender"></canvas>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script type="module">
        import {
            labelsAges,
            countAges,
            countGender
        } from '/js/mapping.js'
        let labels = labelsAges();
        let dates = countAges();
        let numGender = countGender();

        var ctx = document.getElementById('ages').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Ages',
                    data: dates,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(25, 132, 12, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(42, 114, 122, 1)',
                        'rgba(230, 130, 215, 1)',
                        'rgba(128, 190, 120, 1)'
                    ]
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            },
        });

        var ctx = document.getElementById('gender');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'Hombres',
                    'Mujeres'
                ],
                datasets: [{
                    data: numGender,
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)'
                    ]
                }]
            }
        });

    </script>

@endsection

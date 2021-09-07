@extends('layouts.template')

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
    <script>
        var ctx = document.getElementById('ages').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($labelAges as $label)
                        {{ $label }},
                    @endforeach
                ],
                datasets: [{
                    label: 'Ages',
                    data: [
                        @foreach ($quantitieAges as $data)
                            {{ $data }},
                        @endforeach
                    ],
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
                    'Male',
                    'Famale'
                ],
                datasets: [{
                    label: 'Gender',
                    data: [
                        @foreach ($dataGender as $data)
                            {{ $data }},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)'
                    ]
                }]
            }
        });
    </script>

@endsection

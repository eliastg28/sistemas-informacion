@extends('layouts.template')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fas fa-chart-line"></i> Analytics</h1>
            {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fas fa-chart-area fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="/analytics">Analytics</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title"> <i class="fas fa-chart-line"></i> Browsers</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="browser"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title"> <i class="fas fa-chart-pie"></i> Methods</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="methods"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('browser').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    @for ($i = 0; $i < sizeof($data_browser); $i++)
                        '{{ $data_browser[$i]->browser }}',
                    @endfor
                ],
                datasets: [{
                    label: '',
                    data: [
                        @for ($i = 0; $i < sizeof($data_browser); $i++)
                            {{ $data_browser[$i]->total }},
                        @endfor
                    ],
                    borderColor :'rgba(54, 162, 235, 1)',
                    fill: false,
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

        var ctx = document.getElementById('methods').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    @for ($i = 0; $i < sizeof($data_methods); $i++)
                        '{{ $data_methods[$i]->type }}',
                    @endfor
                ],
                datasets: [{
                    label: '',
                    data: [
                        @for ($i = 0; $i < sizeof($data_methods); $i++)
                            {{ $data_methods[$i]->total }},
                        @endfor
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
            }
        });

    </script>
@endsection

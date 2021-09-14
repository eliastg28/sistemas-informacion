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
            <li class="breadcrumb-item"><a href="/history/detail/{{ $user->id }}">detail</a></li>
        </ul>
    </div>
    {{-- table --}}
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Browser</th>
                                    <th>System</th>
                                    <th>Time of sessions</th>
                                    <th>options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < sizeof($sessions); $i++)
                                    <tr>
                                        <th>{{ ($i + 1) }}</th>
                                        <td>{{ $sessions[$i]['data'][0]->browser }}</td>
                                        <td>{{ $sessions[$i]['data'][0]->system }}</td>
                                        <td>{{ $sessions[$i]['time'] }} seconds</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('history.history', $sessions[$i]['data'][0]->audit_id) }}">
                                                <i class="fas fa-file"> Details</i>
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
@section('script')
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sampleTable').DataTable();
        });
    </script>
@endsection

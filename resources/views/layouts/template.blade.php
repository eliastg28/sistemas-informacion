<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information System</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e466ec6b27.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 px-5">
        {{-- <a class="navbar-brand" href="#">Information Systems</a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-auto d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                @if ($url == 'Home')
                    <li class="nav-item active">
                        <a class="nav-link" href="/home">Home</span></a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Home</span></a>
                    </li>
                @endif
                @if ($url == 'Students')
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('student.index') }}">Students</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.index') }}">Students</a>
                    </li>
                @endif
                @if ($url == 'Analytics')
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('analytics') }}">Analytics</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('analytics') }}">Analytics</a>
                    </li>
                @endif
                @if ($url == 'History')
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('history') }}">History</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('history') }}">History</a>
                    </li>
                @endif
            </ul>

            <ul class="nav nav-tabs">
                <!-- User Menu-->
                <li class="nav-item dropdown" style="border: none;">
                    <a class="nav-link dropdown-toggle" style="font-size: 16px; color: black;" href="#"
                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i
                            class="fa fa-user fa-lg mr-2"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container">
        @yield('content')
    </main>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <!-- Essential javascripts for application to work-->
    @yield('script')
</body>

</html>

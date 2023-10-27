<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .btn-info {
            color: white;
        }

        .btn-info:hover {
            color: white;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'CodeHub') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('admin.login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @auth
            <div class="container">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <p><a href="{{ route('admin.sellers.index') }}">Sellers</a></p>
                            </li>
                            <li class="list-group-item">
                                <p><a href="{{ route('admin.projects') }}">Projects</a></p>
                            </li>
                            <li class="list-group-item">
                                <p><a href="{{ route('admin.orders') }}">Orders</a></p>
                            </li>
                            <li class="list-group-item">
                                <p><a href="{{ route('admin.balance') }}">Balance</a></p>
                            </li>
                        </ul>
                        <ul class="list-group mt-5">
                            <li class="list-group-item">
                                <p><a href="{{ route('admin.subscribers') }}">Subscribers</a></p>
                            </li>
                            <li class="list-group-item">
                                <p><a href="{{ route('admin.complaints') }}">Complaints</a></p>
                            </li>
                            <li class="list-group-item">
                                <p><a href="{{ route('admin.customprojects') }}">Customprojects</a></p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                </div>
            </div>
            @else
            @yield('content')
            @endauth
        </main>
    </div>
</body>

</html>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" id="token" value="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('js/activeLinks.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="brand-img" src="images/logo.png" alt="User" width="64" height="64">
                    {{ config('app.name', 'Poster Space') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item navbar-link active">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item navbar-link">
                            <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                        </li>
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img class="navbar-img" src="images/icons/person-circle.svg" alt="User" width="32" height="32">User
                                </a>

                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark bg-dark" aria-labelledby="navbarDropdown">
                                @if (Route::has('login'))
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        <img class="navbar-img" src="images/icons/person.svg" alt="Logout" width="32" height="32">{{ __('Login') }}</a>
                                @endif

                                @if (Route::has('register'))
                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        <img class="navbar-img" src="images/icons/person-plus.svg" alt="Logout" width="32" height="32">{{ __('Register') }}</a>
                                @endif
                                </div>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img class="navbar-img" src="images/icons/person-circle.svg" alt="User" width="32" height="32">{{ Auth::user()->first_name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark bg-dark" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <img class="navbar-img" src="images/icons/person-x.svg" alt="Logout" width="32" height="32">{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item">
                                        <a class="dropdown-item" href="{{ url('/admin') }}"><img class="navbar-img" src="images/icons/person-admin.svg" alt="Admin" width="32" height="32">Admin</a>
                                    </a>
                                </div>
                            </li>
                        @endguest
                        <shopping-cart-icon></shopping-cart-icon>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <shopping-cart ref="shoppingCart"></shopping-cart>
            @yield('content')
        </main>
    </div>
    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container d-flex justify-content-center">
            <p>Dave & Just 2022&copy;<br>
                <a class="footer-link" href="{{ url('/return') }}">Returns</a>    
                <a class="footer-link" href="{{ url('/tos') }}">Terms of Service</a>
                <a class="footer-link" href="{{ url('/contact') }}">Contact</a>
            </p>
            
        </div>
    </footer>
</body>
</html>

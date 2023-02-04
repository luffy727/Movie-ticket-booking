<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Home') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/checkout.js') }}" defer></script>
    <script src="{{ asset('js/movie.js') }}" defer></script>
    <script src="{{ asset('js/payment.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js" defer></script>  
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="../../css/owl.carousel.min.css" rel="stylesheet">
    <link href="../../css/owl.theme.default.min.css" rel="stylesheet">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>
</head>
<body style="background-color: rgb(20, 24, 29);">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                @guest
                <a class="navbar-brand" href="{{ url('') }}">
                    {{ config('app.name', 'Filmzo') }}
                </a>
                @else
                <span class="navbar-brand mb-0 h1">Filmzo</span>
                @endguest
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
    
                            @if (Route::has('aboutus'))
                                <li class="nav-item">
                                    <a href="{{ route('aboutus') }}" class="nav-link">{{ __('About') }}</a>
                                </li>
                            @endif

                            
                            @if (Route::has('contactus'))
                                <li class="nav-item">
                                    <a href="{{ route('contactus') }}" class="nav-link">{{ __('Contact Us') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.dashboard') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Products</a>
                                
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('merchandise') }}">{{ __('Merchandise') }}</a>
                                    <a class="dropdown-item" href="{{ route('category') }}">{{ __('Category') }}</a>
                                    <a class="dropdown-item" href="{{ route('wishlist')}}">{{ __('Wishlist') }}</a> 
                                </div>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart') }}">{{ __('Cart') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user-profile') }}">{{ __('Profile') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('my-orders') }}">{{ __('My Orders') }}</a>
                                    <a class="dropdown-item" href="{{ route('my-booking') }}">{{ __('My Booking') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <script src="../../js/jquery-3.6.0.min.js"></script>
        <script src="../../js/owl.carousel.min.js"></script>
        @include('sweetalert::alert')

        @if(session('status'))
        <script>
            swal("{{session('status')}}")
        </script>
        @endif
        <main class="py-4">
            @yield('content')
            @yield('scripts')
        </main>
        
    </div>
</body>
</html>

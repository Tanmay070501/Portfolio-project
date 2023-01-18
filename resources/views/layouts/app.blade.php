<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <style>
.nav-item {
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
.hidden-text {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 25%;
    background-color: #0000008a;
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    display: none;
}
.galary-img {
    position: relative;
}
.galary-img:hover .hidden-text {
    display: flex;
}
.hover-sign {
    position: relative;
}
.h-text {
    display: none;
    position: absolute;
    top: -120%;
    left: 0%;
    margin: 0 !important;
    margin-bottom: 0 !important;
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 2px;
    white-space: nowrap;
}
.hover-sign:hover .h-text {
    display: inline-block;
}
    .main-content{
        overflow-x: scroll !important;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script defer src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="{{url('/app.css')}}" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    TANMAY
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/college">College</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/diary">Diary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/friends">Friends</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/premiums">Premiums</a>
                        </li>
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
                        @else
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @guest
                                    @else
                                        @if (Auth::user()->role == 1)
                                            <div class="dropdown-item">
                                                <a class="text-decoration-none link-dark" href={{ route('create.diary') }}>Create Diary</a>
                                            </div>
                                            <div class="dropdown-item">
                                                <a class="text-decoration-none link-dark" href={{ route('users') }}>Users</a>
                                            </div> 
                                        @endif
                                    @endguest
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
                            @if (Auth::user()->role == 0 && Auth::user()->email_verified_at)
                                @if (Auth::user()->premium == 0)    
                                <li class="nav-item premium">
                                    <form action={{ route('payit') }} method="POST" >
                                        @csrf
                                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                           data-key={{config('services.razorpay.key')}}
                                           data-amount="100" 
                                           data-currency="INR"
                                           data-buttontext="Become Premium"
                                           data-name="Tanmay Portfolio"
                                           data-description="Rozerpay"
                                           data-prefill.email={{  Auth::user()->email }}
                                           data-theme.color="#F37254"
                                           >
                                        </script>
                                     </form>
                                </li>
                                @endif
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
        @if (session()->has('email.verify'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('email.verify') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>

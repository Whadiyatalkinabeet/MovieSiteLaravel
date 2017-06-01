<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Movies.</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body style="z-index: 1;">

    <!-- Branding Image -->
    <section id="banner" data-video="images/banner">

    <div class="inner">
        <header>
         
            <h1>Movies.<img src="{{ asset('tmdb.png') }}" style="height: 10%; width: 10%; z-index: 2"/></h1>
         
            @if (Auth::guest())
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @else
                
                <a href="#">
                    Welcome {{ Auth::user()->name }} 
                </a> <br/>

                
                    
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
       
            
        </header>
    </div>
    </section>

   
     

    @yield('content')
   
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
   
</body>
</html>

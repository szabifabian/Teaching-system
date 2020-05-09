<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<title>Oktatási rendszer | @yield('title', 'Kezdőlap')</title>
	<meta name="description" content="Example App">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        html, body {
            background-color:whitesmoke;
        }
    </style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        @guest
            <a class="navbar-brand" href="/">OR</a>
        @else
            @if(Auth::user()->role == "student")
             <a class="navbar-brand" href="/">OR DIÁKOLDAL</a> <a class="navbar-brand" href="{{ route('profile') }}">Név: {{Auth::user()->name}}</a>
            @else
            <a class="navbar-brand" href="/">OR TANÁRI OLDAL</a> <a class="navbar-brand" href="{{ route('profile') }}">Név: {{Auth::user()->name}}</a>
            @endif
        @endguest
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacts') }}">Kapcsolat</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Regisztráció</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Bejelentkezés</a>
                    </li>
                @else

                    @if(Auth::user()->role == "teacher")

                        <li class="nav-item">
                            <a class="nav-link" href="/">Tárgyaim</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Új tárgy felvétele</a>
                        </li>

                    @endif
                    <li class="nav-item"  href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <a class="nav-link" href="{{ route('logout') }}">Kijelentkezés</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
			</ul>
		</div>
	</nav>

    <div class="container my-3">
	    @yield('content')
	</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

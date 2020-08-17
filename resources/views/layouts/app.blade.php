<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/pages.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/posts.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/users.css') }}">
    {{--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>
    <header class="navbar navbar-fixed-top" style="background-color: #f0f0f0;">
        <div class="icons">
            <nav class="icons_bar">
                <a href="{{ url('/') }}"><img class="logo_image" src="/images/logo.png"></a>
                <ul class="nav navbar-nav navbar-right icons_bar_rigth">
                    @auth
                        <li><a href="{{ action('UsersController@show', Auth::user()->id) }}"><i class="fas fa-user fa_icon"></i></a></li>
                        {{-- <li><a href="#"><i class="fas fa-dog fa_icon"></i></a></li>--}}
                        <li><a href="{{ action('UsersController@index') }}"><i class="fas fa-hands-helping fa_icon"></i></a></li>
                        @unless ( Auth::user()->email == "guest@example.com" )
                        <li><a href="{{ url('/users/edit') }}"><i class="fas fa-cog fa_icon"></i></a></li>
                        @endunless
                        
                        <li>
                            <a href="{{ route('logout') }}" class="fas fa-sign-out-alt fa_icon" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt fa_icon"></i></a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>
    @yield('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>

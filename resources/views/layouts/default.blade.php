<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/pages.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>
    <header class="navbar navbar-fixed-top" style="background-color: #f0f0f0;">
        <div class="icons">
            <nav class="icons_bar">
                <a href="#"><img class="logo_image" src="images/logo.png"></a>
                <ul class="nav navbar-nav navbar-right icons_bar_rigth">
                    <li>
                        <i class="fas fa-sign-in-alt fa_icon"></i>
                        </a></li>
                </ul>
            </nav>
        </div>
    </header>
    @yield('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>

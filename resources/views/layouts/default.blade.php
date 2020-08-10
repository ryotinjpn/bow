<!DOCTYPE html>
<html lang="ja">
  <head>
      <meta charset="utf-8">
      <title>@yield('title')</title>
      <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>
  <body>
    <header class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <nav>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ action('PagesController@home') }}">Home</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <div class="container">
      @yield('content')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
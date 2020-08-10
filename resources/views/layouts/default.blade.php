<!DOCTYPE html>
<html lang="ja">
  <head>
      <meta charset="utf-8">
      <title>@yield('title')</title>
      <link rel="stylesheet" href="{{ asset('/css/reset.css') }}" >
      <link rel="stylesheet" href="{{ asset('/css/pages.css') }}" >
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  </head>
  <body>
    <header class="navbar navbar-fixed-top" style="background-color: #f0f0f0;">
      <div class="container">
        <nav>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ action('PagesController@home') }}">Home</a></li>
          </ul>
        </nav>
      </div>
    </header>
      @yield('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
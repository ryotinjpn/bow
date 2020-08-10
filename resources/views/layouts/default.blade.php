<!DOCTYPE html>
<html lang="ja">
  <head>
      <meta charset="utf-8">
      <title>@yield('title')</title>
      <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
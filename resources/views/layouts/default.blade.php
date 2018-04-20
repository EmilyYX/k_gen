<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'k_gen') - Laravelで構築SNS</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <header class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="col-md-offset-1 col-md-10">
          <a href="/" id="logo">k_gen- Laravelで構築SNS</a>
          <nav>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/help">ヘルプ</a></li>
              <li><a href="#">ログイン</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atte</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  @yield('css')
</head>
<body>
  <header>
    <div class="header">
      <div class="header__inner">
        <div class="header__logo">Atte</div>
        <ul class="header__nav">
          @if (Auth::check())
          <li class="header__nav-item">
            <a class="header__nav-link" href="/work">ホーム</a>
          </li>
          <li class="header__nav-item">
            <a class="header__nav-link" href="/attendance">日付一覧</a>
          </li>
          <li class="header__nav-item">
            <form action="/logout" method="post">
              @csrf
              <button class="header__nav-button">ログアウト</button>
            </form>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </header>
  <div class="main">
    @yield('content')
  </div>
  <footer class="footer">
    <div class="footer__inner">
      <small>Atte,ink.</small>
    </div>
  </footer>
</body>
</html>
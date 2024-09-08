<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atte</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/stamp.css') }}" />
</head>
<body>
  <header>
    <div class="header">
      <div class="header__inner">
        <div class="header__logo">Atte</div>
        <nav class="header__nav">
          <ul class="header__nav-list">
            <li class="header__nav-item">ホーム</li>
            <li class="header__nav-item">日付一覧</li>
            <li class="header__nav-item">ログアウト</li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
  <main class="main">
    <div class="main__greeting">
      <h2 class="main__greeting-item">〇〇さんお疲れ様です！</h2>
    </div>
    <div class="main__buttons">
      <div class="work__buttons">
        <button class="work__button-item">勤務開始</button>
        <button class="work__button-item">勤務終了</button>
      </div>
      <div class="rest__buttons">
        <button class="rest__button-item">休憩開始</button>
        <button class="rest__button-item">休憩終了</button>
      </div>
    </div>
  </main>
  <footer class="footer">
    <div class="footer__inner">
      <small>Atte,ink.</small>
    </div>
  </footer>
</body>
</html>
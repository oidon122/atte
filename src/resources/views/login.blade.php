<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atte</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
  <header>
    <div class="header">
      <div class="header__inner">
        <div class="header__logo">Atte</div>
      </div>
    </div>
  </header>
  <main class="main">
    <div class="login-form">
      <h2 class="login-form__heading">ログイン</h2>
    </div>
    <div class="login-form__inner">
      <form action="" method="post">
        <input class="login-form__input" type="email" placeholder="メールアドレス">
        <p class="login-form__error-message"></p>
        <input class="login-form__input" type="text" placeholder="パスワード">
        <p class="login-form__error-message"></p>
        <input class="login-form__button" type="submit" value="ログイン">
      </form>
    </div>
  </main>
  <footer class="footer">
    <div class="footer__inner">
      <small>Atte,ink.</small>
    </div>
  </footer>
</body>
</html>
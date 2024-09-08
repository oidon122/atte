<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atte</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
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
    <div class="register-form">
      <h2 class="register-form__heading">会員登録</h2>
    </div>
    <div class="register-form__inner">
      <form action="" method="post">
        <div class="register-form__name">
          <input class="register-form__name-input" type="text" placeholder="名前">
          <p class="register-form__error-message"></p>
        </div>
        <div class="register-form__email">
          <input class="register-form__email-input" type="email" placeholder="メールアドレス">
          <p class="register-form__error-message"></p>
        </div>
        <div class="register-form__password">
          <input class="register-form__password-input" type="text" placeholder="パスワード">
          <p class="register-form__error-message"></p>
        </div>
        <div class="register-form__password">
          <input class="register-form__password-input confirm" type="text" placeholder="確認用パスワード">
          <p class="register-form__error-message"></p>
        </div>
        <input class="login-form__button" type="submit" value="会員登録">
      </form>
    </div>
    <div class="user-login">
      <p class="user-login__message">アカウントをお持ちの方はこちらから</p>
      <a class="user-login__link" href="">ログイン</a>
    </div>
  </main>
  <footer class="footer">
    <div class="footer__inner">
      <small>Atte,ink.</small>
    </div>
  </footer>
</body>
</html>
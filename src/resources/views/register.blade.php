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
      <form class="register" action="/register" method="post">
        @csrf
        <div class="register-form__name">
          <input class="register-form__name-input" type="text" name="name" placeholder="名前" value="{{ old('name') }}">
          <div class="register-form__error">
            @error('name')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="register-form__email">
          <input class="register-form__email-input" type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
          <div class="register-form__error">
            @error('email')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="register-form__password">
          <input class="register-form__password-input" type="text" name="password" placeholder="パスワード" value="{{ old('password') }}">
          <div class="register-form__error">
            @error('password')
            {{ $message }}
            @enderror
          </div>
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
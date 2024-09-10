<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atte</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}" />
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
    <div class="form">
      <h2 class="form__heading">会員登録</h2>
    </div>
    <div class="form__inner">
      <form class="register" action="/register" method="post">
        @csrf
        <div class="form__name">
          <input class="form__name-input" type="text" name="name" placeholder="名前" value="{{ old('name') }}">
          <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form__email">
          <input class="form__email-input" type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
          <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form__password">
          <input class="form__password-input" type="text" name="password" placeholder="パスワード" value="{{ old('password') }}">
          <div class="form__error">
            @error('password')
            {{ $message }}
            @enderror
          </div>
        </div>
        <div class="form__password">
          <input class="form__password-input confirm" type="text" name="password_confirm" placeholder="確認用パスワード">
          <div class="form__error">
            @error('password_confirm')
            {{ $message }}
            @enderror
          </div>
        </div>
        <input class="form__button" type="submit" value="会員登録">
      </form>
    </div>
    <div class="user-login">
      <p class="user-login__message">アカウントをお持ちの方はこちらから</p>
      <a class="link" href="/login">ログイン</a>
    </div>
  </main>
  <footer class="footer">
    <div class="footer__inner">
      <small>Atte,ink.</small>
    </div>
  </footer>
</body>
</html>
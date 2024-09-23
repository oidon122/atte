@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}" />
@endsection

@section('content')
  <div class="form">
    <h2 class="form__heading">ログイン</h2>
  </div>
  <div class="form__inner">
    <form class="login" action="/login" method="post">
      @csrf
      <div class="form__email">
        <input class="form__email-input" type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
        <div class="form__error">
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
      <div class="form__password">
        <input class="form__password-input" type="password" name="password" placeholder="パスワード">
        <div class="form__error">
          @error('password')
          {{ $message }}
          @enderror
        </div>
      </div>
      <input class="form__button" type="submit" value="ログイン">
    </form>
  </div>
  <div class="user-register">
    <p class="user-register__message">アカウントをお持ちでない方はこちらから</p>
    <a class="link" href="/register">会員登録</a>
  </div>
@endsection
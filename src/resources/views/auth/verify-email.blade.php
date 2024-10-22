@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>メール認証</h1>
        <p>Please verify your email address by clicking the link we just sent to your inbox.</p>
        <p>If you didn’t receive the email, we will gladly send you another.</p>

        @if (session('status') == 'verification-link-sent')
            <div>
                <p>A new verification link has been sent to the email address you provided during registration.</p>
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">確認メール再送信</button>
        </form>
    </div>
@endsection
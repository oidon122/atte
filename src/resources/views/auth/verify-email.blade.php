@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Email Verification</h1>
        <p>Please verify your email address by clicking the link we just sent to your inbox.</p>
        <p>If you didn’t receive the email, we will gladly send you another.</p>

        @if (session('status') == 'verification-link-sent')
            <div>
                <p>A new verification link has been sent to the email address you provided during registration.</p>
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">Resend Verification Email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Log Out</button>
        </form>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>メールを送信しました</h1>
        <p>メール内リンクをクリックすると、アカウントが認証され、全ての機能をご利用いただけるようになります。</p>

        @if (session('status') == 'verification-link-sent')
            <div>
                <p>メールを受け取れなかった場合は、下のボタンから再送信をしてください。</p>
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">確認メール再送信</button>
        </form>
    </div>
@endsection
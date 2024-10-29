@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/user-list.css') }}">
@endsection

@section('content')
  <form class="user-list" action="/users" method="get">
    @csrf
    <h1 class="user-list__title">ユーザー一覧</h1>
  </form>

  <table class="user-list__table">
    <tr class="user-list__row">
        <th class="user-list__label">名前</th>
        <th class="user-list__label">メールアドレス</th>
        <th class="user-list__label">勤怠状況</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td class="user-list__item">{{ $user->name }}</td>
            <td class="user-list__item">{{ $user->email }}</td>
            <td class="user-list__item"><a href="{{ route('user.attendance', ['id' => $user->id]) }}">確認</a></td>
        </tr>
    @endforeach
  </table>

<div class="pagination">
  {{ $users->links('pagination::bootstrap-4') }}
</div>
@endsection
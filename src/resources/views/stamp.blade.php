@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/stamp.css') }}" />
@endsection

@section('content')
  <main class="main">
    <div class="main__greeting">
      <h2 class="main__greeting-item">{{ Auth::user()->name }}さんお疲れ様です！</h2>
    </div>
    <div class="main__buttons">
      <div class="work__buttons">
        <form class="work__buttons-form" action="/work/start" method="POST">
          @csrf
          <button class="work__button-item" type="submit" {{ $isWorking || $hasCheckedOut ? 'disabled' : '' }}>勤務開始</button>
        </form>
        <form class="work__buttons-form" action="/work/end" method="POST">
          @csrf
          <button class="work__button-item" type="submit" {{ !$isWorking || $hasCheckedOut ? 'disabled' : ''}}>勤務終了</button>
        </form>
      </div>
      <div class="rest__buttons">
        <form class="rest__buttons-form" action="/rest/start" method="POST">
          @csrf
          <button class="rest__button-item" {{ !$isWorking || $isResting || $hasCheckedOut ? 'disabled' : '' }}>休憩開始</button>
        </form>
        <form class="rest__buttons-form" action="/rest/end" method="POST">
          @csrf
          <button class="rest__button-item" {{ !$isResting || $hasCheckedOut ? 'disabled' : '' }}>休憩終了</button>
        </form>
      </div>
    </div>
  </main>
@endsection
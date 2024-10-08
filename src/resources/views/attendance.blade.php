@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
  <form class="select-form" action="/select/date" method="get">
    @csrf
    <button class="date__change">&lt;</button>
    <p class="date__the-day">日付</p>
    <button class="date__change">&gt;</button>
  </form>
  <table class="attendance__table">
    <tr class="attendance__row">
      <th class="attendance__label">名前</th>
      <th class="attendance__label">勤務開始</th>
      <th class="attendance__label">勤務終了</th>
      <th class="attendance__label">休憩時間</th>
      <th class="attendance__label">勤務時間</th>
    </tr>
    <tr>
      <td class="attendance__data">名前</td>
      <td class="attendance__data">勤務開始時間</td>
      <td class="attendance__data">勤務終了時間</td>
      <td class="attendance__data">休憩時間</td>
      <td class="attendance__data">勤務時間</td>
    </tr>
  </table>
<div class="pagination">ページねーと</div>
@endsection
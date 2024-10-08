@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
  <form class="select-form" action="/attendance" method="get">
    @csrf
    <button class="date__change" name="date" value="{{ $previousDate }}">&lt;</button>
    <p class="date__the-day">{{ $date }}</p>
    <button class="date__change" name="date" value="{{ $nextDate }}">&gt;</button>
</form>

  <table class="attendance__table">
    <tr class="attendance__row">
        <th class="attendance__label">名前</th>
        <th class="attendance__label">勤務開始</th>
        <th class="attendance__label">勤務終了</th>
        <th class="attendance__label">休憩時間</th>
        <th class="attendance__label">勤務時間</th>
    </tr>
    @foreach ($attendances as $attendance)
        <tr>
            <td class="attendance__data">{{ $attendance->user->name }}</td>
            <td class="attendance__data">{{ $attendance->work_start }}</td>
            <td class="attendance__data">{{ $attendance->work_end }}</td>
            <td class="attendance__data">{{ $attendance->rest_total }}</td>
            <td class="attendance__data">{{ $attendance->work_duration }}</td>
        </tr>
    @endforeach
  </table>

<div class="pagination">
  {{ $attendances->links('pagination::bootstrap-4') }}
</div>
@endsection
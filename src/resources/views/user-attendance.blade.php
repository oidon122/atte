@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/user-attendance.css') }}">
@endsection

@section('content')
  <h1 class="user-attendance__title">{{ $user->name }}さんの勤怠状況一覧</h1>

  <table class="user-attendance__table">
    <tr class="user-attendance__row">
        <th class="user-attendance__label">勤務日</th>
        <th class="user-attendance__label">勤務開始</th>
        <th class="user-attendance__label">勤務終了</th>
        <th class="user-attendance__label">休憩時間</th>
        <th class="user-attendance__label">勤務時間</th>
    </tr>
    @foreach ($attendances as $attendance)
        <tr>
            <td class="user-attendance__data">{{ $attendance->date }}</td>
            <td class="user-attendance__data">{{ $attendance->work_start }}</td>
            <td class="user-attendance__data">{{ $attendance->work_end }}</td>
            <td class="user-attendance__data">{{ $attendance->rest_total }}</td>
            <td class="user-attendance__data">{{ $attendance->work_duration }}</td>
        </tr>
    @endforeach
  </table>

<div class="pagination">
  {{ $attendances->links('pagination::bootstrap-4') }}
</div>
@endsection
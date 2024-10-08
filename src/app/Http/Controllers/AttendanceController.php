<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\Rest;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index ()
    {
        $userId = auth()->id();
        $today = Carbon::today()->toDateString();

        $existingAttendance = Attendance::where('user_id', $userId)
            ->where('date', $today)
            ->exists();

        $attendance = Attendance::where('user_id', $userId)
            ->whereNull('work_end')
            ->first();

        $isResting = Rest::whereHas('attendance', function($query) use ($userId) {
            $query->where('user_id', $userId)->whereNull('work_end');
        })->whereNull('rest_end')->exists();

        $canStartWork = !$existingAttendance;
        $canEndWork = $attendance && !$isResting;
        $canStartRest = $attendance && !$isResting;
        $canEndRest = $isResting;

        if ($attendance && $attendance->work_end) {
            $canStartWork = false;
            $canEndWork = false;
            $canStartRest = false;
            $canEndRest = false;
        }

        return view('stamp', [
            'canStartWork' => $canStartWork,
            'canEndWork' => $canEndWork,
            'canStartRest' => $canStartRest,
            'canEndRest' => $canEndRest,
        ]);
    }

    public function startWork ()
    {
        Attendance::create([
            'user_id' => auth()->id(),
            'date' => Carbon::now()->toDateString(),
            'work_start' => Carbon::now()->toTimeString(),
        ]);

        return redirect('/work');
    }

    public function endWork()
    {
        Attendance::where('user_id', auth()->id())->whereNull('work_end')->update(['work_end' => Carbon::now()->toTimeString()]);

        return redirect('/work');
    }

    public function startRest()
    {
        $attendance = Attendance::where('user_id', auth()->id())->whereNull('work_end')->first();

        if ($attendance) {
            Rest::create([
            'attendance_id' => $attendance->id,
            'rest_start' => Carbon::now()->toTimeString(),
            ]);
        }

        return redirect('/work');
    }

    public function endRest()
    {
        $attendance = Attendance::where('user_id', auth()->id())->whereNull('work_end')->first();

        if ($attendance) {
            Rest::where('attendance_id', $attendance->id)->whereNull('rest_end')->update(['rest_end' => Carbon::now()->toTimeString()]);
        }

        return redirect('/work');
    }

    public function getAttendance()
    {
        $date = Carbon::now()->toDateString();
        $attendances = Attendance::whereDate('date', $date)->paginate(5);

        return view('attendance', compact('attendances', 'date'));
    }
}

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

    public function getAttendance (Request $request)
    {
        $date = $request->input('date', Carbon::today()->toDateString());

        $previousDate = Carbon::parse($date)->subDay()->toDateString();
        $nextDate = Carbon::parse($date)->addDay()->toDateString();

        $attendances = Attendance::with('user', 'rests')
        ->where('date', $date)
        ->paginate(5)
        ->through(function ($attendance) {
            $restTotal = $attendance->rests->reduce(function ($carry, $rest) {
                $restStart = Carbon::parse($rest->rest_start);
                $restEnd = Carbon::parse($rest->rest_end);
                return $carry + $restEnd->diffInMinutes($restStart);
            }, 0);

            $workStart = Carbon::parse($attendance->work_start);
            $workEnd = Carbon::parse($attendance->work_end);

            $workDuration = $workEnd->diffInMinutes($workStart) - $restTotal;

            $attendance->rest_total = gmdate('H:i:s', $restTotal * 60);
            $attendance->work_duration = gmdate('H:i:s', $workDuration * 60);

            return $attendance;
        })

        ->appends(['date' => $date]);

        return view('attendance', compact('attendances', 'previousDate', 'nextDate', 'date'));
    }

}

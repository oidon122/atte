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
        $isWorking = Attendance::where('user_id', auth()->id())->whereNull('work_end')->exists();

        return view('stamp', ['isWorking' => $isWorking]);
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
}

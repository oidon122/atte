<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;

class UserListController extends Controller
{
    public function index (Request $request)
    {
        $users = User::select('id', 'name', 'email')->paginate(5);

        return view('user-list', compact('users'));
    }

    public function checkAttendance(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $attendances = Attendance::with('user', 'rests')
        ->where('user_id', $user->id)
        ->orderBy('date', 'desc')
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
        });

        return view('user-attendance', compact('user', 'attendances'));
    }
}

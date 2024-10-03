<?php

namespace Database\Factories;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class RestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $attendance = Attendance::inRandomOrder()->first();
        $workStart = Carbon::createFromTimeString($attendance->work_start);
        $restStart = $workStart->copy()->addMinute(rand(60,240));
        $restEnd = $restStart->copy()->addMinutes(30);

        return [
            'attendance_id' => $attendance->id,
            'rest_start' => $restStart->toTimeString(),
            'rest_end' => $restEnd->toTimeString(),
        ];
    }
}

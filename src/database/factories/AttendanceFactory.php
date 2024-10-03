<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AttendanceFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomDate = Carbon::today()->subDays(rand(1,30));
        $workStart = $randomDate->copy()->addHours(rand(6,16));
        $workEnd = $workStart->copy()->addHours(rand(5,8));

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'date' => $randomDate->toDateString(),
            'work_start' => $workStart->toTimeString(),
            'work_end' => $workEnd->toTimeString(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->random()->id;
        $car = Car::all()->random()->id;

        return [
            'user_id' => $user,
            'car_id' => $car,
            'start_time' => Carbon::now()->subHour(1),
            'end_time' => Carbon::now()->addHour(6),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Day;
use App\Models\Vender;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DayVenderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'opens_at' => Carbon::createFromTime(12)->subHours(random_int(1, 11)),
            'closes_at' => Carbon::createFromTime(12)->addHours(random_int(1, 11)),
            'vender_id' => Vender::factory(),
            'day_id' => Day::factory()
        ];
    }
}

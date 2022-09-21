<?php

namespace Database\Factories;

use App\Models\Vender;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'body' => $this->faker->paragraph(),
            'vender_id' => Vender::factory(),
            'expires_at' =>now()->addDays(2)
        ];
    }
}

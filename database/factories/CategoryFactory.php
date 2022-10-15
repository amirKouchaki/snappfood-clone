<?php

namespace Database\Factories;

use App\Models\VenderType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ybazli\Faker\Facades\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => Faker::word(),
            'image' => $this->faker->imageUrl(),
            'category_id' => null,
            'vender_type_id' => null
        ];
    }
}

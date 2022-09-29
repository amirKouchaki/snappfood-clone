<?php

namespace Database\Factories;

use App\Models\MenuCategory;
use App\Models\Vender;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ybazli\Faker\Facades\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MenuItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => Faker::word(),
            'description' => Faker::paragraph(),
            'price' => $this->faker->numberBetween(10000,200000),
            'discount' => $this->faker->numberBetween(0,100),
            'in_stock' => $this->faker->numberBetween(0,200),
            'menu_category_id' => MenuCategory::factory()
        ];
    }
}

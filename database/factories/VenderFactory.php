<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ybazli\Faker\Facades\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VenderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     */
    public function definition()
    {

        return [
            'title' => Faker::jobTitle(),
            'title_image' => $this->faker->imageUrl(600,600),
            'background_image' => $this->faker->imageURl(600,600),
            'description' => Faker::sentence(),
            'address' => Faker::address(),
            'is_express' => $this->faker->boolean(),
            'is_economical' => $this->faker->boolean(),
            'delivery_fee' => $this->faker->numberBetween(10000,50000),
            'vender_type_id' => $this->faker->numberBetween(1,10),
        ];
    }
}

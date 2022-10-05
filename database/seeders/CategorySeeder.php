<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'فست فود','image' => 'storage/images/categories/pizza.png'],
            ['name' => 'ایرانی','image' => 'storage/images/categories/aash.png'],
            ['name' => 'کباب','image' => 'storage/images/categories/kabab.png'],
            ['name' => 'سالاد','image' => 'storage/images/categories/salad.png'],
            ['name' => 'دریایی','image' => 'storage/images/categories/daryayi.png'],
            ['name' => 'بین‌الملل','image' => 'storage/images/categories/sooshi.png']
        ];

        Category::factory()->createMany($categories);

    }
}

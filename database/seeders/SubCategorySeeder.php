<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subCategories = [
            ['name' => 'پیتزا', 'image' => 'storage/images/sub-categories/pizza.png','category_id' => 1],
            ['name' => 'ساندویچ', 'image' => 'storage/images/sub-categories/sandwich.png','category_id' => 1],
            ['name' => 'برگر', 'image' => 'storage/images/sub-categories/burger.png','category_id' => 1],
            ['name' => 'سوخاری', 'image' => 'storage/images/sub-categories/sokhari.png','category_id' => 1],
            ['name' => 'پاستا', 'image' => 'storage/images/sub-categories/pasta.png','category_id' => 1],
            ['name' => 'استیک', 'image' => 'storage/images/sub-categories/stake.png','category_id' => 1],

            ['name' => 'کباب', 'image' => 'storage/images/sub-categories/kabab.png','category_id' => 2],
            ['name' => 'سنتی', 'image' => 'storage/images/sub-categories/aash.png','category_id' => 2],
            ['name' => 'پلوی ایرانی', 'image' => 'storage/images/sub-categories/poloye-irani.png','category_id' => 2],
            ['name' => 'خورشت', 'image' => 'storage/images/sub-categories/khoresht.png','category_id' => 2],
            ['name' => 'مرغ', 'image' => 'storage/images/sub-categories/morgh.png','category_id' => 2],
            ['name' => 'گیلانی', 'image' => 'storage/images/sub-categories/Gilani.png','category_id' => 2],

            ['name' => 'کباب گوشت', 'image' => 'storage/images/sub-categories/kabab.png','category_id' => 3],
            ['name' => 'جوجه‌کباب', 'image' => 'storage/images/sub-categories/jooje.png','category_id' => 3],






            ['name' => 'صبحانه', 'image' => 'storage/images/sub-categories/pancakes.png','category_id' => 7],
            ['name' => 'میان‌وعده', 'image' => 'storage/images/sub-categories/mianvade.png','category_id' => 7],
            ['name' => 'سالاد', 'image' => 'storage/images/sub-categories/salad.png','category_id' => 7],
            ['name' => 'ساندویچ', 'image' => 'storage/images/sub-categories/sandwich.png','category_id' => 7],
            ['name' => 'پیتزا', 'image' => 'storage/images/sub-categories/pizza.png','category_id' => 7],
            ['name' => 'برگر', 'image' => 'storage/images/sub-categories/burger.png','category_id' => 7],

            ['name' => 'قهوه', 'image' => 'storage/images/sub-categories/ghahve.png','category_id' => 8],
            ['name' => 'چای و دمنوش', 'image' => 'storage/images/sub-categories/chai.png','category_id' => 8],

            ['name' => 'آب‌میوه', 'image' => 'storage/images/sub-categories/abmive.png','category_id' => 9],
            ['name' => 'میلک‌شیک', 'image' => 'storage/images/sub-categories/shake.png','category_id' => 9],
            ['name' => 'شربت گیاهی', 'image' => 'storage/images/sub-categories/nooshidani.png','category_id' => 9],
            ['name' => 'قهوه‌ی سرد', 'image' => 'storage/images/sub-categories/iced-coffee.jpg','category_id' => 9],
            ['name' => 'گلاسه', 'image' => 'storage/images/sub-categories/glace.png','category_id' => 9],
            ['name' => 'آیس‌پک', 'image' => 'storage/images/sub-categories/icepack.png','category_id' => 9],

        ];

        SubCategory::factory()->createMany($subCategories);
    }


}

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
            ['name' => 'فست فود','image' => 'storage/images/categories/pizza.png','vender_type_id' => 1],
            ['name' => 'ایرانی','image' => 'storage/images/categories/aash.png','vender_type_id' => 1],
            ['name' => 'کباب','image' => 'storage/images/categories/kabab.png','vender_type_id' => 1],
            ['name' => 'سالاد','image' => 'storage/images/categories/salad.png','vender_type_id' => 1],
            ['name' => 'دریایی','image' => 'storage/images/categories/daryayi.png','vender_type_id' => 1],
            ['name' => 'بین‌الملل','image' => 'storage/images/categories/sooshi.png','vender_type_id' => 1],

            ['name' => 'غذا','image' => 'storage/images/categories/pizza.png','vender_type_id' => 3],
            ['name' => 'نوشیدنی گرم','image' => 'storage/images/categories/ghahve.png','vender_type_id' => 3],
            ['name' => 'نوشیدنی سرد','image' => 'storage/images/categories/iced-coffee.png','vender_type_id' => 3],
            ['name' => 'کیک و دسر','image' => 'storage/images/categories/cake.png','vender_type_id' => 3],
            ['name' => 'بستنی','image' => 'storage/images/categories/bastani.png','vender_type_id' => 3],

            ['name' => 'سنگک','image' => 'storage/images/categories/sangak.png','vender_type_id' => 5],
            ['name' => 'بربری','image' => 'storage/images/categories/barbari.png','vender_type_id' => 5],
            ['name' => 'لواش','image' => 'storage/images/categories/lavash.png','vender_type_id' => 5],
            ['name' => 'تافتون','image' => 'storage/images/categories/taftoon.png','vender_type_id' => 5],

            ['name' => 'زیبایی و سلامت','image' => 'storage/images/categories/zibaei_salamat.png','vender_type_id' => 10],
            ['name' => 'گل و گیاه','image' => 'storage/images/categories/gol_giah.png','vender_type_id' => 10],
            ['name' => 'پت شاپ','image' => 'storage/images/categories/petshop.png','vender_type_id' => 10],
            ['name' => 'لبنیات','image' => 'storage/images/categories/labaniat.png','vender_type_id' => 10],
            ['name' => 'عطاری','image' => 'storage/images/categories/atari.png','vender_type_id' => 10],
            ['name' => 'قهوه و شکلات','image' => 'storage/images/categories/ghahve_va_shokolat.png','vender_type_id' => 10],
            ['name' => 'محصولات طبیعی و محلی','image' => 'storage/images/categories/mahsoolat_tabei.png','vender_type_id' => 10],
        ];

        Category::factory()->createMany($categories);

    }
}

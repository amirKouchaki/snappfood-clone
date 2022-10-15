<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\EmailVerification;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            DaySeeder::class,
            VenderTypeSeeder::class,
            VenderSeeder::class,
            DayVenderSeeder::class,
            CouponSeeder::class,
            CommentSeeder::class,
            MenuCategorySeeder::class,
            MenuItemSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            CategoryVenderSeeder::class,
            CommentMenuItemSeeder::class,
        ]);

    }
}

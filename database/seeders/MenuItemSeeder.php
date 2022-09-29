<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $menuCategories = MenuCategory::all();
        $menuCategories->each( fn ($menuCategory) => $menuCategory->menuItems()->saveMany(MenuItem::factory(random_int(2,5))->make(['menu_category_id' => $menuCategory->id])));
    }
}

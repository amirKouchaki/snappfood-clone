<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use App\Models\Vender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venders = Vender::all();
        //TODO : find a shorter way to do this if possible
        $venders->each(fn ($vender) => $vender
            ->menuCategories()
            ->saveMany(
                MenuCategory::factory(7)
                ->make(['vender_id' => $vender->id])
            ));
    }
}

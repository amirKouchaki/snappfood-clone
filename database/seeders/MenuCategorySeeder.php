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
     * @throws \Exception
     */
    public function run()
    {
        $venders = Vender::all();
        //TODO : find a shorter way to do this if possible
        $venders->each(fn ($vender) => $vender
            ->menuCategories()
            ->saveMany(
                MenuCategory::factory(random_int(7,15))
                ->make(['vender_id' => $vender->id])
            ));
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Vender;
use App\Models\VenderType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryVenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {


        VenderType::with('venders')->get()->each(static function ($type) {
            $selectableCategories = array_merge(Category::categoriesWithoutSubCategories()->where('vender_type_id',$type->id)->get()->toArray(),DB::select("SELECT subc.* FROM categories subc,categories c  WHERE c.id
= subc.category_id AND c.vender_type_id =".$type->id));
            $categoryIds = array_column($selectableCategories,'id');
            $collectionOfIds = collect($categoryIds);
            if($collectionOfIds->isEmpty())
                return true;
            $type->venders->each(static function ($vender) use($collectionOfIds) {
                $selectedCategoryCount = random_int(1,4);
                $selectedCategories = $collectionOfIds->random($selectedCategoryCount);
                $vender->categories()->attach($selectedCategories->toArray());
            });
        });
    }
}

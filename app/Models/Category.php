<?php

namespace App\Models;

use App\Models\Traits\ConvertsImagePathToLink;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory,ConvertsImagePathToLink;



    public function subCategories() {
        return $this->hasMany(__CLASS__,'category_id');
    }

    public function venders() {
        return $this->belongsToMany(Vender::class);
    }

    public static function allSubCategories() {
        return self::whereNULL('vender_type_id')->whereNotNull('category_id');
    }


    public static function categories() {
        return self::whereNULL('category_id')->whereNotNull('vender_type_id');
    }

    public  static function allCategoriesWithTheirSubCategoriesOfThatType($type){
        return self::categories()->with('subCategories')->where('vender_type_id',$type);
    }

    public static function categoriesWithoutSubCategories(){
        return self::whereNull('category_id')->whereDoesntHave('subCategories');
    }

    public static function subCategoriesOfType(){

    }

}

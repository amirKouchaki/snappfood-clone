<?php

namespace App\Models;

use App\Models\Traits\ConvertsImagePathToLink;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory,ConvertsImagePathToLink;
    
    public function  subCategories() {
        return $this->hasMany(SubCategory::class);
    }
}

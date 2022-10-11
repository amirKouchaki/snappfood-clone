<?php

namespace App\Models;

use App\Models\Traits\ConvertsImagePathToLink;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory,ConvertsImagePathToLink;



}

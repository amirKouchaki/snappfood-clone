<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenderType extends Model
{
    use HasFactory;

    public $timestamps = false;


    public function venders(){
        return $this->hasMany(Vender::class);
    }
}

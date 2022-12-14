<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

        public $timestamps = false;


    public function vendersOpenIN(){
        return $this->belongsToMany(Vender::class,foreignPivotKey: 'vender_id');
    }
}

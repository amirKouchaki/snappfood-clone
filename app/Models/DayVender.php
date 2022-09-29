<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DayVender extends Pivot
{
    use HasFactory;

    protected $hidden = ['pivot'];
}

<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ConvertsImagePathToLink
{
    protected function image(): Attribute
    {
        return Attribute::make(
            get: static fn($value) => asset($value)
        );
    }
}

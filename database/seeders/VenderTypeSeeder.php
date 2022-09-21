<?php

namespace Database\Seeders;

use App\Models\VenderType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['رستوران','سوپرمارکت','کافه','شیرینی','نانوایی','میوه','پروتئین','آبمیوه بستنی','آجیل','سایر'];
        VenderType::factory()->count(count($types))
            ->sequence(fn ($sequence) => ['type' => $types[$sequence->index]])->create();
    }
}

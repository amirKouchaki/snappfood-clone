<?php

namespace Database\Seeders;

use App\Models\Vender;
use Database\Factories\VenderFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vender::factory(20)->create();
    }
}

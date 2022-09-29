<?php

namespace Database\Seeders;

use App\Models\DayVender;
use App\Models\Vender;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Database\Factories\DayVenderFactory;
use Illuminate\Database\Seeder;

class DayVenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \Exception
     * @return void
     */
    public function run()
    {
        $venders = Vender::all(['id']);

        $venders->each(function ($vender) {
            for ($i = 1;$i <= CarbonInterface::DAYS_PER_WEEK;$i++){
                DayVender::factory()->create([
                    'vender_id' => $vender->id,
                    'day_id' => $i
                ]);
            }
        });
    }
}

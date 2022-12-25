<?php

namespace Database\Seeders;

use App\Models\Evidence\Appearance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppearancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Appearance::query()->create(
            ['name' =>"Нет упаковки"]
        );
        Appearance::query()->create(
            ['name' => "Целая упаковка"]
        );
        Appearance::query()->create(
            ['name' => "Небольшие потертости"]
        );
        Appearance::query()->create(
            ['name' => "Помято\порвано"]
        );
    }
}

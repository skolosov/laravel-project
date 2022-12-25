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
            ['name' => "Мягкая"]
        );
        Appearance::query()->create(
            ['name' => "Полужесткая"]
        );
        Appearance::query()->create(
            ['name' => "Жесткая"]
        );
    }
}

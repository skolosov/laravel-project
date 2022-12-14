<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evidence\Decision;

class DecisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Decision::query()->create(
            ['name' => 'передача на хранение в камеру вещественных доказательств']
        );
        Decision::query()->create(
            ['name' => 'передача на хранение в финансовое подразделение органа внутренних дел ']
        );
        Decision::query()->create(
            ['name' => 'передача на хранение третьим лицам']
        );
        Decision::query()->create(
            ['name' => 'уничтожено']
        );
        Decision::query()->create(
            ['name' => 'реализация']
        );
    }
}

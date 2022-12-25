<?php

namespace Database\Seeders;

use App\Models\Evidence\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::query()->create(
            ['name' => 'СО ОМВД Володарский']
        );
    }
}

<?php

namespace Database\Seeders;

use App\Models\Evidence\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::query()->create(
            ['name' => 'ОП 1 УВД НН']
        );
        Division::query()->create(
            ['name' => 'ОП 2 УВД НН']
        );
        Division::query()->create(
            ['name' => 'ОП 3 УВД НН']
        );
        Division::query()->create(
            ['name' => 'ОП 4 УВД НН']
        );
        Division::query()->create(
            ['name' => 'ОП 6 УВД ННй']
        );
        Division::query()->create(
            ['name' => 'ОП 7 УВД НН']
        );
        Division::query()->create(
            ['name' => 'ОП 8 УВД НН']
        );
    }
}

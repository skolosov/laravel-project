<?php

namespace Database\Seeders;

use App\Models\Evidence\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::query()->create(
            ['name' => 'СОО по ДТП ГСУ']
        );
        Department::query()->create(
            ['name' => 'Контора Цепкин и сыновья']
        );
    }
}

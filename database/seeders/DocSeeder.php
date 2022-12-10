<?php

namespace Database\Seeders;

use App\Models\Doc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doc::factory()->create(['name' => 'Нож', 'status_id' => 1]);
        Doc::factory()->create(['name' => 'Лес', 'status_id' => 3]);
        Doc::factory()->create(['name' => 'Велосипед', 'status_id' => 2]);
    }
}

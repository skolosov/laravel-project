<?php

namespace Database\Seeders;

use App\Models\Evidence\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::query()->create(
            ['name' => 'Испектор']
        );
        Post::query()->create(
            ['name' => 'Следователь']
        );
        Post::query()->create(
            ['name' => 'Дознаватель']
        );
        Post::query()->create(
            ['name' => 'Старший следователь']
        );
        Post::query()->create(
            ['name' => 'Начальник СО']
        );
        Post::query()->create(
            ['name' => 'Заместитель начальника']
        );

    }
}

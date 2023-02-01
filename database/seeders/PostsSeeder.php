<?php

namespace Database\Seeders;

use App\Models\Evidence\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::query()->create(
            ['name' => 'инспектор']
        );
        Post::query()->create(
            ['name' => 'старший инспектор']
        );
        Post::query()->create(
            ['name' => 'владелец']
        );
    }
}

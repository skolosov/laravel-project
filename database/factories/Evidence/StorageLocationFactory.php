<?php

namespace Database\Factories\Evidence;

use App\Models\Evidence\Division;
use App\Models\Evidence\StorageLocation;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StorageLocationFactory extends Factory
{
    protected $model = StorageLocation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['name' => "string", 'division_id' => "\Illuminate\Database\Eloquent\Factories\Factory"])] public function definition(): array
    {
        return [
            'name' => $this->faker->text(20),
            'division_id' => Division::factory()
        ];
    }
}

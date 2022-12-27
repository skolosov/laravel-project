<?php

namespace Database\Factories\Evidence;

use App\Models\Evidence\Drug;
use App\Models\Evidence\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DrugFactory extends Factory
{
    protected $model = Drug::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => ReferenceType::factory()->create()->id,
            'weight' => $this->faker->randomNumber(3),
        ];
    }
}

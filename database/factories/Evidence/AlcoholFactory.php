<?php

namespace Database\Factories\Evidence;

use App\Models\Evidence\Alcohol;
use App\Models\Evidence\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AlcoholFactory extends Factory
{
    protected $model = Alcohol::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => ReferenceType::factory()->create()->id,
            'liter' => $this->faker->randomNumber(3),
        ];
    }
}

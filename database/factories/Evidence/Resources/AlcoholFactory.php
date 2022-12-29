<?php

namespace Database\Factories\Evidence\Resources;

use App\Models\Evidence\ReferenceType;
use App\Models\Evidence\Resources\Alcohol;
use App\Models\Evidence\Resources\Evidence;
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
            'name' => $this->faker->text(20),
            'liter' => $this->faker->randomNumber(3),
        ];
    }
}

<?php

namespace Database\Factories\Evidence\Resources;

use App\Models\Evidence\ReferenceType;
use App\Models\Evidence\Resources\Drug;
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
            'name' => $this->faker->text(20),
            'weight' => $this->faker->randomNumber(3),
        ];
    }
}

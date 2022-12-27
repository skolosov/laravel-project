<?php

namespace Database\Factories\Evidence;

use App\Models\Evidence\ReferenceType;
use App\Models\Evidence\Transport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransportFactory extends Factory
{
    protected $model = Transport::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => ReferenceType::factory()->create()->id,
            'engine_number' => $this->faker->bothify('#######'),
            'registration_number' => $this->faker->bothify('###.#####.###'),
            'brand' => $this->faker->text(10),
            'color' => $this->faker->colorName(),
            'release_date' => $this->faker->date(),
        ];
    }
}

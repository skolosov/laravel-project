<?php

namespace Database\Factories\Evidence;

use App\Models\Evidence\OtherEvidence;
use App\Models\Evidence\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OtherEvidenceFactory extends Factory
{
    protected $model = OtherEvidence::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => ReferenceType::factory()->create()->id,
            'quantity' => $this->faker->randomNumber(2),
            'unit_name' => $this->faker->text(15),
            'amount' => $this->faker->randomFloat(6),
            'number' => $this->faker->bothify('#######'),
            'name' => $this->faker->text(10),
        ];
    }
}

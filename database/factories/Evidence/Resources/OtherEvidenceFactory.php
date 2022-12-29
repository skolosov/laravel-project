<?php

namespace Database\Factories\Evidence\Resources;

use App\Models\Evidence\ReferenceType;
use App\Models\Evidence\Resources\OtherEvidence;
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
            'name' => $this->faker->text(20),
            'quantity' => $this->faker->randomNumber(2),
            'unit_name' => $this->faker->text(15),
            'amount' => $this->faker->randomFloat(6),
            'number' => $this->faker->bothify('#######'),
            'designation' => $this->faker->text(10),
        ];
    }
}

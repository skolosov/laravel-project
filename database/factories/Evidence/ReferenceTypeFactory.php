<?php

namespace Database\Factories\Evidence;

use App\Models\Evidence\EvidenceType;
use App\Models\Evidence\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReferenceTypeFactory extends Factory
{
    use HasFactory;

    protected $model = ReferenceType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'evidence_type_id' => EvidenceType::all()->random()->id,
            'type_name' => $this->faker->text(20),
        ];
    }
}

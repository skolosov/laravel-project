<?php

namespace Database\Factories\Evidence;

use App\Models\Evidence\Evidence;
use App\Models\Evidence\EvidenceType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EvidenceFactory extends Factory
{
    protected $model = Evidence::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = EvidenceType::all()->random();

        return [
            'resource_id' => $type->model_namespace::factory()->create()->id,
            'resource_type' => $type->id,
        ];
    }
}

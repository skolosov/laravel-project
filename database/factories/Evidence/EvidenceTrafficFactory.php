<?php

namespace Database\Factories\Evidence;

use App\Models\Evidence\Employee;
use App\Models\Evidence\EvidenceTraffic;
use App\Models\Evidence\Resources\Evidence;
use App\Models\Evidence\StorageLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EvidenceTrafficFactory extends Factory
{
    protected $model = EvidenceTraffic::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'evidence_id'=> Evidence::factory(),
            'decision_id'=> $this->faker->numberBetween(1,5),
            'decision_date'=> $this->faker->date,
            'from_storage_id'=> StorageLocation::factory(),
            'to_storage_id'=> StorageLocation::factory(),
            'delivered'=> $this->faker->boolean,
            'employee_id'=> Employee::factory(),
            'doc_number' => $this->faker->bothify('#######'),
            'doc_date' => $this->faker->date
        ];
    }
}

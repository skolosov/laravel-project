<?php

namespace Database\Factories\Evidence\Resources;

use App\Models\Evidence\EvidenceType;
use App\Models\Evidence\Resources\Alcohol;
use App\Models\Evidence\Resources\Drug;
use App\Models\Evidence\Resources\Evidence;
use App\Models\Evidence\Resources\Money;
use App\Models\Evidence\Resources\OtherEvidence;
use App\Models\Evidence\Resources\Transport;
use App\Models\Evidence\Resources\Weapon;
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
        $resources = [
            Alcohol::class,
            Drug::class,
            Money::class,
            OtherEvidence::class,
            Transport::class,
            Weapon::class,
        ];
        $resourceType = $this->faker->randomElement($resources);
        $resource = $resourceType::factory();

        return [
            'resource_id' => $resource,
            'resource_type' => $resourceType,
        ];
    }
}

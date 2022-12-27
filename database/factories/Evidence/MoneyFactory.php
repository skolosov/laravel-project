<?php

namespace Database\Factories\Evidence;

use App\Models\Evidence\Money;
use App\Models\Evidence\ReferenceType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MoneyFactory extends Factory
{
    protected $model = Money::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => ReferenceType::factory()->create()->id,
            'amount' => $this->faker->randomFloat(6),
        ];
    }
}

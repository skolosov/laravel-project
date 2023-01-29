<?php

namespace Database\Factories\Evidence\Resources;

use App\Models\Evidence\Resources\Money;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use JetBrains\PhpStorm\ArrayShape;

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
    #[ArrayShape(['name' => "string", 'amount' => "float"])] public function definition(): array
    {
        return [
            'name' => $this->faker->text(20),
            'amount' => $this->faker->randomFloat(6),
        ];
    }
}

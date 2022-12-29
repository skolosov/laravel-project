<?php

namespace Database\Factories\Evidence\Resources;

use App\Models\Evidence\ReferenceType;
use App\Models\Evidence\Resources\Weapon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WeaponFactory extends Factory
{
    protected $model = Weapon::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
            'brand' => $this->faker->text(10),
            'series' => $this->faker->bothify('#### ####'),
            'number' => $this->faker->bothify('######'),
            'detail' => $this->faker->text(100),
            'release_date' => $this->faker->date(),
        ];
    }
}

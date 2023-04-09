<?php

namespace Database\Factories\Evidence;

use App\Models\Evidence\Department;
use App\Models\Evidence\Employee;
use App\Models\Evidence\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fio' => $this->faker->text(100),
            'post_id' => Post::factory(),
            'department_id' => Department::factory(),
            'phone' =>$this->faker->phoneNumber()
        ];
    }
}

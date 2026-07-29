<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    return [
        'emp_code' => 'EMP' . fake()->unique()->numberBetween(1000, 9999),
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'department' => fake()->randomElement([
            'IT',
            'Finance',
            'HR',
            'Sales',
            'Operations',
        ]),
        'is_active' => true,
    ];
}
}

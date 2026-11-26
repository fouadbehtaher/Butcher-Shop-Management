<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Employee> */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'position' => fake()->randomElement(['Butcher', 'Cashier', 'Cleaner']),
            'salary' => fake()->randomFloat(2, 3000, 12000),
            'phone' => fake()->numerify('01#########'),
            'hire_date' => fake()->date(),
            'status' => 'active',
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Grade;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'grade_id' => Grade::factory(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'department_id' => Department::factory(),
        ];
    }
}
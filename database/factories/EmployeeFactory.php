<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use DB;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'company' => $this->faker->numberBetween($min = 1, $max = 100),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber
        ];
    }
}

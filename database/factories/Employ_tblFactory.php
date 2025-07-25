<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employ_tbl>
 */
class Employ_tblFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'department' => $this->faker->randomElement(['HR', 'Sales', 'Tech', 'Marketing']),
            'salary' => $this->faker->randomFloat(2, 20000, 100000),
            'joining_date' => $this->faker->date(),
        ];
    }
}

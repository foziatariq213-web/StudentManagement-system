<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'roll_no' => 'STD-' . fake()->unique()->numberBetween(1000,9999),
            'department' => fake()->randomElement([
                'Computer Science',
                'Software Engineering',
                'Artificial Intelligence'
            ]),
            'course' => fake()->randomElement([
                'Web Development',
                'Database Systems',
                'Programming Fundamentals'
            ]),
            'contact' => '03' . fake()->numberBetween(100000000,999999999),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
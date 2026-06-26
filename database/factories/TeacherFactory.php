<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    public function definition(): array
    {
        $departments = [
            'Computer Science',
            'Software Engineering',
            'Artificial Intelligence',
            'Data Science',
        ];

        $qualifications = [
            'PhD Computer Science',
            'MS Software Engineering',
            'MS Artificial Intelligence',
            'MPhil Data Science',
            'PhD Information Technology',
            'MS Computer Science',
        ];

        return [
            'name'          => fake()->name(),
            'email'         => fake()->unique()->safeEmail(),
            'phone'         => '03' . rand(00,49) . '-' . rand(1000000,9999999),
            'department'    => fake()->randomElement($departments),
            'qualification' => fake()->randomElement($qualifications),
        ];
    }
}

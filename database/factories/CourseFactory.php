<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement([
                'Web Development',
                'Database Systems',
                'Data Structures',
                'Operating Systems',
                'Software Engineering',
                'Computer Networks',
                'Artificial Intelligence',
                'Cyber Security',
                'Mobile App Development',
                'Cloud Computing',
            ]),

            'code' => strtoupper($this->faker->randomElement(['CS','SE','IT'])) .
                      $this->faker->unique()->numberBetween(100, 499),

            'department' => $this->faker->randomElement([
                'Computer Science',
                'Software Engineering',
                'Information Technology',
            ]),

            'teacher_id' => null,

            'credits' => $this->faker->numberBetween(2, 4),
        ];
    }
}
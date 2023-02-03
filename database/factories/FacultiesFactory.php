<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faculties>
 */
class FacultiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory()->create(['role' => 'faculty'])->id,
            // courses will be pivot table of courses and faculty, courses are already made. so just add them to pivot table
            'courses' => \App\Models\Courses::all()
                ->random(rand(1, 5))
                ->pluck('id'),
        ];
    }
}

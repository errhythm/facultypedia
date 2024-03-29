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
            'id' => '1',
            'courses' => \App\Models\Courses::all()
                ->random(rand(1, 5))
                ->pluck('id')
                ->implode(', '),
        ];
    }
}

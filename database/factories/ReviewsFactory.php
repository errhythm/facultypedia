<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            // get raNDOM user_id from the users table where role is student
            'user_id' => \App\Models\User::where('role', 'student')
                ->get()
                ->random()
                ->id,
            // get raNDOM faculty_id from the faculties table
            'faculty_id' => \App\Models\Faculties::all()
                ->random()
                ->id,
            'course_id' => $this->faker->numberBetween(1, 14),
            'rating' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->text(100),
            'isAnonymous' => $this->faker->boolean(),
            'isApproved' => 1,
            'isDeleted' => 0,
        ];
    }
}

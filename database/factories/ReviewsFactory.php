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
            // user_id would be 1 for now and faculty_id would be 36 for now
            'user_id' => 1,
            'faculty_id' => 36,
            'rating' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->text(100),
            'isAnonymous' => $this->faker->boolean(),
            'isApproved' => $this->faker->boolean(),
        ];
    }
}

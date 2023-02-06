<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        $email = $this->faker->unique()->safeEmail();
        $safe_name = preg_replace('/[^A-Za-z0-9\-]/', '', $name);
        $initials = strtoupper(substr($safe_name, 0, 1) . substr($safe_name, strpos($safe_name, ' ') + 1, 1) . substr($safe_name, strpos($safe_name, ' ') + 2, 1));
        // $university_id = $role == 'student' ? $this->faker->randomNumber(8) : $initials;
        // generate an id starts with "20 or 21 or 22 or 23" and then 6 random numbers
        $university_id = $this->faker->randomElement(['2010', '2120', '2224', '2310']) . $this->faker->randomNumber(4);
        $role = $this->faker->randomElement(['faculty', 'student']);
        return [
            'name' => $name,
            'email' => $email,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'department' => $this->faker->randomElement(['Department of Computer Science and Engineering', 'Department of Electrical and Electronic Engineering']),
            // 'university_id' => $university_id,
            'university_id' => $role == 'faculty' ? $initials : $university_id,
            'role' => $role,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(
            fn (array $attributes) => [
                'email_verified_at' => null,
            ],
        );
    }
}

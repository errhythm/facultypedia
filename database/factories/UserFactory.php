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
        $role = $this->faker->randomElement(['faculty', 'student']);
        $safe_name = preg_replace('/[^A-Za-z0-9\-]/', '', $name);
        $initials = strtoupper(substr($safe_name, 0, 1) . substr($safe_name, strpos($safe_name, ' ') + 1, 1) . substr($safe_name, strpos($safe_name, ' ') + 2, 1));
        $university_id = $role == 'student' ? $this->faker->randomNumber(8) : $initials;
        return [
            'name' => $name,
            'email' => $email,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => $role,
            'department' => $this->faker->randomElement(['Department of Computer Science and Engineering', 'Department of Architecture', 'Department of English and Humanities', 'Department of Electrical and Electronic Engineering']),
            'university_id' => $university_id,
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
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

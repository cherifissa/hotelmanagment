<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

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

    protected $model = User::class;
    private static $isAdminCreated = false;
    private static $receptCount = 0;

    public function definition()
    {
        $role = $this->getRole();

        return [
            'nom' => $this->faker->name,
            'tel' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // Correctly hash the password using Hash::make()
            'adresse' => $this->faker->address,
            'isadmin' => $role,
            'remember_token' => Str::random(10),
        ];
    }

    private function getRole()
    {
        if (!$this::$isAdminCreated) {
            $this::$isAdminCreated = true;
            return 'admin';
        }

        if ($this::$receptCount < 2) {
            $this::$receptCount++;
            return 'recept';
        }

        return 'client';
    }
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

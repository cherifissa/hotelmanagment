<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ChambrCategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['standard', 'privilege', 'suite junior', 'suite famille', 'suite VIP', 'suite presidentielle']);
        $prix = 0; // Defaut

        if ($type === 'standard') {
            $prix = 25000;
        } elseif ($type === 'privilege') {
            $prix = 35000;
        } else if ($type === 'suite junior') {
            $prix = 45000;
        } else if ($type === 'suite famille') {
            $prix = 85000;
        } else if ($type === 'suite VIP') {
            $prix = 105000;
        } else if ($type === 'suite presidentielle') {
            $prix = 150000;
        }

        return [
            'type' => $type,
            'prix' => $prix,
            'wifi'  => 1,
            'petit_dej' => 1,
            'nbr_chb' => 2,
            'description' => $this->faker->sentence,
        ];
    }
}
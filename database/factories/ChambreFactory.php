<?php

namespace Database\Factories;

use App\Models\Chambre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chambre>
 */
class ChambreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $id = 100;

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
            'id' => self::$id++,
            'type' => $type,
            'prix' => $prix,
            'status' => 'libre',
            'description' => $this->faker->sentence,
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Chambre $chambre) {
            $chambre->id = $chambre->id + 100;
            $chambre->save();
        });
    }
}

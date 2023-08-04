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
        $type = $this->faker->randomElement(['standard', 'privilege', 'suite junior', 'suite VIP']);
        $prix = 0; // Defaut

        if ($type === 'standard') {
            $prix = 46000;
        } elseif ($type === 'privilege') {
            $prix = 66000;
        } else if ($type === 'suite junior') {
            $prix = 81000;
        } else if ($type === 'suite VIP') {
            $prix = 100000;
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

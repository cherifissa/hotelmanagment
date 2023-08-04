<?php

namespace Database\Factories;

use App\Models\DemandeReservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DemandeReservation>
 */
class DemandeReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = DemandeReservation::class;

    public function definition(): array
    {

        $typesChambre = ['standard', 'privilege', 'suite junior', 'suite VIP'];

        return [
            'nom_client' => $this->faker->name,
            'email_client' => $this->faker->unique()->safeEmail,
            'tel_client' => $this->faker->phoneNumber,
            'date_arrive' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'date_depart' => $this->faker->dateTimeBetween('+1 day', '+2 weeks')->format('Y-m-d'),
            'type_chambre' => $this->faker->randomElement($typesChambre),
            'nombre_adulte' => $this->faker->numberBetween(1, 4),
            'nombre_enfant' => $this->faker->numberBetween(0, 2),
        ];
    }
}

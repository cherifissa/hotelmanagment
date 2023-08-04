<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Chambre;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Reservation::class;

    public function definition()
    {
        $arrivalDate = $this->faker->dateTimeBetween('now', '+30 days');
        $departureDate = $this->faker->dateTimeBetween($arrivalDate, $arrivalDate->format('Y-m-d') . ' +10 days');

        return [
            'numero' => $this->faker->unique()->numerify('RES########'), // Generates a unique reservation number
            'nbr_jour' => $this->faker->numberBetween(1, 10), // Random number of days between 1 and 10
            'status' => $this->faker->randomElement(['checkin', 'checked', 'pending', 'annule']), // Random status
            'date_arrive' => $arrivalDate,
            'date_depart' => $departureDate,
            'client_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'chambre_id' => function () {
                return Chambre::inRandomOrder()->first()->id;
            },
        ];
    }
}
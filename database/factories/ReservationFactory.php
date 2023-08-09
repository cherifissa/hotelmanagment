<?php

namespace Database\Factories;

use Carbon\Carbon;
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
        $arrivalDate = $this->faker->dateTimeBetween('-4 days', '+20 days');
        $departureDate = $this->faker->dateTimeBetween($arrivalDate, $arrivalDate->format('Y-m-d') . ' +10 days');

        return [
            'numero' => $this->faker->unique()->numerify('RES#########'),
            'nbr_jour' => function ($attributes) {
                $arrival = Carbon::parse($attributes['date_arrive']);
                $departure = Carbon::parse($attributes['date_depart']);

                $diffInDays = $arrival->diffInDays($departure);

                return max($diffInDays, 1);
            },
            //'nbr_jour' => $this->faker->numberBetween(1, 10),
            'nbr_client' => $this->faker->numberBetween(1, 3),
            'status' => function ($attributes) use ($arrivalDate, $departureDate) {
                $today = Carbon::today();
                $arrival = Carbon::parse($attributes['date_arrive']);
                $departure = Carbon::parse($attributes['date_arrive']);

                if ($arrival->isBefore($today) && $departure->isBefore($today)) {
                    return $this->faker->randomElement(['quitte', 'annule']);
                } elseif ($arrival->isAfter($today)) {
                    return $this->faker->randomElement(['enregistre', 'attente']);
                }
            },
            'date_arrive' => $arrivalDate,
            'date_depart' => $departureDate,
            'client_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'chambre_id' => function () {
                $randomChambre = Chambre::where('status', 'libre')->inRandomOrder()->first();
                return $randomChambre;
            },
            'prix' => function ($attributes) {
                $nbr_jour = $attributes['nbr_jour'];
                $chambreId = $attributes['chambre_id'];
                $chambre = Chambre::find($chambreId);
                $chambre->status = 'occupé';
                $chambre->save();
                return $chambre->prix * $nbr_jour;
            },
        ];
    }
}

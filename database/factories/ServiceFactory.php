<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Service::class;

    public function definition(): array
    {


        $reservation = Reservation::inRandomOrder()->first();
        $minDateArrive = Reservation::min('date_arrive');
        $maxDateArrive = Reservation::max('date_arrive');

        return [
            'type_service' => $this->faker->randomElement(['ptdej', 'dej', 'diner']),
            'type_payement' => $this->faker->randomElement(['cash', 'gratuite', 'reservation']),
            'prix' => $this->faker->randomElement([10000, 15000, 20000, 25000]),
            'reservation_id' => $reservation->numero,
            'created_at' => $this->faker->dateTimeBetween($minDateArrive, $maxDateArrive),
        ];
    }
}

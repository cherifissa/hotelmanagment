<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservationCount = Reservation::count();
        Service::factory()->count($reservationCount * 2)->create();
    }
}
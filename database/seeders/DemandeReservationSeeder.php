<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DemandeReservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DemandeReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DemandeReservation::factory()->count(10)->create();
    }
}
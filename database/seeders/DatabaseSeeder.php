<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MessageSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\CommentaireSeeder;
use Database\Seeders\ReservationSeeder;
use Database\Seeders\DemandeReservationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(ChambresSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(ReservationSeeder::class);
        // $this->call(DemandeReservationSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(CommentaireSeeder::class);
    }
}

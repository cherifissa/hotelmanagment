<?php

namespace Database\Seeders;

use App\Models\Chambre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChambresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chambre::factory()->count(12)->create();
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demande_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('nom_client', 100);
            $table->string('email_client', 75);
            $table->date('date_arrive');
            $table->date('date_depart');
            $table->enum('type_chambre', ['standard', 'privilege', 'suite junior', 'suite famille', 'suite VIP', 'suite presidentielle']);
            $table->integer('nombre_adulte');
            $table->integer('nombre_enfant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_reservations');
    }
};

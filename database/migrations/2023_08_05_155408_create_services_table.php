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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->enum('type_service', ['ptdej', 'dej', 'diner']);
            $table->enum('type_payement', ['cash', 'gratuite', 'reservation'])->nullable();
            $table->integer('prix');
            $table->string('reservation_id', 15);
            $table->foreign('reservation_id')->references('numero')->on('reservations')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

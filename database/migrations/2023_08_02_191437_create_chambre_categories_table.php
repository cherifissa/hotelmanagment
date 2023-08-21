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
        Schema::create('chambre_categories', function (Blueprint $table) {
            $table->id();
            $table->enum('nom', ['standard', 'privilege', 'suite junior', 'suite famille', 'suite VIP', 'suite presidentielle']);
            $table->integer('prix')->unsigned();
            $table->boolean('wifi')->nullable()->default(true);
            $table->boolean('petit_dej')->nullable()->default(true);
            $table->integer('nbr_chb');
            $table->integer('nbr_lit');
            $table->json('images');
            $table->text('description', 100)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambre_categories');
    }
};

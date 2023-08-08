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
        Schema::create('chambres', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->enum('type', ['standard', 'privilege', 'suite junior', 'suite famille', 'suite VIP', 'suite presidentielle']);
            $table->integer('prix')->unsigned();
            $table->enum('status', ['occupé', 'libre', 'hors service']);
            $table->text('description')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres');
    }
};

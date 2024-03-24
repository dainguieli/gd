<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute la migration.
     */
    public function up(): void
    {
        Schema::create('localisations', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('residence_id')->unsigned();
            $table->foreign('residence_id')->references('id')->on('residences')->onDelete('cascade');
            $table->BigInteger('client_id')->unsigned();

            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('localisations');
    }
};

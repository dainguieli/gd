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
        Schema::create('info_paie_abonnements', function (Blueprint $table) {
            $table->id();
            
            $table->string('transaction_id');
            $table->boolean('status_paiement')->default(false);
            $table->integer('montant');
            $table->string('methode_paie');
            $table->string('date_paiement');
            $table->foreignId('proprietaire_abonnements_id')->references('id')->on('users')->onDelete('cascade');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_paie_abonnements');
    }
};

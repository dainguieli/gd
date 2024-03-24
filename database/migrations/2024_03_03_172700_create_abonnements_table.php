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
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();

            $table->BigInteger('proprietaire_id')->unsigned();
            $table->foreign('proprietaire_id')->references('id')->on('proprietaires')->onDelete('cascade');
       
          $table->string('nom');
            $table->bigInteger('prix');
            $table->bigInteger('duree_valid');
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnements');
    }
};

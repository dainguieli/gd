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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('residences_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('note');
            $table->text('commentaire')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();

            // Adding foreign key constraints
            $table->foreign('residences_id')->references('id')->on('residences')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};

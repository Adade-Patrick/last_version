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
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->unique();
             $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('info_perso_id');
            $table->unsignedBigInteger('classes_id');
            $table->unsignedBigInteger('cycle_id');
            $table->unsignedBigInteger('annee_scolaires_id');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('info_perso_id')->references('id')->on('info_perso')->onDelete('cascade');

            $table->foreign('classes_id')->references('id')->on('classes')->onDelete('cascade');

            $table->foreign('cycle_id')->references('id')->on('cycle')->onDelete('cascade');

            $table->foreign('annee_scolaires_id')->references('id')->on('annee_scolaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};

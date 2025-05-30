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
        Schema::create('resultat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('eleves_id');
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('evaluations_id');
            $table->timestamps();

            $table->foreign('eleves_id')->references('id')->on('eleves')->onDelete('cascade');
            $table->foreign('matiere_id')->references('id')->on('matiere')->onDelete('cascade');
            $table->foreign('evaluations_id')->references('id')->on('evaluations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultat');
    }
};

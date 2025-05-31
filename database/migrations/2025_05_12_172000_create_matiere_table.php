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
        Schema::create('matiere', function (Blueprint $table) {
            $table->id();
            $table->string('libelle_M');
            $table->unsignedBigInteger('cycle_id');
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('classes_id');
            $table->unsignedBigInteger('prof_id');
            $table->timestamps();

            $table->foreign('cycle_id')->references('id')->on('cycle')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('classes_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('prof_id')->references('id')->on('prof')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matiere');
    }
};

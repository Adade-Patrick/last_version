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
        Schema::create('classe_prof', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classes_id');
            $table->unsignedBigInteger('prof_id');
            $table->timestamps();

            $table->foreign('classes_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('prof_id')->references('id')->on('prof')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_prof');
    }
};

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
        Schema::create('quizz', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->unsignedBigInteger('matiere_id');
            $table->unsignedBigInteger('prof_id');
            $table->unsignedBigInteger('classes_id');
            $table->date('date_publication');
            $table->timestamps();

            $table->foreign('matiere_id')->references('id')->on('matiere')->onDelete('cascade');
            $table->foreign('prof_id')->references('id')->on('prof')->onDelete('cascade');
            $table->foreign('classes_id')->references('id')->on('classes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizz');
    }
};

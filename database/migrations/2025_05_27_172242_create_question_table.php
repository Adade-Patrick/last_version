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
        Schema::create('question', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluations_id');
            $table->unsignedBigInteger('quizz_id');
            $table->integer('notes');
            $table->string('reponses');
            $table->timestamps();

            $table->foreign('evaluations_id')->references('id')->on('evaluations')->onDelete('cascade');
            $table->foreign('quizz_id')->references('id')->on('quizz')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question');
    }
};

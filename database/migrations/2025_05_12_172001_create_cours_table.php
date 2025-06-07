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
       Schema::create('cours', function (Blueprint $table) {
        $table->id();
        $table->string('titre');
        $table->unsignedBigInteger('matiere_id');
        $table->unsignedBigInteger('prof_id');
        $table->text('description');
        $table->timestamps();

        $table->foreign('prof_id')->references('id')->on('prof')->onDelete('cascade');
        $table->foreign('matiere_id')->references('id')->on('matiere')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};

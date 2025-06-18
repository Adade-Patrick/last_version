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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // exemple: 'création', 'modification', 'suppression'
            $table->string('model_type'); // exemple: Eleve, Cours, Chapitre
            $table->unsignedBigInteger('model_id'); // ID de l’élément concerné
            $table->text('description'); // Texte de l’action
            $table->unsignedBigInteger('user_id')->nullable(); // L’auteur de l’action
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};

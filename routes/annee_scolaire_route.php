<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnneeScolaireController;

 // Année scolaire
 Route::get('/annees', [AnneeScolaireController::class, 'index'])->name('annee_scolaire.index');
 Route::post('/ajouter-annee', [AnneeScolaireController::class, 'store'])->name('annee_scolaire.store');
 Route::delete('/annees/{id}', [AnneeScolaireController::class, 'destroy'])->name('annee.destroy');

?>

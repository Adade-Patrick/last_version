<?php

use App\Http\Controllers\EvaluationController;

Route::get('/int_prof/evaluation', [EvaluationController::class, 'index'])->name('int_prof.evaluation');
// Formulaire de création
Route::get('/evaluations/create', [EvaluationController::class, 'create'])->name('evaluations.create');

// Enregistrement d'une nouvelle évaluation
Route::post('int_prof/evaluations', [EvaluationController::class, 'store'])->name('int_prof.store');

Route::delete('/int_prof/{id}', [EvaluationController::class, 'destroy'])->name('int_prof.destroy');

Route::get('/int_prof/evaluation/show/{id}', [EvaluationController::class, 'show'])->name('int_prof.show');

Route::post('/evaluations', [EvaluationController::class, 'update'])->name('evaluations.update');

?>

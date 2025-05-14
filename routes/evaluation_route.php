<?php

use App\Http\Controllers\EvaluationController;

Route::get('/traitements/evaluation/index', [EvaluationController::class, 'index'])->name('traitements.evaluation.index');

?>

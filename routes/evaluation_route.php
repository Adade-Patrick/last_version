<?php

use App\Http\Controllers\EvaluationController;

Route::get('/int_prof/evaluation', [EvaluationController::class, 'index'])->name('int_prof.evaluation');

?>

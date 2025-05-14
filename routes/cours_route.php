<?php

use App\Http\Controllers\CoursController;

Route::get('/traitements/cours/index', [CoursController::class, 'index'])->name('traitements.cours.index');


?>

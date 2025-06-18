<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cyclesController;


Route::get('/cycle', [cyclesController::class, 'index'])->name('cycle.index');
Route::get('/cycle/create', [cyclesController::class, 'create'])->name('cycle.create');
Route::post('/cycle', [cyclesController::class, 'store'])->name('cycle.store');
Route::post('/cycle/update', [cyclesController::class, 'update'])->name('cycle.update');
Route::delete('/cycle/{cycle}', [cyclesController::class, 'destroy'])->name('cycle.destroy');

?>

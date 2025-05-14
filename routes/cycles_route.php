<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CyclesController;


Route::get('/cycles', [CyclesController::class, 'index'])->name('cycles.index');
Route::get('/cycles/create', [CyclesController::class, 'create'])->name('cycles.create');
Route::post('/cycles', [CyclesController::class, 'store'])->name('cycles.store');
Route::get('/cycles/{cycle}/edit', [CyclesController::class, 'edit'])->name('cycles.edit');
Route::put('/cycles/{cycle}', [CyclesController::class, 'update'])->name('cycles.update');
Route::delete('/cycles/{cycle}', [CyclesController::class, 'destroy'])->name('cycles.destroy');



?>

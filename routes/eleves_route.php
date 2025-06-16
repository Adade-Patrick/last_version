<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleveController;

Route::prefix('traitements/eleve')->name('traitements.eleve.')->group(function () {
    Route::get('/', [EleveController::class, 'index'])->name('index');

    Route::get('create', [EleveController::class, 'create'])->name('create');

    Route::post('store', [EleveController::class, 'store'])->name('store');

    Route::get('{id}', [EleveController::class, 'show'])->name('show');

    Route::get('{id}/edit', [EleveController::class, 'edit'])->name('edit');

    Route::put('{id}/update', [EleveController::class, 'update'])->name('update');

    Route::delete('{id}', [EleveController::class, 'destroy'])->name('destroy');
});



?>

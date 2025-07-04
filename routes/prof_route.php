<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfController;

Route::prefix('/prof')->group(function(){

    Route::get('/index', [ProfController::class, 'index'])->name('traitements.prof.index');

    // Route::post('/store', [AdminController::class, 'storeInfo'])->name('prof.store');

    Route::delete('/prof/{prof}', [ProfController::class, 'destroy'])->name('prof.destroy');

    Route::post('/update', [ProfController::class, 'update'])->name('traitements.prof.update');

    Route::delete('/show', [ProfController::class, 'show'])->name('traitements.prof.show');
    
    Route::get('/dashboard', [ProfController::class, 'dashboard'])->name('int_prof.dashboard');

});

?>

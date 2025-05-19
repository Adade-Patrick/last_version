<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfController;

Route::prefix('/prof')->group(function(){

    Route::get('/index', [ProfController::class, 'index'])->name('traitements.prof.index');

    // Route::post('/register', [AdminController::class, 'storeProf'])->name('prof.store');

});

?>

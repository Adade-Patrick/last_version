<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilProfController;


Route::middleware(['auth','role:prof,super_admin'])->group(function() {

    Route::prefix('/prof')->group(function(){

        Route::view('/dashboard', 'int_prof.dashboard')->name('int_prof.dashboard');

    });

});
?>

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfController;

Route::middleware(['auth','role:admin, super_admin'])->group(function() {

    Route::prefix('/admin')->group(function(){

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/admin/register', [AdminController::class, 'storeProf'])->name('prof.store');
        Route::post('/register-super_admin', [SuperAdminController::class, 'store'])->name('super_admin.store');

        // Route::post('/register', [AdminController::class, 'storeInfo'])->name('admin.store');

        // Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');

        Route::get('/index', [AdminController::class, 'index'])->name('admin.index');

        // Route::delete('/admin/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');

    });


});

?>

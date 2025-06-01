<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfController;

//Super_admin route

Route::middleware(['auth', 'role:super_admin,'])->prefix('super_admin')->group(function () {
    Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('super_admin.dashboard');
    Route::get('/index', [SuperAdminController::class, 'index'])->name('super_admin.index');

    Route::post('/register-super_admin', [SuperAdminController::class, 'storeInfo'])->name('super_admin.store');
    Route::post('/register-prof', [ProfController::class, 'store'])->name('prof.store');

    Route::delete('/admin/{admin}', [SuperAdminController::class, 'destroy'])->name('super_admin.destroy');
});

//  Admin Routes

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Ajouter d'autres routes spécifiques à admin ici
});

//prof route

Route::middleware(['auth', 'role:prof'])->prefix('prof')->group(function () {
    Route::get('/dashboard', [ProfController::class, 'dashboard'])->name('prof.dashboard');

});


?>

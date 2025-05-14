<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'role:admin,superuser'])->prefix('admin')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


?>

<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileImageController;

Route::middleware(['auth'])->get('/profile/update-image', [ProfileImageController::class, 'updateImage'])->name('profile.updateImage');

Route::middleware(['auth'])->post('/profile/update-image', [ProfileImageController::class, 'updateImage'])->name('profile.updateImage');



?>

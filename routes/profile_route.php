<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompteController;

Route::get('/profile/compte', [CompteController::class, 'index'])->name('profile.compte');


?>

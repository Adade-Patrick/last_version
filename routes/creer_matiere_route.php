<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreerMatiereController;

Route::get('/creer_matiere',[CreerMatiereController::class,'index'])->name('creer_matiere.index');
Route::post('/creer_matiere', [CreerMatiereController::class, 'store'])->name('creer_matiere.store');


?>

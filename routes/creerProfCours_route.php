<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreerProfCoursController;

Route::get('/int_prof/creer_cours',[CreerProfCoursController::class,'create'])->name('int_prof.creer_cours');
// Route::get('/int_prof/creer_cours', 'int_prof.creer_cours')->name('int_prof.creer_cours');

?>

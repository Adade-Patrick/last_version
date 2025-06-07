<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfCoursController;

Route::middleware(['auth','role:prof, super_admin'])->group(function(){

    Route::get('/int_prof/cours', [ProfCoursController::class, 'index'])->name('int_prof.cours');
    Route::post('/int_prof/cours/store', [ProfCoursController::class, 'store'])->name('int_prof.cours.store');
    Route::post('/int_prof/cours/update/{id}', [ProfCoursController::class, 'update'])->name('int_prof.cours.update');
    Route::get('/int_prof/cours/destroy/{id}', [ProfCoursController::class, 'destroy'])->name('int_prof.cours.destroy');
    Route::get('/int_prof/cours/show/{id}', [ProfCoursController::class, 'show'])->name('int_prof.cours.show');
});

?>

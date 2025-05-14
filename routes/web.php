<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\{
    PrimaireController,
    AnneeScolaireController,
    ClassesController,
    AdminController,
    Auth\RegisterController,
};


Route::get('/', function () {
    return view('index');
})->name('home');




// Route de connexion

Route::get('/auth',function(){
    return view('auth.login');
})->name('auth.form.login');

Route::post('/auth/login',[UserController::class, 'login'])->name('auth.login');
Route::post('/auth/logout',[UserController::class, 'logout'])->name('auth.logout');
Route::get('/auth/user/register/forms',[UserController::class, 'create'])->name('auth.user.create');
Route::post('/auth/user/register',[UserController::class, 'store'])->name('auth.register');

//admin require
require __DIR__.'/admin_route.php';

//eleves require
require __DIR__.'/eleves_route.php';

require __DIR__.'/annee_scolaire_route.php';

require __DIR__.'/classe_route.php';

require __DIR__.'/eleves_route.php';

require __DIR__.'/prof_route.php';

require __DIR__.'/cycles_route.php';

require __DIR__.'/cours_route.php';

require __DIR__.'/evaluation_route.php';





//  Zone de test
Route::view('/admin/dashboard', 'admin.dashboard')->name('dashboard');

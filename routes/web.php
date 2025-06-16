<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
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

Route::get('/auth',function(Request $request){
    return view('auth.login');
})->name('auth.form.login');

Route::post('/auth/login',[UserController::class, 'login'])->name('auth.login');
Route::get('/auth/logout',[UserController::class, 'logout'])->name('auth.logout');
Route::get('/auth/user/register/forms',[UserController::class, 'create'])->name('auth.user.create');
Route::post('/auth/user/register',[UserController::class, 'store'])->name('auth.register');

//super_admin require
require __DIR__.'/super_admin_route.php';

//admin require
require __DIR__.'/admin_route.php';

//eleves require
require __DIR__.'/eleves_route.php';

require __DIR__.'/annee_scolaire_route.php';

require __DIR__.'/classe_route.php';

require __DIR__.'/eleves_route.php';

require __DIR__.'/prof_route.php';

require __DIR__.'/cycle_route.php';

require __DIR__.'/cours_route.php';

require __DIR__.'/evaluation_route.php';

require __DIR__.'/profile_route.php';

require __DIR__.'/profileProf_route.php';

require __DIR__.'/profcours_route.php';

require __DIR__.'/CreerProfcours_route.php';

require __DIR__.'/profParametre_route.php';

require __DIR__.'/profile_image_route.php';

require __DIR__.'/stats_route.php';

require __DIR__.'/creer_matiere_route.php';


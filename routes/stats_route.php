<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatsController;

Route::view('/stats', 'stats')->name('stats');

?>

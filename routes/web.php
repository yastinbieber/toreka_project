<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TrRecordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebApiController;
use App\Http\Controllers\IdealWeightController;
use App\Http\Controllers\WeightRecordController;
use App\Http\Controllers\HowtoVideoController;
use App\Http\Controllers\UserMotivationController;
use App\Http\Controllers\TrMenuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('trrecords', TrRecordController::class);
    Route::resource('users', UserController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('idealweights', IdealWeightController::class);
    Route::resource('weightrecords', WeightRecordController::class);
    Route::resource('howtovideos', HowtoVideoController::class);
    Route::resource('usermotivations', UserMotivationController::class);
    Route::resource('trmenus', TrMenuController::class);
    Route::get('webapi', [WebApiController::class, 'getTrainingMenu'])->name('webapi');
});
Auth::routes();

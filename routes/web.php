<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrRecordController;
use App\Http\Controllers\UserController;

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
    Route::post('/addContent', [App\Http\Controllers\TrRecordController::class, 'addContent'])->name('add.content');
    Route::resource('users', UserController::class);
});
Auth::routes();

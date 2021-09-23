<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CardJobController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\UserController;
use App\Models\Nationality;
use Illuminate\Support\Facades\Route;


Route::get('/', [CardJobController::class, 'index']);
Route::post('jobAplication', [CardJobController::class, 'store'])->name('jobAplication');

Route::get( '/get-cities/{nationality_id}', [CardJobController::class, 'get_cities']);
Route::get('/loginUser/{national_number}', [CardJobController::class, 'login']);

Auth::routes();
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('jobs', JobController::class);
    Route::resource('nationalities', NationalityController::class);
    Route::resource('cities', CityController::class);
});

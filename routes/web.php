<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CardJobController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Models\Nationality;
use Illuminate\Support\Facades\Route;


Route::get('/', [CardJobController::class, 'index']);
Route::post('/login-user', [CardJobController::class, 'login'])->name('login-user');
Route::get('/job-apply', [CardJobController::class, 'index'])->name('jobApply');
Route::post('jobAplication', [CardJobController::class, 'store'])->name('jobAplication');

Route::get( '/get-cities/{nationality_id}', [CardJobController::class, 'get_cities']);

Route::prefix('admin')->group(function () {
    Auth::routes(['register' => false]);
    Route::middleware('auth')->group(function(){
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::resource('roles', RoleController::class);
        Route::resource('admins', AdminController::class);

        Route::resource('users', UserController::class)->except('show');
        Route::get('users/export/', [UserController::class, 'export'])->name('users.export');
        Route::post('users/import/', [UserController::class, 'import'])->name('users.import');

        Route::resource('jobs', JobController::class);
        Route::resource('nationalities', NationalityController::class);
        Route::resource('cities', CityController::class);
        Route::get('settings/edit/{id}', [SettingController::class, 'edit'])->name('settings.edit');
        Route::post('settings/update/{id}', [SettingController::class, 'update'])->name('settings.update');
    });
});

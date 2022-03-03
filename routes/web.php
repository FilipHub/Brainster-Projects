<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LogoutController;

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
    return view('auth/login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'checkRegistrationStep'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [LogoutController::class, 'perform']);

    Route::resource('projects', ProjectController::class);
    Route::resource('applications', ApplicationController::class);

    Route::resource('profile', ProfileController::class);
    Route::get('projects/{project}/edit', [ProjectController::class, 'edit']);
    Route::get('projects/{project}/applicants', [ProjectController::class, 'show']);
    Route::post('projects/{project}/update-projects', [ProjectController::class, 'update']);
    Route::post('projects/{project}/destroy', [ProjectController::class, 'destroy']);
    Route::post('applications/{applications->id}/destroy', [ProjectController::class, 'destroy']);

    Route::get('projects/{project}/edit', [ProjectController::class, 'edit']);
    Route::get('profile', [RegisteredUserController::class, 'edit'])->name('profile');
    Route::put('profile', [RegisteredUserController::class, 'update'])->name('update-profile');
});




require __DIR__ . '/auth.php';

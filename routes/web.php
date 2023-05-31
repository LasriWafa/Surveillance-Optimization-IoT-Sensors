<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaptorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\mesureController;
use App\Http\Controllers\adminCaptorController;
use App\Http\Controllers\userCaptorController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\dashboardController;

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


// Route::get('/', [dashboardController::class, 'index']);


Route::middleware(['auth', 'isAdmin', 'authCheck'])->group(function () {
    Route::resource('usersCaptors', userCaptorController::class);
});

// Users route for only admins to view
Route::middleware(['auth', 'isAdmin', 'authCheck'])->group(function () {
    Route::resource('users', UserController::class);
    Route::delete('users', [UserController::class, 'remove'])->name('users.remove');
});

// Captors route for only admins to view
Route::middleware(['auth', 'isAdmin', 'authCheck'])->group(function () {
    Route::resource('adminsCaptors', adminCaptorController::class);
    Route::delete('adminsCaptors', [adminCaptorController::class, 'remove'])->name('adminsCaptors.remove');
});



// Admin route
Route::prefix('admins')->middleware(['auth', 'isAdmin', 'authCheck'])->group(function () {

    Route::get('/index', [AdminController::class, 'adminGetAllUsers'])->name('admins.index');
    Route::delete('/index/{id}', [AdminController::class, 'adminDeleteCaptors'])->name('admins.index.delete');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
        
    // })->name('dashboard');
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', [dashboardController::class, 'showTemperatureGraph']);
});

// Captors route 
Route::prefix('captors')->middleware(['auth', 'authCheck'])->group(function () {
    Route::get('/', [CaptorController::class, 'index'])->name('captors.index');
    Route::get('/create', [CaptorController::class, 'create'])->name('captors.create');
    Route::post('/store', [CaptorController::class, 'store'])->name('captors.store');
    Route::get('/{id}', [CaptorController::class, 'show'])->name('captors.show');
    Route::get('/edit/{id}', [CaptorController::class, 'edit'])->name('captors.edit');
    Route::post('/update/{id}', [CaptorController::class, 'update'])->name('captors.update');
    Route::delete('/{id}', [CaptorController::class, 'deleteCaptors'])->name('captors.delete');
    Route::get('data/{id}', [CaptorController::class, 'data'])->name('captors.data');
});

Route::prefix('mesures')->middleware(['auth', 'authCheck'])->group(function () {
    Route::get('/captors/{captorId}/mesures', [mesureController::class, 'index'])->name('mesures.index');
    Route::get('/mesures', [mesureController::class, 'filter'])->name('mesures.filter');
});

Route::middleware(['auth', 'authCheck'])->group(function () {
    Route::get('/captors/{captorId}/chart', [ChartController::class, 'index'])->name('chart.index');
});

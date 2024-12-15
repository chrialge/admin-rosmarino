<?php

use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\AllergyController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::resource('/allergy', AllergyController::class);
        Route::resource('/dishes', DishController::class);
        Route::resource('/customers', CustomerController::class);
        Route::resource('/reservations', ReservationController::class);
        // Route::resource('/reservations', ReservationController::class);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

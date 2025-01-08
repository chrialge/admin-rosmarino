<?php

use App\Http\Controllers\Admin\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\SendNotification;
use App\Http\Controllers\StateReservationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('reservation', [ReservationController::class, 'store']);
Route::get('confirm-reservation/{id}', [StateReservationController::class, 'confirm']);
Route::get('reject-reservation/{id}', [StateReservationController::class, 'reject']);
Route::post('customers', [CustomerController::class, 'store']);

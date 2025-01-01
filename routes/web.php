<?php

use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\AllergyController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\SendEmailController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendNotification;
use App\Notifications\TelegramNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;
use NotificationChannels\Telegram\TelegramUpdates;
use App\Notifications\InvoicePaid;
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
        Route::post('/send-email', [SendEmailController::class, 'sendEmail'])->name('send-email');
        // Route::get('/mail', function () {
        //     return view('mail.mail-client-email');
        // });
        // Route::resource('/reservations', ReservationController::class);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/new-password', [NewPasswordController::class, 'store']);
});

require __DIR__ . '/auth.php';

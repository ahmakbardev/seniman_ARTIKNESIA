<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerificationController;
use App\Livewire\EmailVerification;
use App\Livewire\PaymentConfirmation;
use App\Livewire\RegisterForm;
use App\Livewire\TambahKarya;
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


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/login', function () {
        return view('login');
    })->name('login');
    Route::get('/register', function () {
        return view('register');
    })->name('register');
});


Route::get('/payment/confirmation', PaymentConfirmation::class)->name('payment.confirmation');

// Route::get('/register', RegisterForm::class)->name('register');
Route::middleware('auth')->group(function () {
    Route::get('/verify-email', EmailVerification::class)->name('verification.notice');

    // Tambahkan prefix 'en_id' dan 'id_id' ke grup rute
    Route::prefix('{locale}')->middleware('verified')->where(['locale' => 'en_id|id_id'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::prefix('/dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard.seniman');
        });

        Route::middleware('verified')->prefix('seniman')->group(function () {
            Route::get('/', function () {
                return view('seniman.profile');
            });

            // Route::get('/', function() {
            //     return view('seniman.profile');
            // })->name('dashboard.seniman');
            // Tambahkan parameter {locale} ke URI route logout

            Route::prefix('karya')->group(function () {
                Route::get('/tambah', function () {
                    return view('seniman.karya.tambah');
                })->name('tambah-karya');
            });
        });
    });
});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NegotiationBatchController;
use App\Http\Controllers\NegotiationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Livewire\EmailVerification;
use App\Livewire\ExperienceForm;
use App\Livewire\ExperienceList;
use App\Livewire\PaymentConfirmation;
use App\Livewire\ProfileSeniman;
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


Route::get('/payment/confirmation', function () {
    return view('payment-confirmation');
})->name('payment.confirmation');
Route::get('/provinces', [LocationController::class, 'getProvinces']);
Route::get('/cities/{provinceId}', [LocationController::class, 'getCities']);
Route::post('/upload-profile-pic', [ProfileController::class, 'uploadProfilePic'])->name('profile.upload');


// Route::get('/register', RegisterForm::class)->name('register');
Route::middleware('auth')->group(function () {
    Route::get('/verify-email', function () {
        return view('payment-confirmation');
    })->name('verification.notice');

    // Route::get('/experiences', ExperienceList::class)->name('experiences.index');

    Route::post('/upload', [UploadController::class, 'upload'])->name('upload');
    // Tambahkan prefix 'en_id' dan 'id_id' ke grup rute
    Route::prefix('{locale}')->middleware(['verified', 'check.password'])->where(['locale' => 'en|id'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


        Route::prefix('/dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard.seniman');
            Route::post('/update-password', [DashboardController::class, 'updatePassword'])->name('update-password');
        });

        Route::middleware('verified')->prefix('seniman')->as('seniman.')->group(function () {
            Route::prefix('profile')->as('profile.')->group(function () {
                Route::get('/', [ProfileController::class, 'show'])->name('index');
                // Route::get('/edit', function () {
                //     return view('seniman.profile.index');
                // })->name('edit');
                Route::get('/experiences/add', ExperienceForm::class)->name('experiences.add');
                Route::get('/experiences/edit/{experienceId}', ExperienceForm::class)->name('experiences.edit');
                Route::get('/edit', ProfileSeniman::class)->name('edit');
            });

            // Route::get('/', function() {
            //     return view('seniman.profile');
            // })->name('dashboard.seniman');
            // Tambahkan parameter {locale} ke URI route logout
            Route::prefix('karya')->as('karya.')->group(function () {
                Route::get('/', [KaryaController::class, 'index'])->name('index');
                Route::get('/tambah', [KaryaController::class, 'create'])->name('tambah-karya');
                Route::post('/tambah', [KaryaController::class, 'store'])->name('store');
                Route::get('/edit/{karya}', [KaryaController::class, 'edit'])->name('edit');
                Route::put('/update/{karya}', [KaryaController::class, 'update'])->name('update');
            });

            Route::resource('/batch', NegotiationBatchController::class);
            Route::resource('/{batch}/negotiation', NegotiationController::class);
            Route::get('/negotiation/{negotiation}/accept', [NegotiationController::class, 'accept'])->name('negotiation.accept');
        });
    });
});

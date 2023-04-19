<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AppointmentController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('welcome');
});

Route::get('/Coba', function () {
    return view('dashboard.index');
});

Route::get('/dashboard-1', function () {
    return view('dashboard');
});

Route::get('/login-1', function () {
    return view('auth.login');
});

Route::get('/Home', function() {
    return view('homepage.index');
})->name('home');

Route::get('/Contact', [AboutController::class, 'ContactPage'])->name('contact');
Route::post('/feedback', [FeedbackController::class, 'feedback'])->name('feedback');

Route::get('/Registrasi', [AboutController::class, 'RegistrasiPage'])->name('regist');

Route::get('/Appointment', [AboutController::class, 'AppointmentPage'])->name('appointment');

Route::get('/Login', [AboutController::class, 'LoginPage'])->name('homepage.login');

Route::post('/Appointment', [AppointmentController::class, 'store'])->name('appointment.store');
Route::get('/Appointment/index', [AppointmentController::class, 'index'])->name('appointment.index');

Route::get('/Appointment/show', [AppointmentController::class, 'show'])->name('appointment.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role == 1) {
            return view('homepage.index');
        }
    })->name('dashboard');
});

Route::post('/Appointment', [AppointmentController::class, 'Appointment'])->name('appointment.Appointment');
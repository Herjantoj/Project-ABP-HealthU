<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
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

Route::get('/About', [AboutController::class, 'AboutPage'])->name('about');

Route::get('/Contact', [AboutController::class, 'ContactPage'])->name('contact');

Route::get('/Registrasi', [AboutController::class, 'RegistrasiPage'])->name('regist');

Route::get('/Appointment', [AboutController::class, 'AppointmentPage'])->name('appointment');

Route::get('/Login', [AboutController::class, 'LoginPage'])->name('homepage.login');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role == 1) {
            return view('dashboard.index');
        }
    })->name('dashboard');
});

//Appointment prefixnya apa
Route::prefix('appointments')->group(function(){
    Route::get('/', [AppointmentController::class, 'index'])->name('appointments');
    Route::post('/', [AppointmentController::class, 'store'])->name('store.appointments');
    Route::delete('/', [AppointmentController::class, 'delete'])->name('delete.appointments');
    Route::put('/', [AppointmentController::class, 'edit'])->name('edit.appointments');
})->middleware('admin');

Route::post('/Appointment', [AppointmentController::class, 'Appointment'])->name('appointment.Appointment');
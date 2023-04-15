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

Route::get('/Home', function() {
    return view('homepage.index');
})->name('home');

Route::get('/dokter', [DokterController::class, 'index'])->name('dokter');

Route::get('/TambahDataDokter', [DokterController::class, 'TambahDataDokter'])->name('TambahDataDokter');

Route::post('/InsertDataDokter', [DokterController::class, 'InsertDataDokter'])->name('InsertDataDokter');

Route::get('/TampilkanData/{id}', [DokterController::class, 'TampilkanData'])->name('TampilkanData');

Route::post('/UpdateData/{id}', [DokterController::class, 'UpdateData'])->name('UpdateData');

Route::get('/DeleteData/{id}', [DokterController::class, 'DeleteData'])->name('DeleteData');

Route::get('/LoginAdmin', [AdminController::class, 'LoginAdmin'])->name('LoginAdmin');

Route::get('/RegisterAdmin', [AdminController::class, 'RegisterAdmin'])->name('RegisterAdmin');

Route::post('/SaveRegisterAdmin', [AdminController::class, 'SaveRegisterAdmin'])->name('SaveRegisterAdmin');

Route::post('/LoginProses', [AdminController::class, 'LoginProses'])->name('LoginProses');

Route::get('/LogoutAdmin', [AdminController::class, 'LogoutAdmin'])->name('LogoutAdmin');

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
        return view('homepage.index');
    })->name('dashboard');
});

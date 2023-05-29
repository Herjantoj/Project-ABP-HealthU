<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Api\Tugas12Controller;



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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//POST /api/login
Route::post('login', [UserController::class, 'loginUser']);
Route::post('register', [UserController::class, 'registerUser']);
Route::middleware('auth:sanctum')->group(
    function () {
        Route::get('getUser', [UserController::class, 'getUser']);
    }
);
Route::post('createDokter' ,[UserController::class, 'createDokter']);
Route::get('getDokter', [UserController::class, 'getDokter']);
Route::get('getAllUser', [UserController::class, 'getAllUser']);
Route::get('indexUser', [Tugas12Controller::class, 'indexUser']);
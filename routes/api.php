<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route for user registration
Route::post('/register', [RegisteredUserController::class, 'register']);

// Route for user login via API
Route::post('/login', [AuthenticatedSessionController::class, 'loginAPI']);

// Group of routes that require authentication
Route::middleware(['auth:sanctum'])->group(function () {
    // Route to get information about the logged-in user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Route for user logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
});

// Example route for your TiketController
Route::post('/hasil-pencarian', [TiketController::class, 'hasilPencarianAPI']);

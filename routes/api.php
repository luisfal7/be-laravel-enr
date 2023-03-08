<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\USerController;

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

Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index');
    Route::get('/user/{user}', 'show');
    Route::get('/user/create', 'create');
    Route::get('/user/{user}/edit', 'edit');
    Route::post('/user', 'store');
    Route::put('/user/{user}', 'update');
    Route::delete('/user/{user}', 'destroy');
});

Route::controller(HourController::class)->group(function () {
    Route::get('/hour', 'index');
    Route::get('/hour/{hour}', 'show');
    Route::get('/hour/create', 'create');
    Route::get('/hour/{hour}/edit', 'edit');
    Route::post('/hour', 'store');
    Route::put('/hour/{hour}', 'update');
    Route::delete('/hour/{hour}', 'destroy');
});

Route::controller(ClientController::class)->group(function () {
    Route::get('/client', 'index');
    Route::get('/client/{client}', 'show');
    Route::get('/client/create', 'create');
    Route::get('/client/{client}/edit', 'edit');
    Route::post('/client', 'store');
    Route::put('/client/{client}', 'update');
    Route::put('/client/{client}/delete-service', 'editServiceClient');
    Route::put('/client/{client}/add-service', 'addServiceClient');
    Route::put('/client/{client}/increment-quantity-service', 'incrementQuantityServiceClient');
    Route::put('/client/{client}/decrement-quantity-service', 'decrementQuantityServiceClient');
    Route::delete('/client/{client}', 'destroy');
});

Route::controller(ServiceController::class)->group(function () {
    Route::get('/service', 'index');
    Route::get('/service/{service}', 'show');
    Route::get('/service/create', 'create');
    Route::get('/service/{service}/edit', 'edit');
    Route::post('/service', 'store');
    Route::put('/service/{service}', 'update');
    Route::delete('/service/{service}', 'destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'show']);
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware('api-session')->group(function () {
    Route::get('/login', [LoginController::class, 'show']);
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('api-session')->group(function () {
    Route::post('/logout', [LogoutController::class, 'perform']);
});

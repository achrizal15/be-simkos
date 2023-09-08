<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\TenantController;
use App\Http\Controllers\Api\FeatureController;

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
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);

    Route::apiResource('tenants', TenantController::class)->except(['update']);
    Route::post('tenants/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
    Route::put('tenants/{tenant}/restore', [TenantController::class, 'restore'])->name('tenants.restore');

    Route::apiResource('features', FeatureController::class)->except(['update']);
    Route::post('features/{feature}', [FeatureController::class, 'update'])->name('features.update');
    Route::put('features/{feature}/restore', [FeatureController::class, 'restore'])->name('features.restore');

    Route::apiResource('rooms', RoomController::class)->except(['update']);
    Route::post('rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
    Route::put('rooms/{room}/restore', [RoomController::class, 'restore'])->name('rooms.restore');

    Route::post('logout', [AuthController::class, 'logout']);
});
include __DIR__ . '/apiFrontEnd.php';
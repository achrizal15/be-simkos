<?php

use App\Http\Controllers\Api\FeatureController;
use App\Http\Controllers\Api\TenantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AuthController;

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

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('users',UserController::class);

    Route::apiResource('tenants',TenantController::class)->except(['update']);
    Route::post('tenants/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
    Route::put('tenants/{tenant}/restore', [TenantController::class,'restore'])->name('tenants.restore');

    Route::apiResource('features',FeatureController::class)->except(['update']);
    Route::post('features/{tenant}', [FeatureController::class, 'update'])->name('features.update');
    Route::put('features/{tenant}/restore', [FeatureController::class,'restore'])->name('features.restore');

    Route::post('logout', [AuthController::class, 'logout']);
});

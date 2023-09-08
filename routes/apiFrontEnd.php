<?php
use App\Http\Controllers\Api\RoomController;

Route::prefix('/fe')
    ->group(function () {
        Route::get('/rooms', [RoomController::class, 'index']);

    });
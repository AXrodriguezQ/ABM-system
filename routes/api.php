<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// We create the routes for each endpoint.
// The routes are protected.
Route::middleware(['jwt.auth'])->group(function () {

    
    Route::get('/restrict/{id}', [userController::class, 'restrict']);

    Route::get('/users/{id}', [userController::class, 'show']);
    
    
    Route::put('/users/{id}', [userController::class, 'update']);
    
    Route::patch('/users/{id}', [userController::class, 'updatePartial']);
    
    Route::delete('/users/{id}', [userController::class, 'destroy']);
    
    Route::patch('/users/password/{id}', [userController::class, 'uploadPassword']);
});
Route::get('/users', [userController::class, 'index']);
Route::post('/users', [userController::class, 'store']);

Route::get('/', function() {
    return response()->json([
        'message' => 'Welcome to the API!',
        'version' => '1.0.0',
        'status' => 'Running smoothly'
    ], 200);
});

Route::post('login', [AuthController::class, 'login']);

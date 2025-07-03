<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;

Route::prefix('/api/')->group(function (){
    Route::post('/register', [AuthApiController::class, 'register']);
    Route::post('login', [AuthApiController::class, 'login']);
});

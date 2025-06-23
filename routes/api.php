<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;


Route::post('/register', [AuthApiController::class, 'register']);

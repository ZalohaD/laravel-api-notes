<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashBoardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.form.submit');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('register', [AuthController::class, 'register'])->name('register.form.submit');


Route::middleware('auth')->group(function (){
    Route::get('/dashboard', [DashBoardController::class,'showAllForUser'])->name('dashboard.index');
    Route::get('/dashboard/admin', [DashBoardController::class,'adminDashboard'])->name('dashboard.admin');
    Route::post('/dashboard/create', [DashBoardController::class, 'createNote'])->name('notes.create');
    Route::get('/dashboard/edit/{noteId}', [DashBoardController::class, 'showEditForm'])->name('notes.edit.form');
    Route::put('/dashboard/edit/{noteId}', [DashBoardController::class, 'editNote'])->name('notes.edit');
    Route::delete('dashboard/delete/{noteId}', [DashBoardController::class, 'deleteNote'])->name('notes.delete');
    Route::get('/dashboard/user/{userId}', [DashBoardController::class, 'showUserProfile'])->name('user.profile');
    Route::post('/dashboard/user/deactivate/{user_id}', [DashBoardController::class, 'deactivateUser'])->name('deactivate.user');
});


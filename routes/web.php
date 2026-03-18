<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\HTTP\Controllers\AuthController;

// Web Routes
Route::get('/', [AuthController::class, 'loginForm']);

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');// Show login form
Route::post('/login', [AuthController::class, 'login']);// Handle login submission

Route::get('/logout', [AuthController::class, 'logout']);// Handle logout

// Protected routes for student management
Route::middleware('auth')->group(function () {
    Route::get('/students', [StudentController::class, 'index']);
    Route::post('/students/store', [StudentController::class, 'store']);
    Route::get('/students/{id}', [StudentController::class, 'edit']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
});
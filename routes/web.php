<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\HTTP\Controllers\AuthController;

Route::get('/', [AuthController::class, 'loginForm']);

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);


Route::middleware('auth')->group(function () {
    Route::get('/students', [StudentController::class, 'index']);
    Route::post('/students/store', [StudentController::class, 'store']);
    Route::get('/students/{id}', [StudentController::class, 'edit']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;

Route::view('/', 'home');
Route::view('/contact', 'contact');

// Route::resource('jobs', JobController::class);
Route::controller(JobController::class)->group(function () {
    Route::get("/jobs", 'index');
    Route::get("/jobs/create", 'create');
    Route::get('/jobs/{job}', 'show');
    Route::post("/jobs", 'store');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
});

Route::get("/register", [RegisterUserController::class, 'create']);
Route::post("/register", [RegisterUserController::class, 'store']);

Route::get("/login", [SessionController::class, 'create']);
Route::post("/login", [SessionController::class, 'store']);
Route::post("/logout", [SessionController::class, 'destroy']);

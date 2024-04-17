<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\levelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;


Route::get('/login', [AuthController::class, 'index'])->middleware('guest');
Route::post('/login/masuk', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// route level 
Route::get('/levels', [levelController::class, 'index_level'])->name('levels.index')->middleware('auth');
Route::get('/add_levels', [levelController::class, 'add'])->name('add.index')->middleware('auth');
Route::post('/levels/store', [levelController::class, 'store'])->name('levels.store')->middleware('auth');
Route::get('/levels/{id}/edit', [levelController::class, 'edit'])->name('levels.edit')->middleware('auth');
Route::put('/levels/{id}/update', [levelController::class, 'update'])->name('levels.update')->middleware('auth');
Route::delete('/levels/{id}/delete', [levelController::class, 'destroy'])->name('levels.destroy')->middleware('auth');

// route user 
Route::get('/users', [UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create')->middleware('auth');
Route::post('/users/store', [UserController::class, 'store'])->name('user.store')->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');

Route::get("/profil", function () {
    return view("profile");
})->name('profile')->middleware('auth');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

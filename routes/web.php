<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Mail\SendSmsToMail;
use App\Models\User;
use App\Notifications\NewFollowerNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', [AuthController::class,'registerForm'])->name('registerForm')->middleware('checkAuth');
Route::post('/register', [AuthController::class,'handleRegister'])->name('handleRegister');
Route::get('/login', [AuthController::class,'loginForm'])->name('loginForm')->middleware('checkAuth');
Route::post('/login', [AuthController::class,'handleLogin'])->name('handleLogin');
Route::delete('/logout', [AuthController::class,'logout'])->name('logout');
Route::get('/users', [UserController::class,'index'])->name('users.index')->middleware('auth');
Route::get('/profile/{userName}' , [UserController::class,'profile'])->name('users.profile')->middleware('auth');
Route::post('/follow/{id}', [UserController::class,'follow'])->name('follow');
Route::post('/unfollow/{id}', [UserController::class,'unFollow'])->name('unFollow');
Route::get('/notify', [UserController::class,'notification'])->name('notify')->middleware('auth');
Route::post('/notify/{id}', [UserController::class,'readNotification'])->name('notify.read')->middleware('auth');
Route::get('/notify/read-all', [UserController::class,'readAllNotification'])->name('notify.readAll')->middleware('auth');


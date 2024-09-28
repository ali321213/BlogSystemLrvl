<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialLoginController;


Route::get('/', function () {
    return view('signin');
});

Route::get('home', function () {
    return view('home');
})->name('home');


Route::post('addUser', [UsersController::class, 'addUser']);

Route::get('showUsers', [UsersController::class, 'showUsers']);

Route::resource('users', UserController::class);

Route::get('signin', function () {
    return view('signin');
});


Route::get('signup', [AuthController::class, 'signupView']);

Route::get('/test', function () {
    confirmationEmail(1);
});

Route::post('signupUser', [AuthController::class, 'signupUser']);
Route::post('register', [AuthController::class, 'store']);

Route::post('signinUser', [AuthController::class, 'signinUser']);

// Google Routes
// Route::get('auth/google', [SocialLoginController::class, 'redirectToGoogle']);
// Route::get('auth/google/callback', [SocialLoginController::class, 'handleGoogleCallback']);

// Facebook Routes
// Route::get('auth/facebook', [SocialLoginController::class, 'redirectToFacebook']);
// Route::get('auth/facebook/callback', [SocialLoginController::class, 'handleFacebookCallback']);

Route::get('google-auth', function () {
    return view('home');
});

// Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('google.callback');



// routes/web.php
Route::get('/get-states/{country}', [AuthController::class, 'getStates']);
Route::get('/get-cities/{state}', [AuthController::class, 'getCities']);

Route::post('api/fetch-state', [AuthController::class, 'fetchState']);
Route::post('api/fetch-cities', [AuthController::class, 'fetchCity']);
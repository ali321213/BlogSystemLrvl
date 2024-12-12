<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [AuthController::class, 'homePage'])->name('dashboard');
Route::get('home', [AuthController::class, 'homePage'])->name('home');
Route::get('signup', [AuthController::class, 'signupView']);
Route::get('signin', [AuthController::class, 'signinView'])->name('signin');
Route::post('signupUser', [AuthController::class, 'signupUser']);
Route::post('signinUser', [AuthController::class, 'signinUser']);
Route::get('signout', [AuthController::class, 'signout']);
Route::post('addUser', [AuthController::class, 'addUser']);
Route::get('showUsers', [AuthController::class, 'showUsers']);
Route::resource('users', UserController::class);
// Products
Route::get('/products', [AuthController::class, 'productsPage'])->name('products/index');
Route::get('addProduct', [ProductsController::class, 'addProduct'])->name('addProduct');
Route::get('products/index', [ProductsController::class, 'productsPage'])->name('products/index');
Route::get('products-list', [ProductsController::class, 'getProducts'])->name('products.list');
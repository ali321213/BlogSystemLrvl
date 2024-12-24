<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'signinView'])->name('/');

// __________________________________________________Users__________________________________________________
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

// __________________________________________________Product__________________________________________________
Route::prefix('product')->name('product.')->group(function () {
   Route::get('/index', [ProductsController::class, 'index'])->name('index');
   Route::post('/store', [ProductsController::class, 'store'])->name('store');
   Route::get('/fetchall', [ProductsController::class, 'fetchAll'])->name('fetchAll');
   Route::delete('/delete', [ProductsController::class, 'delete'])->name('delete');
   Route::get('/edit', [ProductsController::class, 'edit'])->name('edit');
   Route::post('/update', [ProductsController::class, 'update'])->name('update');
});

// Route::get('/products/list', [ProductsController::class, 'productlist'])->name('products/list');
// Route::post('/addProduct', [ProductsController::class, 'addProduct'])->name('products/addProduct');
// Route::get('products/index', [ProductsController::class, 'productsPage'])->name('products/index');
// Route::get('products-list', [ProductsController::class, 'getProducts'])->name('products.list');
// Route::put('/products/update/{id}', [ProductsController::class, 'updateProduct'])->name('products.update');
// Route::delete('/products/delete/{id}', [ProductsController::class, 'deleteProduct'])->name('products.delete');

// __________________________________________________Unit__________________________________________________
Route::prefix('unit')->name('category.')->group(function () {
   Route::get('/index', [CategoryController::class, 'index'])->name('index');
   Route::post('/store', [CategoryController::class, 'store'])->name('store');
   Route::get('/fetchall', [CategoryController::class, 'fetchAll'])->name('fetchAll');
   Route::delete('/delete', [CategoryController::class, 'delete'])->name('delete');
   Route::get('/edit', [CategoryController::class, 'edit'])->name('edit');
   Route::post('/update', [CategoryController::class, 'update'])->name('update');
});
// __________________________________________________Category__________________________________________________
Route::prefix('category')->name('category.')->group(function () {
   Route::get('/index', [CategoryController::class, 'index'])->name('index');
   Route::post('/store', [CategoryController::class, 'store'])->name('store');
   Route::get('/fetchall', [CategoryController::class, 'fetchAll'])->name('fetchAll');
   Route::delete('/delete', [CategoryController::class, 'delete'])->name('delete');
   Route::get('/edit', [CategoryController::class, 'edit'])->name('edit');
   Route::post('/update', [CategoryController::class, 'update'])->name('update');
});
// __________________________________________________Brands__________________________________________________
// __________________________________________________Supplier__________________________________________________
// __________________________________________________Vendor__________________________________________________
// __________________________________________________Customer__________________________________________________
<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.layouts.main');
})->name('home');

Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::post('/post-login', [AuthenticationController::class, 'postLogin'])->name('postLogin');
Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/post-register', [AuthenticationController::class, 'postRegister'])->name('postRegister');


Route::prefix('admin')->as('admin.')->middleware('check-admin')->group(function () {
    Route::get('/', function () {
        return view('admin.layouts.main');
    })->name('dashboard');
    Route::prefix('products')->as('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/add-product', [ProductController::class, 'create'])->name('create');
    });
    Route::prefix('categories')->as('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/add-category', [CategoryController::class, 'create'])->name('create');
    });
    Route::prefix('brands')->as('brands.')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::get('/add-brand', [BrandController::class, 'create'])->name('create');
    });
    Route::prefix('users')->as('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    });
    Route::prefix('roles')->as('roles.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
    });
    Route::prefix('permissions')->as('permissions.')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index');
    });
    Route::prefix('carts')->as('carts.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
    });
    Route::prefix('orders')->as('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
    });
    Route::prefix('posts')->as('posts.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
    });
});

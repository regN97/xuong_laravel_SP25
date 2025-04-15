<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/show-product/{id}', [HomeController::class, 'show'])->name('product.show');

// Route login / register
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::post('/post-login', [AuthenticationController::class, 'postLogin'])->name('postLogin');
Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/post-register', [AuthenticationController::class, 'postRegister'])->name('postRegister');
// End Route Login / Register


Route::prefix('admin')->as('admin.')->middleware('check-admin')->group(function () {
    Route::get('/', function () {
        return view('admin.layouts.main');
    })->name('dashboard');
    Route::prefix('products')->as('products.')->group(function () {

        Route::get('/', [ProductController::class, 'index'])->name('index');

        Route::get('/add-product', [ProductController::class, 'create'])->name('create');

        Route::post('/store-product', [ProductController::class, 'store'])->name('store');
        
        Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit');

        Route::patch('/update-product/{id}', [ProductController::class, 'update'])->name('update');

        Route::delete('/delete-product/{id}', [ProductController::class, 'destroy'])->name('destroy');

        Route::get('/detail-product/{id}', [ProductController::class, 'detail'])->name('detail');

        Route::get('/trash-product', [ProductController::class, 'trashed'])->name('trashed');

        Route::patch('/restore-product/{id}', [ProductController::class, 'restore'])->name('restore');

        Route::delete('/force-delete-product/{id}', [ProductController::class, 'forceDelete'])->name('force-delete');
    });

    Route::prefix('categories')->as('categories.')->group(function () {

        Route::get('/', [CategoryController::class, 'index'])->name('index');

        Route::get('/add-category', [CategoryController::class, 'create'])->name('create');

        Route::post('/store-category', [CategoryController::class, 'store'])->name('store');

        Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit');

        Route::patch('/update-category/{id}', [CategoryController::class, 'update'])->name('update');

        Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('destroy');

        Route::get('/detail-category/{id}', [CategoryController::class, 'detail'])->name('detail');


    });

    Route::prefix('brands')->as('brands.')->group(function () {

        Route::get('/', [BrandController::class, 'index'])->name('index');

        Route::get('/add-brand', [BrandController::class, 'create'])->name('create');

        Route::post('/store-brand', [BrandController::class, 'store'])->name('store');

        Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('edit');

        Route::patch('/update-brand/{id}', [BrandController::class, 'update'])->name('update');

        Route::delete('/delete-brand/{id}', [BrandController::class, 'destroy'])->name('destroy');

        Route::get('/detail-brand/{id}', [BrandController::class, 'detail'])->name('detail');

    });

    Route::prefix('users')->as('users.')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('index');

        Route::get('/add-user', [UserController::class, 'create'])->name('create');

        Route::post('/store-user', [UserController::class, 'store'])->name('store');

        Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit');

        Route::patch('/update-user/{id}', [UserController::class, 'update'])->name('update');

        Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('destroy');

        Route::get('/detail-user/{id}', [UserController::class, 'detail'])->name('detail');

    });

    Route::prefix('roles')->as('roles.')->group(function () {

        Route::get('/', [RoleController::class, 'index'])->name('index');

        Route::get('/add-role', [RoleController::class, 'create'])->name('create');

        Route::post('/store-role', [RoleController::class, 'store'])->name('store');

        Route::get('/edit-role/{id}', [RoleController::class, 'edit'])->name('edit');

        Route::patch('/update-role/{id}', [RoleController::class, 'update'])->name('update');

        Route::delete('/delete-role/{id}', [RoleController::class, 'destroy'])->name('destroy');

        Route::get('/detail-role/{id}', [RoleController::class, 'detail'])->name('detail');

    });

    Route::prefix('permissions')->as('permissions.')->group(function () {

        Route::get('/', [PermissionController::class, 'index'])->name('index');

        Route::get('/add-permission', [PermissionController::class, 'create'])->name('create');

        Route::post('/store-permission', [PermissionController::class, 'store'])->name('store');

        Route::get('/edit-permission/{id}', [PermissionController::class, 'edit'])->name('edit');

        Route::patch('/update-permission/{id}', [PermissionController::class, 'update'])->name('update');

        Route::delete('/delete-permission/{id}', [PermissionController::class, 'destroy'])->name('destroy');

        Route::get('/detail-permission/{id}', [PermissionController::class, 'detail'])->name('detail');

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

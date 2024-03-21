<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ValiadateExampleController;
use App\Http\Controllers\ExTransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route Auth
Route::get('/auth/login',  [AuthController::class, 'login'])->name('login');
Route::post('/auth/login',  [AuthController::class, 'doLogin']);
Route::get('/auth/logout',[AuthController::class, 'doLogOut'])->name('logOut');

// Route Admin
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/',  [AdminController::class, 'index'])->name('index');

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/add', [CategoryController::class, 'getAdd']);
        Route::post('/add', [CategoryController::class, 'add']);
        Route::get('/edit/{id}', [CategoryController::class, 'getEdit'])->name('category.gedit');
        Route::post('/edit/', [CategoryController::class, 'postEdit'])->name('category.edit');
        Route::get('/delete/{id}', [CategoryController::class, 'deleteByID']);

        // Route Import-Export CSV Issue 126184
        Route::post('/import', [CategoryController::class, 'import'])->name('category.import');
        Route::get('/export', [CategoryController::class, 'export']);

    });

    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class,'index'])->name('product.index');
        Route::get('/add', [ProductController::class,'getAdd']);
        Route::post('/add', [ProductController::class,'add']);
        Route::get('/edit/{id}', [ProductController::class,'getEdit'])->name('product.gedit');
        Route::post('/edit', [ProductController::class,'edit']);
        Route::get('/delete/{id}', [ProductController::class,'delete']);

        // Route Import-Export CSV Issue 126184
        Route::post('/import', [ProductController::class, 'import'])->name('product.import');
        Route::get('/export', [ProductController::class, 'export']);

    });

});

// Route Validate Issue 126182
Route::get('/validation',[ValiadateExampleController::class,'index']);
Route::post('/validation',[ValiadateExampleController::class,'validateServerSide']);

// Route Transaction Issue 126183
Route::post('/transaction',[ExTransactionController::class],'store');





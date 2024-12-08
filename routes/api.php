<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Brand;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum','log.request'])->group(function () {
    // return $request->user();
    Route::apiResource('brands', BrandController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
    Route::post('logout', [UserController::class, 'logout']);//->middleware('log.request');
});

Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('register', [UserController::class, 'store'])->name('users.store');



// //Menampilkan daftar product
// Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// //Menampilkan formulir produk baru
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// //Menyimpan product baru
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// //Menampilkan detail produk berdasarkan id
// Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// //Menampilkan formulir edit produk berdasarkan id
// Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// //Memperbarui produk berdasarkan id
// Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// //Menghapus produk berdasarkan id
// Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

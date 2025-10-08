<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
    Route::get('/add_category', [AdminController::class, 'addCategory'])->name('admin.add-category');
    Route::post('/post_add_category', [AdminController::class, 'postAddCategory'])->name('admin.post-add-category');
    Route::get('/view_category', [AdminController::class, 'viewCategory'])->name('admin.view-category');
    Route::get('/delete_category/{category}', [AdminController::class, 'deleteCategory'])->name('admin.delete-category');
    Route::get('/edit_category/{category}', [AdminController::class, 'editCategory'])->name('admin.edit-category');
    Route::post('/update_category/{category}', [AdminController::class, 'updateCategory'])->name('admin.update-category');

    Route::get('/add_product', [AdminController::class, 'addProduct'])->name('admin.add-product');
    Route::post('/add_product', [AdminController::class, 'PostAddProduct'])->name('admin.post-add-product');
    Route::get('/view_product', [AdminController::class, 'viewProduct'])->name('admin.view-product');
    Route::get('/delete_product/{product}', [AdminController::class, 'deleteProduct'])->name('admin.delete-product');
    Route::get('/edit-product/{product}', [AdminController::class, 'editProduct'])->name('admin.edit-product');
    Route::post('/update_product/{product}', [AdminController::class, 'updateProduct'])->name('admin.update-product');

});

require __DIR__ . '/auth.php';

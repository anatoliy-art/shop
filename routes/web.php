<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\OptionController as AdminOptionController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\SearchController as AdminSearchController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/dashboard', [SiteController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/category/{id}', [ProductController::class, 'category'])->name('product.category');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('comment/{product}', [ProductController::class, 'comment'])->name('product.comment');
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart-add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart-add/{product}', [CartController::class, 'addCartShow'])->name('cart.add.show');
Route::get('/cart-clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/cart-delete/{key}', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/order', [CartController::class, 'order'])->name('cart.order');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->prefix('admin')->as('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('/orders', AdminOrderController::class);
    Route::resource('/options', AdminOptionController::class);
    Route::resource('/comments', AdminCommentController::class);
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/products', AdminProductController::class);
    Route::get('search/category', [AdminCategoryController::class, 'search'])->name('categories.search');
    Route::get('search/product', [AdminProductController::class, 'search'])->name('products.search');
});

require __DIR__.'/auth.php';

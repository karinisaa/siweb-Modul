<?php
// routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;

// Auth
Route::get('/login',    [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login',   [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register',[AuthController::class, 'register'])->middleware('guest');
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Landing page (user)
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/',                        [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create',         [ProductController::class, 'create'])->name('products.create');
    Route::post('/products',               [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}',      [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}',   [ProductController::class, 'destroy'])->name('products.destroy');
});

// Cart
Route::middleware('auth')->group(function () {
    Route::get('/cart',              [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}',    [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}',[CartController::class, 'remove'])->name('cart.remove');
});
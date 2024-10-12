<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});


// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/add', [AdminController::class, 'add'])->name('admin.product.add');
    Route::patch('/update', [AdminController::class, 'edit'])->name('admin.product.update');
    Route::delete('/delete', [AdminController::class, 'delete'])->name('admin.product.delete');
}); //End of Admin Routes 

// User Routes 
Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile.view');
    Route::get('/update', [UserController::class, 'checkout']);
}); // End of User Routes 

// Default Routes 
Route::get('/index', [DefaultController::class, 'index'])->name('index');
Route::get('/cart', [DefaultController::class, 'cartpage'])->name('cart.view');

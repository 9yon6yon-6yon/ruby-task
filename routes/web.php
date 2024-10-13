<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockHistoryController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('admin.dashboard');
        Route::post('/addnew/product', 'ProductStore')->name('admin.addnewproduct');
        Route::get('/add/product', 'viewProductForm')->name('admin.viewaddproduct');

        Route::get('/list/products',  'listProducts')->name('admin.listproducts');
        Route::get('/view/product/{id}',  'ProductView')->name('admin.product.details');

        Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
        Route::post('/add',  'add')->name('admin.product.add');
        Route::patch('/update',  'edit')->name('admin.product.update');
        Route::delete('/delete',  'delete')->name('admin.product.delete');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('all/category/', 'AllCategory')->name('admin.viewallcategory');
        Route::get('add/category/', 'AddCategory')->name('admin.addcategory');
        Route::post('store/category/', 'StoreCategory')->name('admin.addnewcategory');
    });
});
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
//End of Admin Routes 
// User Routes 
Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile.view');
    Route::get('/update', [UserController::class, 'checkout']);
});
Route::get('/user/login', [UserController::class, 'UserLogin'])->name('user.login');
// End of User Routes 

// Default Routes 
Route::get('/index', [DefaultController::class, 'index'])->name('index');
Route::get('/cart', [DefaultController::class, 'cartpage'])->name('cart.view');

require __DIR__ . '/auth.php';

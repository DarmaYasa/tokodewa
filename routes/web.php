
<?php

use App\Http\Controllers\User\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/admin', function() {
    return redirect('/admin/dashboard');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login']);

    Route::middleware('auth:admin')->group(function() {
        Route::post('logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('logout');
        Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
        Route::resource('product-categories', App\Http\Controllers\Admin\ProductCategoryController::class);
        Route::resource('transcations', App\Http\Controllers\Admin\TranscationController::class);
        Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    });
});

Route::prefix('/products')->name('products.')->group(function() {
    Route::get('/', [App\Http\Controllers\User\ProductController::class, 'index'])->name('index');
    Route::get('/{product}', [App\Http\Controllers\User\ProductController::class, 'show'])->name('show');
});

Route::prefix('/carts')->name('carts.')->group(function() {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/', [CartController::class, 'store'])->name('store');
});


<?php

use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\User\UserController;
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

Auth::routes(['verify' => true]);

Route::get('/admin', function() {
    return redirect('/admin/dashboard');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'service'])->name('service');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('/contact', App\Http\Controllers\SendContactEmailController::class)->name('contact.post');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login']);

    Route::middleware('auth:admin')->group(function() {
        Route::post('logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('logout');
        Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
        Route::resource('product-categories', App\Http\Controllers\Admin\ProductCategoryController::class);
        Route::resource('transactions', App\Http\Controllers\Admin\TranscationController::class);
        Route::get('transactions/{transaction}/print', [App\Http\Controllers\Admin\TranscationController::class, 'print'])->name('transactions.print');
        Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
        Route::get('services/{service}/print', [App\Http\Controllers\Admin\ServiceController::class, 'print'])->name('services.print');
        Route::resource('admins', App\Http\Controllers\Admin\AdminController::class);
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
        Route::get('profile', [App\Http\Controllers\Admin\ProfileController::class, 'showForm'])->name('profile');
        Route::post('profile', [App\Http\Controllers\Admin\ProfileController::class, 'updateProfile'])->name('profile.store');
    });
});

Route::prefix('/products')->name('products.')->group(function() {
    Route::get('/', [App\Http\Controllers\User\ProductController::class, 'index'])->name('index');
    Route::get('/{product}', [App\Http\Controllers\User\ProductController::class, 'show'])->name('show');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::prefix('/carts')->name('carts.')->group(function() {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/', [CartController::class, 'store'])->name('store');
        Route::put('/{cart}', [CartController::class, 'update'])->name('update');
        Route::delete('/{cart}', [CartController::class, 'destroy'])->name('destroy');
    });

    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::get('/profile', [UserController::class, 'showUpdateProfile']);
    Route::post('/profile', [UserController::class, 'updateProfile']);
});

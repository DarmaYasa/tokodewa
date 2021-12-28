<?php

use App\Http\Controllers\API\Admin\AdminController;
use App\Http\Controllers\API\Admin\ProductCategoryController;
use App\Http\Controllers\API\Admin\ProductController;
use App\Http\Controllers\API\Admin\ProfileController;
use App\Http\Controllers\API\Admin\ServiceController;
use App\Http\Controllers\API\Admin\TranscationController;
use App\Http\Controllers\API\Admin\UserController;
use App\Http\Controllers\API\User\CartController;
use App\Http\Controllers\API\User\ProductController as UserProductController;
use App\Http\Controllers\API\User\TransactionController;
use App\Http\Controllers\API\User\UserController as UserUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::group(['prefix' => 'user'], function () {
    Route::apiResource('products', UserProductController::class)->only(['show', 'index']);

    Route::group(['middleware' => ['auth:admin_api']], function () {
        Route::apiResource('carts', CartController::class);
        Route::post('transaction', [TransactionController::class, 'store']);
        Route::post('update-profile', [UserUserController::class, 'updateProfile']);
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin_api']], function () {
    Route::apiResource('admin', AdminController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('product-categories', ProductCategoryController::class);
    Route::post('profile', [ProfileController::class, 'updateProfile']);
    Route::apiResource('services', ServiceController::class);
    Route::apiResource('transactions', TranscationController::class);
    Route::apiResource('users', UserController::class);
});

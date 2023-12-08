<?php

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

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/product');

Route::prefix('login')->group(function () {
    Route::get('', [HomeController::class, 'getLogin']);
    Route::post('', [HomeController::class, 'postLogin']);
});
Route::get('logout', [HomeController::class, 'logout']);
Route::get('register', [HomeController::class, 'register']);
Route::post('register', [HomeController::class, 'postRegister']);

Route::resource('product', ProductController::class);
Route::resource('product/{product_id}/image', ProductImageController::class);

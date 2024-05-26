<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
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

Route::get('login', [Login::class, 'index'])->name('login');
Route::post('login', [Login::class, 'attmpLogin'])->name('login');
Route::post('logout', [Login::class, 'logout'])->name('logout');
Route::get('register', [Register::class, 'index'])->name('register');
Route::post('register', [Register::class, 'attemRegis'])->name('register');

Route::get('/', [\App\Http\Controllers\User\Dashboard::class, 'index'])->name('index');
Route::get('/order/{id}', [\App\Http\Controllers\User\Order::class, 'index'])->name('order')->middleware('auth');
Route::post('/order/{id}', [\App\Http\Controllers\User\Order::class, 'create'])->name('order')->middleware('auth');
Route::delete('/order/delete/{id}', [\App\Http\Controllers\User\Order::class, 'delete'])->name('order/delete')->middleware('auth');

Route::get('/cart', [\App\Http\Controllers\User\Cart::class, 'index'])->name('cart')->middleware('auth');
Route::post('/payment/{id}', [\App\Http\Controllers\User\Cart::class, 'payment'])->name('payment')->middleware('auth');
Route::get('/invoce/{id}', [\App\Http\Controllers\User\Cart::class, 'invoce'])->name('invoce')->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::middleware(['merchant'])->group(function () {
        Route::get('/merchant', [\App\Http\Controllers\Merchant\Dashboard::class, 'index'])->name('merchant');
        Route::resource('/merchant/toko', \App\Http\Controllers\Merchant\Merchant::class);
        Route::resource('/merchant/menu', \App\Http\Controllers\Merchant\Menu::class);
        Route::resource('/merchant/order', \App\Http\Controllers\Merchant\Menu::class);
        Route::get('order-user', [App\Http\Controllers\Merchant\Order::class, 'index'])->name('order-user');
    });
    // Route::resource('/merchant/invoce', \App\Http\Controllers\Merchant\Menu::class);
});

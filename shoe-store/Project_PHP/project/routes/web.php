<?php

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

Route::get('/', function () {
    return view('index');
})->name('mainpage');

require __DIR__.'/auth.php';

Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::resource('/user', \App\Http\Controllers\UserController::class);

Route::redirect('/admin','/admin/dashboard');
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware(['auth','admin'])->name('admin.dashboard');
Route::resource('/admin/users', \App\Http\Controllers\Admin\UsersController::class)->middleware(['auth','admin'])->names([
    'index' => 'admin.users.index',
    'store' => 'admin.users.store',
    'create' => 'admin.users.create',
    'show' => 'admin.users.show',
    'update' => 'admin.users.update',
    'destroy' => 'admin.users.destroy',
    'edit' => 'admin.users.edit',
]);
Route::resource('/admin/products', \App\Http\Controllers\Admin\ProductsController::class)->middleware(['auth','admin'])->names([
    'index' => 'admin.products.index',
    'store' => 'admin.products.store',
    'create' => 'admin.products.create',
    'show' => 'admin.products.show',
    'update' => 'admin.products.update',
    'destroy' => 'admin.products.destroy',
    'edit' => 'admin.products.edit',
]);

Route::resource('/admin/products/{product}/shelves', \App\Http\Controllers\Admin\ShelvesController::class)->middleware(['auth','admin']);

Route::resource('products', \App\Http\Controllers\ProductController::class);


Route::get('/women', '\App\Http\Controllers\ProductController@women')->name('products.women');
Route::get('/men', '\App\Http\Controllers\ProductController@men')->name('products.men');
Route::get('{category}/search', '\App\Http\Controllers\ProductController@search')->name('products.search');
Route::post('{category}/search', '\App\Http\Controllers\ProductController@search')->name('products.search');


Route::resource('carts', \App\Http\Controllers\CartController::class);
Route::post('products/{product}/add', '\App\Http\Controllers\CartController@store')->name('carts.store');
Route::get('products/{product}/add', '\App\Http\Controllers\CartController@store')->name('carts.store');

Route::resource('/user', \App\Http\Controllers\UserController::class);

Route::resource('products.reviews', \App\Http\Controllers\ReviewController::class);
Route::get('products/{product}/reviews/create', '\App\Http\Controllers\ReviewController@create')->middleware(['auth'])->name('products.reviews.create');

Route::get('products/{products}', 'App\Http\Controllers\ProductController@show')->name('products');

/*Route::post('carts/{cart}', 'App\Http\Controllers\CartController@show')->name('carts.show');*/

Route::get('order/{order}', '\App\Http\Controllers\OrderController@showProducts')->name('orders.showProducts');

Route::get('orders', [App\Http\Controllers\OrderController::class, 'index'])->middleware('prevent-back-history')->name('orders.index');
Route::post('orders/{orders}', '\App\Http\Controllers\OrderController@withoutLoginIndex')->middleware('prevent-back-history')->name('orders.withoutLoginIndex');


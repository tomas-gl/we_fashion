<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\CategoryAdminController;
use App\Http\Controllers\HomeController;

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
    return redirect('/products');
});

Route::controller(ProductController::class)->prefix('products')->group(function(){
    Route::get('', 'index')->name("index");
    Route::get('/{id}', 'getProduct')->name("product");
    Route::get('/status/{status}','getSolde')->name("product.status");
    Route::get('/category/{category_slug}','getCategory')->name("product.category");
});

Auth::routes();

Route::get('/admin', function () {
    return redirect('/admin/products');
});

Route::resource('admin/products',ProductAdminController::class)->middleware('auth')->parameters([
    'admin/products' => 'product',
]);

Route::resource('admin/categories',CategoryAdminController::class)->middleware('auth')->parameters([
    'admin/categories' => 'category',
]);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

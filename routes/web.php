<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductAdminController;

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

// Route::get('/admin', function () {
//     return redirect('/login');
// });

Route::resource('admin',ProductAdminController::class)->middleware('auth')->parameters([
    'admin/products' => 'product',
]);

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

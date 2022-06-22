<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
    Route::get('', 'index');
    Route::get('/solde','getStatus');
    Route::get('/{category_slug}','getCategory');
});


// Route::get('/products', [ProductController::class, 'index']);
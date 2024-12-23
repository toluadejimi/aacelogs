<?php

use App\Http\Controllers\Api\Authcontroller;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;




Route::any('e-fund',  'User\UserController@e_fund')->name('e-fund');
Route::any('e-check',  'User\UserController@e_check')->name('e-check');



Route::get('get-categories',  [CategoryController::class, 'get_categories']);
Route::get('get-all-products',  [ProductController::class, 'get_all_products']);
Route::get('get-products-by-category',  [ProductController::class, 'get_products_by_category']);
Route::post('buy-product',  [ProductController::class, 'buy_product']);




Route::post('get-token',  [Authcontroller::class, 'get_token']);

Route::middleware('auth:sanctum')->group(function () {
   

});


<?php

use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\FrontController;
use Illuminate\Http\Request;
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
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    
// });
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout',[LoginController::class,'logout']);
    Route::controller(FrontController::class)->group(function(){
        Route::get('my-orders','myOrders');
        Route::get('view-order/{id}','viewOrders');
    });
});
 
Route::controller(FrontController::class)->group(function(){
    Route::get('/','index');
    Route::get('get-product/{id}','product');
    Route::get('get-category/{id}','category');
    Route::get('all-products','products');
    Route::get('product-list','productList');
    Route::post('search','search');
});

Route::controller(LoginController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
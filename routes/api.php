<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
	Route::post("products",[ProductController::class,'store'])->name('products.store');
	
	Route::get("products",[ProductController::class,'index'])->name('products.index');
	
	Route::post("products/{id}",[ProductController::class,'show']);

	Route::delete("products/{id}",[ProductController::class,'destroy'])->name('products.destroy');	
});
	
Route::post("login",[UserController::class,'index']);

Route::post("register",[UserController::class,'register']);

Route::post("cart",[CartController::class,'store']);

Route::put("cart/{id}",[CartController::class,'update']);

Route::delete("cart/{id}",[CartController::class,'destroy']);

Route::get("cart",[CartController::class,'index']);
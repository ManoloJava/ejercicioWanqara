<?php

use App\Http\Controllers\ProductoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users','UserController@store');
Route::post('login','UserController@login');

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::ApiResource(name:'producto',controller:'ProductoController');
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::ApiResource(name:'categoria',controller:'CategoriaController');
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::ApiResource(name:'categoriaProducto',controller:'CategoriaProductoController');
});
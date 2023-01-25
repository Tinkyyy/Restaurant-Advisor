<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* Menus Part */
Route::apiResource('restaurant/{id}/menus', 'MenuController')->only(['index']); //Get all menus of one restaurant.
Route::apiResource('restaurant/{id}/menu', 'MenuController')->only(['store', 'destroy', 'update']); //So much things

/* Restaurants Part */
Route::apiResource('restaurants', 'RestaurantController')->only(['index']); //Get all restaurants.
Route::apiResource('restaurant', 'RestaurantController')->only(['store', 'destroy', 'update']); //So much things

/* Users Part */
Route::apiResource('users', 'UserController')->only(['index']);
Route::apiResource('register', 'UserController')->only(['store']);

Route::get('user/{id}', 'UserController@getUserById')->name('getUserById');
Route::post('auth', 'UserController@login')->name('login');

/* Review Part */
Route::apiResource('restaurant/{id}/reviews', 'ReviewController')->only(['index']);
Route::apiResource('restaurant/{id}/review', 'ReviewController')->only(['store', 'destroy', 'update']);

Route::get('user/{id}', 'UserController@getUserById')->name('getUserById');
Route::post('auth', 'UserController@login')->name('login');

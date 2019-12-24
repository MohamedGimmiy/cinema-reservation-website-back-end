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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */


//1. user table all resources operations @(first param is url, second param is file location)
Route::apiResource('user', 'Api\UserController')->except(['login']);

Route::post('userLogin', 'Api\UserController@login');

//2. Screen table all resources operations .....

Route::apiResource('screen', 'Api\ScreenController');


//3. Movie table all resources operations .....

Route::apiResource('movie', 'Api\MovieController');

//4. Reservation table show reservation by id and link it with movie name and date of reservation

Route::apiResource('reservation', 'Api\ReservationController');

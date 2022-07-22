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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('customers', 'API\CustomersAPIController@show');
Route::get('gender-graph', 'API\CustomersAPIController@genderGraphic');
// Route::get('emails', 'API\CustomersAPIController@show');
// Route::get('lastname', 'API\CustomersAPIController@show');

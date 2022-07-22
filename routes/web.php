<?php

use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'customers/index', 301);

Route::get('/customers/import', 'CustomersImportController@show');
Route::post('/customers/import', 'CustomersImportController@store');

Route::get('/customers/index', 'CustomerController@show');


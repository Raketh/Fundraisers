<?php

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

Route::get('/', 'FundraiserController@index');
Route::post('/fundraiser', 'FundraiserController@store');
Route::get('/fundraiser/create', 'FundraiserController@create');
Route::get('/fundraiser/{fundraiser}', 'FundraiserController@show');
Route::get('/fundraiser/{fundraiser}/writeReview', 'ReviewController@create');
Route::post('/fundraiser/{fundraiser}', 'ReviewController@store');

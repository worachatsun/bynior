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

Route::get('/', function () {
    return view('backdrop');
});


Route::get('5fe57832fa2da80dc3543a3e893e589d/{id}', 'AccountController@checkIn');

Route::get('random', 'AccountController@random');

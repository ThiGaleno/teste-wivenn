<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('client', 'App\Http\Controllers\ClientController@store')->name('client.store');
Route::get('client', 'App\Http\Controllers\ClientController@store')->name('client');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

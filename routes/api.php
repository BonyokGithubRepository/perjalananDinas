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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('jabatan')->group(function () {
    Route::get('/', 'jabatanController@index');
    Route::post('/create', 'jabatanController@store');
    Route::put('/update/{id}', 'jabatanController@update');
    Route::delete('/delete/{id}', 'jabatanController@destroy');
});


Route::prefix('spt')->group(function () {
    Route::get('/', 'sptController@index');
    Route::post('/create', 'sptController@store');
    Route::put('/update/{id}', 'sptController@update');
    Route::delete('/delete/{id}', 'sptController@destroy');
});

Route::prefix('kwitansi')->group(function () {
    Route::get('/', 'kwitansiController@index');
    Route::post('/create', 'kwitansiController@store');
    Route::put('/update/{id}', 'kwitansiController@update');
    Route::delete('/delete/{id}', 'kwitansiController@destroy');
});

Route::prefix('user')->group(function () {
    Route::get('/', 'userController@index');
    Route::post('/create', 'userController@store');
    Route::put('/update/{id}', 'userController@update');
    Route::delete('/delete/{id}', 'userController@destroy');
});
<?php

use Illuminate\Http\Request;

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

Route::get('/novoano','AnoLetivoController@create');
Route::get('/anoletivo', 'AnoLetivoController@indexJson');
Route::get('/anoatual', 'AnoLetivoController@index');

Route::get('/listausuarios', 'UserController@indexJson');
Route::get('/qtdusuarios', 'UserController@countUsers');

Route::get('/turmas', 'TurmasController@indexJson');
Route::post('/novaturma', 'TurmasController@store');
Route::delete('/turmas/{id}', 'TurmasController@destroy');

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

Route::get('/usuarios', 'UserController@indexJson');
Route::post('/novousuario', 'UserController@store');
Route::delete('/usuario/{id}', 'UserController@destroy');

Route::post('/funcionario/novo', 'FuncionarioController@store');
Route::get('/funcionarios', 'FuncionarioController@index');
Route::get('/contagemfuncionarios', 'FuncionarioController@count');
Route::delete('/funcionarios/{id}', 'FuncionarioController@destroy');
Route::get('/funcionarios/removidos', 'FuncionarioController@trashes');
Route::delete('/funcionarios/excluir/{id}', 'FuncionarioController@forceDestroy');
Route::post('/funcionarios/restaurar/{id}', 'FuncionarioController@restaurar');
Route::get('/qtdprofs', 'FuncionarioController@countProfs');

Route::post('/aluno/novo', 'AlunoController@store');
Route::get('/alunos', 'AlunoController@index');
Route::get('/contagemalunos', 'AlunoController@count');
Route::delete('/aluno/{id}', 'AlunoController@destroy');
Route::get('/alunos/removidos', 'AlunoController@trashes');
Route::delete('/aluno/excluir/{id}', 'AlunoController@forceDestroy');
Route::post('/aluno/restaurar/{id}', 'AlunoController@restaurar');

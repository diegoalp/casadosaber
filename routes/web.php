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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/turmas', 'HomeController@turmas')->name('turmas');
Route::get('/usuarios', 'HomeController@usuarios')->name('usuarios');
Route::get('/funcionarios', 'HomeController@funcionarios')->name('funcionarios');
Route::get('/funcionario/novo', 'HomeController@addFuncionario')->name('addfunc');
Route::get('/funcionarios/removidos', 'HomeController@funcionariosRemovidos')->name('funcremovidos');
Route::get('/aluno/novo', 'HomeController@addAluno')->name('addaluno');
Route::get('/alunos', 'HomeController@alunos')->name('alunos');

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
Route::middleware(['auth'])->group(function () {
Route::get('/', 'HomeController@index')->name('home');
Route::get('/turmas', 'HomeController@turmas')->name('turmas');
Route::get('/usuarios', 'HomeController@usuarios')->name('usuarios');
Route::get('/funcionarios', 'HomeController@funcionarios')->name('funcionarios');
Route::get('/professores', 'HomeController@professores')->name('professores');
Route::get('/funcionario/novo', 'HomeController@addFuncionario')->name('addfunc');
Route::get('/funcionarios/removidos', 'HomeController@funcionariosRemovidos')->name('funcremovidos');
Route::get('/aluno/novo', 'HomeController@addAluno')->name('addaluno');
Route::get('/alunos', 'HomeController@alunos')->name('alunos');
Route::get('/aluno/{matricula}', 'AlunoController@verAluno');

//Rotas admin
Route::get('/novoano','AnoLetivoController@create');
Route::get('/anoletivo', 'AnoLetivoController@indexJson');
Route::get('/anoatual', 'AnoLetivoController@index');

Route::get('/listausuarios', 'UserController@indexJson');
Route::get('/qtdusuarios', 'UserController@countUsers');

Route::get('/listaturmas', 'TurmasController@indexJson');
Route::get('/todasturmas', 'TurmasController@listaTurmas');
Route::post('/novaturma', 'TurmasController@store');
Route::delete('/turmas/{id}', 'TurmasController@destroy');

Route::post('/novousuario', 'UserController@store');
Route::delete('/usuario/{id}', 'UserController@destroy');

Route::post('/funcionario/novo', 'FuncionarioController@store');
Route::get('/listafuncionarios', 'FuncionarioController@index');
Route::get('/listafuncionarios/professores', 'FuncionarioController@indexProfessores');
Route::get('/contagemfuncionarios', 'FuncionarioController@count');
Route::delete('/funcionarios/{id}', 'FuncionarioController@destroy');
Route::get('/listafuncionarios/removidos', 'FuncionarioController@trashes');
Route::delete('/funcionarios/excluir/{id}', 'FuncionarioController@forceDestroy');
Route::post('/funcionarios/restaurar/{id}', 'FuncionarioController@restaurar');
Route::get('/qtdprofs', 'FuncionarioController@countProfs');

Route::post('/aluno/cadastrar', 'AlunoController@store');
Route::get('/listaalunos', 'AlunoController@index');
Route::get('/contagemalunos', 'AlunoController@count');
Route::delete('/aluno/{id}', 'AlunoController@destroy');
Route::get('/alunos/removidos', 'AlunoController@trashes');
Route::delete('/aluno/excluir/{id}', 'AlunoController@forceDestroy');
Route::post('/aluno/restaurar/{id}', 'AlunoController@restaurar');
Route::get('/responsaveis/{id}','PaiController@responsaveis');

Route::post('/arquivo/cameras', 'AcessoCameraController@store')->name('acesso_cameras');
Route::post('/arquivo/rotina', 'RotinaController@store')->name('nova_rotina');

Route::get('/matricula/{id}','MatriculaController@matriculaAluno');
Route::post('/efetuarmatricula','MatriculaController@store');
});

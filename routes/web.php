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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categoria', 'CategoriaController')->middleware('auth');
Route::put('/categoria/search', ['uses'=>'CategoriaController@search', 'as'=>'categoria.search']);

Route::resource('servico', 'ServicoController')->middleware('auth');
Route::put('/servico/search', ['uses'=>'ServicoController@search', 'as'=>'servico.search']);

Route::resource('paciente', 'PacienteController')->middleware('auth');

Route::resource('especialista', 'EspecialistaController')->middleware('auth');

Route::resource('doenca', 'DoencaController')->middleware('auth');
Route::put('/doenca/search', ['uses'=>'DoencaController@search', 'as'=>'doenca.search']);

Route::resource('atendimento', 'AtendimentoController')->middleware('auth');
Route::get('/atendimento/paciente/{id}', ['uses'=>'AtendimentoController@atendimentos_paciente', 'as'=>'atendimento.atendimentos_paciente'])->middleware('auth');
Route::get('/atendimento/especialista/{id}', ['uses'=>'AtendimentoController@atendimentos_especialista', 'as'=>'atendimento.atendimentos_especialista'])->middleware('auth');

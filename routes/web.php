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

Route::get('/pacientes', 'PacienteController@index');

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => ['web']], function(){
	Route::get('/servicos', 'ServicoController@index');

	Route::get('/visualizar-servico/3', function () {
	    return view('servico/visualizar');
	});

	// apenas cliente
	Route::get('/cartoes', 'CartaoController@index');
	Route::get('/cartao/adicionar', 'CartaoController@telaAdicionar');

	Route::get('/servico/adicionar', 'ServicoController@telaAdicionar');
});

Route::get('/', function () {
    return view('home');
});

Auth::routes();
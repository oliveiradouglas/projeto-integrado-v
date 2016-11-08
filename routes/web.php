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

Route::group(['middleware' => ['auth']], function(){
	Route::get('/servicos', 'ServicoController@index');

	Route::get('/visualizar-servico/3', function () {
	    return view('servico/visualizar');
	});

	Route::get('/cartoes', function () {
	    return view('cartao/index');
	});

	Route::get('/cartao/adicionar', function () {
	    return view('cartao/adicionar');
	});

	Route::get('/servico/adicionar', function () {
	    return view('servico/adicionar');
	});

	Route::get('/', function () {
	    return view('welcome');
	});
});

Route::get('home', function(){
	return redirect('/servicos');
});

Auth::routes();


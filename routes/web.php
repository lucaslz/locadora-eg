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

	$dados = [
		"activeListar" => "class=active"
	];

    return view('locadora-padrao.padrao', $dados);
})->name('home');


Route::get('/filme/cadastrar', function(){

	$dados = [
		"activeCadastrar" => "class=active"
	];

	return view('cadastrar-filme', $dados);
})->name('cadastrarFilme');
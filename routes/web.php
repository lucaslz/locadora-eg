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

//Chama a tela de lgin
Route::get('/','Login@showLogin')->name('login');
Route::get('login','Login@showLogin')->name('login');

//Chama faz a autententicacao do usuario
Route::post('login/validar','Login@doLogin')->name('doLogin');

//Faz o logout do usuario no sistema
Route::get('logout','Login@logout')->name('logout');

//Agrupamento de rotas do filme
Route::prefix('filme')->group(function () {

	//Rota home da locadora de ǘideos
	Route::get('/','Filmes@listarFilmes')->name('home');

	//Rota para cadastrar o filme
	Route::get('cadastrar', 'Filmes@cadastrarFilme')->name('cadastrarFilme');

	//Rota que insere e valida o cadastro de um filme
	Route::post('create', 'Filmes@create')->name('createFilme');

	//Rota para cadastrar um genero pro fil
	Route::get('controlarGenero', 'Filmes@controlarGenero')->name('controlarGenero');

	//Rota para salvar o genero no banco de dados
	Route::post('genero', 'Filmes@deletarECadastrarGenero')->name('deletarECadastrarGenero');

	//Rota para visualizacao de filmes
	Route::get('visualizar/{idFilme?}', 'Filmes@visualizarFilme')->name('visualizarFilme');

	//Rota para alterar o filme
	Route::get('alterar/{idFilme?}', 'Filmes@alterarFilme')->name('alterarFilme');

	//Rota para dar update o filme
	Route::post('update', 'Filmes@update')->name('updateFilme');

	//Rota para dar um delete em um filme especifico
	Route::post('delete', 'Filmes@delete')->name('deleteFilme');

	//Rotar para alugar um filme
	Route::get('alugar/{idFilme?}', 'Filmes@valugarFilme')->name('alugarFilme');

});


//Rotas para controle e gerenciamento de usuarios
Route::prefix('clientes')->group(function () {

	//Rota home da locadora de ǘideos
	Route::get('/','Clientes@listarClientes')->name('clientes');

	//Rota para cadastrar Clientes
	Route::get('cadastrar', 'Clientes@cadastrarClientes')->name('cadastrarCliente');

	//Rota que cadastra um novo cliente
	Route::post('cadastrar/validar', 'Clientes@cadastrarValidarClientes')->name('cadastrarValidar');

	//Rota que preenche a tela de alterar dados
	Route::get('alterar/{idCliente?}', 'Clientes@alterarClientes')->name('alterarCliente');

	//Rota que altera o cliente e o endereco do cliente
	Route::post('alterar/validar', 'Clientes@alterarValidarClientes')->name('alterarValidarCliente');

	//Rota que deleta um cliente juntamente com seu endereco
	Route::get('deletar/{idClienteEndereco?}', 'Clientes@deletarClientes')->name('deletarCliente');
});
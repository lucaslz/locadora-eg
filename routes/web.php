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

//Rota principal de login
Route::get('/','Login@showLogin')->name('login');

//Chama a tela de login
Route::prefix('login')->group(function () {
	//Chama faz a autententicacao do usuario
	Route::post('validar','Login@doLogin')->name('doLogin');

	//Faz o logout do usuario no sistema
	Route::get('logout','Login@logout')->name('logout');

	//Rota para da pagina de alteracao e visualizacao de usuario
	Route::get('alterar','Login@alterar')->name('loginAlterar');

	//Rota que da update no banco de dados
	Route::post('alterar/validar','Login@alterarValidar')->name('loginAlterarValidar');

	//Rota que abre a tela de controle de usuario
	Route::get('controle', 'Login@controleUsuario')->name('controle');

	//Rota para alterar um usuario que veio da tela de controle
	Route::get('controle/alterar/{id?}', 'Login@controleUsuarioAlterar')->name('controleAlterar');

	//Rota para alterar a senha
	Route::post('resete', 'Login@resetePassword')->name('resetePassword');

	//Rota para criar um usuario
	Route::post('criar', 'Login@criarPassword')->name('criarPassword');
});

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
	Route::post('alugar/{idFilme?}', 'Filmes@alugarFilme')->name('alugarFilme');

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

	//Rota para debitar filme de usuario
	Route::get('pagar/{idClienteEndereco?}', 'Clientes@pagarClientes')->name('pagarClientes');
});


//Rotas para controle e gerenciamento de usuarios
Route::prefix('precos')->group(function () {

	//Rota home da locadora de ǘideos
	Route::get('/','Precos@gerenciarPreco')->name('gerenciarPreco');

	//Rota responsavel por alterar preco e alterar o desconto
	Route::post('controle', 'Precos@precoDesconto')->name('precoDesconto');

	//Rota responsavel por incluir o preco e o desconto
	Route::post('incluir', 'Precos@precoDescontoIncluir')->name('precoDescontoIncluir');
});

//Rotas para controle e gerenciamento de relatorios
Route::prefix('relatorios')->group(function () {

	//Rota principal dos relatorios
	Route::get('/','Relatorios@iniciaRelatorio')->name('listarRelatorios');

	//Rota dos relatorios semanal
	Route::post('semanal','Relatorios@semanalRelatorios')->name('semanalRelatorios');

});
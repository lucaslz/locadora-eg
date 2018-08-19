<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\TraitData;
use App\Model as Model;
use Validator;

class Relatorios extends Controller
{

    /**
     * Construtor da classe
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Retorna o relatório de vendas
     *
     * @access public
     */
    public function iniciaRelatorio()
    {
        //Dados a serem retornados para a view
    	$dados = [
    		"activeRelatório" => "class=active",
    		"relatorioSelect" => [
    			[
    				"id" => 0,
    				"nome" => "Semanal"
    			],
    			[
    				"id" => 1,
    				"nome" => "Mensal"
    			]
    		],
    	];

        //View que ira renderizar os dados
    	return view('relatorios.relatorios', $dados);
    }


    /**
     * Retorna o relatorio de acordo com o tipo que o usuarioo selecionar
     *
     * @access public
     */
    public function semanalRelatorios(Request $request)
    {
    	//Pegando o id do relatorio
    	$idRelatorio = $request->all()['idRelatorio'];

   		//Defininco os dados
    	$dados = [
    		"activeRelatório" => "class=active",
    		"relatorioSelect" => [
    			[
    				"id" => 0,
    				"nome" => "Semanal"
    			],
    			[
    				"id" => 1,
    				"nome" => "Mensal"
    			]
    		],
    	];

    	//Mensagem a ser exibida
    	$dados['msnRelatorio'] = $idRelatorio == 0 ? "Semanal" : "Mensal";

    	//pegando os dados
    	$inf = Model\Locacoe::sltRelatorioSemanal($idRelatorio);
    	
        //Formatando a data
        $relatorio = TraitData::formatarDataHoraRelatorio($inf['relatorio']);

        //Organizando e retornando os dados
        $dados['relatorio'] = $inf['relatorio'];
    	$dados['saldo'] = $inf['saldo'];
        
        //View que ira renderizar os dados
    	return view('relatorios.relatorios', $dados);
    }
}

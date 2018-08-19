<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model as Model;
use App\Enum as Enum;
use Validator;

class Precos extends Controller
{
    /**
     * Construtor da classe
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function gerenciarPreco()
    {
        //Dados a serem retornados para a view
    	$dados = [
    		"activePreco" => "class=active",
    		"fazerPreco" => [
	    		[
	    			"id" => 1,
	    			"preco" => "Alterar Preço",
	    		],
	    		[
	    			"id" => 2,
	    			"preco" => "Alterar Desconto",
	    		]
    		],
        	"precoAluguel" => current(
        		Model\Preco::sltPrecoAndDesconto()
        	),
    	];
        // var_dump($dados);die();
        //View que ira renderizar os dados
    	return view('precos.controle-precos', $dados);
    }

    /**
     * Metodo responsavel por alterar ou incluir
     * um preço e um desconto
     * 
     * @param  Request $request  [variavel de requisicao]
     * @return [mixed]           [retorno com status]
     */
    public static function precoDesconto(Request $request)
    {
        $dados = $request->all();

        //Valida os dados dependendo da decicao
        if($dados['decisao'] == 1) {
            //Setando configuracoes de validacao
            $validator = Validator::make($request->all(), [
                'preco' => 'required|numeric',
            ]);
        }elseif($dados['decisao'] == 2) {
            //Setando configuracoes de validacao
            $validator = Validator::make($request->all(), [
                'desconto' => 'required|numeric',
            ]);
        }

        //Validando os campos do formulario
        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all()
            );
        }
        
        //Inserindo ou alterando os precos e descontos
        if (is_null($dados['id']) || empty($dados['id'])) {
           $result = Model\Preco::insPrecoDesconto($dados); 
        } elseif(!empty($dados['id'])) {
            $result = Model\Preco::updPrecoDesconto($dados);
        }else {
            //Caso houver algum erro
            return redirect()->back()->with(
                'error',
                'Não foi possivel realizar a operação!'
            );
        }
        // var_dump($result); die();
        //Retorna uma mensagem para o usuario
        if (isset($result) && ($result == 1 | $result == true)) {
            return redirect()->back()->with(
                'success',
                'Operação realizada com sucesso!'
            );
        }
        //Caso houver algum erro
        return redirect()->back()->with(
            'error',
            'Não foi possivel realizar a operação!'
        );
    }
}

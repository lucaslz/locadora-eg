<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model as Model;
use App\Enum as Enum;

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
                    "preco" => "Incluir Preço",
                ],
	    		[
	    			"id" => 2,
	    			"preco" => "Alterar Preço",
	    		],
	    		[
	    			"id" => 3,
	    			"preco" => "Alterar Desconto",
	    		]
    		],
        	"precoAluguel" => current(
        		Model\Preco::sltPrecoAndDesconto()
        	),
    	];

        //View que ira renderizar os dados
    	return view('precos.controle-precos', $dados);
    }

    public static function precoDesconto(Request $request)
    {
        $dados = $request->all();

        if ($dados['decisao'] == Enum\Preco::ALTERAR_PRECO) {
            $result= Model\Preco::find($dados['id'])->update(
            	['valor' => $dados['preco']]
            );
            $frase = "Preço Alterado";
        }else if($dados['decisao'] == Enum\Preco::ALTERAR_DESCONTO){
            $result = Model\Preco::find($dados['id'])->update(
            	['desconto' => $dados['desconto']]
            );
            $frase = "Desconto Alterado";
        }

        //Retorna uma mensagem para o usuario
        if ($result === true) {
            return redirect()->back()->with(
                'success',
                $frase . ' com sucesso!'
            );
        }
        //Caso houver algum erro
        return redirect()->back()->with(
            'error',
            'Não foi possível fazer nenhuma altecação!'
        );
    }
}

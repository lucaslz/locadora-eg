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
                    "preco" => "Incluir Preço e Desconto",
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

        //Valida os dados dependendo da decicao
        if ($dados['decisao'] == 1) {
            //Setando configuracoes de validacao
            $validator = Validator::make($dados, [
                'valor' => 'required|numeric',
                'desconto' => 'required|numeric',
            ]);
        } elseif($dados['decisao'] == 2) {
            //Setando configuracoes de validacao
            $validator = Validator::make($request->all(), [
                'preco' => 'required|numeric',
            ]);
        }else {
            //Setando configuracoes de validacao
            $validator = Validator::make($request->all(), [
                'descontoAlt' => 'required|numeric',
            ]);
        }

        //Validando os campos do formulario
        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all()
            );
        }

        switch ($dados['decisao']) {
            case Enum\Preco::INCLUIR_PRECO_DESCONTO:
                if (count(Model\Preco::all()->toArray()) > 1){
                    break;
                }

                $result = Model\Preco::insert([
                    [
                        'valor' => $dados['valor'],
                        'desconto' => $dados['desconto']
                    ]
                ]);
                $frase = "Incluir Preço";
                break;
            case Enum\Preco::ALTERAR_PRECO:
                if (count(Model\Preco::all()->toArray()) == 0){
                    break;
                }
                $result= Model\Preco::find($dados['id'])->update(
                    ['valor' => $dados['preco']]
                );
                $frase = "Preço Alterado";
                break;
            case Enum\Preco::ALTERAR_DESCONTO:
                if (count(Model\Preco::all()->toArray()) == 0){
                    break;
                }
                $result = Model\Preco::find($dados['id'])->update(
                    ['desconto' => $dados['descontoAlt']]
                );
                $frase = "Desconto Alterado";
                break;
            default:
                //Caso houver algum erro
                return redirect()->back()->with(
                    'error',
                    'Não foi possível fazer nenhuma altecação ou inclusão!'
                );
            break;
        }

        //Retorna uma mensagem para o usuario
        if (isset($result) && $result === true) {
            return redirect()->back()->with(
                'success',
                $frase . ' com sucesso!'
            );
        }
        //Caso houver algum erro
        return redirect()->back()->with(
            'error',
            'Não foi possível fazer nenhuma altecação ou inclusão!'
        );
    }
}

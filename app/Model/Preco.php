<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Preco extends Model
{
    protected $fillable = [
        'valor',
        'desconto'
    ];

	/**
	 * Buscando o preco atual do filme e o desconto aplicado
	 *
	 * @access public
	 */
    public static function sltPrecoAndDesconto()
    {
    	$dados = DB::table('precos')->select(
    		'id',
    		'valor',
    		'desconto'
    	)->get()->toArray();

        if (empty($dados)) {
            $dados[] = new \stdClass();
            $dados[0]->valor = "0.00";
            $dados[0]->desconto = "00";

        }

        return $dados;
    }

    /**
     * Incese o preco e o desconto
     * @param  array $dados dados a serem inseridos
     * @return array        resultado do insert
     */
    public static function insPrecoDesconto($dados)
    {
        //Pegando o valor do preco
        $preco = (
            is_null($dados['preco']) || empty($dados['preco'])
        ) ? 0 : $dados['preco'];
        
        //Pegando o valor do desconto
        $desconto = (
            is_null($dados['desconto']) || empty($dados['desconto'])
        ) ? 0 : $dados['desconto'];

        //Inserindo os dados
        return DB::table('precos')->insert([
            "valor" => $preco,
            "desconto" => $desconto
        ]);
    }

    /**
     * Atualiza o valor do preco e do desconto
     * @param  array $dados dados a serem atualizado
     * @return array        resultado da operacao
     */
    public static function updPrecoDesconto($dados)
    {
        //Pegando o valor do preco
        $preco = (
            is_null($dados['preco']) || empty($dados['preco'])
        ) ? 0 : $dados['preco'];
        
        //Pegando o valor do desconto
        $desconto = (
            is_null($dados['desconto']) || empty($dados['desconto'])
        ) ? 0 : $dados['desconto'];

        //Inserindo os dados
        return DB::table('precos')->where('id', $dados['id'])->update([
            "valor" => $preco,
            "desconto" => $desconto
        ]);        
    }
}

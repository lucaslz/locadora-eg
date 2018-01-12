<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Endereco extends Model
{

	protected $fillable = [
		'endereco',
		'bairro',
		'cep',
		'numero',
		'created_at',
		'updated_at'
	];

	/**
	 * Insere o endere e retorna o id da insercao
	 *
	 * @param Array  $endereco
	 * @access public
	 */
    public static function insEnderecoRetornaId($endereco)
    {
		return DB::table('enderecos')->insertGetId($endereco);
    }

    /**
     * Pegando o endereco de um cliente especifico
     *
     * @param int $idEndereco
     * @access public
     */
    public static function getEnderecoPorId($idEndereco)
    {
        return DB::table('enderecos')->select(
                'id as idEndereco',
                'endereco',
                'bairro',
                'cep',
                'numero'
        )->where('id', $idEndereco)->get()->toArray();
    }

    /**
     * Atualiza o endereco do cliente
     *
     * @param Array $dados
     * @param int #id
     * @access public
     */
    public static function updEnderecoPorId($dados, $id)
    {
    	$teste =  DB::table('enderecos')
            ->where('id', $id)
            ->update($dados);

        var_dump($teste, $dados, $id); die();
    }
}

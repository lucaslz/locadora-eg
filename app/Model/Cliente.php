<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Model as ModelBanco;

class Cliente extends Model
{
    protected $fillable = [
        'idEndereco',
        'nome',
        'cpf',
        'telefone',
        'eMail',
        'dataNascimento',
        'created_at',
        'updated_at'
    ];

	/**
	 * Inserindo o cliente no banco de dados
	 *
	 * @param Array $cliente
	 * @access public
	 */
    public static function insCliente(Array $cliente)
    {
    	return DB::table('clientes')->insert($cliente);
    }

    /**
     * Listando todos os clientes do sistema
     *
     * @access public
     */
    public static function lstClientes()
    {
    	$arrayCliente = DB::table('clientes')
    	->select(
    		'id',
            'idEndereco',
    		'nome',
    		'cpf',
    		'telefone',
    		'eMail',
    		'dataNascimento'
    	)->get()->toArray();

    	//Percorrendo array de clientes e setando o tatal de debito
    	foreach ($arrayCliente as $key => $value) {
    		$valor = ModelBanco\Locacoe::sltSaldoCliente(
    			$value->id
    		);

            //Juntando o id do filma e o id do endereco
            $idClienteEndereco = $value->id ."|". $value->idEndereco;

            //codificando a juncao dos ids
            $arrayCliente[$key]->idClienteEndereco = base64_encode(
                serialize($idClienteEndereco)
            );

            //Pegando o valor total da consulta de saldo cliente
            $arrayCliente[$key]->total = current($valor)->total;

            //zerando variaveis que não seram usadas
            unset($arrayCliente[$key]->id);
            unset($arrayCliente[$key]->idEndereco);
    	}

    	//Retornando os clientes com o valores
    	return $arrayCliente;
    }


    /**
     * Pega um cliente de acordo com o id do cliente
     *
     * @param int $id
     * @access public
     */
    public static function getClientePorId($id)
    {
        return DB::table('clientes')->select(
                'id as idCliente',
                'nome',
                'cpf',
                'telefone',
                'eMail',
                'dataNascimento'
        )->where('id', $id)->get()->toArray();
    }

    /**
     * Atualiza o endereco do cliente
     *
     * @param Array $dados
     * @param int #id
     * @access public
     */
    public static function updClientePorId($dados, $id)
    {
        return DB::table('clientes')
            ->where('id', $id)
            ->update($dados);
    }

    /**
     * Pega o total de clientes cadastrados
     *
     * @return int $total
     */
    public static function sltTotalClientes()
    {
        return DB::table('clientes')
            ->select(DB::raw('COUNT(*) as total'))
            ->get()->toArray();
    }

    /**
     * Retorna todos os clientes cadastrados
     *
     * @return Array Clientes
     */
    public static function lstClientesInfo()
    {
        return DB::table('clientes')
            ->select('*')->get()->toArray();
    }
}

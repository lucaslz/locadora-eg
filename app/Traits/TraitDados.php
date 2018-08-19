<?php

namespace App\Traits;

/**
 * Tratamento dedados
 *
 * @author lucaslima
 */
Trait TraitDados
{
	/**
	 * Decodifica um dado que esta codificado em Base64
	 *
	 * @param String $dado
	 *
	 * @return mixed $dado
	 */
	public static function decode($dado)
	{
        return unserialize(base64_decode($dado));
	}

	/**
	 * Codifica uma string ou algum dado para base64
	 *
	 * @param String $dado
	 *
	 * @return mixed $dado
	 */
	public static function encode($dado)
	{
        return base64_decode(serialize($dado));
	}

	/**
	 * Formata o saldo no formato brasileito
	 * @param  [object] $dados [dados a serem formatados]
	 * @return [object]        [dados formatados]
	 */
	public static function formatarSaldoBr($dados)
	{
		//Formatando saldos calculados
		$dados['saldo']['receber']->total = "R$ ". number_format(
			$dados['saldo']['receber']->total, 2, ",", ""
		);		
		
		$dados['saldo']['semana']->total = "R$ ". number_format(
			$dados['saldo']['semana']->total, 2, ",", ""
		);

		$dados['saldo']['mes']->total = "R$ ". number_format(
			$dados['saldo']['mes']->total, 2, ",", ""
		);

		//Formatando saldos de locacao
		array_walk($dados['relatorio'], function(&$value, $key){
			$value->valorLocacao = "R$ ". number_format(
				$value->valorLocacao, 2, ",", ""
			);
		});

		//retornando dados
		return $dados;
	}
}

<?php

namespace App\Traits;

/**
 * Tratamento dedados
 *
 * @author lucaslima
 */
Trait TraitClientes
{
	/**
	 * Separa o endereco do cliente e retira o token
	 * de acesso dos dados
	 *
	 * @param Array $dados
	 * @access public
	 */
	public static function tratarDadosCliente(Array $dados)
	{
		//Verificando se o ids existe
		if (isset($dados['idCliente'])) {
			$idCliente = $dados['idCliente'];
		}

		if (isset($dados['idEndereco'])) {
			$idEndereco = $dados['idEndereco'];
		}

		//Pegando dados do cliente
		$cliente = [
			"nome" => $dados['nome'],
			"cpf" => $dados['cpf'],
			"telefone" => $dados['telefone'],
			"eMail" => $dados['eMail'],
			"dataNascimento" => $dados['dataNascimento'],
		];

		//Pegando dados do endereco
		$endereco = [
			"endereco" => $dados['endereco'],
			"bairro" => $dados['bairro'],
			"cep" => $dados['cep'],
			"numero" => $dados['numero'],
		];

		//monstando o array dos dados separados
		$dados = [
			"cliente" => $cliente,
			"endereco" => $endereco,
		];

		//Setando os ids caso existam
		if (isset($idCliente)) {
			$dados['idCliente'] = $idCliente;
		}

		if (isset($idEndereco)) {
			$dados['idEndereco'] = $idEndereco;
		}

		//Retornando os dados separados
		return $dados;
	}
}
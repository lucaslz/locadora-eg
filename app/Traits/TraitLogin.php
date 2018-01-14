<?php

namespace App\Traits;

/**
 * Tratamento de Login
 *
 * @author lucaslima
 */
Trait TraitLogin
{
	/**
	 * Gera uma senha aleatorio para o usuario
	 *
	 * @access public
	 */
	public static function gerarSenha($tamanho, $maiusculas, $minusculas, $numeros, $simbolos){

	  	// $ma contem as letras maiúsculas
	  	$ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ";
	  	// $mi contem as letras minusculas
	  	$mi = "abcdefghijklmnopqrstuvyxwz";
	  	// $nu contem os números
	  	$nu = "0123456789";
	  	// $si contem os símbolos
	  	$si = "!@#$%¨&*()_+=";

	  	//Definindo mvariavel
	  	$senha = "";

	  	//se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
	  	$senha .= $maiusculas == true ? str_shuffle($ma) : "";

	  	//se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
	  	$senha .= $minusculas == true ? str_shuffle($mi) : "";

	  	//se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
	  	$senha .= $numeros == true ? str_shuffle($nu) : "";

	  	//se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
	  	$senha .= $simbolos == true ? str_shuffle($si) : "";

	    // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
	    return substr(str_shuffle($senha),0,$tamanho);
	}
}
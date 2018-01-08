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
}
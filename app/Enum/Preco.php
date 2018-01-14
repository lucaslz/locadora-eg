<?php

namespace App\Enum;


use Eloquent\Enumeration\AbstractEnumeration;

final class Preco extends AbstractEnumeration
{
	//constante para verifica se o usuario quer deletar um genero
    const ALTERAR_PRECO = 1;

    //constante que identifica se o usuario quer adicionar um genero
    const ALTERAR_DESCONTO = 2 ;
}
<?php

namespace App\Enum;


use Eloquent\Enumeration\AbstractEnumeration;

final class Preco extends AbstractEnumeration
{
	//constante que identifica se um usuario quer incluir um preco
    const INCLUIR_PRECO_DESCONTO = 1;

    //constante para alteracao de preco
    const ALTERAR_PRECO = 2 ;

    //constante para alteracao de desconto
    const ALTERAR_DESCONTO = 3 ;
}
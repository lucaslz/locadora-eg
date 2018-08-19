<?php

namespace App\Enum;


use Eloquent\Enumeration\AbstractEnumeration;

final class Preco extends AbstractEnumeration
{
    //constante para alteracao de preco
    const ALTERAR_PRECO = 1;

    //constante para alteracao de desconto
    const ALTERAR_DESCONTO = 2;
}

<?php

namespace App\Enum;


use Eloquent\Enumeration\AbstractEnumeration;

final class Genero extends AbstractEnumeration
{
	//constante para verifica se o usuario quer deletar um genero
    const DELETE_GENERO = 2;

    //constante que identifica se o usuario quer adicionar um genero
    const ADD_GENERO = 1 ;
}
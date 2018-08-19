<?php

namespace App\Traits;

/**
 * Tratamento dedados
 *
 * @author lucaslima
 */
Trait TraitData
{
    /**
     * Formata a data e a hora para apresentar no relatorio
     * @param  [midex] $data [data e hora]
     * @return [string]       [string formatada]
     */
    public static function formatarDataHoraRelatorio($dados)
    {
        array_walk($dados, function(&$value, $key){
            $date = new \DateTime($value->dataLocacao);
            $data = $date->format('d-m-Y');
            $hora = $date->format('H:i:s');
            $value->dataLocacao = $data . " ás " . $hora;
        });

        return $dados;
    }
}

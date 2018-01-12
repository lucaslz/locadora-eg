<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Locacoe extends Model
{
    /**
     * Retorna o saldo dos clientes
     *
     * @param int $idCliente
     * @access public
     */
    public static function sltSaldoCliente($idCliente)
    {
    	return DB::table('locacoes')->select(
    		DB::raw('SUM(valorLocacao) as total')
    	)->where('idCliente', '=', $idCliente)->get()->toArray();
    }

    /**
     * Retorna o total de locacoes feitas
     *
     * @return int $total
     */
    public static function sltTotalLocacoes()
    {
        return DB::table('locacoes')->select(
            DB::raw('COUNT(*) as total')
        )->where('pago', '=', 0)->get()->toArray();
    }
}

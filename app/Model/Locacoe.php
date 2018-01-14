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
    	)->where('idCliente', '=', $idCliente)
        ->where('pago', '!=', 1)->get()->toArray();
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

    /**
     * Retorna total de locacoes que o cliente fez
     *
     * @return int $total
     */
    public static function sltSeFilmeAlugado($idCliente, $idFilme = null)
    {
        $query =  DB::table('locacoes')->select(DB::raw('COUNT(*) as total'))
            ->where('idCliente', '=', $idCliente);

        if (!is_null($idFilme)) {
            $query->where('idVideo', '=', $idFilme);
        }

        $query->where('pago', '=', 0);

        return $query->get()->toArray();
    }

    /**
     * Retorna o relatorio semanal de vídeos alugados
     *
     * @access public
     */
    public static function sltRelatorioSemanal($tipoRelatorio)
    {
        //Verificando a quantidade de dias
        if ($tipoRelatorio == 0) {
            $dias = 7;
        } else if($tipoRelatorio == 1){
            $dias = 30;
        }


        //Calculando o saldo total semanal
        $totalSemanal = DB::select(
            DB::raw(
                "SELECT SUM(l.valorLocacao) as total FROM locacoes AS l ".
                "WHERE l.pago = 1 AND l.dataLocacao BETWEEN ".
                "DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()"
            )
        );

        //Calculando o saldo total mensal
        $totalMes = DB::select(
            DB::raw(
                "SELECT SUM(l.valorLocacao) as total FROM locacoes AS l ".
                "WHERE l.pago = 1 AND l.dataLocacao BETWEEN ".
                "DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()"
            )
        );

        //selecionando os dados
        $relatorio = DB::select(
            DB::raw(
                "SELECT c.nome AS cliente, v.titulo AS nomeFilme, ".
                "l.dataLocacao, l.valorLocacao ".
                "FROM locacoes AS l ".
                "INNER JOIN clientes AS c ON c.id = l.idCliente ".
                "INNER JOIN videos AS v ON v.id = l.idVideo ".
                "WHERE l.pago = 1 AND l.dataLocacao ".
                "BETWEEN DATE_SUB(NOW(), INTERVAL $dias DAY) AND NOW() ORDER BY l.id DESC"
            )
        );

        $dados['relatorio'] = $relatorio;
        $dados['saldo']['semana'] = $totalSemanal[0];
        $dados['saldo']['mes'] = $totalMes[0];

        return $dados;
    }
}

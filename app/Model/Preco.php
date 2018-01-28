<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Preco extends Model
{
    protected $fillable = [
        'valor',
        'desconto'
    ];

	/**
	 * Buscando o preco atual do filme e o desconto aplicado
	 *
	 * @access public
	 */
    public static function sltPrecoAndDesconto()
    {
    	return DB::table('precos')->select(
    		'id',
    		'valor',
    		'desconto'
    	)->get()->toArray();
    }
}

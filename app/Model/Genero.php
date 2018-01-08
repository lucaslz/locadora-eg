<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genero extends Model
{
    /**
     * Lista todos os generos
     *
     * @return mixed generos
     */
    public static function listarGeneros()
    {
    	return DB::table('generos')->select(
	    	"id",
	    	"genero"
    	)->get()->toArray();
    }

    /**
     * Inseri um novo genero no banco de daods
     *
     * @param String $nomeGenero
     *
     * @return boolean true or false
     */
    public static function inserirGenero($nomeGenero)
    {
        if (is_string($nomeGenero)) {
            return DB::table('generos')->insert(["genero" => $nomeGenero]);
        }
        return false;
    }
}

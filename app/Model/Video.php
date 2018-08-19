<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Video extends Model
{
	/**
	 * Campos a serem atualizados automaticamente
	 *
	 * @property $fillable
	 */
    protected $fillable = [
    	"idGenero",
    	"titulo",
    	"descricao",
    	"imagem",
    ];

    /**
     * Lista campos para a viwe listar
     *
     * @return mixed videos
     */
    public static function listarVideos()
    {
    	return DB::table('videos')->select(
	    	"id",
	    	"idGenero",
	    	"titulo",
	    	"descricao",
	    	"disposicao",
	    	"imagem"
    	)->paginate(12);
    }

    /**
     * Inseri novos filmes no banco de dados
     *
     * @param Array $dados
     *
     * @return boolean true or false
     */
    public static function inserirVideos($dados)
    {
    	if (is_array($dados)) {
    		return DB::table('videos')->insert($dados);
    	}
    	return false;
    }


    /**
     * Busca um filme de acordo um um id especifico
     *
     * @param int $idFilme
     *
     * @return mixed $filme
     */
    public static function buscaFilmePorId($idFilme)
    {
        return DB::table('videos')
        ->join('generos', 'generos.id', '=', 'videos.idGenero')
        ->select(
            "videos.id",
            "videos.idGenero",
            "generos.genero",
            "videos.titulo",
            "videos.descricao",
            "videos.disposicao",
            "videos.imagem"
        )->where('videos.id', '=', $idFilme)->get()->toArray();
    }

    /**
     * Retorna o numero total de filmes
     *
     * @return int $total
     */
    public static function sltTotalFilmes()
    {
        return DB::table('videos')
            ->select(DB::raw('COUNT(*) as total'))
            ->get()->toArray();
    }
}

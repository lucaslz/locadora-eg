<?php

namespace App\Traits;

/**
 * Tratamento para filmes
 *
 * @author lucaslima
 */
Trait TraitFilme
{
    /**
     * Codifica o id do filme
     *
     * @access public
     *
     * @param Array $elementos
     */
    public static function tratarIdFilme(Array $elementos)
    {
        array_walk($elementos, function(&$value, $key){
            $value->id = base64_encode(
                serialize($value->id)
            );
        });

        return $elementos;
    }

    /**
     * Setando o nome da imagem e removendo o token do array
     * O array ficara pronto para ser inserido diretamente
     *
     * @param Array $dados
     * @param String $fileName
     *
     * @return mixed $dados
     */
    public static function tratarDadosParaInserirAlterarFilme($dados, $fileName)
    {
        //Setando o nome da imagem
        if (isset($dados['imagem'])) {
            $dados['imagem'] = $fileName;
        }

        //removendo o token dos dados
        unset($dados['_token']);

        //Decodificando o id do filme caso ele exista
        if (isset($dados['id'])) {
            $dados['id'] = unserialize(base64_decode($dados['id']));
        }

        //Retorna os dados formatados e prontos para serem inseridos
        return $dados;
    }

    /**
     * Tratando dados do filme a ser visualizado
     *
     * @param Array $dados
     *
     * @return mixed $dados
     */
    public static function tratarFilmeParaVisualizer($dados)
    {
    	//Trarando local da imagem
    	$dados->imagem = $_SERVER['PATH_IMAGE'] . $dados->imagem;
    	$dados->id = base64_encode(serialize($dados->id));

    	//Retornando os dados formatados
    	return $dados;
    }
}
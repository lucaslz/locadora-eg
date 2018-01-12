<?php

namespace App\Traits;
use Image;

/**
 * Tratamento para Imagens
 *
 * @author lucaslima
 */
Trait TraitImagens
{
    /**
     * Salva a imagem redimenciona e retorna o nome dela no diretorio
     *
     * @param $image
     * @return mixed $fileName
     */
    public static function salvarImagem($image)
    {
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('uploads/imagens/' . $fileName);
        Image::make($image)->resize(242, 200)->save($location);

        return $fileName;
    }

    /**
     * Metodo que deleta uma imagem na pasta de upload de imagens
     *
     * @param String $image
     * @return mixed true or false
     */
    public static function deletarImagem($image)
    {
        return \File::delete('uploads/imagens/' . $image);
    }
}
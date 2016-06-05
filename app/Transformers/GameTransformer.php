<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 5/06/16
 * Time: 4:28
 */

namespace App\Transformers;


class GameTransformer extends Transformer
{

    public function transform($game)
    {
        return[
            'name' => $game['nom'],
            'picture' => $game['imatge'],
            'URL' => $game['URL'],
            'Categori' => $game['categoria'],
            'idGame' => (int)$game['id']
        ];

    }


}
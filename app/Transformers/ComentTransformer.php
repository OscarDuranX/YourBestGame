<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 5/06/16
 * Time: 4:53
 */

namespace App\Transformers;


class ComentTransformer extends Transformer
{

    public function transform($coment)
    {
        return[
            'User'=> $coment['nomuser'],
            'Comentari' => $coment['comentari']
        ];

    }
}
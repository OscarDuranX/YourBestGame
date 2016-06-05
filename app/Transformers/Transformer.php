<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 5/06/16
 * Time: 4:26
 */

namespace App\Transformers;


abstract class Transformer
{
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}
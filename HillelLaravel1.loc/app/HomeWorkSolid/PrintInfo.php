<?php

namespace App\HomeWorkSolid;

use stdClass;

class PrintInfo
{
    function arrayToObjects(array $array): array
    {
        return array_map(function($item) {
            $object = new stdClass();
            foreach ($item as $key => $value) {
                $object->$key = $value;
            }
            return $object;
        }, $array);
    }
}


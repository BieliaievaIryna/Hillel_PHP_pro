<?php

namespace App\FormatData;

use App\FormatData\FormatData;
use App\FormatData\FormatInterface;

class FormatDataStrategyOne extends FormatData
{
    public function format(array $objects): array
    {
        $result = '';
        foreach ($objects as $object) {
            $result .= $this->formatProperties($object, function($key, $value) {
                return $key . " - " . $value . "\n";
            });
            $result .= "_______\n";
        }
        return $this->formatResult($result);
    }
}

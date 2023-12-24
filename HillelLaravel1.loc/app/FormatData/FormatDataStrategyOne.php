<?php

namespace App\FormatData;

use App\FormatData\FormatData;
use App\FormatData\FormatInterface;

class FormatDataStrategyOne extends FormatData
{
    public function format(\stdClass $cars): array
    {
        $result = "";
        foreach ($cars as $key => $value) {
            $result .= $key . " - " . $value . "\n";
        }
        $result .= "_______\n";
        return ['name' => __CLASS__ . '_' . $this->formatDate() . '.txt', 'text' => $result];
    }
}

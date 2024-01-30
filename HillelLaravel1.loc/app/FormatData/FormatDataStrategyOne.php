<?php

namespace App\FormatData;

use App\FormatData\FormatData;
use App\FormatData\FormatInterface;

class FormatDataStrategyOne extends FormatData
{
    protected function formatProperty(string $key, mixed $value): string
    {
        return $key . " - " . $value . "\n";
    }
}

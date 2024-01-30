<?php

namespace App\FormatData;

use App\FormatData\FormatData;
use App\FormatData\FormatInterface;

class FormatDataStrategyTwo extends FormatData
{
    protected function formatProperty(string $key, mixed $value): string
    {
        $words = [];
        $word = "";

        for ($i = 0; $i < strlen($key); $i++) {
            if ($i > 0 && ctype_upper($key[$i])) {
                $words[] = strtolower($word);
                $word = "";
            }
            $word .= $key[$i];
        }

        $words[] = strtolower($word);
        $newKey = implode(' ', $words);
        return "|$newKey|$value|\n";
    }
}

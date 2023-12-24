<?php

namespace App\FormatData;

use App\FormatData\FormatData;
use App\FormatData\FormatInterface;

class FormatDataStrategyTwo extends FormatData
{
    public function format(\stdClass $cars): array
    {
        $result = '';
        foreach ($cars as $key => $value) {

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
            $result .= "|$newKey|$value|\n";
        }
        $result .= "_______\n";
        return ['name' => __CLASS__ . '_' . $this->formatDate() . '.txt', 'text' => $result];
    }
}

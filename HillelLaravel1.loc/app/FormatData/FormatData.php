<?php

namespace App\FormatData;

use App\FormatData\FormatInterface;

abstract class FormatData implements FormatInterface
{
    protected function formatDate(): string
    {
        return date('Y_m_d');
    }

    protected function formatProperties(\stdClass $objects, callable $formatFunction): string
    {
        $result = '';
        foreach ($objects as $key => $value) {
            $result .= $formatFunction($key, $value);
        }
        return $result;
    }

    protected function formatResult(string $result): array
    {
        return ['name' => __CLASS__ . '_' . $this->formatDate() . '.txt', 'text' => $result];
    }
}

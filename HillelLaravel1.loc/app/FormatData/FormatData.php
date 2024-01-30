<?php

namespace App\FormatData;

use App\FormatData\FormatInterface;

abstract class FormatData implements FormatInterface
{
    public function formatDate(): string
    {
        return date('Y_m_d');
    }

    abstract protected function formatProperty(string $key, mixed $value): string;

    public function format(array $objects): string
    {
        $result = '';
        foreach ($objects as $object) {
            foreach ($object as $key => $value) {
                $result .= $this->formatProperty($key, $value);
            }
            $result .= "_______\n";
        }

        return $result;
    }
}

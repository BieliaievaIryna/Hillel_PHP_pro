<?php

namespace App\FormatData;

interface FormatInterface
{
    public function format(array $objects): array;
}

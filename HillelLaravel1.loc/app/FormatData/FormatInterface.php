<?php

namespace App\FormatData;

interface FormatInterface
{
    public function format(\stdClass $cars): array;
}

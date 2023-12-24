<?php

namespace App\FormatData;

use App\FormatData\FormatInterface;

abstract class FormatData implements FormatInterface
{
    protected function formatDate(): string
    {
        return date('Y_m_d');
    }
}

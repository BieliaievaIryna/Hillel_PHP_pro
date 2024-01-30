<?php

namespace App\FormatData;

interface FormatInterface
{
    public function format(array $objects): string;
    public function formatDate(): string;
}

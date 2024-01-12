<?php

namespace App\HomeWorkSolid;

interface PlacesFilterInterface
{
    public function filterByProperties(array $results, array $filters, string $key): array;
}

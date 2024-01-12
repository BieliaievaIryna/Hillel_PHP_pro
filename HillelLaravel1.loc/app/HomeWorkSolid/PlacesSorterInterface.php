<?php

namespace App\HomeWorkSolid;

interface PlacesSorterInterface
{
    public function sortByCriteria(array $results, string $criteria): array;
}

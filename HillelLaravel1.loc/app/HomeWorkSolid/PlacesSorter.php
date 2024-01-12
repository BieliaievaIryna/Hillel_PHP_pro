<?php

namespace App\HomeWorkSolid;

class PlacesSorter implements PlacesSorterInterface
{
    public function sortByCriteria(array $results, string $criteria): array
    {
        usort($results, function($a, $b) use ($criteria) {
            return ($a->$criteria < $b->$criteria) ? -1 : 1;
        });
        return $results;
    }
}

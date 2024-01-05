<?php

namespace App\HomeWorkSolid;

class PlacesSorter
{
    public function sortByDistance(array $places): array
    {
        usort($places, function($a, $b){
            return ($a->distance < $b->distance) ? -1 : 1;
        });
        return $places;
    }
}

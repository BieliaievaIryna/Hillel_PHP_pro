<?php

namespace App\HomeWorkSolid;

class DistanceCalculator
{
    public function calculateDistances(array $places, float $lat, float $lon): array
    {
        foreach ($places as $place){
            $res = 2 * asin(sqrt(pow(sin(($lat - $place->lat) / 2), 2) + cos($lat) * cos($place->lat) * pow(sin(($lon - $place->lon) / 2), 2)));
            $place->distance = $res;
        }
        return $places;
    }
}

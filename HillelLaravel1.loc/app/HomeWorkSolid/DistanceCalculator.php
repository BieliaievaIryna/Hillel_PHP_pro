<?php

namespace App\HomeWorkSolid;

class DistanceCalculator implements DistanceCalculatorInterface
{
    private float $lat;
    private float $lon;

    public function __construct(float $lat, float $lon)
    {
        $this->lat = $lat;
        $this->lon = $lon;
    }
    public function calculateDistances(array $results, string $key, string $latKey, string $lonKey): array
    {
        foreach ($results as $result){
            $res = 2 * asin(sqrt(pow(sin(($this->lat - $result->$latKey) / 2), 2) + cos($this->lat) * cos($result->$latKey) * pow(sin(($this->lon - $result->$lonKey) / 2), 2)));
            $result->$key = $res;
        }
        return $results;
    }
}

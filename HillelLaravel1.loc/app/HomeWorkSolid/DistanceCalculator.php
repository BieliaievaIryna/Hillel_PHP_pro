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
    public function calculateDistance(float $lat, float $lon): float
    {
        return 2 * asin(sqrt(pow(sin(($this->lat - $lat) / 2), 2) + cos($this->lat) * cos($lat) * pow(sin(($this->lon - $lon) / 2), 2)));
    }
}

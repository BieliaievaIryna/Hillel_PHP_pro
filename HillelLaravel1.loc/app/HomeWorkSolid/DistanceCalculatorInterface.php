<?php

namespace App\HomeWorkSolid;

interface DistanceCalculatorInterface
{
    public function calculateDistance(float $lat, float $lon): float;
}

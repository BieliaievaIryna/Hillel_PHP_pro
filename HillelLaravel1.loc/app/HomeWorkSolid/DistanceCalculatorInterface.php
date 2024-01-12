<?php

namespace App\HomeWorkSolid;

interface DistanceCalculatorInterface
{
    public function calculateDistances(array $results, string $key, string $latKey, string $lonKey): array;
}

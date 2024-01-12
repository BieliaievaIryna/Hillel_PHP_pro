<?php

namespace App\HomeWorkSolid;

interface PlacesServiceInterface
{
    public function getPlaces(string $url, string $search, array $exclude_place_ids): array;
}

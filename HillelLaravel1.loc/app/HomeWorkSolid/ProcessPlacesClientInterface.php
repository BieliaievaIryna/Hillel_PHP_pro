<?php

namespace App\HomeWorkSolid;

interface ProcessPlacesClientInterface
{
    public function searchAndProcessPlaces(string $url, string $search): array;
}

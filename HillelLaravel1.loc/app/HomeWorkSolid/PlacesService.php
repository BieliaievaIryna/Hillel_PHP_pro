<?php

namespace App\HomeWorkSolid;

use GuzzleHttp\ClientInterface;

class PlacesService
{
    protected ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getPlaces(string $url, string $search, string $exclude_place_ids): array
    {
        $response = $this->client->request('GET', $url . urlencode($search) . $exclude_place_ids);
        return json_decode($response->getBody()->getContents());
    }
}

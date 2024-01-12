<?php

namespace App\HomeWorkSolid;

use GuzzleHttp\ClientInterface;

class PlacesService implements PlacesServiceInterface
{
    protected ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getPlaces(string $url, string $search, array $exclude_place_ids): array
    {
        $response = $this->client->request('GET', $url . urlencode($search) . '&exclude_place_ids=' . urlencode(implode(',', $exclude_place_ids)));
        return json_decode($response->getBody()->getContents());
    }
}

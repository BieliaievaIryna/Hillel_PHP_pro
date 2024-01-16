<?php

namespace App\HomeWorkSolid;

class ProcessPlacesClient implements ProcessPlacesClientInterface
{
    private PlacesServiceInterface $placesService;
    private DistanceCalculatorInterface $distanceCalculator;
    private PlacesSorterInterface $placesSorter;
    private PlacesFilterInterface $placesFilter;
    private array $properties;
    private array $excludePlaceIds = [];

    public function __construct(
        PlacesServiceInterface $placesService,
        DistanceCalculatorInterface $distanceCalculator,
        PlacesSorterInterface $placesSorter,
        PlacesFilterInterface $placesFilter,
    )
    {
        $this->placesService = $placesService;
        $this->distanceCalculator = $distanceCalculator;
        $this->placesSorter = $placesSorter;
        $this->placesFilter = $placesFilter;
        $this->properties = [
            'place_id' => 'place_id',
            'name' => 'name',
            'display_name' => 'display_name',
            'distance' => 'distance'
        ];
    }

    public function searchAndProcessPlaces(string $url, string $search): array
    {
        // Fetch places from the service
        $places = $this->getPlacesFromService($url, $search);

        // Calculate distances
        $placesWithDistances = $this->calculateDistances($places);

        // Sort by distance
        $sortedPlaces = $this->sortPlacesByDistance($placesWithDistances);

        // Filter and add keys by place_id
        $filteredPlaces = $this->filterPlaces($sortedPlaces);

        // Add the place ids of the current results to the exclude list for the next call
        $this->updateExcludeList($filteredPlaces, $search);

        return $filteredPlaces;
    }

    private function getPlacesFromService(string $url, string $search): array
    {
        return $this->placesService->getPlaces($url, $search, $this->excludePlaceIds);
    }

    private function calculateDistances(array $places): array
    {
        foreach ($places as $place) {
            $place->{$this->properties['distance']} = $this->distanceCalculator->calculateDistance($place->lat, $place->lon);
        }

        return $places;
    }

    private function sortPlacesByDistance(array $places): array
    {
        return $this->placesSorter->sortByCriteria($places, $this->properties['distance']);
    }

    private function filterPlaces(array $places): array
    {
        return $this->placesFilter->filterByProperties($places, $this->properties, $this->properties['place_id']);
    }

    private function updateExcludeList(array $filteredPlaces, string $search): void
    {
        /// Clear the excludePlaceIds when new places are found for the current search
        $this->excludePlaceIds[$search] = [];

        // Add the place ids of the current results to the exclude list for the next call
        $this->excludePlaceIds[$search] = array_merge($this->excludePlaceIds[$search], array_keys($filteredPlaces));
    }
}

<?php

namespace App\Http\Controllers;

use App\HomeWorkSolid\DistanceCalculator;
use App\HomeWorkSolid\PlacesFilter;
use App\HomeWorkSolid\PlacesService;
use App\HomeWorkSolid\PlacesSorter;
use App\HomeWorkSolid\PrintInfo;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;

class HomeWorkSolidController extends Controller
{
    private PlacesService $placesService;
    private DistanceCalculator $distanceCalculator;
    private PlacesSorter $placesSorter;
    private PlacesFilter $placesFilter;
    private PrintInfo $printInfo;
    private float $lat = 46.4774700;
    private float $lon = 30.7326200;

    public function __construct()
    {
        $this->placesService = new PlacesService(new GuzzleClient());
        $this->distanceCalculator = new DistanceCalculator($this->lat, $this->lon);
        $this->placesSorter = new PlacesSorter();
        $this->placesFilter = new PlacesFilter();
        $this->printInfo = new PrintInfo();
    }
    public function index(Request $request)
    {
        $url = 'https://nominatim.openstreetmap.org/search.php?format=jsonv2&q=';
        $search = 'Продукти Одеса';
        $exclude_place_ids = [];

        // necessary properties
        $properties = ['place_id', 'name', 'display_name', 'distance'];

        // start parse api
        $places = $this->placesService->getPlaces($url, $search, $exclude_place_ids);

        // distance calculation
        $places = $this->distanceCalculator->calculateDistances($places, 'distance', 'lat', 'lon');

        // sort by distance
        $places = $this->placesSorter->sortByCriteria($places, 'distance');

        //filter output array and add keys by place_id
        $places = $this->placesFilter->filterByProperties($places, $properties, 'place_id');

        $places = $this->printInfo->arrayToObjects($places);

        // for exit
        if ($exclude_place_ids){
            dd($places);
        }

        $exclude_place_ids = array_keys($places);
        dump($places);

        // for new search without this places
        $places = $this->placesService->getPlaces($url, $search, $exclude_place_ids);

        // distance calculation
        $places = $this->distanceCalculator->calculateDistances($places, 'distance', 'lat', 'lon');

        // sort by distance
        $places = $this->placesSorter->sortByCriteria($places, 'distance');

        //filter output array and add keys by place_id
        $places = $this->placesFilter->filterByProperties($places, $properties, 'place_id');

        $places = $this->printInfo->arrayToObjects($places);

        dd($places);
    }
}

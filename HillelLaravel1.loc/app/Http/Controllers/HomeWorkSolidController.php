<?php

namespace App\Http\Controllers;

use App\HomeWorkSolid\DistanceCalculator;
use App\HomeWorkSolid\PlacesFilter;
use App\HomeWorkSolid\PlacesService;
use App\HomeWorkSolid\PlacesSorter;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;

class HomeWorkSolidController extends Controller
{
    public function index(Request $request)
    {
        $url = 'https://nominatim.openstreetmap.org/search.php?format=jsonv2&q=';
        $search = 'Продукти Одеса';
        $exclude_place_ids = '';

        // init coordinates
        $lat = 46.4774700;
        $lon = 30.7326200;

        // necessary properties
        $properties = ['place_id', 'name', 'display_name', 'distance'];

        start:

        // start parse api
        $placesService = new PlacesService(new GuzzleClient());
        $places = $placesService->getPlaces($url, $search, $exclude_place_ids);
        // end parse api

        // distance calculation
        $distanceCalculator = new DistanceCalculator();
        $places = $distanceCalculator->calculateDistances($places, $lat, $lon);

        // sort by distance
        $placesSorter = new PlacesSorter();
        $places = $placesSorter->sortByDistance($places);

        //filter output array and add keys by place_id
        $placesFilter = new PlacesFilter();
        $places = $placesFilter->filterByProperties($places, $properties);

        // for exit
        if ($exclude_place_ids){
            dd($places);
        }

        $exclude_place_ids = '&exclude_place_ids=' . urlencode(implode(',', array_keys($places)));
        dump($places);

        // for new search without this places
        goto start;
    }
}

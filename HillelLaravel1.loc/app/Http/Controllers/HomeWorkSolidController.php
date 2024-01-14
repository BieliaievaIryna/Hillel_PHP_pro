<?php

namespace App\Http\Controllers;

use App\HomeWorkSolid\DistanceCalculator;
use App\HomeWorkSolid\ProcessPlacesClient;
use App\HomeWorkSolid\PlacesFilter;
use App\HomeWorkSolid\PlacesService;
use App\HomeWorkSolid\PlacesSorter;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Http\Request;

class HomeWorkSolidController extends Controller
{
    private ProcessPlacesClient $placesClient;
    private float $lat = 46.4774700;
    private float $lon = 30.7326200;

    public function __construct()
    {
        $this->placesClient = new ProcessPlacesClient(
            new PlacesService(new GuzzleClient()),
            new DistanceCalculator($this->lat, $this->lon),
            new PlacesSorter(),
            new PlacesFilter(),
        );
    }
    public function index(Request $request)
    {
        $url = 'https://nominatim.openstreetmap.org/search.php?format=jsonv2&q=';
        $search = 'Продукти Одеса';

        $places1 = $this->placesClient->searchAndProcessPlaces($url, $search);
        dump($places1);

        $places2 = $this->placesClient->searchAndProcessPlaces($url, $search);
        dd($places2);
    }
}

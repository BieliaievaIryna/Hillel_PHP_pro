<?php

namespace App\Http\Controllers;

use App\HomeWorkSolid\ProcessPlacesClientInterface;
use Illuminate\Http\Request;

class HomeWorkSolidController extends Controller
{
    private ProcessPlacesClientInterface $placesClient;

    public function __construct(ProcessPlacesClientInterface $placesClient)
    {
        $this->placesClient = $placesClient;
    }
    public function index(Request $request)
    {
        $url = 'https://nominatim.openstreetmap.org/search.php?format=jsonv2&q=';
        $search = $request->input('search', 'Продукти Одеса');

        $places1 = $this->placesClient->searchAndProcessPlaces($url, $search);
        $places2 = $this->placesClient->searchAndProcessPlaces($url, $search);

        $response = $places1 + $places2;

        // Dump using dd()
//        dd($response);

        // Return the response in JSON format
        return response()->json($response, 200, [], JSON_UNESCAPED_UNICODE);

    }
}

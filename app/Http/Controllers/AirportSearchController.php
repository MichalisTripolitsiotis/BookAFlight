<?php

namespace App\Http\Controllers;

use App\Models\Client;
use GuzzleHttp\Exception\GuzzleException;

class AirportSearchController extends Controller
{
    /**
     * Find abd return a given airport through a get request.
     */
    public function find(string $attribute)
    {
        $city = $attribute;
        $url = 'https://test.api.amadeus.com/v1/reference-data/locations?subType=CITY&keyword=' . $city;
        $access_token = app(ClientController::class)->authenticate();


        try {
            $client = new Client($url, $access_token);
            return $client->sendGetRequest();
        } catch (GuzzleException $exception) {
            return $exception;
        }
    }
}

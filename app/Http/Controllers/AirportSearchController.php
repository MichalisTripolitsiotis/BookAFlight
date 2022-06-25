<?php

namespace App\Http\Controllers;

use App\Models\Client;
use GuzzleHttp\Exception\GuzzleException;

class AirportSearchController extends Controller
{
    /**
     * Find abd return a given airport through a get request.
     */
    public function find()
    {
        $url = 'https://test.api.amadeus.com/v1/reference-data/locations?subType=CITY&keyword=MAD';
        $access_token = app(ClientController::class)->authenticate();

        // $data = [
        //     'originDestinations' => [
        //         [
        //             'id' => 1,
        //             'originLocationCode' => 'SKG',
        //             'destinationLocationCode' => 'ATH',
        //             'departureDateTimeRange' => [
        //                 'date' => '2022-12-27'
        //             ]
        //         ]
        //     ],
        //     'travelers' => [
        //         [
        //             'id' => 1,
        //             'travelerType' => 'ADULT'
        //         ]
        //     ]
        // ];

        try {
            $client = new Client($url, $access_token);
            return $client->sendGetRequest();
        } catch (GuzzleException $exception) {
            return $exception;
        }
    }
}

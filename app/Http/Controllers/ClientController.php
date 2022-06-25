<?php

namespace App\Http\Controllers;

use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Make a POST request through the Client model,
     * in order to authenticate the user.
     *
     * @return array $response
     */
    public function authenticate()
    {
        $url = env("AUTH_URL");

        $client = new Client($url);
        $client->makeAuthorizationRequest();

        return $client->getAccessToken();
    }
}

<?php

namespace App\Models;

use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $url;
    protected $token;
    protected $client;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct($url, $token = null)
    {
        $this->url   = $url;

        $this->token = $token;

        $this->client = new GuzzleClient([
            'base_uri' => $this->url,
            'headers'  => self::getHttpHeaders()
        ]);
    }

    /**
     * Make a POST request to the API by providing a correct URL
     * and the needed parameters.
     *
     * @param array|null $array
     * @return array
     */
    public function sendPostRequest($array = null)
    {
        $response = $this->client->get($this->url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token
            ],
            'json' => $array
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Make a GET request to the API by providing a correct URL
     * and the needed parameters.
     *
     * @param array|null $array
     * @return array
     */
    public function sendGetRequest($array = null)
    {
        $response = $this->client->get($this->url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token
            ],
            'json' => $array
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Make an authentication request
     *
     * @return array $response;
     */
    public function makeAuthorizationRequest()
    {
        $response = $this->client->post($this->url, [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => env('API_KEY'),
                'client_secret' => env('API_CODE')
            ]
        ]);

        $response = $response->getBody();

        $access_token = json_decode($response)->access_token;
        $this->token = $access_token;

        return $response;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->token;
    }

    /**
     * Create the headers for the request
     *
     * @return array
     */
    private static function getHttpHeaders(): array
    {
        return [
            'headers' => [
                'Accept' => 'application/json'
            ],
            'http_errors' => false,
        ];
    }
}

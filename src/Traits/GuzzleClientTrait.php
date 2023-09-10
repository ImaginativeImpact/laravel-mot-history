<?php

namespace ImaginativeImpact\LaravelMotHistory\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

trait GuzzleClientTrait
{
    /**
     * run guzzle to process requested url
     * @param  $request string
     * @return mixed
     */
    protected function guzzle(string $request)
    {
        try {
            $client = new Client;

            $response = $client->get(config('mot-history.baseURL').$request, [
                'headers' => [
                    'Accept' => 'application/json+v6',
                    'x-api-key' => config('mot-history.apiKey'),
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $ex) {
            return json_decode($ex->getResponse()->getBody()->getContents(), true);
        }
    }
}
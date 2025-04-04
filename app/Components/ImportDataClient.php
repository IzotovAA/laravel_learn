<?php

namespace App\Components;

use GuzzleHttp\Client;

class ImportDataClient
{
    public Client $client;

    public function __construct(Client $client)
    {
//        $this->client = new Client([
//            // Base URI is used with relative requests
//            'base_uri' => 'https://jsonplaceholder.typicode.com/',
//            // You can set any number of default request options.
//            'timeout' => 2.0,
//        ]);

        $this->client = $client;
    }
}

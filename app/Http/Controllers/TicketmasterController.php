<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TicketmasterController extends Controller
{

    public function getTheatreData()
    {
        $client = new Client(['base_uri' => 'https://app.ticketmaster.com/discovery/v2/']);
        $response = $client->request('GET', 'events.json', [
            'query' => [
                'apikey' => 'yBK52cGPcOqHacuE346UALaBzikzBX1j',
                'classificationName' => 'theatre',
                'countryCode' => 'BE'
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        // Utilisez la méthode paginate() pour paginer les données
        $theatres = paginate(collect($data['_embedded']['events']), 10);

        return view('theatres', ['theatres' => $theatres]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function index()
    {
        //$shows = Show::all();
        $shows = Show::take(10)->get();

        // Fetching TicketMaster events
        $client = new Client(['base_uri' => 'https://app.ticketmaster.com/discovery/v2/']);
        $response = $client->request('GET', 'events.json', [
            'query' => [
                'apikey' => 'yBK52cGPcOqHacuE346UALaBzikzBX1j',
                'classificationName' => 'theatre',
                'countryCode' => 'BE'
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        $theatres = collect($data['_embedded']['events']);

        return view('home', ['shows' => $shows, 'theatres' => $theatres]);
    }
}


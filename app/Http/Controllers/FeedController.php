<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimplePie;

class FeedController extends Controller
{
    public function index()
    {
        // URL du flux RSS
        $feedUrl = 'https://leclaireur.fnac.com/categorie/culture/feed/';

        // Initialisation de SimplePie
        $feed = new SimplePie();
        $feed->set_feed_url($feedUrl);
        $feed->init();

        // Récupération des articles du flux
        $items = $feed->get_items();

        // Affichage des articles dans la vue
        return view('feeds.index', compact('items'));
    }
}

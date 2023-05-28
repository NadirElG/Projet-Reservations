<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;
use Spatie\Feed\Feed;
use Spatie\Feed\FeedItem;

class FeedController extends Controller
{
    public function index()
    {
        $feedItems = $this->getFeedItems();

        $feed = new Feed();

        foreach ($feedItems as $feedItem) {
            $feed->add($feedItem);
        }

        $feed->title(env('APP_NAME'));
        $feed->link(url('/'));
        $feed->description('Flux RSS pour ' . env('APP_NAME'));
        $feed->language('fr');

        return response($feed->render('rss'))->header('Content-Type', 'text/xml');
    }

    private function getFeedItems()
    {
        // Récupérez les éléments de votre flux ici
        // Par exemple, vous pouvez utiliser le modèle Show pour obtenir les spectacles

        $shows = Show::all();

        $feedItems = [];

        foreach ($shows as $show) {
            $feedItem = $show->toFeedItem();

            // Vous pouvez personnaliser les propriétés du feedItem ici si nécessaire
            // Par exemple, définir la propriété description avec la valeur souhaitée

            $feedItems[] = $feedItem;
        }

        return $feedItems;
    }
}

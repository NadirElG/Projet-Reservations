<?php

return [

    'feeds' => [
        'main' => [
            'items' => '\App\Models\Show@getFeedItems',
            'url' => '/feed',
            'title' => 'Toutes les représentations',
            'description' => 'Les dernières représentations de notre application',
            'language' => 'fr-FR',
            'format'=>'rss',
            'view' => 'feeds',
        ],
    ],

];

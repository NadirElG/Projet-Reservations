<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Show extends Model implements Feedable
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'poster_url',
        'location_id',
        'bookable',
        'price',
    ];

    protected $table = 'shows';

    public $timestamps = true;

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function representations()
    {
        return $this->hasMany(Representation::class);
    }

    public function artistTypes()
    {
        return $this->belongsToMany(ArtistType::class);
    }

    public function getRssItems()
    {
        $items = [];

        foreach ($this->representations as $representation) {
            $item = [
                'title' => $this->title,
                'link' => $this->getShowUrl(),
                'description' => $representation->getFormattedDateTime(),
            ];

            $items[] = $item;
        }

        return $items;
    }

    public function getShowUrl()
    {
        return route('show_show', ['id' => $this->id]);
    }

    public function getFeedItems()
    {
        return Show::all();
    }

    public function toFeedItem(): FeedItem
{
    $updated = $this->updated_at ?? $this->created_at;

    return FeedItem::create()
        ->id($this->id)
        ->title($this->title)
        ->summary($this->description) // Utiliser la méthode summary() pour définir la description
        ->updated($updated)
        ->link($this->getShowUrl())
        ->authorName("Votre nom d'auteur ici"); // Remplacez "Votre nom d'auteur ici" par le nom de l'auteur réel
}


}

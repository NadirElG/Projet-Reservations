<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;


class Representation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'show_id',
        'when',
        'location_id',
    ];

   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'representations';

   /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * Get the actual location of the representation
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    
    /**
     * Get the show of the representation
     */
    public function show()
    {
        return $this->belongsTo(Show::class);
    }

    /**
     * 
     */
    public function users() {
        return $this->belongsToMany(User::class, 'reservations')->using(Reservation::class)->withTimestamps();
    }

    /**
     * Get the date and time of the representation in a formatted string.
     *
     * @return string
     */
    public function getFormattedDateTime()
    {
        // Convertit le champ 'when' en instance de Carbon
        $datetime = Carbon::parse($this->when);

        // Formate la date/heure comme souhaité. Ici, nous utilisons le format 'd M Y H:i', 
        // mais vous pouvez le changer en fonction de vos besoins.
        return $datetime->format('d M Y H:i');
    }
    
}

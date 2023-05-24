<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function representations() {
        return $this->belongsToMany(Representation::class, 'reservations')->using(Reservation::class)->withTimestamps();
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            // Attribuer le rôle "member" à l'utilisateur
            $user->role()->associate(2); // 2 correspond à l'ID du rôle "member"
            $user->save();
        });
    }
}

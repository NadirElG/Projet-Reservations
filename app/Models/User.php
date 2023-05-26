<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

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

    public function representations()
    {
        return $this->belongsToMany(Representation::class, 'reservations')->using(Reservation::class)->withTimestamps();
    }

    public function role()
    {
    return $this->belongsTo(Role::class, 'role_id');
    }

    public function roles()
    {
    return $this->belongsToMany(Role::class, 'user_roles')->withTimestamps();
    }

    public function isAdmin()
    {
    return $this->roles->contains('role', 'admin');
    }


    public function assignDefaultRole()
    {
    $defaultRoleId = 2; // ID du rôle "member"
    $this->roles()->attach($defaultRoleId);
    }


    protected static function boot()
    {
    parent::boot();

    static::created(function ($user) {
        $user->assignDefaultRole();
    });
    }

}

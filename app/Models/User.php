<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Agencie;
use App\Models\Register;
use Illuminate\Auth\Middleware\Role as Middleware;



class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;
       use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'country_id',
        'state_id',
        'city_id',
        'email',
        'password',
        'role_id',
        'remember_token',
        'status',
        'avatar',
        'location'
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
        'password' => 'hashed',
    ];

    public function agencie():HasOne
    {
        return $this->hasOne(Agencie::class);
    }
    
    public function tribut() :HasOne
    {
        return $this->hasOne(Tribut::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }
    
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }

    public function belongsToCompany()
    {
        return $this->agencie;
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function posters() {
        return $this->hasMany(Poster::class);
    }

    public function eternityPages() {
        return $this->hasMany(EternityPages::class);
    }

    public function donationHistories()
    {
        return $this->hasMany(DonationHistories::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
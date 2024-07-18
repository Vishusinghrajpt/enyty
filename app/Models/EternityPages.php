<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EternityPages extends Model
{
    use HasFactory;
    
      protected $fillable = [
        'frist_name',
        'last_name',
        'user_id',
        'birth_date',
        'departure_date',
        'symbolic',
        'profile_picture',
        'additional_picture',
        'connection',
        'biography',
        'country_id',
        'state_id',
        'city_id',
        'slug',
        'QrPath',
        'name',
        'surname',
        'poster_id'
    ];

    public static $search_columns = [
        'All',
        'frist_name',
    ];

    public function scopeOrder($query)
    {
        return $query->orderBy('id', 'DESC');
    }

    // public function comments(): HasMany
    // {
    //     return $this->hasMany(Comment::class);
    // }

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function state() {
        return $this->belongsTo(State::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function poster() {
        return $this->belongsTo(Poster::class);
    }
}

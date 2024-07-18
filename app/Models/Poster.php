<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'frist_name',
        'last_name',
        'country_id',
        'state_id',
        'city_id',
        'company_logo',
        'birth_date',
        'departure_date',
        'funeral_celebration',
        'location_body',
        'announces_passing'

    ];

    public function user() {
        return $this->belongsTo(User::class);
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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_iso', 'iso_code');
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}

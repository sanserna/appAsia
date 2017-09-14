<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $table = 'cities';
    protected $dates = [
        'arrival_date',
        'departure_date'
    ];

    public function country() {

        return $this->belongsTo('App\Models\Country');

    }

    public function vehicle() {

        return $this->hasOne('App\Models\Vehicle');

    }

    public function lodging() {

        return $this->hasOne('App\Models\Lodging');

    }

    public function expense() {

        return $this->hasOne('App\Models\Expense');

    }

}

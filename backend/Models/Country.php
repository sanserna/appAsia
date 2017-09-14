<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    protected $table = 'countries';

    public function cities() {

        return $this->hasMany('App\Models\City')->orderBy('position');

    }

}

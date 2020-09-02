<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    protected $table = 'notifications';
    protected $fillable = [
        'type', 
        'province_id',
        'province_id', 
        'notifiable_id',
        'category_id',
        'data', 
        'read_at'
    ];
}

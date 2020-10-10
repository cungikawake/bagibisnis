<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Member;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        'member_id',
        'product_id',
        'review',
        'status'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }


}

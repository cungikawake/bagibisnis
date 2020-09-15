<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use App\User;
use App\Product;

class Member extends Model
{ 
    protected $table = 'members';
    protected $fillable = [
        'name',
        'shop_name',
        'email',
        'user_id',
        'max_product',
        'logo',
        'facebook',
        'instagram',
        'phone_number',
        'address'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

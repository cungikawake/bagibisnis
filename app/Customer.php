<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use App\User;
use App\Product;

class Customer extends Model
{ 
    protected $table = 'customers';
    protected $fillable = [
        'name',
        'shop_name',
        'email',
        'user_id',
        'max_product',
        'logo'
    ];

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
        return $this->belongsTo(Product::class);
    }
}

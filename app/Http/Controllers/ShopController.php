<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Customer;
use App\Province;
use App\Order;
use App\User;
use App\PageCounter;
use Geoip;
use Auth;

class ShopController extends Controller
{
    public function shop_detail($shop_name)
    {   
        $member = User::select(
            '*',
            'members.name as member_name',
            'members.id as member_id', 
            'provinces.name as province_name'
        )
        ->join('members', 'members.user_id', 'users.id') 
        ->join('provinces', 'provinces.id', '=', 'members.province_id')
        ->where('members.name', $shop_name)
        ->first(); 
     
        $products = Product::where('member_id', $member->member_id)->orderBy('created_at', 'DESC')->paginate(10);
        
        return view('shop.profile', compact('member', 'products'));
    }
  
}

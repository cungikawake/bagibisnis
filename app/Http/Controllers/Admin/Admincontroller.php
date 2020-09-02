<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Member;
use App\Product;
use App\PageCounter;
use App\Subcribe;

class Admincontroller extends Controller
{
    public function index(){
        $member = Member::count();
        $product = Product::count();
        $total_amount = Subcribe::where('status', 1)->sum('amount'); 

        return view('admin.dashboard', compact('member', 'product', 'total_amount'));
    }
}

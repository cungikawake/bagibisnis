<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use App\Member;

class ProductController extends Controller
{
    public function index(){ 
        $products = Product::orderBy('id', 'desc')->paginate(15);  
        return view('admin.product.index', compact('products'));
    }

    public function search(Request $request){
        $keyword = $request->search;
        $products = Product::where('name', 'like', '%'.$request->search.'%')->orderBy('id', 'desc')->paginate(15);  
        return view('admin.product.index', compact('products', 'keyword'));
    }

    public function nonactive($id){ 
        $products = Product::findorFail($id);
        $products->status = 0;
        $products->save();

        return redirect()->back()->with('message', 'Produk sudah diupdate menjadi tidak aktif');
    }

    public function active($id){ 
        $products = Product::findorFail($id);
        $products->status = 1;
        $products->save();

        return redirect()->back()->with('message', 'Produk sudah diupdate menjadi aktif');
    }
}

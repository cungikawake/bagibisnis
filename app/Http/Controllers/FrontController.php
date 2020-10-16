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
use App\Review;
use App\PageCounter;
use Geoip;
use Auth;

class FrontController extends Controller
{
    public function index()
    {   
        $provinces = Province::get();
        
        $products = Product::select('*','products.name as product_name')
            ->join('members', 'members.id', '=', 'products.member_id')
            ->orderBy('products.created_at', 'DESC')->paginate(8);
        
         
        return view('home', compact('products', 'provinces'));
    }
 
    public function search(Request $request)
    {    
        $provinces = Province::get(); 
        $keyword = $request->keyword;

        if($keyword !=''){
            $products = Product::select('*','products.name as product_name')
            ->join('members', 'members.id', '=', 'products.member_id')
            ->where('products.name', 'like', "%{$request->keyword}%") 
            ->orderBy('products.created_at', 'DESC')->paginate(20);

        }else{
            $products = Product::select('*','products.name as product_name')
            ->join('members', 'members.id', '=', 'products.member_id')
            ->orderBy('products.created_at', 'DESC')->paginate(20);
        } 

        return view('home', compact('products', 'keyword', 'provinces'));
    }

    public function product()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(12);
        return view('ecommerce.product', compact('products'));
    }

    public function showProduct($slug)
    {
        $product = Product::with(['category','member'])->where('slug', $slug)->first(); 
        PageCounter::createViewLog($product);

        $reviews = Review::where('product_id', $product->id)->get();
         
        return view('products.show', compact('product', 'reviews'));
    }

    public function category(){
        $provinces = Province::get();
        $categories = Category::get();
        return view('products.all_category', compact('categories', 'provinces'));
    }

    public function categoryProduct($id, $slug)
    {
        $provinces = Province::get();

        $category = Category::select('*', 'categories.name as categori_name')->where('slug', $slug)->where('id', $id)->first();

        $products = Category::select('*', 'categories.name as categori_name')
        ->where('slug', $slug)->where('id', $id)->first()->product()->with('member')->orderBy('created_at', 'DESC')->paginate(12);
          
        return view('products.list', compact('products', 'category', 'provinces'));
    }

    public function filter(Request $request)
    {
        $provinces = Province::get();

        $products = Product::select('*','products.name as product_name')
        ->join('members', 'members.id', '=', 'products.member_id')
        ->orderBy('products.created_at', 'DESC')
        ->paginate(8);

        if(isset($request->modal)){
            if($request->modal > 0 || $request->modal <= 10000000 ){
                $start = 0;
                $end = $request->modal; 

                $products = Product::select('*','products.name as product_name')
                ->join('members', 'members.id', '=', 'products.member_id')
                ->whereBetween('products.modal', [$start, $end])
                ->orderBy('products.modal', 'ASC')
                ->paginate(8);

            }else if($request->modal > 10000000){
                $products = Product::select('*','products.name as product_name')
                ->join('members', 'members.id', '=', 'products.member_id')
                ->where('products.modal', '>', $request->modal)
                ->orderBy('products.modal', 'ASC')
                ->paginate(8);

            }else if($request->modal == 0){
                $products = Product::select('*','products.name as product_name')
                ->join('members', 'members.id', '=', 'products.member_id')
                ->where('products.modal', '>', $request->modal)
                ->orderBy('products.modal', 'ASC')
                ->paginate(8);
            } 
            
        }else{
            $products = Product::select('*','products.name as product_name')
                ->join('members', 'members.id', '=', 'products.member_id') 
                ->orderBy('products.modal', 'ASC')
                ->paginate(8);
        }
        
        return view('products.filter', compact('products', 'provinces'));
    }
    
    public function verifyCustomerRegistration($token)
    {
        $customer = Customer::where('activate_token', $token)->first();
        if ($customer) {
            $customer->update([
                'activate_token' => null,
                'status' => 1
            ]);
            return redirect(route('customer.login'))->with(['success' => 'Verifikasi Berhasil, Silahkan Login']);
        }
        return redirect(route('customer.login'))->with(['error' => 'Invalid Verifikasi Token']);
    }

    public function customerSettingForm()
    {
        $customer = auth()->guard('customer')->user()->load('district');
        $provinces = Province::orderBy('name', 'ASC')->get();
        return view('ecommerce.setting', compact('customer', 'provinces'));
    }

    public function customerUpdateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'phone_number' => 'required|max:15',
            'address' => 'required|string',
            'district_id' => 'required|exists:districts,id',
            'password' => 'nullable|string|min:6'
        ]);

        $user = auth()->guard('customer')->user();
        $data = $request->only('name', 'phone_number', 'address', 'district_id');
        if ($request->password != '') {
            $data['password'] = $request->password;
        }
        $user->update($data);
        return redirect()->back()->with(['success' => 'Profil berhasil diperbaharui']);
    }

    public function referalProduct($user, $product)
    {
        $code = $user . '-' . $product;
        $product = Product::find($product);
        $cookie = cookie('dw-afiliasi', json_encode($code), 2880);
        return redirect(route('front.show_product', $product->slug))->cookie($cookie);
    }

    public function listCommission()
    {
        $user = auth()->guard('customer')->user();
        $orders = Order::where('ref', $user->id)->where('status', 4)->paginate(10);
        return view('ecommerce.affiliate', compact('orders'));
    }

    public function about_us()
    { 
        return view('about_us');
    }

    public function term_condition()
    { 
        return view('term_condition');
    }

    public function tutorial()
    { 
        return view('tutorial');
    }
}

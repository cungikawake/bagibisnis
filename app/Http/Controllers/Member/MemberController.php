<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Member;
use App\Province;
use App\City;
use App\District;
use App\User;
use App\Product;
use App\Notification;
use App\Review;

use Auth;
use Session;
use Image;

class MemberController extends Controller
{
    

    public function index(){
        return $this->profile();
    }

    public function profile(){
        $user = Auth::user();

        $member = User::select(
            '*',
            'members.name as member_name',
            'members.id as member_id',
            'provinces.name as province_name', 
            )
            ->join('members', 'members.user_id', 'users.id')
            ->join('provinces', 'provinces.id', 'members.province_id') 
            ->where('members.user_id', $user->id)
            ->first(); 
         
         
         
        $products = Product::orderBy('created_at', 'DESC')
        ->where('member_id', $member->member_id)
        ->paginate(10);
         

        return view('member.profile', compact('member', 'products', 'user'));
        
    }

    public function edit(){
        $user = Auth::user();

        $member = Member::where('user_id', $user->id)->first();
        
        
        $provinces = Province::get();
        $cities = City::get();
          
        return view('member.edit', compact('member', 'provinces', 'cities', 'user'));
        
    } 
    public function update(Request $request){
        $user = Auth::user();
         
        $this->validate($request,[
            'name' => ['required', 'string', 'min:5', 'max:255'],  
            'phone_number' => ['required', 'numeric', 'min:10'], 
            'province' => ['required', 'min:1'],  
        ]); 

        $member = Member::where('user_id', $user->id)
            ->first();
        
        $member->name = $request->name;
        $member->shop_name = $request->name;
        $member->phone_number = $request->phone_number;
        $member->address = '';
        $member->province_id = $request->province; 
        $member->save();

        if($request->hasFile('logo'))
        {
            $this->validate($request,[
                'photo' => 'image|mimes:jpeg,png,jpg',
            ]); 

            $allowedfileExtension=['jpeg','jpg','png'];
            $file = $request->file('logo');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);
             
            if($check){ 
                /* $filename = time() .'-'. \Str::slug($request->shop_name) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/member', $filename);  */
                
                $image                   =       $request->file('logo');
                $input['imagename']      =       time().'.x.'.$image->getClientOriginalExtension(); 
                $destinationPath         =       public_path('app/public/member'); 
                $img                     =       Image::make($image->path());


                // --------- [ Resize Image ] --------------- 
                $img->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']); 
                 

                $member = Member::where('user_id', $user->id)
                ->first();
                $member->logo = $input['imagename'];
                $member->save();
            }
        }

        return redirect()->route('member.profile')->with('success', 'User update successfully.');
    }

    public function notif(){
        $user = Auth::user();
        $member = User::join('members', 'members.user_id', 'users.id')
            ->where('members.user_id', $user->id)
            ->first();
        
        $notifcategory = Notification::join('members', 'members.province_id', '=' ,'notifications.province_id') 
        ->join('categories', 'categories.id', '=', 'notifications.category_id') 
        ->get();
        
        $categories = [];
        foreach($notifcategory as $category){
            $categories[$category->category_id] = array(
                'id' => $category->category_id,
                'name' => $category->name,
                'icon' => $category->icon
            );
        }
         
 
        $notifproducts = Notification::select(
            'products.name as product_name',
            'products.slug as product_slug',
            'products.id as product_id',
            'products.image as product_image',
            'products.modal as product_modal',
            'products.category_id as category_id'
        )
        ->where('notifications.province_id', $member->province_id)
        ->join('products', 'products.id', '=', 'notifications.product_id') 
        ->get(); 

        $products = [];
        foreach($notifproducts as $product){
            if(isset($categories[$product->category_id])){
                $products[$product->category_id][$product->product_id] = array(
                    'product_name' => $product->product_name,
                    'product_image' => $product->product_image,
                    'product_modal' => $product->product_modal, 
                    'product_slug' => $product->product_slug
                );
            } 
        } 
         
        return view('member.notif', compact('member', 'products', 'categories', 'user'));
    }

    public function store_review(Request $request){
        $this->validate($request, [
            'comment' => 'required|string|max:300|min:5', 
        ]);

        $user = Auth::user();
        $member = User::select('*', 'members.id as member_id')
            ->join('members', 'members.user_id', 'users.id')
            ->where('members.user_id', $user->id)
            ->first();
         
        $review = new Review;
        $review->member_id = $member->member_id;
        $review->product_id = $request->product;
        $review->review = $request->comment;
        $review->status = 1;
        $review->save();

        return back()->with('success', 'Terima kasih sudah memberikan review.');
    }

    public function paket(){
        $user = Auth::user();
        return view('member.paket', compact('user'));
    }
}

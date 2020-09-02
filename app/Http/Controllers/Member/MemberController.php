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

use Auth;
use Session;

class MemberController extends Controller
{
    

    public function index(){
        return $this->profile();
    }

    public function profile(){
        $user = Auth::user();
        $member = User::join('members', 'members.user_id', 'users.id')
            ->where('members.user_id', $user->id)
            ->first(); 
         
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
         
        return view('member.profile', compact('member', 'products'));
        
    }

    public function edit(){
        $user = Auth::user();
        $member = User::join('members', 'members.user_id', 'users.id')
            ->where('members.user_id', $user->id)
            ->first();
        
        $provinces = Province::get();
        $cities = City::get();
          
        return view('member.edit', compact('member', 'provinces', 'cities'));
        
    } 
    public function update(Request $request){
        $user = Auth::user();
         
        $this->validate($request,[
            'name' => ['required', 'string', 'min:5', 'max:255'], 
            'shop_name' => ['required', 'string', 'min:5', 'max:255'],
            'phone_number' => ['required', 'numeric', 'min:10'], 
            'address' => ['required', 'string', 'min:5'], 
            'province' => ['required', 'min:1'], 
            'city' => ['required', 'min:1'],  
        ]); 

        $member = Member::where('user_id', $user->id)
            ->first();
        
        $member->name = $request->name;
        $member->shop_name = $request->shop_name;
        $member->phone_number = $request->phone_number;
        $member->address = $request->address;
        $member->province_id = $request->province;
        $member->city_id = $request->city;
        $member->save();

        if($request->hasFile('logo'))
        {
            $this->validate($request,[
                'photo' => 'mimes:jpeg,png,jpg |max:1024',
            ]); 

            $allowedfileExtension=['jpeg','jpg','png'];
            $file = $request->file('logo');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);
             
            if($check){ 
                $filename = time() .'-'. \Str::slug($request->shop_name) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/member', $filename); 

                $member = Member::where('user_id', $user->id)
                ->first();
                $member->logo = $filename;
                $member->save();
            }
        }

        return back()->with('success', 'User update successfully.');
    }
}

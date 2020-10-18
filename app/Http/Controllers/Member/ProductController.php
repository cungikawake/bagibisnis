<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\Category;
use App\Province;
use App\User;
use App\Member;
use App\Notification;
use Image;
use File;
use Auth;

class ProductController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $member = Member::where('user_id', $user->id)->first();
        $category = Category::orderBy('name', 'DESC')->get();
        $provinces = Province::get();

        return view('products.create', compact('category', 'member', 'provinces'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:150|unique:products,name',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'modal' => 'required|integer',  
        ]);
          
        if ($request->hasFile('image')) {
            $user = Auth::user();
            $member = Member::where('user_id', $user->id)->first();

            //count produk
            $total_product = Product::where('member_id', $member->id)->count();
             
            //user freee
            if($member->quota_post  > $total_product){
                
                $images = array();
                foreach($request->file('image') as $key => $file){
                    $file = $file;
                    
                    /* $filename = time() . $key . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/products', $filename); */

                    $image                   =       $request->file('image');
                    $input['imagename']      =       time().'.x.'.$image->extension(); 
                    $destinationPath         =       public_path('/storage/products'); 
                    $img                     =       Image::make($image->path()); 

                    // --------- [ Resize Image ] --------------- 
                    $img->resize(150, 150, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$input['imagename']); 

                    $images[] = $filename;
                }

                $product = Product::create([
                    'name' => $request->name,
                    'slug' => str_replace('-',' ',$request->name),
                    'category_id' => $request->category_id,
                    'description' => $request->description,
                    'image' => implode("|",$images),
                    'modal' => $request->modal,  
                    'tag' => $request->tag,
                    'member_id' => $member->id
                ]);
                
                $province = Province::where('name', $request->tag)->first();

                $members = Member::where('province_id', $province->id)->get();
                
                //make notif
                if(count($members)> 0){
                    foreach($members as $member){ 
                        if($province->id == $member->province_id && $member->user_id != $user->id){
                            $notif = new Notification;
                            $notif->type = 1;
                            $notif->province_id = $province->id;
                            $notif->category_id = $request->category_id;
                            $notif->product_id = $product->id;
                            $notif->save();
                        }
                    }
                }
                return redirect(route('member.profile'))->with(['success' => 'Postingan Baru Ditambahkan']);

            }elseif($member->type_member == 3){
                $images = array();
                foreach($request->file('image') as $key => $file){
                    $file = $file;
                    $filename = time() . $key . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/products', $filename);
                    $images[] = $filename;
                }

                $product = Product::create([
                    'name' => $request->name,
                    'slug' => str_replace('-',' ',$request->name),
                    'category_id' => $request->category_id,
                    'description' => $request->description,
                    'image' => implode("|",$images),
                    'modal' => $request->modal,  
                    'tag' => $request->tag,
                    'member_id' => $member->id
                ]);
                
                $province = Province::where('name', $request->tag)->first();

                $members = Member::where('province_id', $province->id)->get();
                
                //make notif
                if(count($members)> 0){
                    foreach($members as $member){ 
                        if($province->id == $member->province_id && $member->user_id != $user->id){
                            $notif = new Notification;
                            $notif->type = 1;
                            $notif->product_id = $product->id;
                            $notif->category_id = $product->category_id;
                            $notif->province_id = $province->id;
                            $notif->save();
                        }
                    }
                }
                return redirect(route('member.profile'))->with(['success' => 'Postingan Baru Ditambahkan']);
            }else{
               return redirect(route('member.profile'))->with(['success' => 'Maaf, Akun sudah mencapai limit posting!']);
            }  
        }
    }
}

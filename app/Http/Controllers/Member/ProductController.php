<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\Category;
use App\User;
use App\Member;
use File;
use Auth;

class ProductController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $member = Member::where('user_id', $user->id)->first();
        $category = Category::orderBy('name', 'DESC')->get();
         
        return view('products.create', compact('category', 'member'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:150|unique:products,name',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'modal' => 'required|integer',
            'provit' => 'required|integer', 
        ]);
          
        if ($request->hasFile('image')) {
            $user = Auth::user();
            $member = Member::where('user_id', $user->id)->first();

            $images = array();
            foreach($request->file('image') as $key => $file){
                $file = $file;
                $filename = time() . $key . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/products', $filename);
                $images[] = $filename;
            }

            $product = Product::create([
                'name' => $request->name,
                'slug' => str_replace(' ',',',$request->name),
                'category_id' => $request->category_id,
                'description' => $request->description,
                'image' => implode("|",$images),
                'modal' => $request->modal,
                'provit' => $request->provit,
                'satuan' => $request->satuan,
                'tag' => $request->tag,
                'member_id' => $member->id
            ]);

            return redirect(route('member.profile'))->with(['success' => 'Produk Baru Ditambahkan']);
        }
    }
}

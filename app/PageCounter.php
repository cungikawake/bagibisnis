<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Product;

class PageCounter extends Model 
{
    protected $table = 'page_counter';

    public static function createViewLog($post) {
        $postsViews= new PageCounter();
        $postsViews->product_id = $post->id; 
        $postsViews->url = \Request::url();
        $postsViews->session_id = \Request::getSession()->getId();
        $postsViews->ip = \Request::getClientIp();
        $postsViews->agent = \Request::header('User-Agent');
        $postsViews->save(); 

        $product = Product::findOrFail($post->id);
        $visitor = $product->visitor + 1;
        $product->visitor = $visitor;
        $product->save();

    }
}

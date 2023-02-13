<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function viewWishlist()
    {
        if(Auth::check()){
        $wishlist = Wishlist::where('user_id',Auth::id())->withCount('product')->get();
        return view('front.wishlist',compact('wishlist'));
        }else{
            return back()->with('status' , 'login to continue');
        }
    }

    public function loadwishlist()
    {
        $count= Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$count]);
    }
    
    public function addToWishlist(Request $request)
    {
        $product_id = $request->input('product_id');
        $prod = Product::where('id',$product_id)->first();
        if(Auth::check()){
            if($prod){
                if(Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){

                    return response()->json(['status' => $prod->name .' ' .'already added to washlist']);
                
                }else{
                    $wishlistitem = new Wishlist();
                    $wishlistitem->prod_id = $product_id;
                    $wishlistitem->user_id = Auth::user()->id;
                    $wishlistitem->save();
                    return response()->json(['status' => $prod->name .' '. 'added to washlist']);
                }
            }
        }else{
            return response()->json(['status' => 'login to continue']);
        }
    }

    public function removeProduct(Request $request)
    {
        if(Auth::check()){
            $product_id = $request->input('product_id');
            if(Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                $wishlistitem = Wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
                $wishlistitem->delete();
                return response()->json(['status' => 'product deleted']);
            }
        }else{
            return response()->json(['status' => 'login to continue']);
        }
    }
}


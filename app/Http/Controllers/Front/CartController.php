<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{   
    public function viewCart()
    {
        if(Auth::check()){
        $cart = Cart::where('user_id',Auth::id())->withCount('product')->get();
        return view('front.cart',compact('cart'));
        }else{
            return back()->with('status' , 'login to continue');
        }
    }

    public function loadCart()
    {
        $count= Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$count]);
    }

    public function removeProduct(Request $request)
    {
        if(Auth::check()){
            $product_id = $request->input('product_id');
            if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                $cartitem = Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
                $cartitem->delete();
                return response()->json(['status' => 'product deleted']);
            }
        }else{
            return response()->json(['status' => 'login to continue']);
        }
    }

    public function updateCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        if(Auth::check()){
            if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                $cart = Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
                if($product_qty > $cart->product->qty){
                    return response()->json(['error' => 'plz choose less qty']);
                }else{
                $cart->prod_qty = $product_qty ;
                $cart->update(); 
                return response()->json(['status' => 'quantity updated']);
                }
            }
        }else{
            return response()->json(['status' => 'login to continue']);
        }
    }

    public function addToCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $prod = Product::where('id',$product_id)->first();
        if(Auth::check()){
            if($prod){
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){

                    return response()->json(['status' => $prod->name .' ' .'already added to cart']);
                
                }else{
                    $cartitem = new Cart();
                    $cartitem->prod_id = $product_id;
                    $cartitem->prod_qty = $product_qty;
                    $cartitem->user_id = Auth::user()->id;
                    $cartitem->save();
                    return response()->json(['status' => $prod->name .' '. 'added to cart']);
                }
            }
        }else{
            return response()->json(['status' => 'login to continue']);
        }
    }
}

<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {   
        $cart = Cart::where('user_id',Auth::id())->withCount('product')->get();
        return view('front.checkout',compact('cart'));
    }

    public function placeOrder(Request $request)
    {   
        try{
            $order = new Order();
            $order->user_id = Auth::id();
            $order->fname = $request->fname;
            $order->lname = $request->lname;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->code = $request->code;
            $order->country = $request->country;
            $order->state = $request->state;
            $s=0;
            $carttotal = Cart::where('user_id',Auth::id())->get();
            foreach ($carttotal as $item) {
                $s +=$item->product->o_price * $item->prod_qty;
            }
            $order->total = $request->total;
            $order->profit=($request->total - $s) - 10;
            $order->tracking_no = 'shop' . rand('1111','9999');
            $order->save();
            return $this->orderItem($order,$request);
        }catch(\Exception $e){
            return response()->json([
                'status'=> 'some error try again',
            ],500);
        }        
    }
    public function orderItem($order,$request)
    {
        try{
            $cart = Cart::where('user_id',Auth::id())->get();
            foreach ($cart as $item ) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'prod_id' => $item->prod_id,
                    'qty'     => $item->prod_qty,
                    'price'   => $item->product->s_price,
                ]);
            }
            return $this->userInfo($order,$request);
        }catch(\Exception $e){
            return response()->json([
                'status'=> 'some error try again',
            ],500);
        }
    }
    public function userInfo($order,$request)
    {
        try{
            if(Auth::user()->address == Null){
                $user = User::where('id',Auth::user()->id)->first();
                $user->lname = $request->input('lname');
                $user->phone = $request->input('phone');
                $user->address = $request->input('address');
                $user->city = $request->input('city');
                $user->code = $request->input('code');
                $user->country = $request->input('country');
                $user->state = $request->input('state');
                $user->update();
            }
            return $this->notifiAdmin($order);
        }catch(\Exception $e){
            return response()->json([
                'status'=> 'some error try again',
            ],500);
        }
    }
    public function notifiAdmin($order)
    {
        Notice::create([
            'type' => 'new order',
            'data' => '/admin/view-order/'.$order->id,
        ]);
        return $this->deleteCart();
    }
    public function deleteCart()
    {
        try{
            $cartItem = Cart::where('user_id',Auth::id())->get();
            Cart::destroy($cartItem);
            return response()->json([ 'status'=> 'yes']);
        }catch(\Exception $e){
            return response()->json([
                'status'=> 'some error try again',
            ],500);
        }    
    }
    
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons= Coupon::all();
        return view('admin.coupon.index',compact('coupons'));
    }

    public function add()
    {
        return view('admin.coupon.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'code'=>'string|required',
            'type'=>'required|in:fixed,percent',
            'value'=>'required|numeric',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $status=Coupon::create($data);
        if($status){
            return redirect('coupons')->with('status','Coupon Successfully added');
        }
        else{
            return redirect('coupons')->with('error','Please try again!!');
        }
    }
            // checkout coupon
    public function couponStore(Request $request){
        
        $coupon=Coupon::where('code',$request->code)->first();
        if(!$coupon){
            return back()->with('error','Invalid coupon code, Please try again');
        }
        if($coupon){
            session()->put('coupon',[
                'id'=>$coupon->id,
                'code'=>$coupon->code,
                'type'=>$coupon->type,
                'value'=>$coupon->value,
            ]);
            return redirect()->back()->with('success','Coupon successfully applied');
        }
    }

    public function destroy($id)
    {
        $coupon=Coupon::find($id);
        if($coupon){
            $status=$coupon->delete();
            if($status){
                if(session()->has('coupon')){
                    session()->forget('coupon');
                }
                return redirect('coupons')->with('status','Coupon successfully deleted');
            }
            else{
                return redirect('coupons')->with('error','Error, Please try again');
            }
        }
        else{
            return redirect()->back()->with('error','Coupon not found');
        }
    }
}

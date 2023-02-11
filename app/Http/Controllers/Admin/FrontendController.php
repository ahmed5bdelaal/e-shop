<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function __construct()
    {
        $this->middleware('isadmin');
    }

    public function index(){
        
        $products=Product::count();
        $trend = Product::where('trending','1')->take(5)->get();
        $a_products=Product::where('qty','<','5')->count();
        $o_products=Product::where('qty','=','0')->count();
        $top = Product::select('name','id','image','o_price')->orderBy('rate','desc')->take(5)->get();
        $orderss=Order::count();
        $orders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')->where('status','1')
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy('month')
        ->get();
        $ordersC=Order::where('status','1')->count();
        $categorys=Category::count();
        $brands=Brand::count();
        $users=User::where('role_as','0')->count();
        return view('admin.index',compact('orderss','brands','trend','categorys','products','orders','ordersC','users','a_products','o_products','top'));
    }

    public function orders(){
        $orders = Order::where('status','0')->get();
        return view('admin.order.orders',compact('orders'));
    }

    public function profits()
    {
        $sales=Order::where('status','1')->sum('total');
        $profits=Order::where('status','1')->sum('profit');
        $p_year=Order::where('status','1')->whereYear('created_at', Carbon::now()->year)->sum('profit');
        $p_month=Order::where('status','1')->whereMonth('created_at', Carbon::now()->month)->sum('profit');
        $p_day=Order::where('status','1')->whereDay('created_at', Carbon::now()->day)->sum('profit');
        $s_year=Order::where('status','1')->whereYear('created_at', Carbon::now()->year)->sum('total');
        $s_month=Order::where('status','1')->whereMonth('created_at', Carbon::now()->month)->sum('total');
        $s_day=Order::where('status','1')->whereDay('created_at', Carbon::now()->day)->sum('total');
        $s_year_chart = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total')->where('status','1')
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy('month')
        ->get();
        $p_year_chart = Order::selectRaw('MONTH(created_at) as month, SUM(profit) as profit')->where('status','1')
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy('month')
        ->get();
        return view('admin.profits',compact('profits','p_year','p_month','p_day','sales','s_year','s_month','s_day','p_year_chart','s_year_chart'));
    }

    public function viewOrder($id){
        $order = Order::where('id',$id)->with('orderItems')->first();
        return view('admin.order.view',compact('order'));
    }

    public function editOrder(Request $request ,$id){
        $order = Order::where('id',$id)->first();
        $order->status = $request->order_status;
        $order->update();
        return redirect()->back()->with('status','order change successfully');
    }

    public function history()
    {
        $orders = Order::where('status','1')->get();
        return view('admin.order.history',compact('orders'));
    }

    public function notification(){
        return view('admin.notification');
    }
}

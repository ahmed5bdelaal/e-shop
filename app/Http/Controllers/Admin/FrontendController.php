<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\cancelOrder;
use App\Mail\OrderMail;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Notice;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;

class FrontendController extends Controller
{

    public function __construct()
    {
        $this->middleware('isadmin');
    }

    public function index(){
        
        $products=Product::count();
        $trend = Product::where('trending','1')->take(5)->with('images')->get();
        $a_products=Product::where('qty','<','5')->count();
        $o_products=Product::where('qty','=','0')->count();
        $top = Product::select('name','id','o_price')->orderBy('rate','desc')->take(5)->get();
        $orderss=Order::count();
        $orders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')->where('status','delivered')
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy('month')
        ->get();
        $ordersC=Order::where('status','delivered')->count();
        $categorys=Category::count();
        $brands=Brand::count();
        $users=User::where('role_as','0')->count();
        return view('admin.index',compact('orderss','brands','trend','categorys','products','orders','ordersC','users','a_products','o_products','top'));
    }

    public function orders(){
        $orders = Order::where('status','new')->get();
        return view('admin.order.orders',compact('orders'));
    }

    public function ordersCanceled()
    {
        $orders = Order::where('status','cancel')->get();
        return view('admin.order.cancel',compact('orders'));
    }

    public function profits()
    {
        $sales=Order::where('status','delivered')->sum('total');
        $profits=Order::where('status','delivered')->sum('profit');
        $p_year=Order::where('status','delivered')->whereYear('created_at', Carbon::now()->year)->sum('profit');
        $p_month=Order::where('status','delivered')->whereMonth('created_at', Carbon::now()->month)->sum('profit');
        $p_day=Order::where('status','delivered')->whereDay('created_at', Carbon::now()->day)->sum('profit');
        $s_year=Order::where('status','delivered')->whereYear('created_at', Carbon::now()->year)->sum('total');
        $s_month=Order::where('status','delivered')->whereMonth('created_at', Carbon::now()->month)->sum('total');
        $s_day=Order::where('status','delivered')->whereDay('created_at', Carbon::now()->day)->sum('total');
        $s_year_chart = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total')->where('status','delivered')
        ->groupBy('month')
        ->get();
        $reports = Order::selectRaw('MONTH(created_at) as month,COUNT(*) as count ,SUM(profit) as profit ,SUM(total) as total')->where('status','delivered')
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy('month')
        ->get();
        $p_year_chart = Order::selectRaw('MONTH(created_at) as month, SUM(profit) as profit')->where('status','delivered')
        ->groupBy('month')
        ->get();
        return view('admin.profits',compact('profits','reports','p_year','p_month','p_day','sales','s_year','s_month','s_day','p_year_chart','s_year_chart'));
    }

    public function viewOrder($id){
        $order = Order::where('id',$id)->with('orderItems')->first();
        return view('admin.order.view',compact('order'));
    }

    public function editOrder(Request $request ,$id){
        $order = Order::where('id',$id)->first();
        $order->status = $request->order_status;
        if($request->message){
            $order->message = $request->message;
        }
        $status=$order->update();
        if($request->order_status == "cancel"){
            Mail::to($order->email)->send(new cancelOrder($order));
        }
        if($request->order_status == "process"){
            Mail::to($order->email)->send(new OrderMail($order));
        }
        if($status){
            return $this->productQty($order);
        }  
    }
    public function productQty($order)
    {
        foreach($order->orderItems as $item){
            $product=Product::where('id',$item->prod_id)->first();
            $product->qty=$product->qty - $item->qty;
            $status=$product->update();
            if($status){
                if($product->qty == 5){
                    Notice::create([
                        'type' => 'product almost Out Of Stock',
                        'data' => '/edit-product/'.$product->id,
                    ]);
                }
            }
        }
        return redirect()->back()->with('status','order change successfully');
    }

    public function history()
    {
        $orders = Order::where('status','delivered')->get();
        return view('admin.order.history',compact('orders'));
    }

    public function notification(){
        return view('admin.notification');
    }

    public function noticeRead(Request $request)
    {
        $notice=Notice::where('id',$request->id)->first();
        $notice->read_at=Carbon::now();
        $notice->update();
        return response()->json(['status'=>'yes']);
    }

    public function noticeReadAll()
    {
        $notices=Notice::where('read_at',null)->get();
        foreach($notices as $notice){
            $notice->read_at=Carbon::now();
            $notice->update();
        }
    }
}

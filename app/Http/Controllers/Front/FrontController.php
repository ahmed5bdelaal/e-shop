<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Notice;
use App\Models\Rating;
use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function setting()
    {
        $settings=setting::first();
            if($settings){
                return $this->index();
            }else{
                return view('setup.setup');
            };
    }

    public function index()
    {
        $categorys = Category::all();
        $brands= Brand::all();
        $products = Product::where('trending','1')->take(4)->withCount('rating','category','images')->get();
        $dis = Product::where('dis','1')->take(4)->withCount('rating','category','images')->get();
        $bestSelling =OrderItem::groupBy('prod_id')
        ->selectRaw('sum(qty) as sum, prod_id')->orderBy("sum","desc")->limit(4)->get();
        $top = Product::select('name','id','o_price')->orderBy('rate','desc')->take(4)->with('images')->get();
        $new = Product::select('name','id','o_price')->latest()->take(4)->with('images')->get();
        return view('front.index',compact('categorys','bestSelling','products','new','top','dis','brands'));
    }

    public function productList()
    {
        $products = Product::select('name')->get();
        $data = [];
        foreach ($products as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }

    public function search(Request $request)
    {
        $searched = $request->searched;
        if($searched != ' '){
            $product = Product::where('name','like','%'.$searched.'%')->first();
            return redirect('get-product/'.$product->id);
        }else{
            return redirect()->back();
        }
    }

    public function product($id)
    {
        
        $product = Product::withCount('category','images')->findOrfail($id);
        $rating = Rating::where('prod_id',$id)->get();
        return view('front.single',compact('product','rating'));
    }

    public function products(Request $request)
    {
        $brands=Brand::withCount('products')->get();
        $brand= $request->input('brand');
        $price=$request->input('price');
        $category=$request->input('category');
            if($brand || $price || $category){
                $products=Product::where(function($query) use ($brand,$price,$category){
                    if($brand){
                        $query->where('brand_id',$brand);
                    }
                    if($price){
                        $query->where('s_price','<=',$price);
                    }
                    if($category){
                        $query->where('cate_id',$category);
                    }
                });
            }else{
                $products=Product::withCount('rating','category','images');
            }
    
            if($request->sort === 'all'){
                $products=Product::withCount('rating','category','images'); 
            }elseif($request->sort === 'price_asc') {
                $products->orderBy('o_price','asc');
            }elseif($request->sort === 'price_desc'){
                $products->orderBy('o_price','desc');
            }elseif($request->sort === 'popularity'){
                $products->where('trending','1');
            }elseif($request->sort === 'newest'){
                $products->orderBy('created_at','desc');
            }elseif($request->sort === 'offers'){
                $products->where('dis','1');
            }
        $products = $products->paginate(12);
        return view('front.products',compact('products','brands'));
    }

    public function category($id)
    {
        $category=Category::where('id',$id)->first();
        $products=Product::where('cate_id',$id)->with('category','rating','images')->paginate(12);
        return view('front.category',compact('products','category'));
    }

    public function cShop()
    {
        return redirect()->back();
    }
    
    public function cart()
    {
        return view('front.cart');
    }

    public function myOrders()
    {
        $orders = Order::where('user_id',Auth::id())->get();
        return view('front.myorders',compact('orders'));
    }

    public function viewOrders($id)
    {
        $order = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('front.vieworder',compact('order'));
    }

    public function cancelOrder(Request $request ,$id){
        $order = Order::where('id',$id)->first();
        $order->status = $request->order_status;
        if($request->message){
            $order->message = $request->message;
        }
        $status=$order->update();
        if($status){
            return $this->noti($order);
        }  
    }

    public function noti($order)
    {
        Notice::create([
            'type' => 'order canceled',
            'data' => '/admin/view-order/'.$order->id,
        ]);
        return redirect()->back()->with('status','order canceled successfully');
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }
}

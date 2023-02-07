<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\ApiController;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class FrontController extends ApiController
{
    public function index()
    {
        $data['categorys'] = Category::all();
        $data['brands']= Brand::all();
        $data['products'] = Product::where('trending','1')->take(4)->withCount('rating','category')->get();
        $data['dis'] = Product::where('dis','1')->take(4)->withCount('rating','category')->get();
        $data['bestSelling'] =OrderItem::groupBy('prod_id')
        ->selectRaw('sum(qty) as sum, prod_id')->orderBy("sum","desc")->limit(4)->get();
        $data['top'] = Product::select('name','id','image','o_price')->orderBy('rate','desc')->take(3)->get();
        $data['new'] = Product::select('name','id','image','o_price')->latest()->take(3)->get();
        return $this->sendResponse($data, 'true');
    }

    public function productList()
    {
        $products = Product::select('name')->get();
        $data = [];
        foreach ($products as $item) {
            $data[] = $item['name'];
        }
        return $this->sendResponse($data, 'true');
    }

    public function search(Request $request)
    {
        $searched = $request->searched;
        if($searched != ' '){
            $product = Product::where('name','like','%'.$searched.'%')->first();
            return $this->sendResponse($product->id, 'true');
        }else{
            return $this->sendError('error','required');
        }
    }

    public function product($id)
    {
        
        $data['product'] = Product::withCount('category')->findOrfail($id);
        $data['rating'] = Rating::where('prod_id',$id)->get();
        return $this->sendResponse($data, 'true');
    }

    public function products(Request $request)
    {
        $data['brands']=Brand::withCount('products')->get();
        $brand= $request->input('brand');
        $price=$request->input('price');
        $category=$request->input('category');
            if($brand || $price || $category){
                $products=Product::where(function($query) use ($brand,$price,$category){
                    if($brand){
                        $query->where('brand_id',$brand);
                    }
                    if($price){
                        $query->where('o_price','<=',$price);
                    }
                    if($category){
                        $query->where('cate_id',$category);
                    }
                });
            }else{
                $products=Product::withCount('rating','category');
            }
    
            if($request->sort === 'all' || !$request->sort){
                $products=Product::withCount('rating','category');  
            }elseif($request->sort === 'price_asc') {
                $products->orderBy('o_price','asc');
            }elseif($request->sort === 'price_desc'){
                $products->orderBy('o_price','desc');
            }elseif($request->sort === 'popularity'){
                $products->where('trending','1');
            }elseif($request->sort === 'newest'){
                $products->orderBy('created_at','desc');
            }
        $data['products'] = $products->paginate(12);
        return $this->sendResponse($data, 'true');
    }

    public function category($id)
    {
        $data['category']=Category::where('id',$id)->first();
        $data['products']=Product::where('cate_id',$id)->with('category','rating')->paginate(12);
        return $this->sendResponse($data, 'true');
    }

    public function myOrders()
    {
        $orders = Order::where('user_id',Auth::id())->get();
        return $this->sendResponse($orders, 'true');
    }

    public function viewOrders($id)
    {
        $order = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return $this->sendResponse($order, 'true');
    }
}

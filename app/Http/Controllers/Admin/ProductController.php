<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Helpers\Helper;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DataTables;

class ProductController extends Controller
{   
    public function index(){
        return view('admin.product.index');
    }

    public function getPoductDatatable()
    {
        $data = Product::select('*');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addcolumn('action',function($row){
            return $btn =
            '<a href="'.route('edit.product',$row->id).'" class="btn btn-primary btn-sm">Edit</a>
            <form method="POST" id="form" action="'.url('remove-product/'.$row->id).'">
            '.csrf_field().'
                <input type="hidden" name="_method" value="POST">
                <button type="button" class="btn btn-danger btn-sm show_confirm" data-id='.$row->id.' data-toggle="tooltip" data-placement="bottom" title="Delete">Delete</button>
            </form>';
            
        })
        ->addcolumn('category',function($row){
            return $btn =
            $row->category->name;
            
        })
        ->addcolumn('image',function($row){
            return $btn =
            '<img src="'.asset('assets/uploads/product/'.Image::whereId($row->id)->value('name')).'" width="100%" alt="#">';
            
        })
        ->rawColumns(['action','category','image'])
        ->make(true);
        
    }

    public function add(){
        $categorys = Category::all();
        $brands=Brand::all();
        return view('admin.product.add',compact('categorys','brands'));
    }

    public function insert(ProductStoreRequest $request){  
        $data = $request->validated();
        if($request->input('dis') == true){
            $data['offer']=$request->input('offer');
        }
        $data['status']=$request->input('status') == true ? '1':'0';
        $data['dis']=$request->input('dis') == true ? '1':'0';
        $data['trending']=$request->input('trending') == true ? '1':'0';
        $status=Product::create($data);
        if($request->hasFile('image')){
            foreach($request->image as $key => $file)
            {
                $filename= Helper::uplodePhotoProduct($file);
                $image= new Image;
                $image->product_id=$status->id;
                $image->name= $filename;
                $image->save();
            }
        }
        if($status){
            return redirect('products')->with('status','Product successfully created');
         }else{
            return redirect('products')->with('error','Error, Please try again');
         }
    }

    public function deleteImage(Request $request)
    {
        $image=Image::whereId($request->id)->first();
        $status=$image->delete();
        if($status){
            return response()->json(['status','image deleted']);
        }else{
            return response()->json(['status','some error try again']);
        }
    }

    public function imagesProduct($id)
    {
       $product=Product::whereId($id)->first();
       return view('admin.product.images',compact('product'));
    }

    public function addImage(Request $request ,$id)
    {
        if($request->image){
            foreach($request->image as $file)
            {
                $filename= Helper::uplodePhotoProduct($file);
                $image= new Image;
                $image->product_id=$id;
                $image->name= $filename;
                $image->save();
            }
            return redirect('/images-product/'.$id)->with('status','added succsessfly');
        }else{
            return redirect()->back()->with('status','error');
        }
    }
    
    public function edit($id)
    {   
        $product = product::with('brand','category')->findOrFail($id);
        $brands=Brand::all();
        return view('admin.product.edit',compact('product','brands'));
    }

    public function update(ProductStoreRequest $request , $id)
    {
        $data = $request->validated();
        $product = product::findOrFail($id);
        if($request->hasFile('image')){
            $filename= Helper::uplodePhotoProduct($request->image);
            $image = $filename;
            $data['image']=$image;
        }
        if($request->input('dis') == true){
            $data['offer']=$request->input('offer');
        }
        $data['status']=$request->input('status') == true ? '1':'0';
        $data['dis']=$request->input('dis') == true ? '1':'0';
        $data['trending']=$request->input('trending') == true ? '1':'0';
        $status=$product->update($data);
        if($status){
           return redirect('products')->with('status','Product successfully updated');
        }
        else{
           return redirect('products')->with('error','Error, Please try again');
        }
    }

    public function destroy($id)
    {
        $product = product::findOrFail($id);
        if($product){
                if(is_countable($product->image) && count($product->image) > 1){
                    foreach ($product->image as $value) {
                        $path = 'assets/uploads/product/'.$value;
                        if(File::exists($path)){
                            File::delete($path);
                        }
                    }
                }else{
                    $path = 'assets/uploads/product/'.$product->image[0];
                    if(File::exists($path)){
                        File::delete($path);
                    }
                }
            $product->delete();
            return redirect('products')->with('status','product deleted successfully');
        }else{
            return redirect('products')->with('error','sorry try again');
        }
    }
}

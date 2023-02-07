<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    public function add()
    {
        return view('admin.brand.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'string|required',
            'photo'=>'required|image',
        ]);
        $data=$request->all();
        if($request->hasFile('photo')){
            $path= 'assets/uploads/brand';
            $filename=Helper::uplodePhoto($request->photo,$path);
            $data['photo'] = $filename;
        }
        $slug=Str::slug($request->title);
        $count=Brand::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        // return $data;
        $status=Brand::create($data);
        if($status){
           return redirect('/brands')->with('status','Brand successfully created');
        }
        else{
           return redirect('/brands')->with('error','Error, Please try again');
        }
    }

    public function edit($id)
    {
        $brand=Brand::find($id);
        if(!$brand){
            return redirect()->back()->with('status','Brand not found');
        }
        return view('admin.brand.edit',compact('brand'));
    }

    public function update(Request $request,$id)
    {
        $brand=Brand::find($id);
        $this->validate($request,[
            'title'=>'string|required',
        ]);
        $data=$request->all();
        if($request->hasFile('photo')){
            $pathDelete = 'assets/uploads/brand/'.$brand->photo;
            if(File::exists($pathDelete)){
                File::delete($pathDelete);
            }
            $path= 'assets/uploads/brand';
            $filename=Helper::uplodePhoto($request->photo,$path);
            $data['photo'] = $filename;
        }
        // return $data;
        $status=$brand->update($data);
        if($status){
           return redirect('/brands')->with('status','Brand successfully updated');
        }
        else{
           return redirect('/brands')->with('status','Error, Please try again');
        }
    }

    public function destroy($id)
    {
        $brand=Brand::find($id);
        if($brand){
            if($brand->photo){
                $path = 'assets/uploads/brand/'.$brand->photo;
                if(File::exists($path)){
                    File::delete($path);
                }
            }
            $status=$brand->delete();
            if($status){
                return redirect('brands')->with('status','Brand successfully deleted');
            }
            else{
                return redirect('brands')->with('status','Error, Please try again');
            }
        }else{
            return redirect()->back()->with('status','Brand not found');
        }
    }
}

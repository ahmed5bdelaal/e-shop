<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use Illuminate\Support\Facades\File; 

class CategoryController extends Controller
{
    public function index(){
        $categorys = Category::all();
        return view('admin.category.index',compact('categorys'));
    }

    public function add(){
        return view('admin.category.add');
    }

    public function insert(CategoryStoreRequest $request){
        $data = $request->validated();
        if($request->hasFile('image')){
            $path='assets/uploads/category';
            $filename=Helper::uplodePhoto($request->image,$path);
            $data['image'] = $filename;
        }
        $data['status'] = $request->input('status') == true ? '1':'0';
        $data['popular'] = $request->input('popular') == true ? '1':'0';
        $status=Category::create($data);
        if($status){
           return redirect('categorys')->with('status','Category successfully created');
        }
        else{
           return redirect('categorys')->with('error','Error, Please try again');
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryStoreRequest $request , $id)
    {
        $data = $request->validated();
        $category = Category::findOrFail($id);
        if($request->hasFile('image')){
            $pathDelete = 'assets/uploads/category/'.$category->image;
            if(File::exists($pathDelete)){
                File::delete($pathDelete);
            }
            $path='assets/uploads/category';
            $filename=Helper::uplodePhoto($request->image,$path);
            $data['image'] = $filename;
        }
        $data['status'] = $request->input('status') == true ? '1':'0';
        $data['popular'] = $request->input('popular') == true ? '1':'0';
        $status=$category->update($data);
        if($status){
           return redirect('categorys')->with('status','Category successfully created');
        }
        else{
           return redirect('categorys')->with('error','Error, Please try again');
        }
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if($category->image){
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categorys')->with('status','category deleted successfully');
    }
}

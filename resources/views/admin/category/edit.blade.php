@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
           <form action="{{url('update-category/'.$category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">name</label>
                    <input type="text" value="{{$category->name}}" name="name" class="form-control">
                </div>
                
                <div class="col-md-12 mb-3">
                    <label for="">description</label>
                    <textarea name="disc" rows="3" class="form-control">{{$category->disc}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">status</label>
                    <input type="checkbox" {{$category->status=='1' ? 'checked':''}} name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">popular</label>
                    <input type="checkbox" {{$category->popular=='1' ? 'checked':''}} name="popular">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">meta title</label>
                    <input type="text" value="{{$category->meta_title}}" name="meta_title" class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">meta description</label>
                    <textarea name="meta_disc" class="form-control">{{$category->meta_disc}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">meta keywords</label>
                    <textarea name="meta_keywords" class="form-control">{{$category->meta_keywords}}</textarea>
                </div>
                @if ($category->image)
                    <img src="{{asset('assets/uploads/category/'.$category->image)}}" width="100" >
                @endif
                <div class="col-md-12">
                    <label for="">image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </div>
           </form>
        </div>
    </div>
@endsection
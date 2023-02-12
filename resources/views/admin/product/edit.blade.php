@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Product</h4>
        </div>
        <div class="card-body">
           <form action="{{url('/update-product/'.$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">name</label>
                    <input type="text" value="{{$product->name}}" name="name" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <label for="floatingSelect">Category</label>
                        <select class="form-control" name="cate_id">
                          <option value="{{$product->category->id}}" selected>{{$product->category->name}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <label for="floatingSelect">Brand</label>
                        <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id">
                          <option value="{{$product->brand->id}}" selected>{{$product->brand->title}}</option>
                          @foreach ($brands as $item)
                              <option value="{{$item->id}}">{{$item->title}}</option>
                          @endforeach
                        </select>
                        @error('brand_id')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">quantity</label>
                    <input type="number" value="{{$product->qty}}" name="qty" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="">status</label>
                    <input type="checkbox" {{$product->status=='1' ? 'checked':''}} name="status">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="">offer</label>
                    <input id="dis" type="checkbox" {{$product->dis=='1' ? 'checked':''}} name="dis">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="">trending</label>
                    <input type="checkbox" {{$product->trending=='1' ? 'checked':''}} name="trending">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">description</label>
                    <textarea name="disc" value="" rows="3" class="form-control">{{$product->disc}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">small description</label>
                    <textarea name="s_disc" value="" rows="3" class="form-control">{{$product->s_disc}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">orginal price</label>
                    <input type="number" value="{{$product->o_price}}" name="o_price" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">selling price</label>
                    <input type="number" value="{{$product->s_price}}" name="s_price" class="form-control">
                </div>
                <div id="of" class="col-md-6 mb-3 ofer">
                    <label for="">offer(%)</label>
                    <input type="number" value="{{$product->offer}}" name="offer" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">tax</label>
                    <input type="number" value="{{$product->tax}}" name="tax" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">meta title</label>
                    <input type="text" value="{{$product->meta_title}}" name="meta_title" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">meta description</label>
                    <textarea name="meta_disc" class="form-control">{{$product->meta_disc}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">meta keywords</label>
                    <textarea name="meta_keywords" class="form-control">{{$product->meta_keywords}}</textarea>
                </div>
                @if ($product->image)
                    <img src="{{asset('assets/uploads/product/'.$product->image[0])}}" width="100" >
                @endif
                <div class="col-md-6">
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
@section('scripts')
    <script>
      checkBox = document.getElementById('dis').addEventListener('click', event => {
	if(event.target.checked) {
        document.getElementById('of').classList.remove('ofer');
	}else{
        document.getElementById('of').classList.add('ofer');
    }
});
    </script>
@endsection
@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
           <form action="{{url('insert-product')}}" method="post" enctype="multipart/form-data" id="image-upload">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <label for="floatingSelect">Category</label>
                        <select class="form-control @error('cate_id') is-invalid @enderror" name="cate_id">
                          <option selected>Open menu</option>
                          @foreach ($categorys as $item)
                              <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                        @error('cate_id')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <label for="floatingSelect">Brand</label>
                        <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id">
                          <option selected>Open menu</option>
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
                    <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror">
                    @error('qty')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">small description</label>
                    <textarea name="s_disc" rows="3" class="form-control @error('s_disc') is-invalid @enderror"></textarea>
                    @error('s_disc')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">description</label>
                    <textarea name="disc"  class="form-control @error('disc') is-invalid @enderror"></textarea>
                    @error('disc')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="">status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-4 mb-3 of">
                    <label for="">offer</label>
                    <input id="dis" type="checkbox" name="dis">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="">trending</label>
                    <input type="checkbox" name="trending">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">orginal price</label>
                    <input type="number" name="s_price" class="form-control @error('o_price') is-invalid @enderror">
                    @error('o_price')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">selling price</label>
                    <input type="number" name="o_price" class="form-control @error('s_price') is-invalid @enderror">
                    @error('s_price')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">tax</label>
                    <input type="number" name="tax" value="0" class="form-control @error('tax') is-invalid @enderror">
                    @error('tax')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div id="of" class="col-md-6 mb-3 ofer">
                    <label for="">offer(%)</label>
                    <input type="number" name="offer" class="form-control @error('offer') is-invalid @enderror">
                    @error('offer')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">meta title</label>
                    <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror">
                    @error('meta_title')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">meta description</label>
                    <textarea name="meta_disc" class="form-control @error('meta_disc') is-invalid @enderror"></textarea>
                    @error('meta_disc')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">meta keywords</label>
                    <textarea name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror"></textarea>
                    @error('meta_keywords')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="">image (can attach more than one)</label>
                    <input type="file" multiple name="image[]" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
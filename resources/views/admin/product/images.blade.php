@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Images for {{$product->name}}</h4>
        </div>
        <div class="card-body">
            <div class="row dr">
                @foreach ($product->images as $item)
                    <div class="col-md-1 br">
                        <img class="mb-2" src="{{asset('assets/uploads/product/'.$item->name)}}" width="100" >
                        <input type="hidden" class="id" value="{{$item->id}}">
                            <button type="button"  class="btn btn-danger ir">Delete</button>
                    </div>
                @endforeach
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <form action="/add-images/{{$product->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <input type="file" multiple name="image[]" required class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection
@section('scripts')
<script>
    $('.ir').click(function (e) { 
      e.preventDefault();
      var id = $(this).closest('.br').find('.id').val();
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
              method: "get",
              url: "/deleteImage",
              data:{
                'id':id,
              },
              success: function (response) {
                $('.dr').load(location.href + ' .dr > *');
              }
          });
    });
  </script>
@endsection

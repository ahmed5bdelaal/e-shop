@extends('layouts.admin')
@section('content')
<div class="card">
    <h5 class="card-header">Profile</h5>
    <div class="card-body">
        <form method="post" action="{{url('upProfile')}}" enctype="multipart/form-data">
            @csrf 
            
            <div class="row">
              <div class="form-group col-md-6 mb-3">
                <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                <textarea class="form-control" id="quote" name="name">{{Auth::user()->name}}</textarea>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
    
            {{-- <div class="form-group col-md-6 mb-3">
              <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
              <div class="input-group">
                  <span class="input-group-btn">
                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                      <i class="fa fa-picture-o"></i> Choose
                      </a>
                  </span>
              <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$data->photo}}">
            </div> --}}
            {{-- <div id="holder" style="margin-top:15px;max-height:100px;"></div>
              @error('photo')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div> --}}

            <div class="form-group col-md-6 mb-3">
              <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" name="email" required value="{{Auth::user()->email}}">
              @error('email')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            <div class="form-group col-md-6 mb-3">
              <label for="phone" class="col-form-label">Phone Number <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="phone" required value="{{Auth::user()->phone}}">
              @error('phone')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>

          <div class="form-group col-md-6 mb-3">
              <button class="btn btn-success" type="submit">Update</button>
          </div>
        </form>
        <hr>
        <form method="post" action="{{url('upPassword')}}" enctype="multipart/form-data">
            @csrf 
            
            <div class="row">
              <div class="form-group col-md-6 mb-3">
                <label for="Old Password" class="col-form-label">Old Password <span class="text-danger">*</span></label>
                <input class="form-control" min="8" type="password" required name="o_password">
                @error('o_password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 mb-3">
              <label for="New Password" class="col-form-label">New Password <span class="text-danger">*</span></label>
              <input type="Password" class="form-control" name="n_password" required >
              @error('n_password')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>

          <div class="form-group col-md-6 mb-3">
              <button class="btn btn-success" type="submit">Update</button>
          </div>
        </form>
        <hr>
         <form method="post" action="{{ route('notification') }}" >
            @csrf 
            
            <div class="row">
              <div class="form-group col-md-6 mb-3">
                <label for="title" class="col-form-label">title <span class="text-danger">*</span></label>
                <input class="form-control" min="8" type="text" required name="title">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 mb-3">
              <label for="message" class="col-form-label">message <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="message" required >
              @error('message')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>

          <div class="form-group col-md-6 mb-3">
              <button class="btn btn-success" type="submit">Update</button>
          </div>
        </form>
    </div>
</div>
@endsection
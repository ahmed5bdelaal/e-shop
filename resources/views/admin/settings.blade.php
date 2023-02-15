@extends('layouts.admin')
@section('content')
<div class="card">
  <div class="container">
    <h2 class="h2">Settings</h2><hr>
    <div class="card-body">
    <form method="post" action="{{url('settings-update')}}" enctype="multipart/form-data">
        @csrf 
        
        <div class="row">
          <div class="form-group col-md-6 mb-3">
            <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
            <textarea class="form-control" id="quote" name="name">{{$data->name}}</textarea>
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        <div class="form-group col-md-6 mb-3">
          <label for="short_des" class="col-form-label">Short Description <span class="text-danger">*</span></label>
          <textarea class="form-control" id="quote" name="short_des">{{$data->short_des}}</textarea>
          @error('short_des')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group col-md-6 mb-3">
          <label for="description" class="col-form-label">Description <span class="text-danger">*</span></label>
          <textarea class="form-control" id="description" name="description">{{$data->description}}</textarea>
          @error('description')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group col-md-6 mb-3">
          <label for="inputPhoto" class="col-form-label">Logo <span class="text-danger">*</span></label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail1" class="form-control" type="text" name="logo" value="{{$data->logo}}">
        </div>
        <div id="holder1" style="margin-top:15px;max-height:100px;"></div>

          @error('logo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group col-md-6 mb-3">
          <label for="address" class="col-form-label">Address <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="address" required value="{{$data->address}}">
          @error('address')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group col-md-6 mb-3">
          <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
          <input type="email" class="form-control" name="email" required value="{{$data->email}}">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group col-md-6 mb-3">
          <label for="phone" class="col-form-label">Phone Number <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="phone" required value="{{$data->phone}}">
          @error('phone')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group col-md-6 mb-3">
        </div>
        <div class="form-group col-md-6 mb-3">
          <label for="facebock" class="col-form-label">Username For Facebock <span class="text-danger">*</span></label>
          <div class="input-group">
            <span style="background-color: #8f9fce" class="input-group-addon">https://www.facebock.com/</span>
          <input type="text" class="form-control" name="facebock" required value="{{$data->facebock}}">
          </div>
          @error('facebock')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group col-md-6 mb-3">
          <label for="twitter" class="col-form-label">Username For Twitter <span class="text-danger">*</span></label>
          <div class="input-group">
            <span style="background-color: #8f9fce" class="input-group-addon">https://www.twitter.com/</span>
          <input type="text" class="form-control" name="twitter" required value="{{$data->twitter}}">
          </div>
          @error('twitter')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div><div class="form-group col-md-6 mb-3">
          <label for="instagram" class="col-form-label">Username For Instagram <span class="text-danger">*</span></label>
          <div class="input-group">
            <span style="background-color: #8f9fce" class="input-group-addon">https://www.instagram.com/</span>
          <input type="text" class="form-control" name="instagram" required value="{{$data->instagram}}">
          </div>
          @error('instagram')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group col-md-6 mb-3">
          <label for="google" class="col-form-label">Username For Google <span class="text-danger">*</span></label>
          <div class="input-group">
            <span style="background-color: #8f9fce" class="input-group-addon">https://www.google.com/</span>
          <input type="text" class="form-control" name="google" required value="{{$data->google}}">
          </div>
          @error('google')
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
</div>

@endsection
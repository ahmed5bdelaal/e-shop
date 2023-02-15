<style>
.custom-file__input {
  position: absolute;
  opacity: 0;
  visibility: hidden;
  width: 1px;
  height: 1px;
}

.custom-file__label {
  cursor: pointer;
  border: 0;
  text-align: center;
  font-weight: 500;
  font-size: 1rem;
  display: block;
  margin: 0;
  border-radius: 50%;
  padding: 0;
  background: transparent;
  position: relative;
  overflow: hidden;
}


</style>
<form method="post" action="{{url('photoUser')}}" enctype="multipart/form-data">
  @csrf 
    <div class="row">
      <div class="col-md-2 mb-3">
      </div>
      <div class="form-group col-md-6 mb-3">
        <div class="d-flex justify-content-center mb-4">
          <input class="custom-file__input" name="photo" id="photo" accept="image/*" type="file">
          <label class="custom-file__label" for="photo">
          @if (Auth::user()->photo)
              <img alt="change photo" style="width: 200px;" class="rounded-circle" src="{{ asset('assets/images/users/'.Auth::user()->photo) }}">
              <label class="custom-file__label" for="">Change Photo</label>
            @else
              <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" class="rounded-circle" alt="example placeholder" style="width: 200px;" />
              <label class="custom-file__label" for="">Change Photo</label>
            @endif
      </div>
      <div class="d-flex justify-content-center">
          <div class="btn btn-primary btn-rounded">
              <label class="form-label text-black m-1" for="customFile2">Submit</label>
              <input type="submit" class="form-control d-none" id="customFile2" />
          </div>
      </div>
      </div>
    </div>
  </form>
    <hr>
    <h2>Information</h2>
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

    <div class="form-group col-md-6 mb-3">
      <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
      <div class="input-group">
      <input id="thumbnail" class="form-control" type="file" name="photo">
    </div>
    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
      @error('photo')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </div>

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
<h2>Change Password</h2>
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
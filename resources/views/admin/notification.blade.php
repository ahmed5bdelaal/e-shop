@extends('layouts.admin')
@section('content')
<div class="card">
  <div class="container">
    <h1 class="h2">Notification</h1><hr>
    <div class="card-body">
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
              <button class="btn btn-success" type="submit">Send</button>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection
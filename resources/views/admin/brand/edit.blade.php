@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Brand</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{url('update-brand/'.$brand->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')
                <div class="form-group">
                  <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                <input id="inputTitle" type="text" name="title"  value="{{$brand->title}}" class="form-control">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
                
                <div class="form-group">
                  <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                  <select name="status" class="form-control">
                    @if ($brand->status =='active')
                        <option selected value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    @else
                        <option value="active">Active</option>
                        <option selected value="inactive">Inactive</option>
                    @endif
                  </select>
                  @error('status')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="photo" class="col-form-label">photo <span class="text-danger">*</span></label>
                    <input  type="file" name="photo"   class="form-control">
                    @error('photo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                <div class="form-group mb-3">
                  <button type="reset" class="btn btn-warning">Reset</button>
                   <button class="btn btn-success" type="submit">Submit</button>
                </div>
              </form>
        </div>
    </div>
@endsection
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Setup</title>

   {{-- style --}}
   <link rel="shortcut icon" href="{{asset('assets/images/logo/ama.png')}}" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
   <link href="{{asset('admin/css/admin.css')}}" rel="stylesheet">
   <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('admin/css/light-bootstrap-dashboard.css')}}" rel="stylesheet">
   @yield('css')
</head>
<body>
    <div class="wrapper">
            <div class="card">
            <div class="container">
                <h2 class="h2">Settings</h2><hr>
                <div class="card-body">
                <form method="post" action="{{url('settings-first')}}" enctype="multipart/form-data">
                    @csrf 
                    
                    <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="quote" name="name"></textarea>
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                    <label for="short_des" class="col-form-label">Short Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="quote" name="short_des"></textarea>
                    @error('short_des')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                    <label for="description" class="col-form-label">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                    <label for="inputPhoto" class="col-form-label">Logo <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" name="logo">
                    <div id="holder1" style="margin-top:15px;max-height:100px;"></div>

                    @error('logo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                    <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" name="photo" >
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                    @error('photo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                    <label for="address" class="col-form-label">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="address" required >
                    @error('address')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                    <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" required >
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                    <label for="phone" class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" required >
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                    <label for="facebock" class="col-form-label">Username For Facebock <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span style="background-color: #8f9fce" class="input-group-addon">https://www.facebock.com/</span>
                    <input type="text" class="form-control" name="facebock" required >
                    </div>
                    @error('facebock')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div><div class="form-group col-md-6 mb-3">
                    <label for="twitter" class="col-form-label">Username For Twitter <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span style="background-color: #8f9fce" class="input-group-addon">https://www.twitter.com/</span>
                    <input type="text" class="form-control" name="twitter" required >
                    </div>
                    @error('twitter')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div><div class="form-group col-md-6 mb-3">
                    <label for="instagram" class="col-form-label">Username For Instagram <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span style="background-color: #8f9fce" class="input-group-addon">https://www.instagram.com/</span>
                    <input type="text" class="form-control" name="instagram" required >
                    </div>
                    @error('instagram')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                    <label for="google" class="col-form-label">Username For Google <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span style="background-color: #8f9fce" class="input-group-addon">https://www.google.com/</span>
                    <input type="text" class="form-control" name="google" required >
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
        </div>
    
<script src="{{asset('admin/js/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap-switch.js')}}"></script>
    <script src="{{asset('admin/js/chartist.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap-notify.js')}}"></script>
    <script src="{{asset('admin/js/light-bootstrap-dashboard.js')}}"></script>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1" />
@yield('meta')
<title>@yield('title')  {{$settings->name}}</title>
<link rel="shortcut icon" href="{{asset('assets/images/logo/ama.png')}}" type="image/x-icon">
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{asset('assets/css/LineIcons.3.0.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/tiny-slider.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/glightbox.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
</head>
<body>
    
    @include('layouts.front.nav')
    <div class="content">
        @yield('content')
    </div>
    @include('layouts.front.footer')
    
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.3.2.1.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    
    <script src="{{asset('assets/js/tiny-slider.js')}}"></script>
    <script src="{{asset('assets/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
    <script>
        
        var availableTags = [];
        $.ajax({
          method: "GET",
          url: "/product-list",
          success: function (response) {
              // console.log(response);
              startauto(response);
          }
        });
        function startauto(availableTags){
          $( "#search-product" ).autocomplete({
          source: availableTags
        });
        }
      </script>
    @if (session('status'))
        <script>                
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ session('status') }}',
            showConfirmButton: false,
            timer: 2000
            })
        </script>                
    @endif
    @stack('javascript')
</body>
</html>
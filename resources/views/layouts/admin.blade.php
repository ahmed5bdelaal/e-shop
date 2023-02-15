<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - {{$settings->name}}</title>

   {{-- style --}}
   <link rel="shortcut icon" href="{{asset('assets/images/logo/ama.png')}}" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
   <link href="{{asset('admin/css/admin.css')}}" rel="stylesheet">
   <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('admin/css/light-bootstrap-dashboard.css')}}" rel="stylesheet">
   @yield('css')
    {{-- /style --}}
</head>
<body>
    
    <div class="wrapper">
        @include('layouts.inc.sidbar')
        <div class="main-panel">
            @include('layouts.inc.adminnav')
            <div class="content">
                @yield('content')
            </div>
            @include('layouts.inc.adminfooter')
        </div>
    </div>

    <script src="{{asset('admin/js/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap-switch.js')}}"></script>
    <script src="{{asset('admin/js/chartist.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap-notify.js')}}"></script>
    <script src="{{asset('admin/js/light-bootstrap-dashboard.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js" integrity="sha512-NCiXRSV460cHD9ClGDrTbTaw0muWUBf/zB/yLzJavRsPNUl9ODkUVmUHsZtKu17XknhsGlmyVoJxLg/ZQQEeGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('scripts')
    <script>
            // Your web app's Firebase configuration
            var firebaseConfig = {
                apiKey: "AIzaSyDwJ-WJ9q3o_tNeCRaJgVE8u5ecEGtVFbQ",
                authDomain: "eshop-31cf0.firebaseapp.com",
                projectId: "eshop-31cf0",
                storageBucket: "eshop-31cf0.appspot.com",
                messagingSenderId: "880618526792",
                appId: "1:880618526792:web:33b35b755ffba8c85fa07d"
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);

            const messaging = firebase.messaging();

            function initFirebaseMessagingRegistration() {
                messaging.requestPermission().then(function () {
                    return messaging.getToken()
                }).then(function(token) {
                    
                    axios.post("{{ route('fcmToken') }}",{
                        _method:"PATCH",
                        token
                    }).then(({data})=>{
                        console.log(data)
                    }).catch(({response:{data}})=>{
                        console.error(data)
                    })

                }).catch(function (err) {
                    console.log(`Token Error :: ${err}`);
                });
            }

            initFirebaseMessagingRegistration();
        
            messaging.onMessage(function({data:{body,title}}){
                new Notification(title, {body});
                
            });
    </script>
    <script>
        $('.all').click(function (e) { 
          e.preventDefault();
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              $.ajax({
                  method: "get",
                  url: "/notice-readAll",
                  success: function (response) {
                    $('.notice').load(location.href + ' .notice > *');
                  }
              });
        });
      </script>
      <script>
          $('.nn').click(function (e) { 
            e.preventDefault();
            var id = $(this).closest('.rrr').find('.noticeId').val();
            var route = $(this).closest('.rrr').find('.noticeData').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "post",
                    url: "/notice-read",
                    data:{
                      'id':id,
                    },
                    success: function (response) {
                      window.location.href = route;
                    }
                });
          });
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
    @if (session('error'))
        <script>                
            Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 2000
            })
        </script>                
    @endif         
</body>
</html>

<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> @yield('title')</title>
  <!-- site favicon -->
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logo/favicon.png') }}">
  <!-- bootstrap 4  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- bootstrap toggle css -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-toggle.min.css') }}">
  <!-- fontawesome 5  -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/all.min.css') }}">
  <!-- Rich Editor  -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/richtext.min.css') }}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/toastr.min.css') }}">
  @stack('css-link')
  <!-- main css -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/app.css') }}">
<!--  <script src=-->
<!--        "https://code.jquery.com/jquery-3.6.0.min.js"-->
<!--        integrity=-->
<!--"sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" -->
<!--        crossorigin="anonymous">-->
<!--    </script>-->
  @stack('css')
</head>
  <body>
  @include('admin.includes.sidebar')
  @include('admin.includes.topbar')
  <!-- Content panel -->
    <div class="content-panel">
      @include('admin.includes.titlebar')
        @yield('content')
    </div>
 <!-- Content panel end -->
  <!-- jQuery library -->
  <script src="{{asset('assets/admin/js/jquery-3.5.1.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>
  <!-- bootstrap notify js -->
  <script src="{{asset('assets/admin/js/bootstrap-notify.min.js') }}"></script>
  <!-- bootstrap notify js -->
  <script src="{{asset('assets/admin/js/toastr.min.js') }}"></script>
  <!-- Rich Editor js -->
  <script src="{{asset('assets/admin/js/jquery.richtext.js') }}"></script>
  <!-- Chart js -->
  <script src="{{asset('assets/admin/js/chartjs.min.js') }}"></script>
  <!-- Smile Scroll -->
  <script src="{{asset('assets/admin/js/jquery.slimscroll.min.js') }}"></script>
  @stack('js-link')
  {{-- app js --}}
  <script src="{{asset('assets/admin/js/app.js') }}"></script>
  <script src="{{url('public/js/custome.js')}}"></script>

  <script>
    "use strict";
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>


    <script>
      "use strict";
      @if ($errors->any())
      @foreach ($errors->all() as $emsg)
        toastr.error('{{$emsg}}');
      @endforeach
      @endif
      @if(session()->has('alert'))
        @if(session('alert')[0] == 'danger')
        toastr.error('{{ session('alert')[1] }}');
        @elseif(session('alert')[0] == 'success')
        toastr.success('{{ session('alert')[1] }}');
        @else
        toastr.error('{{ session('alert')[1] }}');
        @endif
      @endif
    </script>

  @stack('js')
</body>
</html>
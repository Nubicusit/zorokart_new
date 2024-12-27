<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zorokart</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
        @stack('css-link')


    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/bootstrap/bootstrap.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/daterangepicker.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/fontawesome.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/footable.standalone.min.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/fullcalendar@5.2.0.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/jquery-jvectormap-2.0.5.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/jquery.mCustomScrollbar.min.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/leaflet.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/line-awesome.min.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/MarkerCluster.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/MarkerCluster.Default.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/slick.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/star-rating-svg.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/trumbowyg.min.css')}}">

    <link rel="stylesheet" href="{{url('public/assets/vendor_assets/css/wickedpicker.min.css')}}">

    <link rel="icon" type="image/png" href="{{url('public/img/images/favicon.png')}}">


    <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

    <link rel="stylesheet" href="{{url('public/css/style1.css')}}">

    <!-- endinject -->

    
    @stack('css')
</head>

<body>
@include('institute.include.topbar')
@include('institute.include.sidebar')

  
@yield('content')
  


   @stack('js-link')
    {{-- app js --}}

       
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script>
    <!-- inject:js-->
    <script src="{{url('public/assets/vendor_assets/js/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/jquery/jquery-ui.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/bootstrap/popper.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/moment/moment.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/accordion.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/autoComplete.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/Chart.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/charts.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/daterangepicker.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/drawer.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/dynamicBadge.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/dynamicCheckbox.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/feather.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/footable.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/fullcalendar@5.2.0.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/google-chart.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/jquery-jvectormap-2.0.5.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/jquery.filterizr.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/jquery.mCustomScrollbar.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/jquery.peity.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/jquery.star-rating-svg.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/leaflet.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/leaflet.markercluster.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/loader.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/message.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/moment.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/muuri.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/notification.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/popover.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/select2.full.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/slick.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/trumbowyg.min.js')}}"></script>
    <script src="{{url('public/assets/vendor_assets/js/wickedpicker.min.js')}}"></script>
    <script src="{{url('public/assets/theme_assets/js/drag-drop.js')}}"></script>
    <script src="{{url('public/assets/theme_assets/js/footable.js')}}"></script>
    <script src="{{url('public/assets/theme_assets/js/full-calendar.js')}}"></script>
    <script src="{{url('public/assets/theme_assets/js/googlemap-init.js')}}"></script>
    <script src="{{url('public/assets/theme_assets/js/icon-loader.js')}}"></script>
    <script src="{{url('public/assets/theme_assets/js/jvectormap-init.js')}}"></script>
    <script src="{{url('public/assets/theme_assets/js/leaflet-init.js')}}"></script>
    <script src="{{url('public/assets/theme_assets/js/main.js')}}"></script>

   <script src="{{url('public/js/custome.js')}}"></script>
 


    <script>
        function sliceSize(dataNum, dataTotal) {
  return (dataNum / dataTotal) * 360;
}
function addSlice(sliceSize, pieElement, offset, sliceID, color) {
  $(pieElement).append("<div class='slice "+sliceID+"'><span></span></div>");
  var offset = offset - 1;
  var sizeRotation = -179 + sliceSize;
  $("."+sliceID).css({
    "transform": "rotate("+offset+"deg) translate3d(0,0,0)"
  });
  $("."+sliceID+" span").css({
    "transform"       : "rotate("+sizeRotation+"deg) translate3d(0,0,0)",
    "background-color": color
  });
}
function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
  var sliceID = "s"+dataCount+"-"+sliceCount;
  var maxSize = 179;
  if(sliceSize<=maxSize) {
    addSlice(sliceSize, pieElement, offset, sliceID, color);
  } else {
    addSlice(maxSize, pieElement, offset, sliceID, color);
    iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount+1, color);
  }
}
function createPie(dataElement, pieElement) {
  var listData = [];
  $(dataElement+" span").each(function() {
    listData.push(Number($(this).html()));
  });
  var listTotal = 0;
  for(var i=0; i<listData.length; i++) {
    listTotal += listData[i];
  }
  var offset = 0;
  var color = [
    "#FF9000",  
    "#0487FF"
    
  ];
  for(var i=0; i<listData.length; i++) {
    var size = sliceSize(listData[i], listTotal);
    iterateSlices(size, pieElement, offset, i, 0, color[i]);
    $(dataElement+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
    offset += size;
  }
}
createPie(".pieID.legend", ".pieID.pie");

    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(".toggle-password2").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    input = $(this).parent().find(".input2");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});


   $(".toggle-password1").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    input = $(this).parent().find(".input1");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});


   $(".btn-rst").click(function() { 
       
       var password = $("#psw").val()
         var password1 = $("#psw1").val()
         
         if (password == password1) {
               return true;
                 
             }
             else {
                 alert("Passwords are not matching")
                 return false
             }

       
   });
    </script>
    

@stack('js')


    <footer class="footer-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-copyright">
                            <p>Copyright © 2022 <span> Zorokarts.</span> Designed with by Nubicus Software Pvt. Ltd. All
                                rights reserved</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </footer>




</body>
</html>
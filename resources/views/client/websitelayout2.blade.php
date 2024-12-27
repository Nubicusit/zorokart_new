@php
//print_r(session('cart'));exit();
$settingsdata= App\Models\SettingsModel::first();


@endphp
<?php
// print_r($settingsdata);
// exit();
?>




<!doctype html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SchoolsPe</title>
    
     @section('headerscript')

    <link rel="icon" type="image/x-icon" href="{{url('public/images/favicon.png')}}">
    <script src="../cdn-cgi/apps/head/2oc_RD5SS6wgN5SiQnSEnWVNHg8.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('public/vendors/font-awesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{url('public/vendors/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('public/vendors/slick/slick.css')}}">
    <link rel="stylesheet" href="{{url('public/vendors/animate.css')}}">

    <link rel="stylesheet" href="{{url('public/css/style.css')}}">
    <link rel="stylesheet" href="{{url('public/css/resposive.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    
 @show
</head>

<body>


    <div id="site-wrapper" class="site-wrapper starter demo-header">

        <div class="search-bar">
            <header id="header"
                class=" search-bar main-header header-sticky header-sticky-smart header-style-04 text-uppercase bg-white ">
                <div class="header-wrapper sticky-area">

                    <div class="topbar d-flex institute-top">
                        <div class="topbar-item topbar-item-left d-flex align-items-center text-dark institute-top-1">
                            <div class="item">
                                <a class="navbar-brand navbar-brand-mobile inst-logo" href="{{url('/')}}">
                                    <img src="{{url('public/images/logo.png')}}" alt="schoolspe">
                                </a>
                            </div>
                        </div>
                        <div class="topbar-item institute-top-1 ml-auto d-flex align-items-center insti-btn-rgt ">
                            <div class="header-customize justify-content-end align-items-center d-none d-xl-flex ml-5">

                                <div class="header-customize-item">
                                    <a href="#" class="btn btn-primary register-btn" data-toggle="modal"
                                        data-target="#myModal-reg-inst">Register Institutions <img
                                            src="{{url('public/images/reg-ic.png')}}"></a>
                                </div>
                            </div>
                            <div class="header-customize justify-content-end align-items-center d-none d-xl-flex ml-5">

                                <div class="header-customize-item">
                                    <a href="#" class="btn btn-primary text-capitalize" data-toggle="modal"
                                        data-target="#myModal-log-inst"> Login <img src="{{url('public/images/login.png')}}"> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



            </header>
            
            
      @show


   
@yield('content')

@section('footer')     
            
            
            
          <footer class="main-footer main-footer-style-01 bg-pattern-01 pt-8 pb-4 ">
            <div class="footer-second">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 mb-6 mb-lg-0">
                            <div class="mb-2"><img src="{{url('public/images/logo.png')}}" alt="Thedir"></div>
                            <div class="mb-2">

                               <p class="mb-0 text-dark">
                                      Discover your dream with SchoolsPe<br>The Alpha gateway to education.</p>
                            </div>
                            <div class="region pt-1">
                                <div class="  d-flex"><img src="{{url('public/images/foot-img.png')}}">
                                    <img src="{{url('public/images/foot-img-2.png')}}" class="ml-3"></div>

                            </div>
                        </div>
                        <div class="col-md-5 mb-6 mb-lg-0">
                            <div class="font-size-md font-weight-semibold text-dark mb-4 mt-3">
                                Contact Us
                            </div>
                            <ul class="list-group list-group-flush list-group-borderless">
                                <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                    <a href="tel:{{ $settingsdata->phone}}" class="link-hover-secondary-primary text-dark"><img
                                            src="{{url('public/images/call-calling.png')}}">{{ $settingsdata->phone}} {{ $settingsdata->phone1}} {{ $settingsdata->phone2}}</a>
                                </li>
                                <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                    <a href="mailto:{{ $settingsdata->email}}" class="link-hover-secondary-primary text-dark"><img
                                            src="{{url('public/images/directbox-notif.png')}}">{{ $settingsdata->email}}</a>
                                </li>
                                <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                    <a href="#" class="link-hover-secondary-primary text-dark"><img
                                            src="{{url('public/images/route-square.png')}}">
                                        {{ $settingsdata->address}}</a>
                                </li>

                            </ul>
                        </div>

                        <div class="col-md-2  mb-6 mb-lg-0">
                            <div class="font-size-md font-weight-semibold text-dark mb-4 mt-3">
                                Quick Links
                            </div>
                          <ul class="list-group list-group-flush list-group-borderless">
                            <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                    <a href="" class="link-hover-secondary-primary">Home</a>
                                </li>
                                <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                    <a href="{{url('about')}}" class="link-hover-secondary-primary">About us</a>
                                </li>
                                <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                    <a href="#" class="link-hover-secondary-primary" data-toggle="modal"
                                        data-target="#myModal-reg-inst">register institutions</a>
                                </li>
                                <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                    <a href="#" data-toggle="modal"
                                        data-target="#myModal-log-inst" class="link-hover-secondary-primary"> login</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-last mt-8 mt-md-6">
                <div class="container">
                    <div class="footer-last-container position-relative">
                        <div class="row align-items-center">
                            <div class="col-lg-4 mb-3 mb-lg-0">
                                <div class="social-icon text-dark">
                                    <ul class="list-inline">

                                        <li class="list-inline-item mr-5">
                                            <a target="_blank" title="Facebook" href="https://www.facebook.com/schoolspeofficial?mibextid=ZbWKwL">
                                                <img src="{{url('public/images/ant-design_facebook-filled.png')}}">
                                            </a>
                                        </li>

                                        <li class="list-inline-item mr-5">
                                            <a target="_blank" title="Instagram" href="https://instagram.com/schoolspe_official?igshid=YmMyMTA2M2Y=">
                                                <img src="{{url('public/images/ant-design_instagram-outlined.png')}}">
                                            </a>
                                        </li>
                                        <li class="list-inline-item mr-5">
                                            <a target="_blank" title="Twitter" href="https://www.linkedin.com/company/schoolspe-official/">
                                                <img src="{{url('public/images/ant-design_twitter-outlined.png')}}">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 mb-3 mb-lg-0">
                                <div>
                                    <a 
                                        class="link-hover-dark-primary font-weight-semibold">Copyright@2022
                                        SchoolsPe</a>

                                </div>
                            </div>
                            <div class="col-lg-2 mb-3 mb-lg-0">
                                <div>
                                    <a href="{{url('privacy_policy')}}" class="link-hover-dark-primary font-weight-semibold">Privacy
                                        & Policy</a>

                                </div>
                            </div>
                            <div class="back-top text-left text-lg-right gtf-back-to-top">
                                <a href="#" class="link-hover-secondary-primary"><img src="{{url('public/images/arrow-top.png')}}"
                                        style="margin-right: 1rem;"><span>Back To Top</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <style>
            .fixed {
  position: fixed;
  top:0; left:0;
  width: 100%;
  z-index:999;}
  

    .swal-icon:first-child {
  
    display: none !important;
}
.swal-modal{
    padding-top:2rem !important;
}
.swal-text {
    font-weight: 600 !important;
    color: rgb(0 0 0)!important;
  
}
.swal-button {
    background-color: #FF2E00 !important;
]
    padding: 8px 24px;}

</style>
         @show
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
        <script src="{{url('public/vendors/jquery.min.js')}}"></script>
        <script src="{{url('public/vendors/popper/popper.js')}}"></script>
        <script src="{{url('public/vendors/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{url('public/vendors/hc-sticky/hc-sticky.js')}}"></script>
        <script src="{{url('public/vendors/isotope/isotope.pkgd.js')}}"></script>
        <script src="{{url('public/vendors/magnific-popup/jquery.magnific-popup.js')}}"></script>
        <script src="{{url('public/vendors/slick/slick.js')}}"></script>
        <script src="{{url('public/vendors/waypoints/jquery.waypoints.js')}}"></script>
 
        <script src="{{url('public/js/app.js')}}"></script>
        <script>
            $(document).ready(function () {

                // Card height function
                function refreshCardHeight() {
                    // Reset height to 0
                    var maxHeight = 0;
                    $(".card-container__card").css('height', '');

                    // Get the highest card height
                    $(".card-container__card").each(function () {
                        if ($(this).height() > maxHeight) {
                            maxHeight = $(this).height();
                        }
                    });

                    // Set new highest height
                    $(".card-container__card").height(maxHeight);
                }

                //run on page ready
                refreshCardHeight();

                // Trigger when window is resized
                $(window).resize(function () {
                    refreshCardHeight();
                });

            });
        </script>

        <script>
            $('.palceholder').click(function () {
                $(this).siblings('input').focus();
            });
            $('.form-control').focus(function () {
                $(this).siblings('.palceholder').hide();
            });
            $('.form-control').blur(function () {
                var $this = $(this);
                if ($this.val().length == 0)
                    $(this).siblings('.palceholder').show();
            });
            $('.form-control').blur();


            $(function () {

                var activeIndex = $('.active-tab').index(),
                    $contentlis = $('.tabs-content li'),
                    $tabslis = $('.tabs li');

                // Show content of active tab on loads
                $contentlis.eq(activeIndex).show();

                $('.tabs').on('click', 'li', function (e) {
                    var $current = $(e.currentTarget),
                        index = $current.index();

                    $tabslis.removeClass('active-tab');
                    $current.addClass('active-tab');
                    $contentlis.hide().eq(index).show();
                });
            });
        </script>

        <script>
            $(document).ready(function () {

                $('.items').slick({
                    dots: true,
                    infinite: true,
                    speed: 2000,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }

                    ]
                });
            });
        </script>
        <script>
            window.onscroll = function () {
                myFunction()
            };

            var header = document.getElementById("myHeader");
            var sticky = header.offsetTop;

            function myFunction() {
                if (window.pageYOffset > sticky) {
                    header.classList.add("sticky-1");
                } else {
                    header.classList.remove("sticky-1");
                }
            }
        </script>
       
        <!-------- script for login modal  ----------->
        <script>
            $(document).ready(function () {
                // $(document).on('click', '.signup-tab', function (e) {
                //     e.preventDefault();
                //     $('#signup-taba').tab('show');
                // });

                $(document).on('click', '.signin-tab', function (e) {
                    e.preventDefault();
                    $('#signin-taba').tab('show');
                });

                $(document).on('click', '.forgetpass-tab', function () {
                   
                    $('#forgetpass-taba').tab('show');
                });
               
            });
        </script>
              
   
   <script>
    $(document).ready(function () {
        $(document).on('click', '.signup-tab-1', function (e) {
            e.preventDefault();
            $('#signup-taba-1').tab('show');
        });

        $(document).on('click', '.signin-tab-1', function (e) {
            e.preventDefault();
            $('#signin-taba-1').tab('show');
        });

        $(document).on('click', '.forgetpass-tab-1', function (e) {
            e.preventDefault();
            $('#forgetpass-taba-1').tab('show');
        });
    });
</script>
        <script>
            const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#password");

            togglePassword.addEventListener("click", function () {
                // toggle the type attribute
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);

                // toggle the icon
                this.classList.toggle("bi-eye");
            });

            // prevent form submit
            const form = document.querySelector("form");
            form.addEventListener('submit', function (e) {
                e.preventDefault();
            });
        </script>
        
        <script>
            $(window).scroll(function(){
  var sticky = $('.header-sticky'),
      scroll = $(window).scrollTop();

  if (scroll >= 10) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});
        </script>
        <script>
    $('#myModal-log-inst').on('shown.bs.modal', function () {
     
  $('#signin-taba').tab('show');
   
  
})
</script>

<script>
         $(".log-mod-btn").click(function(){
            $("#myModal-log-inst").modal('show');
             $("#myModal-reg-inst").modal('hide');
        });
          $(".btn-mod-reg").click(function(){
           
             $("#myModal-reg-inst").modal('show');
              $("#myModal-log-inst").modal('hide');
        });
        
 
</script>

<script src="{{url('public/js/custome.js')}}"></script>
</body>


</html>

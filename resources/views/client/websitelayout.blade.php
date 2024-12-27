@php
//print_r(session('cart'));exit();
$settingsdata= App\Models\SettingsModel::first();
$board_s= App\Models\InstituteModel::select('board')
                  ->distinct()
                  ->where('type','s')
                  ->orderby('board','asc')
                  ->get();
$board_pu= App\Models\InstituteModel::select('board')
                  ->distinct()
                  ->where('type','pu')
                  ->orderby('board','asc')
                  ->get();
$board_pc= App\Models\InstituteModel::select('board')
                  ->distinct()
                  ->where('type','pc')
                  ->orderby('board','asc')
                  ->get();
 $board_ug= App\Models\InstituteModel::select('board')
                  ->distinct()
                  ->where('type','ug')
                  ->orderby('board','asc')
                  ->get();
$course_pu= App\Models\Courses::select('name')
                  ->distinct()
                  ->where('type','pu')
                  ->orderby('name','asc')
                  ->get();
$course_pc= App\Models\Courses::select('name')
                  ->distinct()
                  ->where('type','pc')
                  ->orderby('name','asc')
                  ->get();
$course_ug= App\Models\Courses::select('name')
                  ->distinct()
                  ->where('type','ug')
                  ->orderby('name','asc')
                  ->get();

@endphp

<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SchoolsPe</title>
    <META NAME="Description" CONTENT="We're here to help you find the best colleges and universities for your next step in education. with SchoolsPe you can search 
    apply and get admission in the best colleges and universities."> 
    <META NAME="Keywords" CONTENT="schoolspe">
    @section('headerscript')

        <link rel="icon" type="image/x-icon" href="{{url('public/images/favicon.png')}}">
        {{-- <script src="../cdn-cgi/apps/head/2oc_RD5SS6wgN5SiQnSEnWVNHg8.js"></script> Was not working hence removed--}}
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url('public/vendors/font-awesome/css/fontawesome.css')}}">
        <link rel="stylesheet" href="{{url('public/vendors/magnific-popup/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{url('public/vendors/slick/slick.css')}}">
        <link rel="stylesheet" href="{{url('public/vendors/animate.css')}}">

        <link rel="stylesheet" href="{{url('public/css/style.css')}}">
        <link rel="stylesheet" href="{{url('public/css/resposive.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
        <link rel="stylesheet" type="text/css"
              href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
        <link rel="stylesheet" type="text/css"
              href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <script type="text/javascript"
                src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
                integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    @show
</head>

<body>

@if(Session::has('status'))
<script>
swal("", "{!!Session::get('status') !!}", "success")
</script>
@endif

@if(Session::has('errstatus'))
<script>
swal("", "{!!Session::get('errstatus') !!}", "error")
</script>
@endif


<div id="site-wrapper" class="site-wrapper starter demo-header">

    <!--------------- header section start -------------------->

    <div class="search-bar">
        <header id="header"
                class=" search-bar main-header header-sticky header-sticky-smart header-style-04 text-uppercase bg-white">
            <div class="header-wrapper sticky-area">

                <div class="topbar d-flex">
                    <div class="topbar-item topbar-item-left d-flex align-items-center text-dark institute-top-1">
                        <div class="item">
                            <a class="navbar-brand navbar-brand-mobile" href="{{url('/')}}">
                                <img src="{{url('public/images/logo.png')}}" alt="schoolspe">
                            </a>
                        </div>
                    </div>
                    <div class="topbar-item institute-top-1 ml-auto d-flex align-items-center">
                        <label class="tog-label">Student</label>
                        <div class="flag-switch">

                            <input type="checkbox" class="custom-control-input " id="check2" checked>
                            <label for="check2">

                            </label>
                        </div>
                        <label class="tog-label">Institution</label>
                        <ul style="display: none;">
                            <li><input class="myCheckBoxes" type="checkbox">first</li>
                            <!--<li><input class="myCheckBoxes" type="checkbox">second</li>-->
                        </ul>
                    </div>
                </div>

                <nav class="navbar navbar-expand-xl" id="myHeader">
                    <div
                        class="header-mobile d-flex d-xl-none flex-fill justify-content-between align-items-center">
                        <div class="navbar-toggler toggle-icon" data-toggle="collapse"
                             data-target="#navbar-main-menu">
                            <span></span>
                        </div>


                    </div>
                    <div class="collapse navbar-collapse" id="navbar-main-menu">

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/')}}">Home </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('about')}}">About Us</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Advance
                                    Search</a>

                            </li>
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link" href="{{url('careers')}}">Careers</a>-->
                            <!--</li>-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('blog')}}">Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('contact')}}">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('referrals')}}">Refer & Earn</a>
                            </li>
                        </ul>
  
    
                     </div>
                   @if(Auth::guard('parent')->check())
                            <!--my profile  -->
                            <div class="header-customize justify-content-end align-items-center d-none d-xl-flex ml-5">

                                <div class="header-customize-item" style="align-items: center;">
                                   
                                    @if(auth::guard('parent')->user()->image)
                                    <?php
                                    $img=Auth::guard('parent')->user()->image;
                                    ?>
                                     <a href="#" class="display-picture"><img src="{{url('public/images/parant/'.$img)}}" alt=""></a>
                                     @else
                                      <a href="#" class="display-picture"><img src="{{url('public/images/young-user-icon 1.png') }}" alt=""></a>
                                    @endif
                                     <a href="#" class="btn btn-primary text-capitalize" data-toggle="modal"
                                       data-target="#myModal-1"> Consult Now <i
                        class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                </div>
                                <div class="card hidden">
                                    <!--ADD TOGGLE HIDDEN CLASS ATTRIBUTE HERE-->
                                    <ul>
                                        <!--MENU-->
                                        <li>
                                            <p>{{Auth::guard('parent')->user()->name}}<br>{{Auth::guard('parent')->user()->email}}</p>
                                        </li>
                                       
                                        <li><a href="{{url('my_account_details')}}">My Profile</a></li>
                                       <li><a href="{{url('my_profile')}}">Dashboard</a></li>
                                      
                                      
                                        <li><a href="{{url('parent_logout')}}">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- my profile end   -->

                        @else  
                            <div class="header-customize justify-content-end align-items-center d-none d-xl-flex ml-5">
                          
                             
                                <div class="header-customize-item">
                                    
                                                    
                                <a href="#" class="btn btn-primary text-capitalize" data-toggle="modal"
                                       data-target="#myModal-log">Login<img
                                            src="{{url('public/images/login.png')}}"></a>  
                                       
                                </div>
                                
                                  <div class="header-customize-item">
                                           <a href="#" class="btn btn-primary text-capitalize" data-toggle="modal"
                                       data-target="#myModal-1"> Consult Now <i
                        class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                      @endif
                 </div>
                </nav>
           
      

                    </div>

        </header>
        <!--------------- header section ends -------------------->

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
                                                src="{{url('public/images/call-calling.png')}}"> {{ $settingsdata->phone}}  {{ $settingsdata->phone1}} {{ $settingsdata->phone2}}</a>
                                    </li>
                                    <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                        <a href="mailto:{{ $settingsdata->email}}" class="link-hover-secondary-primary text-dark"><img
                                                src="{{url('public/images/directbox-notif.png')}}">{{ $settingsdata->email}}</a>
                                    </li>
                                    <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                        <a href="" class="link-hover-secondary-primary text-dark"><img
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
                                        <a href="{{url('/')}}" class="link-hover-secondary-primary">Home</a>
                                    </li>
                                    <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                        <a href="{{url('about')}}" class="link-hover-secondary-primary">About us</a>
                                    </li>
                                    <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                        <a href="{{url('search_institutes?type=Schools')}}" class="link-hover-secondary-primary">Schools</a>
                                    </li>
                                    <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                        <a href="{{url('search_institutes?type=PU-Junior-College')}}" class="link-hover-secondary-primary"> PU-Junior College</a>
                                    </li>
                                     <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                        <a href="{{url('search_institutes?type=Polytechnic-College')}}" class="link-hover-secondary-primary"> Polytechnic College</a>
                                    </li>
                                     <li class="list-group-item px-0 lh-1625 bg-transparent py-1">
                                        <a href="{{url('search_institutes?type=UG-PG-Colleges')}}" class="link-hover-secondary-primary">
                                            UG-PG  College</a>
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
                                                    <img
                                                        src="{{url('public/images/ant-design_instagram-outlined.png')}}">
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
                                    <a href="#" class="link-hover-secondary-primary"><img
                                            src="{{url('public/images/arrow-top.png')}}"
                                            style="margin-right: 1rem;"><span>Back To Top</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        @show
        
        

<!---------------Modal for consult now ----------------------------->

<div class="modal fade  careers-modal" id="myModal-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
 <!--<button type="button" class="close inst-cls-btn" data-dismiss="modal" style="color:#ff4005">&times;</button>-->

            <!-- Modal body -->
            <div class="modal-body">


                <form action="{{ route('counsellordata_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h4>Submit for Free Counselling</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <label>Your Name <span>*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Please enter your name" required>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Contact Number <span>*</span></label>
                            <input type="number" class="form-control" id="mob_no_3" name="phone"
                                   placeholder="Please Enter your number" required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Time For Callback <span>*</span></label>

                            <input list="browsers" id="browser" class="form-control" name="callback" required>

                            <datalist id="browsers">
                                <option value="9 AM - 4 PM">9 AM - 4 PM</option>
                                <option value="10.00 AM - 4 PM">10.00 AM - 4 PM</option>
                                <option value="9.30 AM - 4 PM">9.30 AM - 4 PM</option>
                                <option value="10.30 AM - 4 PM">10.30 AM - 4 PM</option>
                                <option value="9.00 AM - 5 PM">9.00 AM - 5 PM</option>
                                <option value="10.00 AM - 5 PM">10.00 AM - 5 PM</option>
                                <option value="9.30 AM - 5 PM">9.30 AM - 5 PM</option>
                                <option value="10.30 AM - 5 PM">10.30 AM - 5 PM</option>
                            </datalist>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Message</label>
                            <textarea class="form-control" rows="4"
                                      placeholder="Please type your requirements" name="message"></textarea>
                        </div>
                    </div>
                    <div class="bottom-btn-md">
                       <a href="#" class="cancel btn mt-5" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-sb mt-5 sign-up-btn-3">Send message</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

      
    </div>

    <!-- The Modal for advance search ends-->


    <!---------=============== login and register modal ===============================----->

    <div class="modal fade" id="myModal-log">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="text-center">
                    <div role="tabpanel" class="login-tab">
                        <!-- Nav tabs -->

                        <!--++++++++++++++ HIDDEN content +++++++++++++++++++-->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a id="signin-taba" href="#home" aria-controls="home"
                                                                      role="tab" data-toggle="tab">Sign In</a></li>
                            <li role="presentation"><a id="signup-taba" href="#profile" aria-controls="profile"
                                                       role="tab" data-toggle="tab">Sign Up</a></li>
                            <li role="presentation"><a id="forgetpass-taba" href="#forget_password"
                                                       aria-controls="forget_password" role="tab" data-toggle="tab">Forget
                                    Password</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <!--++++++++++++++ Sing In FORM STARTS +++++++++++++++++++-->
                            <div role="tabpanel" class="tab-pane active text-center" id="home">
                                <div class="row">
                                    <div class="col-md-6 left-side-log"><img
                                            src="{{url('public/images/login-img.png')}}"></div>
                                    <div class="col-md-6 right-side-log">
                                        <button type="button" class="close inst-cls-btn" data-dismiss="modal" style="color:#ff4005">&times;</button>
                                        <img src="{{url('public/images/logo.png')}}" class="logo">
                                        <h3>Welcome Back</h3>

                                        <div id="mainWrap">
                                            <div id="xlogin">


                                                     <div class="form-group google-form">
       
                                                    </div> 
                                                    <div class="log-line">
                                                        <h5><span> LOGIN WITH NUMBER  </span></h5>
                                                    </div>
                                               
                                                <div class="form-group formSubmit">
                                                    

                                                        <div class="form-group md-group show-label">
                                                            <label for="" class="mobile-label"> Mobile
                                                                Number</label>

                                                        </div>
                                                       
                                                        <input type="tel" id="phone123" class="form-control parent_login_number"
                                                               placeholder="Mobile Number"
                                                               name="phone">
                                                        <input type="hidden" value="123" name="password">

                                                        <div class=" submitWrap">
                                                            <button value="submit"
                                                                    class=" btn btn-primary  btn-sb parent_login" style="margin-top:1rem">Proceed
                                                            </button>

                                                        </div>
                                                    </form>
                                                    <div class="form-group formNotice">
                                                        <div class="col-xs-12">

                                                            <h3 class="text-center">Didn’t have account?<a
                                                                    href="javascript:;" class="signup-tab"> <span>

                                                                            Create account
                                                                        </span></a>
                                                            </h3>


                                                        </div>
                                                    </div>

                                                </div>


                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                             @if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif
                            <!--++++++++++++++ Sing up FORM STARTS +++++++++++++++++++-->
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="row" id="regForm">
                                    <div class="col-md-6 left-side-log"><img
                                            src="{{url('public/images/login-img.png')}}"></div>
                                    <div class="col-md-6 right-side-log">
                                        <button type="button" class="close inst-cls-btn" data-dismiss="modal">&times;</button>
                                        <img src="{{url('public/images/logo.png')}}" class="logo">
                                        <h3>Welcome Back</h3>

                                        <div id="mainWrap">
                                            <div id="xlogin">


                                                

                                                    <div class="form-group md-group show-label">

                                                        <input type="hidden" id="txtPassword" class="form-control "
                                                               name="role">

                                                        <input type="text" id="" class="form-control registration_parent_form_name" name="name"
                                                               placeholder="Enter name" required>
                                                        <input type="tel" id="phone_reg" class="form-control registration_parent_form_phone " name="phone"
                                                               placeholder="Enter  Mobile Number" required>
                                                                <p id="phone_id_msg" class="text-danger"></p>
                                                        <input type="email" id="phone_email" class="form-control registration_parent_form_email" name="email"
                                                               placeholder="Enter email address" required>

                                                    </div>


                                                    <div class=" submitWrap">

                                                        <button id="login" name="submit" class="btn btn-primary  btn-sb registration_parent_form"
                                                                value="Submit"
                                                               onclick="return Validate()" value="Submit"/> Submit</button>
                                                    </div>
                                                </form>
                                                <div class="form-group formNotice">
                                                    <div class="col-xs-12">
                                                        <h3 class="text-center">Already have an account ?<a
                                                                href="javascript:;" class="signin-tab"> <span> Sign in
                                                                </span></a>
                                                        </h3>

                                                    </div>
                                                </div>

                                            </div>


                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--++++++++++++++ OTP FORM STARTS +++++++++++++++++++-->
                            <div role="tabpanel" class="tab-pane " id="forget_password">
<button type="button" class="close inst-cls-btn" style="color:black" data-dismiss="modal">&times;</button>
                              
                                    <h4><span class="verify-text"> Verify</span> Your Mobile Number</h4>
                                    <p>Please Enter the Code Sent to your mobile number<br>
                                         </p>
                                        <form action="{{url('get_otp')}}" method="post">
                                            @csrf
                                    <div class="verification-code">
                                           <input type="hidden" id="otp_phone" name="otp_phone">
                                        <div class="verification-code--inputs">
                                            <input type="tel" class="otp-login_one" name="one" maxlength="1"/>
                                            <input type="tel" class="otp-login_two" name="two" maxlength="1"/>
                                            <input type="tel" class="otp-login_three" name="three" maxlength="1"/>
                                            <input type="tel" class="otp-login_four" name="four" maxlength="1"/>

                                        </div>

                                    </div>
                                    <div class="form-group formNotice">
                                        <div class="col-xs-12">
                                            <h3 class="text-center"> Didn’t received code? <a > <span  tabindex="1" class="parent_login" > Resend Code
                                                    </span></a>
                                            </h3>
                                            <button id="login" name="submit"
                                               class="btn   btn-sb otp-login11">Submit</button>
                                        </div>
</form>
                                    </div>

                               
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

</div>




<a href="{{route('institute')}}" target="_blank" style="display:none">
    <button id="institution">click</button>
</a>


       
    <div class="modal fade advance-serach" id="myModal">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
 <button type="button" class="close adv-btn-cls" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="form__container">

                        <div class="body__container">
                            <div class="left__container">
                                <div class="side__titles" id="side_bar">
                                    <div class="title__name">
                                        <h3>Type</h3>

                                    </div>
                                    <div class="title__name">
                                        <h3 id="board">Board</h3>

                                    </div>
                                    <div class="title__name">
                                        <h3 id="course">Class</h3>

                                    </div>
                                    <div class="title__name">
                                        <h3>Location</h3>

                                    </div>
                                    <div class="title__name">
                                        <h3>Fees</h3>

                                    </div>
                                    <div class="title__name">
                                        <h3>Info</h3>

                                    </div>

                                </div>
                                <div class="progress__bar__container">
                                    <ul>
                                        <li class="active" id="icon1">
                                            <svg width="43" name="person-outline" height="44" viewBox="0 0 43 44"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M42.8999 25.62L42.8999 0L21.4499 17.47L-9.91821e-05 -1.87522e-06L-0.000100302 25.62L21.4499 43.09L42.8999 25.62Z" />
                                            </svg>

                                        </li>
                                        <li id="icon2">
                                            <svg width="43" name="book-outline" name="person-outline" height="44"
                                                viewBox="0 0 43 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M42.8999 25.62L42.8999 0L21.4499 17.47L-9.91821e-05 -1.87522e-06L-0.000100302 25.62L21.4499 43.09L42.8999 25.62Z" />
                                            </svg></li>
                                        <li id="icon3"><svg name="layers-outline" width="43" name="book-outline"
                                                name="person-outline" height="44" viewBox="0 0 43 44" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M42.8999 25.62L42.8999 0L21.4499 17.47L-9.91821e-05 -1.87522e-06L-0.000100302 25.62L21.4499 43.09L42.8999 25.62Z" />
                                            </svg>
                                        </li>
                                        <li id="icon4"><svg name="pricetag-outline" width="43" name="book-outline"
                                                name="person-outline" height="44" viewBox="0 0 43 44" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M42.8999 25.62L42.8999 0L21.4499 17.47L-9.91821e-05 -1.87522e-06L-0.000100302 25.62L21.4499 43.09L42.8999 25.62Z" />
                                            </svg></li>
                                        <li id="icon5"><svg name="mail-outline" name="pricetag-outline" width="43"
                                                name="book-outline" name="person-outline" height="44"
                                                viewBox="0 0 43 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M42.8999 25.62L42.8999 0L21.4499 17.47L-9.91821e-05 -1.87522e-06L-0.000100302 25.62L21.4499 43.09L42.8999 25.62Z" />
                                            </svg></li>
                                        <li id="icon6"><svg name="mail-outline" name="pricetag-outline" width="43"
                                                name="book-outline" name="person-outline" height="44"
                                                viewBox="0 0 43 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M42.8999 25.62L42.8999 0L21.4499 17.47L-9.91821e-05 -1.87522e-06L-0.000100302 25.62L21.4499 43.09L42.8999 25.62Z" />
                                            </svg></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="right__container">
                                <div id="form1">
                                    <div class="sub__title__container ">
                                  <form action="{{url('advanced_search')}}" method="get">
                                         @csrf
                                        <h2>Admission Assistant</h2>
                                        <p>Help us to know more about you. It will help us <br>
                                            find the right institute for your child</p>
                                        <img src="{{url('public/images/adv-img.png')}}" class="emoji">
                                        <p>Hi ! I am looking for a</p>
                                        <div class="container">

                                            <div class="mc-field-group input-group option-flex">

                                                <div class="custom-radio">
                                                    <div class="radio-item ins_type" data-v="1">
                                                        <input type="radio" value="Schools" name="type"
                                                            id="mce-group[274634]-274634-0" class="input-1" onchange="showArrw()" required >
                                                        <label class="label-icon option1 cat-box"
                                                            for="mce-group[274634]-274634-0">



                                                            <div class="card-body p-0">

                                                                <svg class="icon icon-pizza" viewBox="0 0 100 100"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M80.1807 59.0776H89.8152V85.6109H80.1807V59.0776ZM63.7536 67.1629C63.6468 67.9031 63.5236 68.6677 63.4086 69.3997L63.5811 71.238C63.8005 71.2746 64.008 71.3622 64.1865 71.4937C64.365 71.6253 64.5094 71.7969 64.6078 71.9945C64.9117 72.656 65.0172 73.3901 64.9117 74.1093C64.8318 74.9455 64.6356 75.7667 64.3285 76.5496C63.7947 77.9079 62.9322 79.0304 61.9302 79.1931C61.8234 79.5185 61.7248 79.8601 61.6263 80.1855C61.2792 81.7701 60.6084 83.2677 59.655 84.586C59.1857 85.1792 58.6574 85.7242 58.078 86.2128C63.1951 91.1746 73.5934 86.3104 76.7228 99.4875C76.739 99.547 76.7413 99.6093 76.7297 99.6698C76.718 99.7302 76.6926 99.7873 76.6554 99.8366C76.6183 99.886 76.5703 99.9263 76.5151 99.9546C76.4599 99.9829 76.3989 99.9984 76.3368 100H23.6222C23.563 99.9988 23.5049 99.9848 23.4518 99.9588C23.3988 99.9329 23.3522 99.8957 23.3153 99.8498C23.2785 99.804 23.2523 99.7507 23.2386 99.6937C23.2249 99.6367 23.2241 99.5774 23.2361 99.5201C26.0123 86.4568 36.3778 91.5975 41.9466 85.9118C41.5315 85.5509 41.1418 85.1623 40.7803 84.7487C39.4908 83.252 38.9569 81.6659 38.2587 79.6161C38.1848 79.3883 38.1027 79.1524 38.0287 78.941C37.1417 78.941 36.386 78.1275 35.8768 77.1189C35.4504 76.2685 35.1727 75.3527 35.0554 74.4103C34.9187 73.5811 35.039 72.7303 35.4004 71.9701C35.5067 71.7768 35.6571 71.6107 35.8396 71.485C36.0221 71.3593 36.2317 71.2775 36.4517 71.2461L36.616 69.6193C36.4435 68.6189 36.2546 67.5777 36.115 66.5772C33.9384 51.4804 66.2834 49.9431 63.77 67.2361L63.7536 67.1629ZM54.4476 76.3462C54.4391 76.4055 54.4391 76.4658 54.4476 76.5251C54.4476 76.7646 54.5437 76.9943 54.7147 77.1636C54.8856 77.3329 55.1175 77.428 55.3593 77.428C55.6011 77.428 55.833 77.3329 56.004 77.1636C56.175 76.9943 56.271 76.7646 56.271 76.5251C56.2706 76.4135 56.2483 76.303 56.2053 76.1998C56.6921 76.2333 57.1725 76.329 57.6345 76.4845C57.6913 76.5001 57.7507 76.5037 57.809 76.495C57.8672 76.4863 57.923 76.4656 57.9726 76.4341C58.0222 76.4026 58.0646 76.3611 58.0969 76.3123C58.1292 76.2636 58.1508 76.2086 58.1602 76.151C58.1915 76.0333 58.1788 75.9084 58.1245 75.7993C58.0701 75.6902 57.9778 75.6042 57.8645 75.5572C56.5315 75.118 55.0907 75.118 53.7577 75.5572C53.6436 75.6028 53.5508 75.689 53.4976 75.7988C53.4444 75.9087 53.4346 76.0343 53.4702 76.151C53.4794 76.2074 53.5007 76.2613 53.5327 76.3088C53.5647 76.3564 53.6067 76.3966 53.6558 76.4267C53.7048 76.4568 53.7599 76.4761 53.8172 76.4832C53.8744 76.4904 53.9326 76.4853 53.9877 76.4682C54.152 76.4194 54.3162 76.3706 54.4723 76.3381L54.4476 76.3462ZM61.6674 74.9553C61.6325 74.8694 61.6303 74.774 61.6611 74.6867C61.692 74.5993 61.7537 74.526 61.8349 74.4804C61.9162 74.4347 62.0114 74.4197 62.1029 74.4382C62.1944 74.4568 62.276 74.5075 62.3326 74.5811C62.4983 74.8207 62.5869 75.1042 62.5869 75.3945C62.5869 75.6848 62.4983 75.9684 62.3326 76.2079C62.276 76.291 62.1884 76.3484 62.089 76.3674C61.9897 76.3865 61.8867 76.3657 61.8029 76.3096C61.719 76.2535 61.6611 76.1667 61.6418 76.0683C61.6226 75.9699 61.6436 75.868 61.7002 75.785C61.7818 75.6557 61.8251 75.5063 61.8251 75.3538C61.8251 75.2014 61.7818 75.052 61.7002 74.9227L61.6674 74.9553ZM38.0452 74.4428C38.0884 74.4673 38.1264 74.5 38.1568 74.539C38.1873 74.578 38.2096 74.6227 38.2226 74.6703C38.2356 74.7179 38.2389 74.7676 38.2324 74.8165C38.226 74.8654 38.2098 74.9126 38.1848 74.9553C38.0961 75.0819 38.0486 75.2323 38.0486 75.3864C38.0486 75.5405 38.0961 75.6909 38.1848 75.8175C38.2414 75.9005 38.2624 76.0025 38.2432 76.1009C38.2239 76.1993 38.166 76.286 38.0821 76.3421C37.9983 76.3982 37.8953 76.419 37.796 76.4C37.6966 76.3809 37.609 76.3235 37.5524 76.2405C37.3889 76.0001 37.3015 75.7169 37.3015 75.4271C37.3015 75.1372 37.3889 74.854 37.5524 74.6136C37.6038 74.5266 37.688 74.4632 37.7864 74.4373C37.8849 74.4114 37.9897 74.4251 38.078 74.4754L38.0452 74.4428ZM48.5667 80.7142C48.477 80.6243 48.4266 80.503 48.4266 80.3766C48.4266 80.2502 48.477 80.1289 48.5667 80.0391C48.6585 79.952 48.7806 79.9035 48.9076 79.9035C49.0346 79.9035 49.1567 79.952 49.2485 80.0391C49.4375 80.2388 49.6955 80.3607 49.9713 80.3807C50.256 80.3614 50.5229 80.2365 50.7187 80.0309C50.8166 79.9502 50.9424 79.9102 51.0695 79.9193C51.1966 79.9284 51.3152 79.9859 51.4004 80.0797C51.483 80.1769 51.5233 80.3025 51.5125 80.4291C51.5017 80.5556 51.4407 80.6727 51.3429 80.7549C50.9756 81.1069 50.4902 81.3125 49.9795 81.3324C49.4599 81.3233 48.9646 81.1131 48.5996 80.7467L48.5667 80.7142ZM46.5051 83.9109C46.4458 83.8639 46.3964 83.8057 46.3598 83.7398C46.3231 83.6739 46.2999 83.6015 46.2915 83.5268C46.2832 83.452 46.2897 83.3763 46.3109 83.304C46.332 83.2318 46.3673 83.1643 46.4148 83.1056C46.4622 83.0468 46.5209 82.9979 46.5875 82.9616C46.654 82.9253 46.7271 82.9024 46.8026 82.8941C46.8782 82.8858 46.9546 82.8923 47.0275 82.9132C47.1005 82.9341 47.1686 82.9691 47.2279 83.0161C48.016 83.7346 49.0329 84.1575 50.1027 84.2118C51.0461 84.1653 51.9324 83.7499 52.5667 83.0568C52.6207 83.0034 52.6847 82.961 52.7552 82.9321C52.8256 82.9032 52.9011 82.8883 52.9774 82.8883C53.0537 82.8883 53.1292 82.9032 53.1997 82.9321C53.2701 82.961 53.3342 83.0034 53.3881 83.0568C53.442 83.1102 53.4848 83.1736 53.514 83.2434C53.5432 83.3132 53.5582 83.388 53.5582 83.4635C53.5582 83.539 53.5432 83.6138 53.514 83.6836C53.4848 83.7534 53.442 83.8168 53.3881 83.8702C52.967 84.3211 52.4599 84.6848 51.8959 84.9403C51.332 85.1958 50.7225 85.338 50.1027 85.3587C48.7817 85.2965 47.5227 84.7851 46.538 83.9109H46.5051ZM41.8234 74.15C41.7234 74.2288 41.5965 74.2661 41.4693 74.2539C41.3421 74.2418 41.2246 74.1812 41.1417 74.0849C41.1015 74.037 41.0713 73.9816 41.0529 73.9221C41.0344 73.8625 41.0281 73.7999 41.0342 73.7379C41.0403 73.6759 41.0587 73.6157 41.0885 73.5608C41.1182 73.5058 41.1586 73.4573 41.2074 73.4179C42.2505 72.6045 43.9096 72.8648 45.3142 73.117C45.8191 73.2271 46.3333 73.2897 46.8501 73.3041C46.9137 73.3019 46.9772 73.3122 47.0368 73.3343C47.0965 73.3564 47.1511 73.39 47.1977 73.433C47.2442 73.4761 47.2817 73.5278 47.308 73.5852C47.3344 73.6427 47.349 73.7047 47.3511 73.7677C47.3533 73.8303 47.3429 73.8928 47.3204 73.9514C47.298 74.01 47.264 74.0635 47.2204 74.109C47.1768 74.1544 47.1245 74.1908 47.0666 74.216C47.0087 74.2412 46.9462 74.2547 46.883 74.2558C46.3069 74.2339 45.7346 74.1549 45.1745 74.0199C43.9507 73.8002 42.5298 73.5481 41.8398 74.1175L41.8234 74.15ZM58.7351 73.3366C58.8331 73.4164 58.8951 73.5315 58.9075 73.6566C58.9198 73.7817 58.8814 73.9065 58.8008 74.0036C58.7202 74.1007 58.604 74.1621 58.4777 74.1743C58.3514 74.1865 58.2253 74.1485 58.1273 74.0687C57.4292 73.4993 56 73.7514 54.7844 73.9711C54.2098 74.0978 53.6236 74.1659 53.0349 74.1744C52.9053 74.169 52.7832 74.1129 52.6954 74.0183C52.6076 73.9237 52.5613 73.7985 52.5667 73.6701C52.5722 73.5417 52.6289 73.4208 52.7244 73.3338C52.8199 73.2469 52.9464 73.2011 53.076 73.2065C53.5927 73.1916 54.1069 73.129 54.6119 73.0194C56.0411 72.7672 57.7002 72.4663 58.7187 73.3203L58.7351 73.3366ZM42.308 76.5902C42.2536 76.6088 42.1959 76.6158 42.1385 76.6109C42.0812 76.6059 42.0256 76.5891 41.9753 76.5615C41.9249 76.5339 41.881 76.4961 41.8464 76.4506C41.8117 76.4051 41.7871 76.3529 41.7741 76.2974C41.7361 76.1814 41.7417 76.0557 41.79 75.9436C41.8384 75.8314 41.9261 75.7404 42.037 75.6873C42.698 75.4273 43.4038 75.2975 44.115 75.305C44.8193 75.3135 45.5169 75.4429 46.1766 75.6873C46.2887 75.7374 46.3787 75.8259 46.43 75.9365C46.4813 76.0472 46.4905 76.1724 46.4559 76.2893C46.4436 76.3456 46.4197 76.3988 46.3856 76.4455C46.3515 76.4921 46.3079 76.5313 46.2577 76.5603C46.2075 76.5894 46.1517 76.6078 46.0939 76.6144C46.0361 76.6209 45.9775 76.6154 45.922 76.5984L45.5031 76.4601C45.5071 76.5251 45.5071 76.5903 45.5031 76.6553C45.5151 76.7805 45.5006 76.9068 45.4605 77.0262C45.4203 77.1455 45.3555 77.2552 45.27 77.3483C45.1846 77.4414 45.0804 77.5157 44.9643 77.5666C44.8481 77.6175 44.7225 77.6438 44.5955 77.6438C44.4685 77.6438 44.3429 77.6175 44.2267 77.5666C44.1105 77.5157 44.0064 77.4414 43.9209 77.3483C43.8355 77.2552 43.7706 77.1455 43.7305 77.0262C43.6904 76.9068 43.6758 76.7805 43.6879 76.6553C43.6898 76.5264 43.7178 76.3992 43.77 76.2811C43.2773 76.3135 42.7926 76.4205 42.3326 76.5984L42.308 76.5902ZM56.9199 87.0343C56.4952 87.3155 56.0536 87.5709 55.5975 87.7989C54.5188 88.5004 53.2721 88.9073 51.9836 88.9784C51.3466 89.0898 50.7001 89.1388 50.0534 89.1248H49.5688C47.1684 89.2416 44.8149 88.4375 42.9979 86.8798C41.0185 88.897 40.2875 88.9702 37.7248 90.1334C40.3121 97.5028 57.4949 99.9512 61.6345 89.808C59.1294 88.7831 58.7598 88.8401 56.9446 87.0506L56.9199 87.0343ZM61.1581 72.995L60.5421 68.8222C57.3439 70.7136 53.6881 71.7114 49.963 71.7098C46.2214 71.7612 42.5427 70.7538 39.3593 68.8059L38.6776 72.873L37.4209 72.1734C37.1006 72.0026 36.4435 72.1734 36.4025 72.5069C36.169 73.0565 36.1061 73.6625 36.2218 74.2476C36.3118 75.0562 36.5425 75.8432 36.9035 76.574C37.2977 77.3386 37.7906 77.8754 38.2669 77.7371C38.4085 77.6983 38.5597 77.7145 38.6895 77.7826C38.8194 77.8507 38.918 77.9654 38.9651 78.1031C39.1294 78.5668 39.2444 78.9166 39.3511 79.2175C39.7887 80.9375 40.5708 82.5529 41.6509 83.9678C42.7137 85.1721 44.0132 86.1491 45.4702 86.8391C46.9158 87.5418 48.4936 87.938 50.1027 88.0023C51.7689 88.0047 53.4133 87.6261 54.9076 86.896C56.4219 86.1845 57.7531 85.1415 58.8008 83.8458C59.6526 82.6405 60.2555 81.2805 60.5749 79.8438C60.6982 79.429 60.8214 79.0304 60.9938 78.4692C61.0273 78.3258 61.1149 78.2005 61.2385 78.1189C61.3622 78.0372 61.5126 78.0054 61.6591 78.0299C62.2423 78.1357 62.8665 77.2165 63.3018 76.1103C63.5568 75.4376 637225 74.7349 63.7947 74.0199C63.8743 73.5288 63.8175 73.0255 63.6304 72.5639C63.4579 71.8969 62.9733 72.027 62.5955 72.1328L61.1581 73.0194V72.995ZM50.2259 3.79867C60.3203 -3.11526 61.0842 10.5743 70.9979 2.03359V15.9835C61.5359 24.4103 59.499 10.8021 50.2259 17.716V3.79867ZM47.7372 7.60461e-05C48.1592 0.00200264 48.569 0.140857 48.9037 0.395378C49.2385 0.649898 49.4798 1.00606 49.5906 1.40932C49.7015 1.81258 49.6759 2.24073 49.5177 2.62819C49.3594 3.01565 49.0774 3.34108 48.7146 3.55465H48.8049V25.3132H74.3655V45.0871H100V99.9186H82.6694C82.6694 99.7966 82.6694 99.6746 82.6694 99.5526C82.671 99.1755 82.6325 98.7993 82.5544 98.4301L82.4887 98.1129C79.6715 86.3755 73.1006 84.6999 66.8172 83.3984L66.9569 82.9592C67.2018 82.7411 67.4348 82.5103 67.655 82.2678C68.5893 81.1969 69.3211 79.968 69.8152 78.64C70.0688 78.0036 70.28 77.3515 70.4476 76.6878C70.6003 76.0151 70.7073 75.333 70.768 74.6462C70.8419 73.9051 70.8419 73.1586 70.768 72.4175V72.1002C70.6388 71.0633 70.3157 70.0592 69.8152 69.1394L69.5441 68.6921L69.6263 68.1308V67.96C70.8337 59.6551 66.8255 54.1321 60.8049 51.1307C57.5182 49.5707 53.9113 48.7856 50.2669 48.8369C46.6621 48.8346 43.099 49.6002 39.8193 51.0819C33.5113 54.0183 29.1828 59.5006 30.308 67.3011L30.5133 68.6514L30.3984 68.8303C29.7959 69.8263 29.4047 70.9333 29.2485 72.084C29.1195 72.995 29.1029 73.9182 29.1992 74.8333V75.0529C29.298 75.8632 29.4684 76.6634 29.7084 77.4443C29.8905 78.0673 30.1183 78.6762 30.3901 79.2663L30.5955 79.6974C31.1836 80.8913 32.0075 81.9561 33.0185 82.829L33.191 82.9754L33.3717 83.4472L33.0103 83.5367C26.5708 84.9601 20.0575 86.4243 17.5031 98.0153C17.3642 98.5161 17.2951 99.0333 17.2977 99.5526C17.2977 99.6909 17.2977 99.821 17.2977 99.9512H0V45.0871H25.6674V25.3214H46.6694V3.55465H46.768C46.4831 3.38621 46.2467 3.14818 46.0813 2.86334C45.9159 2.5785 45.8271 2.25639 45.8234 1.92784C45.8168 1.67564 45.8615 1.4247 45.9549 1.18999C46.0483 0.955276 46.1885 0.741596 46.3671 0.561691C46.5457 0.381786 46.7591 0.239342 46.9944 0.142853C47.2298 0.0463639 47.4824 -0.00219363 47.7372 7.60461e-05ZM48.3778 34.3827C48.3778 34.0591 48.5076 33.7487 48.7387 33.5199C48.9697 33.2911 49.2831 33.1626 49.6099 33.1626C49.9366 33.1626 50.25 33.2911 50.481 33.5199C50.7121 33.7487 50.8419 34.0591 50.8419 34.3827V38.165H53.4374C53.7641 38.165 54.0775 38.2936 54.3085 38.5224C54.5396 38.7512 54.6694 39.0615 54.6694 39.3851C54.6694 39.7087 54.5396 40.019 54.3085 40.2479C54.0775 40.4767 53.7641 40.6052 53.4374 40.6052H49.6099C49.2831 40.6052 48.9697 40.4767 48.7387 40.2479C48.5076 40.019 48.3778 39.7087 48.3778 39.3851V34.3827ZM50.0205 30.1855C51.6797 30.1903 53.3002 30.682 54.6774 31.5984C56.0546 32.5147 57.1267 33.8147 57.7582 35.3341C58.3898 36.8535 58.5525 38.5242 58.2258 40.1352C57.8992 41.7461 57.0977 43.2251 55.9228 44.3852C54.7479 45.5454 53.2521 46.3347 51.6245 46.6535C49.9968 46.9723 48.3103 46.8062 46.7779 46.1763C45.2455 45.5464 43.9359 44.4809 43.0146 43.1144C42.0933 41.7479 41.6017 40.1416 41.6016 38.4985C41.6016 36.2938 42.486 34.1793 44.0603 32.6203C45.6345 31.0613 47.7696 30.1855 49.9959 30.1855H50.0205ZM11.2444 59.0776H20.8706V85.6109H11.2444V59.0776Z" />
                                                                </svg>



                                                                <span class="card-text  mt-2 d-block">
                                                                    Schools
                                                                </span>
                                                            </div>
                                                            </a>
                                                        </label>
                                                    </div>

                                                    <div class="radio-item ins_type" data-v="2">
                                                        <input type="radio" value="PU-Junior-College" onchange="showArrw()" name="type"
                                                            id="mce-group[274634]-274634-1">
                                                        <label class="label-icon option2"
                                                            for="mce-group[274634]-274634-1">
                                                            <div class="card-body p-0">
                                                                <svg class="icon icon-pizza" width="109" height="100"
                                                                    viewBox="0 0 109 100" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M107.07 96.8153H103.567V52.4416H107.07C107.651 52.4416 108.186 52.1251 108.466 51.6155C108.746 51.1059 108.726 50.4845 108.414 49.9943L96.5241 31.3106C96.2317 30.8512 95.7252 30.573 95.1806 30.573H63.5683L56.0086 23.0136V16.7728H71.4014C71.9886 16.7728 72.5283 16.4497 72.8054 15.9318C73.0825 15.4142 73.0521 14.7858 72.7262 14.2972L69.9182 10.0849L72.7264 5.87261C73.0523 5.38408 73.0825 4.75563 72.8056 4.238C72.5283 3.72017 71.9886 3.39703 71.4014 3.39703H56.0086V1.59236C56.0086 0.712951 55.2956 0 54.4162 0C53.5368 0 52.8239 0.712951 52.8239 1.59236V23.0136L45.2642 30.5732H13.6519C13.1075 30.5732 12.6007 30.8514 12.3084 31.3108L0.418793 49.9945C0.106904 50.4847 0.0867339 51.1062 0.366352 51.6157C0.646182 52.125 1.18121 52.4416 1.76232 52.4416H5.2655V96.8153H1.76232C0.882912 96.8153 0.169961 97.5282 0.169961 98.4076C0.169961 99.287 0.882912 100 1.76232 100H107.07C107.95 100 108.663 99.287 108.663 98.4076C108.663 97.5282 107.95 96.8153 107.07 96.8153ZM94.3065 33.758L104.17 49.2569H82.2519L66.753 33.758H94.3065ZM68.426 6.58174L66.6793 9.2017C66.3226 9.73652 66.3226 10.4333 66.6793 10.9682L68.426 13.5881H56.0086V6.58174H68.426ZM14.526 33.758H42.0793L26.5804 49.2569H4.66317L14.526 33.758ZM8.45021 52.4416H27.2396C27.2923 52.4416 27.3449 52.4389 27.3976 52.4335C27.4201 52.4314 27.4421 52.4272 27.4644 52.424C27.4935 52.4197 27.5226 52.4163 27.5517 52.4106C27.5776 52.4055 27.6027 52.3983 27.6281 52.3919C27.653 52.3858 27.678 52.38 27.7027 52.3728C27.7277 52.3652 27.7521 52.3556 27.7768 52.3469C27.8012 52.3382 27.8256 52.3302 27.8498 52.3202C27.8729 52.3106 27.895 52.2994 27.9175 52.2887C27.9419 52.2771 27.9668 52.2662 27.9908 52.2533C28.0126 52.2416 28.0332 52.2282 28.0545 52.2157C28.0778 52.2019 28.1016 52.1885 28.1243 52.1732C28.1481 52.1573 28.1704 52.1397 28.1931 52.1225C28.2118 52.1085 28.2311 52.0955 28.2492 52.0805C28.2899 52.0471 28.329 52.0119 28.3661 51.9745L54.4162 25.9248L80.4663 51.9747C80.5035 52.0119 80.5428 52.0471 80.5833 52.0807C80.6014 52.0955 80.6205 52.1085 80.6392 52.1225C80.6621 52.1397 80.6846 52.1575 80.7084 52.1735C80.7309 52.1885 80.7544 52.2017 80.7776 52.2155C80.799 52.2284 80.8198 52.2418 80.8419 52.2535C80.8657 52.2662 80.8901 52.2771 80.9145 52.2885C80.9373 52.2994 80.9598 52.3106 80.9831 52.3204C81.0069 52.3301 81.0311 52.338 81.0551 52.3467C81.0799 52.3556 81.1046 52.3652 81.13 52.373C81.1542 52.3805 81.1789 52.3858 81.2033 52.3919C81.2292 52.3985 81.2547 52.4057 81.281 52.4108C81.309 52.4163 81.3373 52.4197 81.3655 52.4238C81.3886 52.4272 81.4116 52.4314 81.4351 52.4338C81.4874 52.4389 81.5398 52.4416 81.5922 52.4416H100.382V96.8153H66.1997V74.6284C66.1997 71.8773 63.9615 69.6391 61.2103 69.6391H47.6222C44.871 69.6391 42.6328 71.8773 42.6328 74.6284V96.8153H8.45021V52.4416ZM63.015 76.4331H45.8175V74.6284C45.8175 73.6333 46.6271 72.8238 47.6222 72.8238H61.2103C62.2054 72.8238 63.015 73.6333 63.015 74.6284V76.4331ZM45.8175 79.6178H52.8239V96.8153H45.8175V79.6178ZM56.0086 79.6178H63.015V96.8153H56.0086V79.6178Z" />
                                                                    <path
                                                                        d="M54.4172 64.3315C60.9147 64.3315 66.2007 59.0455 66.2007 52.5481C66.2007 46.0506 60.9147 40.7646 54.4172 40.7646C47.9198 40.7646 42.6338 46.0506 42.6338 52.5481C42.6338 59.0455 47.9198 64.3315 54.4172 64.3315ZM54.4172 43.9494C59.1586 43.9494 63.016 47.8067 63.016 52.5481C63.016 57.2895 59.1586 61.1468 54.4172 61.1468C49.6758 61.1468 45.8185 57.2895 45.8185 52.5481C45.8185 47.8067 49.6758 43.9494 54.4172 43.9494Z" />
                                                                    <path
                                                                        d="M54.4184 54.1396C55.2978 54.1396 56.0107 53.4267 56.0107 52.5473V47.4517C56.0107 46.5723 55.2978 45.8594 54.4184 45.8594C53.539 45.8594 52.826 46.5723 52.826 47.4517V50.9549H49.3228C48.4434 50.9549 47.7305 51.6679 47.7305 52.5473C47.7305 53.4267 48.4434 54.1396 49.3228 54.1396H54.4184Z"
                                                                        fill="" />
                                                                    <path
                                                                        d="M37.4326 78.1313H28.94C28.0606 78.1313 27.3477 78.8443 27.3477 79.7237V89.9148C27.3477 90.7942 28.0606 91.5071 28.94 91.5071H37.4326C38.312 91.5071 39.0249 90.7942 39.0249 89.9148V79.7237C39.0249 78.8443 38.312 78.1313 37.4326 78.1313ZM35.8402 81.3161V83.2269H30.5324V81.3161H35.8402ZM30.5324 88.3224V86.4116H35.8402V88.3224H30.5324Z"
                                                                        fill="" />
                                                                    <path
                                                                        d="M22.1445 78.1313H13.6519C12.7725 78.1313 12.0596 78.8443 12.0596 79.7237V89.9148C12.0596 90.7942 12.7725 91.5071 13.6519 91.5071H22.1445C23.0239 91.5071 23.7369 90.7942 23.7369 89.9148V79.7237C23.7369 78.8443 23.0239 78.1313 22.1445 78.1313ZM20.5521 81.3161V83.2269H15.2443V81.3161H20.5521ZM15.2443 88.3224V86.4116H20.5521V88.3224H15.2443Z"
                                                                        fill="" />
                                                                    <path
                                                                        d="M36.9018 57.75H29.4708C28.3001 57.75 27.3477 58.7024 27.3477 59.8731V71.232C27.3477 72.1114 28.0606 72.8243 28.94 72.8243H37.4326C38.312 72.8243 39.0249 72.1114 39.0249 71.232V59.8731C39.0249 58.7024 38.0725 57.75 36.9018 57.75ZM35.8402 60.9347V64.5441H30.5324V60.9347H35.8402ZM30.5324 69.6396V67.7288H35.8402V69.6396H30.5324Z"
                                                                        fill="" />
                                                                    <path
                                                                        d="M21.6137 57.75H14.1827C13.012 57.75 12.0596 58.7024 12.0596 59.8731V71.232C12.0596 72.1114 12.7725 72.8243 13.6519 72.8243H22.1445C23.0239 72.8243 23.7369 72.1114 23.7369 71.232V59.8731C23.7369 58.7024 22.7844 57.75 21.6137 57.75ZM20.5521 60.9347V64.5441H15.2443V60.9347H20.5521ZM15.2443 69.6396V67.7288H20.5521V69.6396H15.2443Z"
                                                                        fill="" />
                                                                    <path
                                                                        d="M86.6871 91.5071H95.1797C96.0591 91.5071 96.772 90.7942 96.772 89.9148V79.7237C96.772 78.8443 96.0591 78.1313 95.1797 78.1313H86.6871C85.8077 78.1313 85.0947 78.8443 85.0947 79.7237V89.9148C85.0947 90.7942 85.8077 91.5071 86.6871 91.5071ZM88.2794 88.3224V86.4116H93.5873V88.3224H88.2794ZM93.5873 81.3161V83.2269H88.2794V81.3161H93.5873Z"
                                                                        fill="" />
                                                                    <path
                                                                        d="M71.4019 91.5071H79.8945C80.7739 91.5071 81.4869 90.7942 81.4869 89.9148V79.7237C81.4869 78.8443 80.7739 78.1313 79.8945 78.1313H71.4019C70.5225 78.1313 69.8096 78.8443 69.8096 79.7237V89.9148C69.8096 90.7942 70.5225 91.5071 71.4019 91.5071ZM72.9943 88.3224V86.4116H78.3021V88.3224H72.9943ZM78.3021 81.3161V83.2269H72.9943V81.3161H78.3021Z"
                                                                        fill="" />
                                                                    <path
                                                                        d="M86.6871 72.8243H95.1797C96.0591 72.8243 96.772 72.1114 96.772 71.232V59.8731C96.772 58.7024 95.8196 57.75 94.6489 57.75H87.2179C86.0472 57.75 85.0947 58.7024 85.0947 59.8731V71.232C85.0947 72.1114 85.8077 72.8243 86.6871 72.8243ZM88.2794 69.6396V67.7288H93.5873V69.6396H88.2794ZM93.5873 60.9347V64.5441H88.2794V60.9347H93.5873Z"
                                                                        fill="" />
                                                                    <path
                                                                        d="M71.4019 72.8243H79.8945C80.7739 72.8243 81.4869 72.1114 81.4869 71.232V59.8731C81.4869 58.7024 80.5344 57.75 79.3637 57.75H71.9327C70.762 57.75 69.8096 58.7024 69.8096 59.8731V71.232C69.8096 72.1114 70.5225 72.8243 71.4019 72.8243ZM72.9943 69.6396V67.7288H78.3021V69.6396H72.9943ZM78.3021 60.9347V64.5441H72.9943V60.9347H78.3021Z"
                                                                        fill="" />
                                                                </svg>
                                                                <span class="card-text  mt-2 d-block">
                                                                    PU-Junior College
                                                                </span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="radio-item ins_type" data-v="3">
                                                        <input type="radio" value="Polytechnic-College" onchange="showArrw()" name="type"
                                                            id="mce-group[274634]-274634-3">
                                                        <label class="label-icon option2"
                                                            for="mce-group[274634]-274634-3">
                                                            <div class="card-body p-0">
                                                                <svg class="icon icon-pizza" width="90" height="80"
                                                                    viewBox="0 0 90 100" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0_922_2373)">
                                                                        <path
                                                                            d="M31.2806 80.3232C31.9059 80.6605 32.6125 80.8161 33.3211 80.7725C34.0297 80.7289 34.7122 80.4878 35.2917 80.0764C35.8712 79.665 36.3249 79.0995 36.6018 78.4436C36.8786 77.7876 36.9676 77.0672 36.8587 76.3633C36.7498 75.6594 36.4474 74.9999 35.9855 74.459C35.5236 73.9181 34.9204 73.5172 34.2439 73.3013C33.5673 73.0855 32.8442 73.0633 32.1558 73.2372C31.4673 73.4112 30.8409 73.7743 30.3469 74.2859L33.4508 76.2132C33.5466 76.2644 33.6316 76.3339 33.7006 76.418C33.7697 76.502 33.8217 76.5989 33.8534 76.7031C33.8852 76.8073 33.8962 76.9167 33.8858 77.0252C33.8755 77.1336 33.8439 77.239 33.7929 77.3352C33.742 77.4314 33.6727 77.5166 33.5889 77.5859C33.5051 77.6552 33.4086 77.7073 33.3047 77.7392C33.2009 77.7711 33.0918 77.7822 32.9837 77.7717C32.8756 77.7613 32.7707 77.7297 32.6748 77.6785L29.3419 76.1928C29.1773 76.999 29.2772 77.837 29.6267 78.5815C29.9761 79.326 30.5563 79.937 31.2806 80.3232Z" />
                                                                        <path
                                                                            d="M33.5195 77.1833C33.5653 77.094 33.5837 76.9932 33.5726 76.8934C33.5615 76.7936 33.5214 76.6993 33.4572 76.6223C33.3929 76.5453 33.3075 76.4891 33.2116 76.4605C33.1157 76.432 33.0135 76.4324 32.9178 76.4619C32.8221 76.4913 32.7372 76.5484 32.6737 76.626C32.6102 76.7035 32.5709 76.7982 32.5607 76.8981C32.5506 76.998 32.57 77.0986 32.6165 77.1875C32.6631 77.2764 32.7347 77.3495 32.8224 77.3978C32.882 77.4305 32.9476 77.451 33.0152 77.4579C33.0828 77.4649 33.1511 77.4581 33.2161 77.4381C33.2811 77.4182 33.3414 77.3853 33.3935 77.3415C33.4456 77.2978 33.4885 77.244 33.5195 77.1833Z" />
                                                                        <path
                                                                            d="M40.5617 52.2249H2.21852C1.63052 52.2275 1.0674 52.4633 0.651854 52.8807C0.236309 53.2981 0.00200761 53.8634 0 54.4534V73.8418C0.0370291 74.5104 0.230163 75.161 0.56382 75.741C0.897477 76.321 1.36232 76.8142 1.92085 77.1808L30.1611 93.5441L40.8466 99.7372C41.9025 100.35 42.7675 99.8495 42.7675 98.6267V54.4636C42.7682 53.8741 42.5368 53.3081 42.1237 52.8888C41.7106 52.4695 41.1492 52.2309 40.5617 52.2249ZM38.8342 77.3901L38.2236 77.5382C38.1798 77.9175 38.0945 78.2907 37.9692 78.6512L38.4577 79.0495C38.5043 79.0904 38.5361 79.1456 38.5481 79.2066C38.56 79.2676 38.5515 79.3308 38.5238 79.3864L38.1524 80.0935C38.1212 80.1469 38.0736 80.1888 38.0167 80.2127C37.9598 80.2366 37.8967 80.2414 37.8369 80.2263L37.2365 80.045C37.0087 80.3522 36.7486 80.6338 36.4605 80.8849L36.6818 81.4746C36.7022 81.5331 36.7025 81.5968 36.6827 81.6556C36.6629 81.7143 36.6241 81.7647 36.5724 81.7988L35.9008 82.2226C35.8478 82.2541 35.7859 82.2672 35.7247 82.2598C35.6635 82.2524 35.6065 82.2249 35.5624 82.1817L35.1274 81.7222C34.7778 81.8743 34.4126 81.9873 34.0384 82.0592L33.9392 82.6821C33.9269 82.7424 33.8954 82.7971 33.8496 82.838C33.8037 82.8789 33.7459 82.9039 33.6848 82.9093L32.891 82.9399C32.829 82.9398 32.7688 82.9193 32.7196 82.8814C32.6704 82.8436 32.635 82.7906 32.6188 82.7306L32.4712 82.1204C32.0925 82.0761 31.7197 81.9905 31.3594 81.8652L30.9625 82.3553C30.9223 82.4019 30.8678 82.434 30.8075 82.4464C30.7473 82.4589 30.6846 82.4511 30.6293 82.4242L29.9245 82.049C29.8715 82.0181 29.8299 81.9708 29.8061 81.9142C29.7822 81.8575 29.7773 81.7946 29.7922 81.735L29.9729 81.13C29.6661 80.9022 29.3853 80.6411 29.1358 80.3514L28.5481 80.5735C28.4901 80.5946 28.4267 80.5955 28.368 80.5761C28.3094 80.5566 28.259 80.5179 28.225 80.4662L27.8027 79.7898C27.7712 79.7364 27.7583 79.6741 27.7661 79.6125C27.774 79.551 27.8021 79.4939 27.8459 79.4502L28.3013 79.0163C28.1501 78.6654 28.0375 78.299 27.9655 77.9237L27.3447 77.8241C27.2845 77.8121 27.2297 77.7807 27.1889 77.7346C27.148 77.6885 27.1232 77.6303 27.1183 77.5688L27.0878 76.7724C27.088 76.7103 27.1081 76.6499 27.1453 76.6003C27.1824 76.5506 27.2345 76.5143 27.2939 76.4967L27.907 76.3512C27.9368 76.103 27.9844 75.8573 28.0495 75.616L24.05 73.829C23.627 74.4022 23.1424 74.927 22.6049 75.3939L23.0222 76.4916C23.0593 76.6012 23.0595 76.7201 23.0227 76.8298C22.9859 76.9396 22.9142 77.0342 22.8187 77.0991L21.5618 77.893C21.4619 77.9509 21.3458 77.9743 21.2313 77.9596C21.1169 77.9448 21.0104 77.8927 20.9283 77.8114L20.1193 76.9562C19.4657 77.2393 18.7832 77.4499 18.084 77.5842L17.8957 78.7482C17.8736 78.8618 17.8147 78.9649 17.7282 79.0416C17.6417 79.1182 17.5325 79.164 17.4174 79.172L15.9367 79.2281C15.8212 79.2284 15.7088 79.1905 15.6169 79.1204C15.525 79.0503 15.4585 78.9518 15.4278 78.8401L15.1531 77.6965C14.4459 77.6143 13.7498 77.4551 13.077 77.2217L12.3367 78.133C12.2607 78.2201 12.1583 78.2798 12.0452 78.3029C11.9322 78.3259 11.8147 78.3111 11.7108 78.2606L10.4006 77.5612C10.2992 77.5049 10.2192 77.4166 10.1732 77.3099C10.1271 77.2032 10.1176 77.0842 10.1461 76.9715L10.482 75.8432C9.91013 75.4184 9.38707 74.9312 8.92241 74.3906L7.82587 74.8093C7.71666 74.8474 7.59791 74.848 7.48831 74.8111C7.3787 74.7741 7.28444 74.7016 7.22036 74.6051L6.42912 73.344C6.37141 73.2437 6.34812 73.1272 6.36283 73.0124C6.37754 72.8975 6.42943 72.7907 6.51053 72.7084L7.36283 71.8966C7.08065 71.2408 6.87079 70.5559 6.73696 69.8543L5.57682 69.6654C5.46412 69.6412 5.36238 69.5807 5.28707 69.4932C5.21176 69.4056 5.16699 69.2958 5.15958 69.1804L5.10615 67.6921C5.10575 67.5766 5.1431 67.4641 5.21248 67.3719C5.28187 67.2797 5.37946 67.2128 5.49032 67.1816L6.63265 66.9084C6.71327 66.1987 6.87197 65.5001 7.10587 64.8254L6.1976 64.0825C6.11061 64.0069 6.05096 63.9046 6.02795 63.7915C6.00495 63.6784 6.01987 63.5608 6.07039 63.4571L6.76495 62.1373C6.81895 62.0336 6.90678 61.9517 7.01376 61.9052C7.12074 61.8588 7.24037 61.8506 7.35265 61.882L8.47718 62.2164C8.89905 61.6415 9.38472 61.1165 9.92481 60.6516L9.50756 59.5488C9.46994 59.4398 9.46925 59.3214 9.5056 59.212C9.54194 59.1026 9.61329 59.0083 9.70855 58.9438L10.9806 58.1499C11.0806 58.092 11.1967 58.0686 11.3111 58.0833C11.4256 58.0981 11.532 58.1502 11.6141 58.2315L12.4206 59.0867C13.0743 58.8038 13.7568 58.5932 14.456 58.4587L14.6442 57.2921C14.6668 57.1787 14.7257 57.0758 14.8121 56.9993C14.8985 56.9227 15.0076 56.8767 15.1225 56.8684L16.6058 56.8148C16.722 56.8114 16.8359 56.848 16.9285 56.9186C17.0211 56.9892 17.0868 57.0895 17.1146 57.2028L17.3894 58.3464C18.0962 58.4258 18.7918 58.5851 19.4629 58.8212L20.2058 57.9073C20.2819 57.8212 20.384 57.7624 20.4965 57.7398C20.609 57.7172 20.7258 57.7321 20.8291 57.7823L22.1419 58.4792C22.243 58.5357 22.3227 58.6242 22.3687 58.7308C22.4147 58.8373 22.4244 58.9562 22.3963 59.0689L22.0605 60.1972C22.633 60.6212 23.1561 61.1084 23.6201 61.6497L24.7166 61.2311C24.7837 61.2107 24.8543 61.2046 24.9239 61.2129C24.9935 61.2213 25.0607 61.2439 25.1211 61.2796C25.2003 61.3133 25.2702 61.3659 25.3247 61.4327L26.1108 62.6964C26.1713 62.7952 26.1964 62.9117 26.1821 63.0268C26.1677 63.1418 26.1148 63.2486 26.0319 63.3294L25.1568 64.1616C25.4404 64.8172 25.6511 65.502 25.7852 66.2039L26.9453 66.3928C27.0587 66.4146 27.1617 66.4735 27.2381 66.5604C27.3146 66.6472 27.3601 66.7571 27.3676 66.8727L27.4236 68.361C27.4243 68.4769 27.3867 68.5899 27.3168 68.6822C27.2468 68.7746 27.1484 68.8411 27.0369 68.8715L25.8971 69.1472C25.8122 69.8549 25.6492 70.551 25.4112 71.2226L29.1511 73.5482C29.3073 73.354 29.4774 73.1714 29.6599 73.0019L29.436 72.4097C29.4163 72.3515 29.4163 72.2883 29.4361 72.2301C29.4559 72.172 29.4944 72.122 29.5454 72.088L30.2196 71.6617C30.2731 71.6304 30.3354 71.6179 30.3967 71.6262C30.458 71.6346 30.5148 71.6632 30.558 71.7077L30.9905 72.1646C31.3399 72.0121 31.7051 71.8991 32.0794 71.8276L32.1812 71.2048C32.1919 71.1434 32.2227 71.0875 32.2689 71.0458C32.315 71.0042 32.3737 70.9792 32.4356 70.975L33.2294 70.9469C33.2912 70.9464 33.3513 70.9664 33.4006 71.0038C33.4498 71.0412 33.4853 71.0939 33.5016 71.1537L33.6492 71.7664C34.028 71.8101 34.4009 71.8957 34.761 72.0217L35.1579 71.5315C35.1985 71.4853 35.2531 71.4538 35.3133 71.4418C35.3736 71.4298 35.4361 71.438 35.4912 71.4652L36.1959 71.8379C36.2494 71.8688 36.2914 71.9166 36.3153 71.9737C36.3392 72.0309 36.3437 72.0944 36.3282 72.1544L36.1501 72.7569C36.4556 72.9862 36.7354 73.2481 36.9846 73.538L37.5723 73.3134C37.6304 73.2931 37.6936 73.2926 37.752 73.312C37.8104 73.3314 37.8608 73.3696 37.8954 73.4206L38.3203 74.0971C38.3503 74.1513 38.3624 74.2137 38.3546 74.2752C38.3468 74.3368 38.3196 74.3942 38.277 74.4391L37.8191 74.8706C37.9711 75.222 38.0837 75.5893 38.1549 75.9657L38.7782 76.0653C38.8382 76.0774 38.8926 76.1089 38.9331 76.155C38.9735 76.2011 38.9978 76.2593 39.0021 76.3205L39.0327 77.117C39.0336 77.178 39.0148 77.2376 38.979 77.2869C38.9432 77.3362 38.8924 77.3724 38.8342 77.3901Z" />
                                                                        <path
                                                                            d="M40.8619 0.255201L1.92085 22.8192C1.3626 23.1861 0.897969 23.6794 0.564348 24.2593C0.230727 24.8393 0.0374269 25.4897 0 26.1582V45.5594C0.00201177 46.1491 0.236396 46.7141 0.652013 47.1312C1.06763 47.5482 1.63075 47.7834 2.21852 47.7854H40.5617C41.1497 47.7834 41.7131 47.5483 42.1291 47.1313C42.5451 46.7144 42.7801 46.1494 42.7828 45.5594V1.39629C42.7828 0.150537 41.9177 -0.35236 40.8619 0.255201Z" />
                                                                        <path class="ic-c"
                                                                            d="M29.5606 43.0295H13.4738C11.408 43.03 9.42188 42.2297 7.93008 40.7959H16.476C16.6247 40.9929 16.8115 41.1578 17.0253 41.2806C17.2391 41.4035 17.4754 41.4817 17.72 41.5106C17.7948 41.5252 17.8705 41.5346 17.9465 41.5387C18.2622 41.5404 18.5731 41.4609 18.8495 41.3079C19.1259 41.1548 19.3587 40.9334 19.5257 40.6645C19.6927 40.3957 19.7883 40.0884 19.8035 39.772C19.8187 39.4556 19.7528 39.1406 19.6123 38.8569C19.4718 38.5732 19.2613 38.3304 19.0008 38.1514C18.7403 37.9725 18.4384 37.8635 18.124 37.8347C17.8096 37.8059 17.4931 37.8584 17.2046 37.987C16.9161 38.1157 16.6653 38.3164 16.476 38.5698H6.29928C5.78017 37.5403 5.4887 36.4104 5.44479 35.2574C5.40088 34.1044 5.60557 32.9555 6.04486 31.8892H16.476C16.7086 32.2013 17.0333 32.4319 17.4039 32.5484C17.7745 32.665 18.1723 32.6615 18.5408 32.5385C18.9094 32.4155 19.2299 32.1792 19.4571 31.8631C19.6843 31.547 19.8066 31.1672 19.8066 30.7775C19.8066 30.3878 19.6843 30.008 19.4571 29.6919C19.2299 29.3758 18.9094 29.1395 18.5408 29.0165C18.1723 28.8935 17.7745 28.89 17.4039 29.0065C17.0333 29.1231 16.7086 29.3537 16.476 29.6657H7.41362C8.56295 28.3354 10.1153 27.4198 11.8328 27.0594C12.6665 25.446 13.8877 24.0663 15.3859 23.0451C16.8841 22.0239 18.6123 21.3932 20.4143 21.21C22.2163 21.0268 24.0355 21.297 25.7074 21.996C27.3793 22.695 28.8513 23.8008 29.9906 25.2137H21.8213C21.5885 24.9028 21.2642 24.6732 20.8942 24.5574C20.5242 24.4417 20.1273 24.4456 19.7597 24.5687C19.392 24.6918 19.0723 24.9278 18.8458 25.2433C18.6192 25.5588 18.4973 25.9378 18.4973 26.3267C18.4973 26.7156 18.6192 27.0946 18.8458 27.4101C19.0723 27.7256 19.392 27.9616 19.7597 28.0847C20.1273 28.2078 20.5242 28.2118 20.8942 28.096C21.2642 27.9803 21.5885 27.7507 21.8213 27.4397H32.4788C33.8568 27.976 35.0607 28.883 35.9584 30.0612C36.8561 31.2393 37.4127 32.6429 37.5671 34.1178H21.8213C21.5884 33.8061 21.2637 33.5758 20.8931 33.4595C20.5226 33.3432 20.1249 33.3469 19.7566 33.4701C19.3882 33.5932 19.0678 33.8295 18.8408 34.1455C18.6138 34.4615 18.4916 34.8412 18.4916 35.2308C18.4916 35.6204 18.6138 36.0001 18.8408 36.3161C19.0678 36.6321 19.3882 36.8684 19.7566 36.9915C20.1249 37.1147 20.5226 37.1184 20.8931 37.0021C21.2637 36.8859 21.5884 36.6556 21.8213 36.3438H37.4781C37.1545 38.2154 36.1828 39.9122 34.7344 41.1353C33.286 42.3584 31.4537 43.0292 29.5606 43.0295Z" />
                                                                        <path
                                                                            d="M88.0816 22.8194L49.1406 0.255355C48.0847 -0.357312 47.2197 0.145586 47.2197 1.36837V45.5493C47.2217 46.1395 47.4565 46.7049 47.8726 47.122C48.2888 47.5391 48.8526 47.774 49.4408 47.7753H87.784C88.3717 47.7733 88.9349 47.5381 89.3505 47.1211C89.7661 46.7041 90.0005 46.1391 90.0025 45.5493V26.1482C89.9635 25.4814 89.7695 24.833 89.4359 24.255C89.1024 23.6769 88.6386 23.1853 88.0816 22.8194Z" />
                                                                        <path class="ic-c"
                                                                            d="M75.2769 25.1908L78.9507 23.0617C78.995 23.0357 79.0441 23.0187 79.0951 23.0118C79.146 23.0049 79.1978 23.0082 79.2475 23.0215C79.2972 23.0348 79.3437 23.0578 79.3845 23.0893C79.4252 23.1207 79.4594 23.1599 79.4849 23.2047C79.5364 23.2943 79.5509 23.4006 79.5252 23.5009C79.4995 23.6011 79.4358 23.6872 79.3476 23.7408L75.6712 25.8698C75.6112 25.903 75.5439 25.9205 75.4753 25.9208C75.3896 25.9199 75.3065 25.8908 75.2389 25.838C75.1712 25.7852 75.1226 25.7115 75.1007 25.6284C75.0788 25.5452 75.0846 25.4571 75.1173 25.3776C75.1501 25.2981 75.2079 25.2316 75.282 25.1882L75.2769 25.1908Z" />
                                                                        <path class="ic-c"
                                                                            d="M71.5675 21.76L73.6894 18.0712C73.7132 18.0231 73.7466 17.9803 73.7875 17.9456C73.8284 17.9109 73.876 17.885 73.9273 17.8695C73.9786 17.854 74.0325 17.8492 74.0857 17.8554C74.1389 17.8616 74.1903 17.8788 74.2367 17.9057C74.283 17.9326 74.3234 17.9688 74.3553 18.012C74.3871 18.0552 74.4098 18.1045 74.422 18.1569C74.4341 18.2092 74.4354 18.2635 74.4258 18.3164C74.4162 18.3693 74.3959 18.4197 74.3661 18.4643L72.2443 22.1531C72.21 22.2127 72.1607 22.2623 72.1013 22.2968C72.0419 22.3313 71.9745 22.3495 71.9059 22.3497C71.8371 22.349 71.7696 22.3306 71.71 22.2961C71.6209 22.2433 71.5561 22.1576 71.5294 22.0573C71.5028 21.957 71.5165 21.8502 71.5675 21.76Z" />
                                                                        <path class="ic-c"
                                                                            d="M66.647 16.3887C66.647 16.2845 66.6883 16.1845 66.7617 16.1107C66.8352 16.037 66.9349 15.9956 67.0388 15.9956C67.1427 15.9956 67.2423 16.037 67.3158 16.1107C67.3893 16.1845 67.4306 16.2845 67.4306 16.3887V20.6468C67.4306 20.751 67.3893 20.851 67.3158 20.9248C67.2423 20.9985 67.1427 21.0399 67.0388 21.0399C66.9349 21.0399 66.8352 20.9985 66.7617 20.9248C66.6883 20.851 66.647 20.751 66.647 20.6468V16.3887Z" />
                                                                        <path class="ic-c"
                                                                            d="M59.8566 17.928C59.9465 17.8768 60.0529 17.8631 60.1529 17.8898C60.2528 17.9166 60.3383 17.9816 60.3909 18.071L62.5127 21.7598C62.5647 21.8502 62.5787 21.9575 62.5517 22.0583C62.5248 22.1591 62.459 22.245 62.369 22.2971C62.2789 22.3493 62.1718 22.3634 62.0714 22.3363C61.971 22.3093 61.8854 22.2433 61.8334 22.1529L59.7141 18.4667C59.6623 18.3762 59.6481 18.2688 59.6748 18.1679C59.7015 18.067 59.7668 17.9808 59.8566 17.928Z" />
                                                                        <path class="ic-c"
                                                                            d="M54.7429 23.7409C54.696 23.7165 54.6545 23.6828 54.6209 23.6419C54.5873 23.601 54.5623 23.5537 54.5474 23.5028C54.5325 23.4519 54.528 23.3986 54.5342 23.3459C54.5404 23.2933 54.5571 23.2424 54.5834 23.1964C54.6096 23.1505 54.6449 23.1103 54.687 23.0783C54.7292 23.0463 54.7773 23.0232 54.8286 23.0104C54.8799 22.9976 54.9332 22.9953 54.9853 23.0037C55.0375 23.0121 55.0874 23.031 55.1321 23.0593L58.8059 25.1883C58.8809 25.2311 58.9396 25.2976 58.9728 25.3774C59.006 25.4572 59.0118 25.5459 58.9894 25.6294C58.967 25.7129 58.9176 25.7866 58.8489 25.8389C58.7803 25.8912 58.6962 25.9192 58.61 25.9184C58.5422 25.919 58.4754 25.9014 58.4167 25.8673L54.7429 23.7409Z" />
                                                                        <path class="ic-c"
                                                                            d="M67.1916 45.95H67.0848C65.7592 45.95 64.2429 45.322 64.2429 44.3774H69.9342C69.9342 45.2939 68.4917 45.9091 67.1916 45.95Z" />
                                                                        <path class="ic-c"
                                                                            d="M70.9517 43.3488C70.9464 43.479 70.8899 43.6018 70.7945 43.6904C70.6992 43.7789 70.5727 43.8259 70.4429 43.821H63.6373C63.5074 43.8259 63.381 43.7789 63.2856 43.6904C63.1902 43.6018 63.1337 43.479 63.1284 43.3488V43.0348C63.1341 42.9125 63.1854 42.7969 63.2721 42.7108C63.3588 42.6247 63.4746 42.5745 63.5965 42.5702C63.6118 42.5702 63.622 42.5702 63.6373 42.5702H70.4429C70.5727 42.5653 70.6992 42.6123 70.7945 42.7008C70.8899 42.7893 70.9464 42.9122 70.9517 43.0424V43.3488Z" />
                                                                        <path class="ic-c"
                                                                            d="M74.366 34.6744C72.2925 38.427 71.7404 37.6739 71.402 39.7136C71.3486 40.0917 71.2582 40.4637 71.1323 40.8241C71.209 40.8595 71.2744 40.9154 71.3215 40.9856C71.3686 41.0559 71.3956 41.1377 71.3995 41.2223V41.5388C71.3847 41.6766 71.3168 41.8031 71.2103 41.8913C71.1038 41.9796 70.9672 42.0226 70.8296 42.0111H63.248C63.1051 42.0117 62.9662 41.9641 62.8536 41.8758L62.8383 41.863L62.8053 41.8324C62.7281 41.7569 62.6825 41.6546 62.6781 41.5465V41.23C62.6811 41.1468 62.7062 41.066 62.751 40.9959C62.7957 40.9259 62.8584 40.8692 62.9325 40.8317C62.809 40.4706 62.7187 40.0989 62.6628 39.7213C62.3244 37.679 61.7749 38.4449 59.6988 34.6821C58.9701 33.3887 58.5822 31.9302 58.5718 30.4445C58.6102 28.2198 59.518 26.0993 61.0995 24.5397C62.6811 22.9801 64.8098 22.1062 67.0273 22.1062C69.2448 22.1062 71.3736 22.9801 72.9551 24.5397C74.5367 26.0993 75.4444 28.2198 75.4829 30.4445C75.4757 31.9269 75.0913 33.3829 74.366 34.6744Z" />
                                                                        <path
                                                                            d="M87.784 52.2249H49.4408C48.8521 52.2262 48.288 52.4614 47.8717 52.8791C47.4555 53.2967 47.2211 53.8628 47.2197 54.4534V98.6165C47.2197 99.8393 48.0847 100.34 49.1406 99.727L59.6582 93.636L64.5201 90.828L73.6511 85.5361L88.0816 77.1783C88.2406 77.0822 88.3912 76.9729 88.5319 76.8515C89.3715 76.1265 90.0025 74.8833 90.0025 73.8392V54.4534C90.0005 53.8634 89.7662 53.2981 89.3506 52.8807C88.9351 52.4633 88.372 52.2275 87.784 52.2249Z" />
                                                                        <path class="ic-c"
                                                                            d="M76.9307 76.0855C76.9307 77.8341 72.57 79.2484 67.189 79.2484C61.8081 79.2484 57.45 77.8316 57.45 76.0855V69.3359L66.1383 71.5084C66.8294 71.6785 67.5512 71.6785 68.2423 71.5084L76.9307 69.3359V76.0855Z" />
                                                                        <path class="ic-c"
                                                                            d="M83.0798 66.4923L81.7568 66.8216V75.3376C82.1108 75.7401 82.3014 76.2612 82.2911 76.7978C82.2911 77.87 81.5889 78.7405 80.729 78.7405C79.8691 78.7405 79.1669 77.87 79.1669 76.7978C79.1578 76.2618 79.3473 75.7415 79.6986 75.3376V67.3372L76.9305 68.0265L68.0387 70.2525C67.761 70.3236 67.4755 70.3596 67.1889 70.3597C66.9032 70.3584 66.6188 70.3224 66.3417 70.2525L57.4498 68.0265L51.3006 66.4948C51.1395 66.4506 50.9962 66.3569 50.891 66.2268C50.7838 66.1072 50.7047 65.965 50.6595 65.8107C50.5093 65.2516 50.7256 64.5522 51.3031 64.4092L66.3443 60.6438C66.6209 60.5718 66.9057 60.5358 67.1915 60.5366C67.478 60.5377 67.7633 60.5737 68.0412 60.6438L83.0824 64.4092C83.2188 64.4479 83.3437 64.5195 83.4462 64.6179C83.5486 64.7162 83.6255 64.8383 83.6701 64.9734C83.8914 65.535 83.7031 66.3365 83.0798 66.4923Z" />
                                                                        <path
                                                                            d="M15.3949 67.5975C15.2819 67.8139 15.2583 68.0661 15.3293 68.2997C15.4002 68.5333 15.56 68.7295 15.774 68.8459C15.8798 68.9025 15.9959 68.9375 16.1154 68.9488C16.2349 68.9601 16.3554 68.9474 16.47 68.9116C16.5846 68.8757 16.6909 68.8174 16.7828 68.7399C16.8747 68.6624 16.9503 68.5674 17.0053 68.4604C17.1183 68.2441 17.1419 67.9918 17.0709 67.7582C17 67.5246 16.8402 67.3284 16.6263 67.2121C16.5202 67.1561 16.4042 67.1216 16.2849 67.1107C16.1655 67.0998 16.0452 67.1126 15.9308 67.1484C15.8164 67.1842 15.7102 67.2423 15.6183 67.3194C15.5263 67.3965 15.4504 67.491 15.3949 67.5975Z" />
                                                                        <path
                                                                            d="M21.4957 72.7364L15.2193 69.9104C14.7251 69.6439 14.3557 69.1926 14.1913 68.6543C14.027 68.1161 14.081 67.5345 14.3415 67.036C14.4689 66.7894 14.6437 66.5706 14.8559 66.3923C15.0681 66.2139 15.3134 66.0795 15.5777 65.9969C15.842 65.9143 16.12 65.8851 16.3956 65.911C16.6712 65.9368 16.9389 66.0173 17.1834 66.1477L23.0222 69.8083C23.4223 68.2585 23.2923 66.6187 22.6529 65.1518C22.0135 63.685 20.9018 62.4759 19.496 61.7186C18.6767 61.2808 17.779 61.0104 16.8549 60.9231C15.9308 60.8358 14.9985 60.9332 14.1122 61.2098C13.2259 61.4864 12.403 61.9366 11.6912 62.5345C10.9794 63.1323 10.3929 63.8658 9.96556 64.6926C9.08966 66.365 8.90698 68.3168 9.45721 70.1236C10.0074 71.9305 11.2461 73.4465 12.9041 74.3421C14.3057 75.0904 15.919 75.339 17.4798 75.0473C19.0407 74.7556 20.4566 73.9408 21.4957 72.7364Z" />
                                                                    </g>

                                                                </svg>


                                                                <span class="card-text  mt-2 d-block">
                                                                    Polytechnic College
                                                                </span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="radio-item ins_type" data-v="4">
                                                        <input type="radio" value="UG-PG-Colleges" onchange="showArrw()" name="type"
                                                            id="mce-group[274634]-274634-2">
                                                        <label class="label-icon option2"
                                                            for="mce-group[274634]-274634-2">
                                                            <div class="card-body p-0">
                                                                <svg class="icon icon-pizza" width="117" height="100"
                                                                    viewBox="0 0 117 100" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M58.5 0L0 26.9231L15.6 33.8462V46.9231C10.92 48.4615 7.8 53.0769 7.8 57.6923C7.8 62.3077 10.92 66.9231 15.6 68.4615V69.2308L8.58 85.3846C6.24 92.3077 7.8 100 19.5 100C31.2 100 32.76 92.3077 30.42 85.3846L23.4 69.2308C28.08 66.9231 31.2 63.0769 31.2 57.6923C31.2 52.3077 28.08 48.4615 23.4 46.9231V37.6923L58.5 53.8462L117 26.9231L58.5 0ZM92.82 50L57.72 65.3846L39 56.9231V57.6923C39 63.0769 36.66 67.6923 32.76 71.5385L37.44 82.3077V83.0769C38.22 86.1538 39 89.2308 38.22 92.3077C43.68 94.6154 49.92 96.1538 57.72 96.1538C83.46 96.1538 92.82 80.7692 92.82 73.0769V50Z" />
                                                                </svg>

                                                                <span class="card-text  mt-2 d-block">
                                                                    UG-PG <br>Colleges
                                                                </span>
                                                            </div>
                                                        </label>
                                                    </div>


                                                </div>
                                            </div><!-- mc-field-group input-group option-flex -->


                                        </div>



                                    </div>

                                    <div class="input__container" id='right_arrow' style="display:none">


                                        <a class="nxt__btn" onclick="nextForm();"  > <i
                                                class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <fieldset class="active__form" id="form2">
                                    <div class="sub__title__container">
                                        <h2>Admission Assistant</h2>
                                        <p>Help us to know more about you. It will help us <br>
                                            find the right institute for your child</p>
                                        <img src="{{url('public/images/adv-img.png')}}" class="emoji">

                                        <button class="borad-btn btn  mb-3"><img src="{{url('public/images/book-svg.png')}}"><span id="boar_title">Board</span></button>

 <!-- school -->
<section class="app" id="university_s">
 
    <select class="clg-input" name="university_s"  onchange="showArrw1()" >
<option value="">Select Board</option>
@forelse($board_s as $b)
    <option value="{{$b->board}}">{{$b->board}}</option>
    @empty
    <option value="">No Board</option>
    @endforelse
    </select>

</section>
<!-- pu college -->
<section class="app" id="university_pu"  >

    <select class="clg-input" name="university_pu" onchange="showArrw1()">
    <option value="">Select Board</option>
@forelse($board_pu as $b)
    <option value="{{$b->board}}">{{$b->board}}</option>
    @empty
    <option value="">No Board</option>
    @endforelse
    </select>
</section>
<!-- pc colleege -->

<section class="app" id="university_pc" >

        <select class="clg-input" name="university_pc" onchange="showArrw1()">
        <option value="">Select University</option>
@forelse($board_pc as $b)
    <option value="{{$b->board}}">{{$b->board}}</option>
    @empty
    <option value="">No University</option>
    @endforelse
        </select>
</section>
 <!-- ug collge -->
 <section class="app" id="university_ug" >

        <select class="clg-input" name="university_ug"  onchange="showArrw1()">
        <option value="">Select University</option>
@forelse($board_ug as $b)
    <option value="{{$b->board}}">{{$b->board}}</option>
    @empty
    <option value="">No University</option>
    @endforelse
        </select>
</section>
<!-- end -->






                                    </div>

                                    <div class="buttons" id='right_arrow1' style="display:none">
                                        <a class="prev__btn" onclick="prevForm();"><i class="fas fa-angle-left"></i></a>
                                        <a class="nxt__btn" onclick="nextForm();"><i class="fas fa-angle-right"></i></a>
                                    </div>

                                </fieldset>
                                <fieldset class="active__form" id="form3">

                                    <div class="sub__title__container" >
                                        <h2>Admission Assistant</h2>
                                        <p>Help us to know more about you. It will help us<br>
                                            find the right Institute for your child</p>
 
                                        <img src=" {{url('public/images/adv-img.png')}}" class="emoji">
                                       <div class="sub__title__container">
                                        <!-- pu -->
                                          <div class="button" id="enter_course_pu" style="float: none;">
                                                                                     <button class="borad-btn btn mb-3 "><img src="{{url('public/images/book-svg.png')}}"> Course</button>

                                                                    <select class="clg-input" name="course_one"   id="c" onchange="showArrw2()">
                                                        <option value="">Select Course</option>
                                                @forelse($course_pu as $b)
                                                    <option value="{{$b->name}}">{{$b->name}}</option>
                                                    @empty
                                                    <option value="">No Course</option>
                                                    @endforelse
                                                        </select>
                                            </div>
                                            <!-- pc -->
                                            <div class="button" id="enter_course_pc" style="float: none;">
                                                                                     <button class="borad-btn btn  mb-3 "><img src="{{url('public/images/book-svg.png')}}"> Course</button>
                                                                    <select class="clg-input" name="course_two"   id="c" onchange="showArrw2()">
                                                        <option value="">Select Course</option>
                                                @forelse($course_pc as $b)
                                                    <option value="{{$b->name}}">{{$b->name}}</option>
                                                    @empty
                                                    <option value="">No Course</option>
                                                    @endforelse
                                                        </select>
                                            </div>

                                            <!-- ug -->
                                            <div class="button" id="enter_course_ug" style="float: none;">
                                              <button class="borad-btn btn  mb-3"><img src="{{url('public/images/book-svg.png')}}"> Course</button>

                                                                    <select class="clg-input" name="course_three"   id="c" onchange="showArrw2()">
                                                        <option value="">Select Course</option>
                                                @forelse($course_ug as $b)
                                                    <option value="{{$b->name}}">{{$b->name}}</option>
                                                    @empty
                                                    <option value="">No Course</option>
                                                    @endforelse
                                                        </select>
                                            </div>

                                            <!-- end -->
                                     </div>
<div id="classes">
                                        <button class="borad-btn btn  mb-3"><img src=" {{url('public/images/book-svg.png')}}"> Class</button>

                                        <section class="app">
                                            <div class="button">
                                                <input type="radio" id="a5" name="class" value="1" id="class_1" onchange="showArrw2()"/>
                                                <label class="btn btn-default" for="a5">Lkg to 10th </label>
                                            </div>
                                            <div class="button">
                                                <input type="radio" id="a2" name="class" value="2"id="class_2" onchange="showArrw2()"/>
                                                <label class="btn btn-default" for="a2">Lkg to 12th </label>
                                            </div>
                                            <div class="button">
                                                <input type="radio" id="a3" name="class" value="3"id="class_3" onchange="showArrw2()"/>
                                                <label class="btn btn-default" for="a3">1st to 10th</label>
                                            </div>
                                            <div class="button">
                                                <input type="radio" id="a4" name="class" value="4"id="class_4" onchange="showArrw2()"/>
                                                <label class="btn btn-default" for="a4">1st to 12th</label>
                                            </div>





                                        </section>

</div>

                                    </div>

                                    <div class="buttons" id='right_arrow2' style="display:none">
                                        <a class="prev__btn" onclick="prevForm();"><i class="fas fa-angle-left"></i></a>
                                        <a class="nxt__btn" onclick="nextForm();"><i class="fas fa-angle-right"></i></a>
                                    </div>
                                </fieldset>
                                <fieldset class="active__form" id="form4">


                                    <div class="sub__title__container">
                                        <h2>Admission Assistant</h2>

                                        <img src="{{url('public/images/adv-img.png')}}" class="emoji">


                                        <button class="borad-btn btn "><img src="{{url('public/images/location.png')}}"> Location</button>

                                        <div class="search-input">
                                            <div class="col-md-10">
                                                <input type="text" placeholder="Search Location...."
                                                    class="form-control" name="location"  onkeyup="showArrw3()">

                                            </div>

                                        </div>




                                    </div>

                                    <div class="buttons" id='right_arrow3' style="display:none">
                                        <a class="prev__btn" onclick="prevForm();"><i class="fas fa-angle-left"></i></a>
                                        <a class="nxt__btn" onclick="nextForm();"><i class="fas fa-angle-right"></i></a>
                                    </div>

                                </fieldset>
                                <fieldset class="active__form" id="form5">
                                    <div class="sub__title__container">
                                        <h2>Admission Assistant</h2>
                                        <p>Help us to know more about you. It will help us <br>
                                            find the right Institute for your child</p>
                                        <img src="{{url('public/images/adv-img.png')}}" class="emoji">


                                        <button class="borad-btn btn "><img src="{{url('public/images/Fee-section.png')}}"> Fees
                                            (Annual)</button>

 <label class="sch-label">Min Range</label>
<input type="text" name="min" placeholer="Enter min range" class="form-control" >

 <label class="sch-label">Max Range</label>
<input type="text" name="max" placeholer="Enter man range"class="form-control"  onkeyup="showArrw4()">


                                    </div>


                                    <div class="buttons" id='right_arrow4' style="display:none">
                                        <a class="prev__btn" onclick="prevForm();"><i class="fas fa-angle-left"></i></a>
                                        <a class="nxt__btn" onclick="nextForm();"><i class="fas fa-angle-right"></i></a>
                                    </div>

                                </fieldset>
                                <fieldset class="active__form" id="form6">
                                    <div class="sub__title__container">
                                        <h2>Admission Assistant</h2>
                                        <p>Help us to know more about you. It will help us<br>
                                            find the right institute for your child</p>
                                        <img src="{{url('public/images/adv-img.png')}}" class="emoji">




                                        <div class="search-input">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Enter Name" name="name" class="form-control" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Enter Email" name="email"class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Enter Mobile Number"
                                                        class="form-control" name="phone" required>
                                                </div>

                                            </div>
                                            <div class="row btn-sub-ad">
                                                <div class="col-md-6">
                                                    <button class="btn btn-sb">SUBMIT</button>
                                                </div>

                                            </div>
                                        </div>

</form>


                                    </div>
                                    <div class="buttons">
                                        <a class="prev__btn" onclick="prevForm();"><i class="fas fa-angle-left"></i></a>
                                        <a class="nxt__btn last-btn"><i class="fas fa-angle-right"></i></a>
                                    </div>

                            </div>
                            </fieldset>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>

    <!-- The Modal for advance search ends-->
<style>
    .fixed {
        position: fixed;
        top: 10%;
        left: 0;
        width: 100%;
        z-index: 999;
    }

    .hidden {
        display: none;
    }
</style>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="{{url('public/vendors/jquery.min.js')}}"></script>
<script src="{{url('public/vendors/popper/popper.js')}}"></script>
<script src="{{url('public/vendors/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{url('public/vendors/hc-sticky/hc-sticky.js')}}"></script>
<script src="{{url('public/vendors/isotope/isotope.pkgd.js')}}"></script>
<script src="{{url('public/vendors/magnific-popup/jquery.magnific-popup.js')}}"></script>
<script src="{{url('public/vendors/slick/slick.js')}}"></script>
<script src="{{url('public/vendors/waypoints/jquery.waypoints.js')}}"></script>
<script src="{{url('public/js/app.js')}}"></script>
<script src="{{url('public/js/custome.js')}}"></script>
<!-------- script for on scroll serach bar show  ----------->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>-->


<script>

      var verificationCode = [];
        $(".verification-code input[type=tel]").keyup(function (e) {



            //console.log(event.key, event.which);

            if ($(this).val() > 0) {
                if (event.key == 1 || event.key == 2 || event.key == 3 || event.key == 4 || event.key == 5 ||
                    event.key == 6 || event.key == 7 || event.key == 8 || event.key == 9 || event.key == 0) {
                    $(this).next().focus();
                }
            } else {
                if (event.key == 'Backspace') {
                    $(this).prev().focus();
                }
            }

        }); // keyup

        $('.verification-code input').on("paste", function (event, pastedValue) {
            console.log(event)
            $('#txt').val($content)
            console.log($content)
            //console.log(values)
        });
</script>
<script>
    var searchHeight = $(".search-bar").outerHeight();
    var offset = $(".search-bar").offset().top;
    var totalHeight = searchHeight + offset;
    console.log(totalHeight);
    $(window).scroll(function () {
        if ($(document).scrollTop() >= totalHeight) {
            $('.sticky-search').show();
        } else {
            $('.sticky-search').hide();
        }
    });
</script>

<!-------- script for serach  ----------->
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
</script>

<!-------- script for passowrd hide and show modal  ----------->
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

<!-------- script for login modal  ----------->
<script>
    $(document).ready(function () {
        $(document).on('click', '.signup-tab', function (e) {
            e.preventDefault();
            $('#signup-taba').tab('show');
        });

        $(document).on('click', '.signin-tab', function (e) {
            e.preventDefault();
            $('#signin-taba').tab('show');
        });

        $(document).on('click', '.forgetpass-tab', function (e) {
            e.preventDefault();
           // $('#forgetpass-taba').tab('show');
        });
    });
</script>

<!-------- script for otp ----------->



<script type="text/javascript">
    let getSwitch = document.querySelector('#check2') //get switch

    let getCheckboxes = document.querySelectorAll('.myCheckBoxes') //get checkboxes UL

    getSwitch.addEventListener('change', function (e) {
      
            if (e.target.unchecked) {


                window.location.href = "{{url('/')}}";

            } else {

                $("#institution").trigger("click");
                //   location.reload(true);
                // window.open = "{{route('institute')}}";
                // window.location.href = "{{url('institute')}}";


            }
       
    })
</script>

<script type="text/javascript">
    let getSwitch1 = document.querySelector('#check1') //get switch

    let getCheckboxes1 = document.querySelectorAll('.myCheckBoxes') //get checkboxes UL

    getSwitch1.addEventListener('change', function (e) {
        getCheckboxes1.forEach(function (o) {
            if (e.target.unchecked) {


                window.location.href = "{{url('/')}}";
            } else {


                $("#institution").trigger("click");
                    // location.reload(true);
                //   window.location.href = "{{route('institute')}},'_blank'";
                //   window.open('https://support.wwf.org.uk', '_blank');

            }
        })
    })
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


<!--<script type="text/javascript">-->
<!--    function Validate() {-->
<!--        var password = document.getElementById("txtPassword").value;-->
<!--        var confirmPassword = document.getElementById("txtConfirmPassword").value;-->
<!--        if (password != confirmPassword) {-->
<!--            alert("Passwords do not match.");-->
<!--            return false;-->
<!--        }-->
<!--        return true;-->
<!--    }-->
<!--</script>-->


<script>
    $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
        $(e.target).prev().find("i:last-child").toggleClass("fa-angle-right  fa-angle-up");
    });
</script>
<script>
    let card = document.querySelector(".card"); //declearing profile card element
    let displayPicture = document.querySelector(".display-picture"); //declearing profile picture

    displayPicture.addEventListener("click",
        function () { //on click on profile picture toggle hidden class from css
            card.classList.toggle("hidden")
        })
</script>
<script>
    $(window).scroll(function () {
        var sticky = $('.header-sticky');
        var header = $('#header');
        scroll = $(window).scrollTop();
        if (scroll >= 5) {
            sticky.addClass('fixed');
            header.addClass("hidden");
        } else {
            sticky.removeClass('fixed');
            header.removeClass("hidden");
        }
    });
</script>


<!--<------------------------Register submit Button------------------------->
<script>
$(function(){
    $('.registration_parent_form').click(function()
    {
         var name=$(".registration_parent_form_name").val();
         var phone=$(".registration_parent_form_phone").val();
         var email=$(".registration_parent_form_email").val();
        //  alert(phone)
         var status = 1;
         var id = 1;
          
           var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
          
         //<--------------------------Mobile Number Validation-------------------------------->
        if (document.getElementById('phone_reg').value.length < 10 || document.getElementById('phone_reg').value.length > 10 ) {

             alert("Please Enter Valid User Phone Number !! "); 
             event.preventDefault();
         }else if(!email.match(validRegex)){
             
          alert("Please Enter Valid Email !! "); 

         }
        else{
            $.ajax({
                type:"POST",
                dataType : "json",
                url:'parent_registration',
                data: {'name':name,'email':email, 'phone': phone,_token:'{{csrf_token()}}'},
                success: function(data)
                {
                 //alert(data);  
                    if(data==1)
                    {
                         $("#otp_phone").val(phone);
                          $('#forgetpass-taba').tab('show');
                    }
                    else
                    {
                       alert("not able to register try again")
                         $('#signup-taba').tab('show');
                    }
                    console.log(data.success)
                }
            });
        
         }
       
   
    });
});
</script>

 <!--<------------------------Register submit Button End------------------------->



<script>
 
$(function(){
   
    $('.parent_login').click(function()
    {
       
     //  $('#forgetpass-taba').tab('show');
        var phone=$(".parent_login_number").val();
       //  alert(phone)
    //     var two=$(".otp-login_two").val();
    //     var three=$(".otp-login_three").val();
    //     var four=$(".otp-login_four").val();
    //   var phone=$(".registration_parent_form_phone").val();
       
        var status = 1;
        var id = 1;
        $.ajax({
            type:"POST",
            dataType : "json",
            url:'parent_login',
            data: {'phone': phone,  "_token": "{{ csrf_token() }}"},
            success: function(data)
            {
             //alert(data);  
                if(data==1)
                {
                    $("#otp_phone").val(phone);
                      $('#forgetpass-taba').tab('show');
                }
                else
                {
                    alert("You are not registered ! please create an account.")
                      $('#signup-taba').tab('show');
                }
                console.log(data.success)
            }
        });
    });
});
</script>
<script>
$( ".parent_login" ).click(function(event) {
      
 
        if (document.getElementById('phone123').value.length < 10 || document.getElementById('phone123').value.length > 10 ) {

             alert("Please Enter Valid User Phone Number"); 
              event.preventDefault();
         }
         
      
      else{
             return true; 
         }

});

$( ".registration_parent_form" ).click(function(event) {
      


});


</script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>-->
<script>
$(document).ready(function(){
    $("#side_bar").hide();
 
     $(".nxt__btn").click(function(event)
  {
       $("#side_bar").show();
  });
  
  $(".ins_type").click(function(event)
  {
    //   alert("hi")
    //   var instype=$(".ins_type input").val();
        
       var instype= $(this).attr("data-v");
      // alert(instype);
        if(instype==4)
       {
          $("#board").html("University")
          $("#course").html("Courses")
          $("#university_s").hide();
          $("#university_pu").hide();
          $("#university_pc").hide();
          $("#university_ug").show();
          $("#courses").hide();
          $("#boar_title").html("University")
          $("#classes").hide();
          $("#enter_course_pu").hide();
         $("#enter_course_pc").hide();
         $("#enter_course_ug").show();

         $("#class_1").val("") ;
        $("#class_2").val("") ;
        $("#class_3").val("") ;
        $("#class_4").val("") ;
       }
       else
       if(instype==3)
       {
        $("#board").html("University")
          $("#course").html("Courses")
          $("#university_s").hide();
          $("#university_pu").hide();
          $("#university_pc").show();
          $("#university_ug").hide();
          $("#courses").hide();
          $("#boar_title").html("University")
          $("#classes").hide();
          $("#enter_course_pu").hide();
         $("#enter_course_pc").show();
         $("#enter_course_ug").hide();

         $("#class_1").val("") ;
        $("#class_2").val("") ;
        $("#class_3").val("") ;
        $("#class_4").val("") ;
       }
       else
       if(instype==1)
       {

        $("#course").html("Class")
        $("#board").html("Board")
        $("#university_s").show();
          $("#university_pu").hide();
          $("#university_pc").hide();
          $("#university_ug").hide();
          $("#courses").show();
          $("#classes").show();
          $("#enter_course_pu").hide();
         $("#enter_course_pc").hide();
         $("#enter_course_ug").hide();
          $("#boar_title").html("Board")

       }
       else
       if(instype==2)
       {
        $("#course").html("Courses")
            $("#board").html("Board")
            $("#university_s").hide();
          $("#university_pu").show();
          $("#university_pc").hide();
          $("#university_ug").hide();
         $("#courses").show();
         $("#classes").hide();
         $("#enter_course_pu").show();
         $("#enter_course_pc").hide();
         $("#enter_course_ug").hide();
         $("#boar_title").html("Board")

         $("#class_1").val("") ;
        $("#class_2").val("") ;
        $("#class_3").val("") ;
        $("#class_4").val("") ;
       }

       
    //   var instype=$(this).val( $(this).attr("data-item") );
    // var instype=$(this).attr("data-item").val();
    
  });
  
});
</script>

<style>
/*    .swal-icon:first-child {*/
  
/*    display: none !important;*/
/*}*/
/*.swal-modal{*/
/*    padding-top:2rem !important;*/
/*}*/
.swal-text {
    font-weight: 600 !important;
    color: rgb(0 0 0)!important;
  
}
.swal-button {
    background-color: #FF2E00 !important;
]
    padding: 8px 24px;}

.clg-input{
 color: black !important; border: 1px solid #FF4005; font-weight: 600;
 width:100% !important;
 border-radius: 5px;
     padding: 9px;
         text-align: left;
}
.sch-label{
        display: inline-block;
    margin-bottom: 0.5rem;
    text-align: left;
    float: left;
    margin-top: 2rem;
    color: #000000;
    font-weight: 600;
}
</style>
<script src="{{url('public/js/custome.js')}}"></script>
<script>
function showArrw(){
    document.getElementById('right_arrow').style.display = 'block';
    
}
function showArrw1(){
     document.getElementById('right_arrow1').style.display = 'block';
}
function showArrw2(){
     document.getElementById('right_arrow2').style.display = 'block';
}
function showArrw3(){
     document.getElementById('right_arrow3').style.display = 'block';
}
function showArrw4(){
     document.getElementById('right_arrow4').style.display = 'block';
}
</script>

<script>
    $(function() {
       
        $('#phone_reg').keyup(function() {
           

            var id = $(this).val();
            
          $("#phone_id_msg").html("");

            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'get_phonevalidation',
                data: {
                    'phone': id,
                  
                    _token: '{{csrf_token()}}'
                },
                success: function(data) {

                    if (data == 1) {
                        $("#phone_id_msg").html("Phone Number Already Exist.");
                         $("#login").attr("disabled", true);
                         return false;
                    }
                    else
                    {
                        $("#login").attr("disabled", false)
                        return false;
                    }
                }
            });
        });
    });
</script>



</body>
</html>

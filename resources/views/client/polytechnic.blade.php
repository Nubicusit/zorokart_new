@extends('client.websitelayout1')
@section('headerscript')
@parent
@endsection
@section('header')
@parent
@endsection
@section('content')


</div>
<!--------------- banner section ends-------------------->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--------------- animation start -------------------->
<div class="content animation-section">

    <div id="wrapper-content" class="wrapper-content  pb-0">
        <div class="container">
            
@if(Session::has('status'))
<script>
swal("", "{!!Session::get('status') !!}", "success")
</script>
@endif

            <div class="page-container row">
                <div class="sidebar col-12 col-lg-3 order-1 order-lg-0">


                    <div class="card widget-filter bg-white mb-6 border-0 rounded-0 " style="background: #FFFFFF;
                            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                        <div class="primary">
                            <div class="container">
                                <div class="row">
                                    <div class="fliter-sec-school">
                                        <h2>Customize Search</h2>
                                        <div class="filter-menu">
                                            <form action="{{url('poly_search_result')}}" method="get">
                                                @csrf;
                                                <button class="btn btn-primary" type="submit">search</button>
                                                <div class="panel panel-default top-panel">
                                                    <div class="panel-heading">

                                                    </div><!-- /.panel-heading -->

                                                    <div class="panel-body">
                                                        <div class="panel-group" id="filter-menu" role="tablist"
                                                            aria-multiselectable="true">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading" role="tab" id="headingOne">
                                                                    <a class="panel-title accordion-toggle collapsed"
                                                                        role="button" data-toggle="collapse"
                                                                        href="#collapseOne" aria-expanded="false"
                                                                        aria-controls="collapseOne">
                                                                        <img src="{{url('public/images/sd-ic.png')}}">
                                                                        Co-Ed
                                                                        Status
                                                                    </a><!-- /.panel-title -->
                                                                </div><!-- /.panel-heading -->
                                                                <div id="collapseOne" class="panel-collapse collapse"
                                                                    role="tabpanel" aria-labelledby="headingTwo">
                                                                    <div class="panel-body inner-sec-body">
                                                                        <div class="checkbox"><label><input
                                                                                    type="checkbox" name="std[]"
                                                                                    value="politics">Boy
                                                                                only</label>
                                                                            <p class="count">(0)</p>
                                                                        </div>
                                                                        <div class="checkbox"><label><input
                                                                                    type="checkbox" name="std[]"
                                                                                    value="religion">Co-Education</label>
                                                                            <p class="count">(0)</p>
                                                                        </div>
                                                                        <div class="checkbox"><label><input
                                                                                    type="checkbox" name="std[]"
                                                                                    value="music">Girls
                                                                                only</label>
                                                                            <p class="count">(0)</p>
                                                                        </div>
                                                                    </div><!-- /.panel-body -->
                                                                </div><!-- /.panel-collapse -->
                                                            </div><!-- /.panel -->

                                                            <div class="panel panel-default">
                                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                                    <a class="panel-title accordion-toggle collapsed"
                                                                        role="button" data-toggle="collapse"
                                                                        href="#collapseTwo" aria-expanded="false"
                                                                        aria-controls="collapseTwo">
                                                                        <img src="{{url('public/images/sd-ic-1.png')}}">
                                                                        Stream
                                                                    </a><!-- /.panel-title -->
                                                                </div><!-- /.panel-heading -->
                                                                <div id="collapseTwo" class="panel-collapse collapse"
                                                                    role="tabpanel" aria-labelledby="headingTwo">
                                                                    <div class="panel-body inner-sec-body">
                                                                        @forelse($courses as $c)
                                                                        <div class="checkbox"><label><input
                                                                                    type="checkbox" name="status[]"
                                                                                    value="{{$c->id}}">{{$c->name}}</label>
                                                                            <p class="count">(0)</p>
                                                                        </div>
                                                                       
                                                                       @empty
                                                                       @endforelse
                                                                        
                                                                        
                                                                    </div><!-- /.panel-body -->
                                                                </div><!-- /.panel-collapse -->
                                                            </div><!-- /.panel -->

                                                            <div class="panel panel-default">
                                                                <div class="panel-heading" role="tab">
                                                                    <a class="panel-title  collapsed" role="button"
                                                                        data-toggle="collapse" aria-expanded="false"
                                                                        aria-controls="collapseThree">
                                                                        <img src="{{url('public/images/sd-ic-2.png')}}">
                                                                        Fee Range
                                                                    </a><!-- /.panel-title -->
                                                                </div><!-- /.panel-heading -->
                                                                <div class="panel-collapse " role="tabpanel">
                                                                    <div class="panel-body range-slide">
                                                                         <div class="rangeslider">
                                                                                    <input class="min" name="range_1"
                                                                                        type="range" min="1000" max="10000"
                                                                                        value="10" />
                                                                                    <input class="max" name="range_2"
                                                                                        type="range" min="1000" max="10000"
                                                                                        value="90" />
                                                                                    <span
                                                                                        class="range_min light left">₹1000</span>
                                                                                    <span
                                                                                        class="range_max light right">₹1000000</span>
                                                                                </div>
                                                                    </div><!-- /.panel-body -->
                                                                </div><!-- /.panel-collapse -->
                                                            </div><!-- /.panel -->





                                                            <div class="panel panel-default">
                                                                <div class="panel-heading" role="tab">
                                                                    <a class="panel-title collapsed" role="button"
                                                                        data-toggle="collapse" href="#collapseSeven"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseSeven">
                                                                        <img src="{{url('public/images/sd-ic-5.png')}}"
                                                                            style="width:18px"> Location &
                                                                        Distance
                                                                    </a><!-- /.panel-title -->
                                                                </div><!-- /.panel-heading -->
                                                                <div class="panel-collapse" role="tabpanel"
                                                                    aria-labelledby="headingSeven">
                                                                    <div
                                                                        class="panel-body inner-sec-body inner-sec-location">
                                                                        <div class="loc-edit">
                                                                            <p><i
                                                                                    class="fal fa-location-arrow"></i><span
                                                                                    class="d-inline-block ml-1 ">Bangalore</span>
                                                                            </p>

                                                                            <a href="#form-ser"><i
                                                                                    class="far fa-edit"></i></a>
                                                                        </div>

                                                                        <div class="__range __range-step">
                                                                            <input value="0" type="range" max="4"
                                                                                min="1" step="1" list="ticks1">
                                                                            <datalist id="ticks1">
                                                                                <option value="1">1KM</option>
                                                                                <option value="2">5KM</option>
                                                                                <option value="3">10KM</option>
                                                                                <option value="4">15KM</option>

                                                                            </datalist>
                                                                        </div>

                                                                    </div><!-- /.panel-body -->
                                                                </div><!-- /.panel-collapse -->
                                                            </div><!-- /.panel -->
                                                        </div><!-- /.panel-group -->
                                                    </div><!-- /.panel-body -->

                                                </div><!-- /.panel -->
                                            </form>
                                        </div><!-- /.filter-menu -->
                                    </div>


                                </div>

                            </div><!-- /.container -->
                        </div><!-- /.primary -->

                    </div>
                </div>

                  <div class="page-content col-12 col-lg-9">

                            <div class="explore-filter d-lg-flex  d-block">
                                <div>
                                    <ul class="breadcrumb breadcrumb-style-02 school ">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item">Bangalore </li>
                                        <li class="breadcrumb-item">polytechnic Colleges </li>
                                    </ul>
                                    <h3 class="head-student">Polytechnic Colleges in Bangalore</h3>
                                    <div class="  mb-4 mb-lg-0 btn school-count">200 Colleges</div>
                                </div>

                                <div class="form-filter d-flex  ml-auto">

                                    <div class="format-listing ml-auto">
                                        <a href="#" class="cart-btn btn"><i class="fas fa-cart-arrow-down"></i> Cart</a>

                                    </div>
                                </div>
                            </div>

                            <div class="store-listing-style store-listing-style-02">
                                <?php
                                $i=0;
                                ?>
                                @foreach($institute as $s)
                                <?$i++;?>
                                <div class="mb-6">


                                    <div class="store media align-items-stretch bg-white job-store row">

                                        <div class="w-content w-display-container slider" id="div{{$i}}">
                                        <?php
							$s1=$s->gallery;
                               $s1=(array)$s1;
							$gallery_count=count($s->gallery);
							for($i=0;$i<$gallery_count;$i++)
							{
							    ?>
                                            <div class="mySlides">

                                    <a href="{{url('school_single')}}">
							   
							    <img src="{{('public/images/'. $s1[$i]) }}" alt="Image">
				
							  
							   
                            </a>
                                        
                                                
                                                
                                                <p class="adm-label btn"> Admission Open</p>
                                            </div>
                                            <?php	}
							?>	
                                            
                                            <span class="favourite ml-auto  heart"><i class="far fa-heart-o"
                                                    aria-hidden="true"></i> </span>





                                            <a class="w-btn-floating w3-display-left"
                                                onclick="plusDivs(this,-1)">&#10094;</a>
                                            <a class="w-btn-floating w3-display-right"
                                                onclick="plusDivs(this,1)">&#10095;</a>
                                        </div>

                                           
                              
                                        <div class="media-body  px-md-4   col-md-9">
                                            <div class="d-flex lh-1">
                                                <a href="{{url('school_single')}}"
                                                    class="h5  d-flex align-items-center store-name">
                                                    <span class="letter-spacing-25">{{$s->name}}</span>
                                                    </a>
                                                <span class="favourite ml-auto text-darker-light">    <img src="{{url('public/img/images/premium.png')}}"></span>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-6 location-school">
                                                    <span class="d-inline-block ">{{$s->address}}</span>
                                                    <p><i class="fal fa-location-arrow"></i><span
                                                            class="d-inline-block ml-1 ">Bangalore</span></p>
                                                </div>
                                            </div>
                                            <div class="row stu-mid ">
                                                <div class=" stu-st">
                                                    <img src="{{url('public/images/Book icon.png')}}">
                                                    <div>
                                                        <p>Classes offered</p>
                                                        <h5>{{$s->c_offered}}</h5>
                                                    </div>
                                                </div>
                                                <div class=" stu-st">
                                                    <img src="{{url('public/images/Rs Icon.png')}}">
                                                    <div>
                                                        <p>Monthly Fees</p>
                                                        <h5>{{$s->m_fees}}</h5>
                                                    </div>
                                                </div>
                                                <div class=" stu-st">
                                                    <img src="{{url('public/images/ic-s.png')}}">
                                                    <div>
                                                        <p>Board</p>
                                                        <h5>{{$s->board}}</h5>
                                                    </div>
                                                </div>
                                                <div class=" stu-st">
                                                    <img src="{{url('public/images/scc.png')}}">
                                                    <div>
                                                        <p>School Type</p>
                                                        <h5>{{$s->school_type}}</h5>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="d-flex lh-1  store-name-2">
                                                <a href="#" class="h5  d-flex align-items-center store-name">
                                                    <span class="letter-spacing-25 eye-scholl"><i
                                                            class="far fa-eye"></i> 100
                                                        Views</span>
                                                    <button class="btn v-n-btn revie-bt"><i class="fas fa-star"></i>
                                                        4.5</button> </a>
                                                <div>
                                                    <a href="#" class="btn btn-sb" data-toggle="modal"
                                                        data-target="#myModal-1">Talk to Counsellor</a>
                                                    <a href="tel:12345678" class="btn btn-sb">Apply Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
@endforeach
                            <div class="pagination">
                                <section class="pagination text-center page-section">
                                    <div class="container">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true"> <i class="fa fa-long-arrow-left"
                                                            aria-hidden="true"></i></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true"> <i class="fa fa-long-arrow-right"
                                                            aria-hidden="true"></i></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

            </div>










        </div>
      
    </div>

    <div>




    </div>

    <!--------- login and register modal ----->

    <div class="modal fade" id="myModal-log">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="text-center">
                    <div role="tabpanel" class="login-tab">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a id="signin-taba" href="#home" aria-controls="home"
                                    role="tab" data-toggle="tab">Sign In</a></li>
                            <li role="presentation"><a id="signup-taba" href="#profile" aria-controls="profile"
                                    role="tab" data-toggle="tab">Sign Up</a></li>
                            <li role="presentation"><a id="forgetpass-taba" href="#forget_password"
                                    aria-controls="forget_password" role="tab" data-toggle="tab">Forget Password</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active text-center" id="home">
                                <div class="row">
                                    <div class="col-md-6 left-side-log"><img src="{{url('public/images/login-img.png')}}"></div>
                                    <div class="col-md-6 right-side-log">
                                        <img src="{{url('public/images/logo.png')}}" class="logo">
                                        <h3>Welcome Back</h3>

                                        <div id="mainWrap">
                                            <div id="xlogin">


                                                <form action="#" id="logForm" method="post" class="form-horizontal">
                                                    <div class="form-group google-form">
                                                        <a class="google" href="#"><img src="{{url('public/images/google.png')}}"> Login
                                                            with google</a>
                                                    </div>
                                                    <div class="log-line">
                                                        <h5><span> OR LOGIN WITH NUMBER </span></h5>
                                                    </div>

                                                    <div class="form-group formSubmit">
                                                        <form action="" class="billingform">


                                                            <div class="form-group md-group show-label">
                                                                <label for="" class="mobile-label"> Mobile
                                                                    Number</label>
                                                                <input type="tel" id="phone" class="form-control"
                                                                    placeholder="Mobile Number">
                                                            </div>


                                                            <div class=" submitWrap">
                                                                <a href="javascript:;"
                                                                    class="forgetpass-tab btn btn-primary  btn-sb"
                                                                    id="login" name="submit" type="submit">Proceed</a>

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




                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="row" id="regForm">
                                    <div class="col-md-6 left-side-log"><img src="{{url('public/images/login-img.png')}}"></div>
                                    <div class="col-md-6 right-side-log">
                                        <img src="{{url('public/images/logo.png')}}" class="logo">
                                        <h3>Welcome Back</h3>

                                        <div id="mainWrap">
                                            <div id="xlogin">

                                                <form action="" class="billingform">


                                                    <div class="form-group md-group show-label">

                                                        <input type="tel" id="phone" class="form-control"
                                                            placeholder="Enter email address / Mobile Number">
                                                        <input type="password" id="phone" class="form-control"
                                                            placeholder="Enter password">
                                                        <input type="password" name="password" id="password"
                                                            class="form-control" placeholder="Enter confirm password" />
                                                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                                                    </div>


                                                    <div class=" submitWrap">

                                                        <input id="login" name="submit" class="btn btn-primary  btn-sb"
                                                            type="submit" value="Submit" />
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




                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div role="tabpanel" class="tab-pane " id="forget_password">

                                <form>
                                    <h4><span class="verify-text"> Verify</span> Your Mobile Number</h4>
                                    <p>Please Enter the Code Sent to <br>
                                        +91 XXXXXXXXXX</p>
                                    <div class="verification-code">

                                        <div class="verification-code--inputs">
                                            <input type="text" maxlength="1" />
                                            <input type="text" maxlength="1" />
                                            <input type="text" maxlength="1" />
                                            <input type="text" maxlength="1" />

                                        </div>

                                    </div>
                                    <div class="form-group formNotice">
                                        <div class="col-xs-12">
                                            <h3 class="text-center"> Didn’t received code? <a> <span> Resend Code
                                                    </span></a>
                                            </h3>
                                            <a href="{{url('index_after_login')}}" id="login" name="submit"
                                                class="btn   btn-sb">Submit</a>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>


    <!----- Modal for request to call --------->

    <div class="modal fade  careers-modal" id="myModal-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">


                <!-- Modal body -->
                <div class="modal-body">



                    <form action="{{ route('counsellordata_store') }}" method="post" enctype="multipart/form-data">
                @csrf
                        <h4>Submit for Free Counselling</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Name <span>*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Please enter your name">
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Contact Number <span>*</span></label>
                                <input type="text" class="form-control" name="phone" placeholder="Please Enter your number">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Time For Callback <span>*</span></label>
                                
                                        <input list="browsers"  id="browser"class="form-control" name="callback" required>

                                        <datalist id="browsers">
                                            <option value="9 AM - 4 PM">9 AM - 4 PM</option>
                                            <option  value="10.00 AM - 4 PM">10.00 AM - 4 PM </option>
                                            <option  value="9.30 AM - 4 PM ">9.30 AM - 4 PM </option>
                                            <option  value="10.30 AM - 4 PM">10.30 AM - 4 PM </option>
                                            <option  value="9.00 AM - 5 PM">9.00 AM - 5 PM </option>
                                            <option  value="10.00 AM - 5 PM">10.00 AM - 5 PM </option>
                                            <option  value="9.30 AM - 5 PM">9.30 AM - 5 PM </option>
                                            <option  value="10.30 AM - 5 PM">10.30 AM - 5 PM </option>
                                        </datalist>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Message</label>
                                <textarea class="form-control" rows="4" name="message"
                                    placeholder="Please type your requirenments"></textarea>
                            </div>
                        </div>
                        <div class="bottom-btn-md">
                            <a href="#" class="cancel btn mt-5">Cancel</a>
                            <button class="btn btn-sb mt-5" type="submit">Send messge</button></div>
                    </form>
                </div>



            </div>
        </div>
    </div>
    <style>
        .starter .sidebar, .document .sidebar {
    max-height: 100%;
    width: 100%;
}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


<script>
    (function () {

        function addSeparator(nStr) {
            nStr += '';
            var x = nStr.split(',');
            var x1 = x[0];
            var x2 = x.length > 1 ? ',' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

        function rangeInputChangeEventHandler(e) {
            var rangeGroup = $(this).attr('name'),
                minBtn = $(this).parent().children('.min'),
                maxBtn = $(this).parent().children('.max'),
                range_min = $(this).parent().children('.range_min'),
                range_max = $(this).parent().children('.range_max'),
                minVal = parseInt($(minBtn).val()),
                maxVal = parseInt($(maxBtn).val()),
                origin = $(this).context.className;

            if (origin === 'min' && minVal > maxVal - 5) {
                $(minBtn).val(maxVal - 5);
            }
            var minVal = parseInt($(minBtn).val());
            $(range_min).html(' ₹ ' + addSeparator(minVal * 1000));


            if (origin === 'max' && maxVal - 5 < minVal) {
                $(maxBtn).val(5 + minVal);
            }
            var maxVal = parseInt($(maxBtn).val());
            $(range_max).html(' ₹' + addSeparator(maxVal * 1000));
        }

        $('input[type="range"]').on('input', rangeInputChangeEventHandler);
    })();
</script> 
<script>
        var sliderObjects = [];
        createSliderObjects();

        function plusDivs(obj, n) {
            var parentDiv = $(obj).parent();
            var matchedDiv;
            $.each(sliderObjects, function (i, item) {
                if ($(parentDiv[0]).attr('id') == $(item).attr('id')) {
                    matchedDiv = item;
                    return false;
                }
            });
            matchedDiv.slideIndex = matchedDiv.slideIndex + n;
            showDivs(matchedDiv, matchedDiv.slideIndex);
        }

        function createSliderObjects() {
            var sliderDivs = $('.slider');
            $.each(sliderDivs, function (i, item) {
                var obj = {};
                obj.id = $(item).attr('id');
                obj.divContent = item;
                obj.slideIndex = 1;
                obj.slideContents = $(item).find('.mySlides');
                showDivs(obj, 1);
                sliderObjects.push(obj);
            });
        }

        function showDivs(divObject, n) {

            var i;
            if (n > divObject.slideContents.length) {
                divObject.slideIndex = 1
            }
            if (n < 1) {
                divObject.slideIndex = divObject.slideContents.length
            }
            for (i = 0; i < divObject.slideContents.length; i++) {
                divObject.slideContents[i].style.display = "none";
            }
            divObject.slideContents[divObject.slideIndex - 1].style.display = "block";

        }
    </script>


    <!-- script for range slider of kilometeer -->

    <script>
        document.querySelectorAll(".__range-step").forEach(function (ctrl) {
            var el = ctrl.querySelector('input');
            var output = ctrl.querySelector('output');
            var newPoint, newPlace, offset;
            el.oninput = function () {
                // colorize step options
                ctrl.querySelectorAll("option").forEach(function (opt) {
                    if (opt.value <= el.valueAsNumber)
                        opt.style.backgroundColor = '#FF4005';
                    else
                        opt.style.backgroundColor = '';
                });
                // colorize before and after
                var valPercent = (el.valueAsNumber - parseInt(el.min)) / (parseInt(el.max) - parseInt(el
                    .min));
                var style = 'background-image: -webkit-gradient(linear, 0% 0%, 100% 0%, color-stop(' +
                    valPercent + ', #FF4005), color-stop(' +
                    valPercent + ', #aaa));';
                el.style = style;

                // Popup
                if ((' ' + ctrl.className + ' ').indexOf(' ' + '__range-step-popup' + ' ') > -1) {
                    var selectedOpt = ctrl.querySelector('option[value="' + el.value + '"]');
                    output.innerText = selectedOpt.text;
                    output.style.left = "50%";
                    output.style.left = ((selectedOpt.offsetLeft + selectedOpt.offsetWidth / 2) - output
                        .offsetWidth / 2) + 'px';
                }
            };
            el.oninput();
        });

        window.onresize = function () {
            document.querySelectorAll(".__range").forEach(function (ctrl) {
                var el = ctrl.querySelector('input');
                el.oninput();
            });
        };
    </script>
@endsection
@section('footer')
@parent
@endsection
@section('footerscript')
@parent
@endsection
   
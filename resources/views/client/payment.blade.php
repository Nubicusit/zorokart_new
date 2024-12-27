@extends('client.websitelayout')
@section('headerscript')
@parent
@endsection
@section('header')
@parent
@endsection
@section('content')


            <br><br>
        </div>
       


        <!--------------- animation start -------------------->
        <div class="content animation-section">



           


            <section class="my-acc-home-inner payment-sec">
                <div class="container">
                    <h4 class="appli-text">My Application (s)</h4>
                    <div class="row">

                        <div class="col-md-8">
                            <div class="box-my-acc ">

                                <div class="store media align-items-stretch bg-white job-store row">

                                    <div class="w-content w-display-container slider" id="div1">
                                        <img src="{{url('public/images/favicon.png')}}">
                                        <!--<a href="#"><i class="fa fa-trash" aria-hidden="true"></i> Remove</a>-->
                                    </div>


                                    <div class="media-body  px-md-4   col-md-9">

                                        <div class="d-flex lh-1">
                                            <div>
                                                <h6>You are applying for </h6>
                                                <a href="#" class="h5  d-flex align-items-center store-name">
                                                    <span class="letter-spacing-25">{{$institute->name}}</span>
                                                </a>
                                            </div>

                                            <span class="favourite ml-auto text-darker-light"><img
                                                    src="{{url('public/img/images/premium.png')}}" style="width: 75px;"></span>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6 location-school">
                                                <span class="d-inline-block ">{{$application->s_class}} </span>

                                            </div>
                                        </div>
                                        <div class="row stu-mid ">
                                            <div class="stu-st">

                                                <p>Advance  Fee</p>
                                                <h5>Rs {{$institute->admission_fee}}</h5>

                                            </div>
                                            <div class="stu-st">

                                                <p>Platform Charges</p>
                                                <h5>Rs 0/-</h5>

                                            </div>
                                            <div class="stu-st">
                                                <h5>Rs  {{$institute->admission_fee}}/-</h5>

                                            </div>


                                        </div>

                                    </div>
                                </div>



                            </div>
                           <div class="box-my-acc mt-3">
                               <div class="row" style="justify-content:center">
                                   <div class="col-md-5">
                               <a  href="{{url('pay_offline/'.$app_id)}}"class="btn btn-sb btn-pay"> Pay offline at campus</a></div>
                               <div class="col-md-12">
                                   <p style="color: #000; font-size: 14px; text-align: center;margin-top: 1rem;font-weight: 500;">
                                     <span style="font-weight:600;color:#FF2E00;font-size: 16px;">Note: </span>  By selecting the option, You have to visit the campus and pay the fee to confirm the admission </p>
                               </div>
                               </div>
                                   
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="my-acc-bottom ">
                                <p class="total-text">Total Amount Breakup</p>
                                <div class="total-1">
                                    <div>
                                        <p>Advance Fee</p>
                                        <h6>Rs {{$institute->admission_fee}}/-</h6>
                                    </div>
                                    <div>
                                        <p>Platform Charges</p>
                                        <h6>Rs 0/-</h6>
                                    </div>
                                </div>
                                <div class="total-2">
                                    <p>Total Amount</p>
                                    <h6>Rs  {{$institute->admission_fee}}/-</h6>
                                </div>
                                <div class="btn-sec"> <a class="btn btn-sb btn-pay"> Proceed to Payment</a>
                                    <p>support@schoolspe.com | +91  8431367561</p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>









       

   



      
<style>
    .payment-sec {
    padding: 38px 0px 100px;
    margin-top: -3rem;
}
#site-wrapper {
    background-color: #FDE8DF !important;}
</style>
    <!-- The Modal for advance search ends-->

    <!--============= scripts starts ===============-->
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







    <script>
        let card = document.querySelector(".card"); //declearing profile card element
        let displayPicture = document.querySelector(".display-picture"); //declearing profile picture

        displayPicture.addEventListener("click",
            function () { //on click on profile picture toggle hidden class from css
                card.classList.toggle("hidden")
            })
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



@endsection
@section('footer')
@parent
@endsection
@section('footerscript')
@parent
@endsection
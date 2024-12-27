@extends('client.websitelayout')
@section('headerscript')
@parent
@endsection
@section('header')
@parent
@endsection
@section('content')


@if(Session::has('status'))
<script>
swal("", "{!!Session::get('status') !!}", "success")
</script>
@endif
         

            <section id="section-01" class="home-main-intro career-page contact-page  reffer">
                <div class="home-main-intro-container">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-6 contact-home" data-animate="fadeInLeft">
                                <h2 class="heade-about">Refer and earn with </h2>
                                <h3>SchoolsPe </h3>
                                <a class="btn btn-sb" href="#refernow">Refer Now</a>
                            </div>
                            <div class="col-md-6 refferal-right-img" data-animate="fadeInRight">
                                <img src="{{url('public/images/refferal.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        </div>
        <div class="content  animation-section">

            <div class="leaf leaf-careers">
            <div> <img src="{{url('public/images/Icons/Ic-1.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-2.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-3.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-4.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-5.png')}}" height="45px" width="35px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-6.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-7.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-8.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/ic-9.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/ic-10.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/ic-11.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/ic-12.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/ic-13.png')}}" height="75px" width="75px"></img></div>
               
                <div> <img src="{{url('public/images/Icons/ic-15.png')}}" height="75px" width="75px"></img></div>

            </div>

            <section class="ref-policy" id="refernow">
                <div class="container">
                    <h2 class="mb-4">
                        <span class=" see-text insti-text">Referral </span>
                        <span class="how-it-text isnt-txt">Process </span>
                    </h2>
                    <ul>
                        <li>Refer your student, friend or a family member to SchoolsPe for admissions</li>
                        <li>Earn cashback on the confirmed admission of your referral</li>
                        <li>Fill in a simple form and read the instructions below  </li>

                    </ul>


                    <div class="ref-box col-md-10" >
                         <form method="post" action="{{url('referals_store')}}" enctype="multipart/form-data">
                     @csrf
                        <div class="row">
                             <div class="col-md-12 label-ref" >
                                <label style="margin-top:0rem !important">Tell us about yourself</label>
                            </div>
                        
                            <div class="col-md-6">
                                <label>Your Name</label>
                                <input type="text"  name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Your Mobile No.</label>
                                <input type="number"  name="phone"  class="form-control" id="phone_no_4" required>
                            </div>
                              <div class="col-md-6 " style="margin-top:2rem">
                                <label>Who you are?</label>
                                <!--<input type="text"  name="about" class="form-control"  list="browsers"  required>-->
                                <select name="about" class="form-control" required>
                                     <option value="">Select One</option>
                                  <option value="Student">Student</option>
                                  <option value="Parent">Parent</option>
                                  <option value="Teacher">Teacher</option>
                                  <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 label-ref">
                                <label>Who Would You Like To Refer</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text"  name="refer_name" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Email Id</label>
                                <input type="email"  name="email"  class="form-control" required>
                            </div>

                        </div>
                        <div class="row  belw">
                            
                            <div class="col-md-6">
                                <label>Mobile No.</label>
                                <input type="number" name="refer_phone"  class="form-control" id="phone_no_3" required>
                            </div>
                        </div>
                        <div class="row  belw">
                            <div class="col-md-12">
                                <button value="submit" class="btn btn-sb sign-up-btn1"> Refer Now</button>
                            </div>

                        </div>
                    </div>
                </div>
                </form>
            </section>
            
            
            <section class="ref-bottom ">
                <div class="container">
                    <h2 class="mb-8">
                        <span class="see-text">Terms & Conditions</span>

                    </h2>


                    <div class="Accordions">
                        <div class="Accordion_item">

                            <div class="title_tab">
                                <h3 class="title">Program Overview<span class="acc"><span class="icon"></span></span>
                                </h3>
                            </div>
                            <div class="inner_content">
                                <ul><li>Fill in the details thoroughly and submit them.</li>
                                <li>You will receive all updates about the progress on the mobile number you have mentioned.</li>
                                <li>The cashback will be transferred to your UPI account on confirmation of admission by the institution.</li>
                                <li>We request you to provide the mobile number which is active for a UPI transaction in your name. (Phonepe, Gpay, Paytm)</li>
                                </ul>
                                
                               
                            </div>
                        </div>

                        <div class="Accordion_item">
                            <div class="title_tab">
                                <h3 class="title">Referral Reward <span class="acc"><span class="icon"></span></span>
                                </h3>
                            </div>
                            <div class="inner_content">
                                <p>


                                    <span>Every admission taken by your referral will earn you the following rewards:</span></p>
                              
                              <table>
                                    <tr><td><b>No of Admission</b></td><td><b>Reward</b></td></tr>
                                    <tr><td>1-10 </td><td>₹500 / Admission </td></tr>
                                    <tr><td>11 - 20</td><td>₹ 750 / Admission </td></tr>
                                    <tr><td>21 & Above</td><td>₹ 1000 / Admission </td></tr>
                                </table>
                           <ul><li>
                               There is no cap on the number of referrals per person.

                           </li>
                           <li>You will receive the reward only after your referral completes admission through SchoolsPe and it is confirmed by the respective institution. </li></ul>
                                   
                               
                               
                            </div>
                        </div>
                        <div class="Accordion_item">
                            <div class="title_tab">
                                <h3 class="title">Limitation of liability <span class="acc"><span
                                            class="icon"></span></span>
                                </h3>
                            </div>
                            <div class="inner_content">
                                <ul><li>SchoolsPe will not be held responsible for any issues related to the referral's admission or enrollment, including issues arising from direct admission attempts on the institution's campus.</li>
                                <li>SchoolsPe will not be held responsible for any technical issues related to online referrals, including but not limited to theft, use of incorrect contact information, or changes in contact information during reward transfer. It is the responsibility of the referrer to provide accurate and up-to-date contact information.</li>
 <li>SchoolsPe will not request personal or financial information, such as bank account details, for the purpose of reward transfer. Any such requests should be reported immediately as they may be fraudulent.</li>
 <li>SchoolsPe does not play a role in the allocation of seats at institutions and is not responsible for any issues arising from seat availability.</li>
 <li>SchoolsPe is not responsible for referrals who were not able to secure a seat at the desired institution, but we will consider the referral for other institutions with available seats.</li>
                                </ul>
                               
                            </div>
                        </div>
                        

                    </div>
                </div>
            </section>

        </div>




<style>
  table{
      margin-left:1rem;
  }
    table tr td{
        color:black !important;
        padding:0rem 1rem;
    }
    
    
   .ref-bottom  ul {
  list-style-type: none; /* no default bullets */
  margin-top:1rem;
  padding-left:0rem !important;
}

.ref-bottom  ul li { 
 color:#000;
 padding: 8px 15px;
    font-size: 17px;
    line-height: 25px;

    font-weight: 500;
   
}

.ref-bottom  ul li:before { /* the custom styled bullets */
  background-color: #FF4005;
  border-radius: 50%;
  content: "";
  display: inline-block;
  margin-right: 10px;
  margin-bottom: 2px;
  height: 10px;
  width: 10px;
}
</style>


        <br><br>

            <script src="{{url('public/vendors/jquery.min.js')}}"></script>


          

            <script>
                var $titleTab = $('.title_tab');
                $('.Accordion_item:eq(0)').find('.title_tab').addClass('active').next().stop().slideDown(300);
                $('.Accordion_item:eq(0)').find('.inner_content').find('p').addClass('show');
                $titleTab.on('click', function (e) {
                    e.preventDefault();
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        $(this).next().stop().slideUp(500);
                        $(this).next().find('p').removeClass('show');
                    } else {
                        $(this).addClass('active');
                        $(this).next().stop().slideDown(500);
                        $(this).parent().siblings().children('.title_tab').removeClass('active');
                        $(this).parent().siblings().children('.inner_content').slideUp(500);
                        $(this).parent().siblings().children('.inner_content').find('p').removeClass('show');
                        $(this).next().find('p').addClass('show');
                    }
                });
            </script>
           
       
            <script>
                $( ".sign-up-btn1" ).click(function() {
      
 
        if (document.getElementById('phone_no_4').value.length < 10 || document.getElementById('phone_no_4').value.length > 10 ) {

             alert("Please Enter Valid User Phone Number"); 
              return false;
         }
         
        else if (document.getElementById('phone_no_3').value.length < 10 || document.getElementById('phone_no_3').value.length > 10 ) {

             alert("Please Enter Valid User Phone Number"); 
              return false;
         }
         
      else{
             return true 
         }

});

            </script>


@endsection
@section('footer')
@parent
@endsection
@section('footerscript')
@parent
@endsection
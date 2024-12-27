@extends('client.websitelayout')
@section('headerscript')
@parent
@endsection
@section('header')
@parent
@endsection
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if(Session::has('status'))
<script>
swal("", "{!!Session::get('status') !!}", "success")
</script>
@endif
            
            <section id="section-01" class="home-main-intro career-page contact-page">
                <div class="home-main-intro-container">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-6 contact-home" data-animate="fadeInLeft">
                                <h2 class="heade-about">Contact <span>SchoolsPe</span></h2>
                                <p>We’re here to help and answer any questions you  <strong>might </strong> have.<br> We look forward to hearing from you,<img src="{{url('public/images/smily.png')}}" class="smile-img"></p>
                                <a href="#contact" class="btn btn-sb"> Contact Us</a>
                            </div>
                            <div class="col-md-6 contact-right-img" data-animate="fadeInRight">
                                <img src="{{url('public/images/contact.png')}}">
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
            
               <section class="contact-form-below" id="contact">
                <div class="container">
                      <form action="{{ route('contactdata_store') }}" method="post" enctype="multipart/form-data" class="dsk-cnt-frm"  >
                         @csrf
                        <div class="row">
                            <div class="col-md-6"> <label>Name</label><br>

                                <input type="text" class="form-control" name="name" required></div>
                            <div class="col-md-6"> <label>Who you are?</label><br>

                                <!--<input type="text" class="form-control" name="about" required>-->
                                <select class="form-control" name="about" required>
                                    <option value="">Select One</option>
  <option value="Parent">Parent</option>
  <option value="Student">Student</option>
   <option value="Institution">Institution</option>
    <option value="Others">Others</option>
  
</select>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"> <label>Mobile NO.</label><br>
                                <input type="number" class="form-control" name="phone" id="phone_no_3" required></div>
                                
                            <div class="col-md-6"> <label>Reason for contact</label><br>
                                <select class="form-control" name="reason" required>
                                    <option value="">Select One</option>
                                      <option value="Admission">Admission</option>
                                      <option value="Talk to counsellor">Talk to counsellor</option>
                                       <option value="Register Institution">Register Institution</option>
                                        <option value="Others">Others</option>
  
</select>
</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"> <label>Email</label><br>
                                <input type="email" class="form-control" name="email" required></div>
                            <div class="col-md-6"> <label>Message</label><br>
                                <textarea type="text" class="form-control" row="100" col="50" name="message" ></textarea>
                                    
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"> <label class="contact-label">Location</label><br>
                                <input type="text" class="form-control" name="location" required></div>
                            <!--<div class="col-md-6"> <label>Message</label><br>-->
                            <!--    <input type="text"></div>-->
                        </div>
                          <button  type="submit" class="btn contact-sub-btn sign-up-bt" >SUBMIT</button>

                       

                          </form>
                     
                     
                     <!--for mobileggggg -->
                      <form action="{{ route('contactdata_store') }}" method="post" enctype="multipart/form-data" class="mob-cnt-frm" >
                         @csrf
                        <div class="row">
                            <div class="col-md-6"> <label>Name</label><br>
                                <input type="text" class="form-control" name="name" required></div>
                                  <div class="col-md-6"> <label>Mobile NO.</label><br>
                                <input type="number" class="form-control" name="phone" id="phone_no_31" required></div>
                                 <div class="col-md-6"> <label>Email</label><br>
                                <input type="email" class="form-control" name="email" required></div>
                                <div class="col-md-6"> <label class="contact-label" style="margin-top: 1.5rem !important;">Location</label><br>
                                <input type="text" class="form-control" name="location" required></div>
                            <div class="col-md-6"> <label>Who you are?</label><br>

                                <!--<input type="text" class="form-control" name="about" required>-->
                                <select class="form-control" name="about" required>
                                    <option value="">Select One</option>
  <option value="Parent">Parent</option>
  <option value="Student">Student</option>
   <option value="Institution">Institution</option>
    <option value="Others">Others</option>
  
</select>
                                </div>
                                        <div class="col-md-6"> <label>Reason for contact</label><br>
                                <select class="form-control" name="reason" required>
                                    <option value="">Select One</option>
                                      <option value="Admission">Admission</option>
                                      <option value="Talk to counsellor">Talk to counsellor</option>
                                       <option value="Register Institution">Register Institution</option>
                                        <option value="Others">Others</option>
  
</select>
</div>
 <div class="col-md-6"> <label>Message</label><br>
                                <textarea type="text" class="form-control" row="100" col="50" name="message" ></textarea>
                                    
                                </div>
                        </div>
                 <br><br>
                          <button  type="submit" class="btn contact-sub-btn sign-up-bt-mbl" >SUBMIT</button>

                       

                          </form>
                          
                          
                        
                      </div>
                     
            </section>

           
            <section class="contact-bottom">
                <div class="container">
                    <div class="contact-bottom-inner">


                        <div>
                            <h5>Support</h5>
                            <a href="mailto:{{$settingdata->email}}" ><i class="fa fa-envelope" aria-hidden="true"></i> {{$settingdata->email}}</a><br>
                            <a href="tel:{{$settingdata->phone}}"><i class="fa fa-phone" aria-hidden="true"></i> {{$settingdata->phone}}</a><br>
                            <a href="https://schoolspe.com/"><img src="{{url('public/images/web.png')}}"> www.schoolspe.com</a><br>

                        </div>
                        <div>
                            <h5>Address</h5>
                            <p><i class="fas fa-map-marker-alt"></i>  {{$settingdata->address}}<p>


                        </div>
                    </div>
                </div>
            </section>
        </div>






<script>
    $( ".sign-up-bt" ).click(function() {
      
 
        if (document.getElementById('phone_no_3').value.length < 10 || document.getElementById('phone_no_3').value.length > 10 ) {

             alert("Please Enter Valid User Phone Number"); 
              return false;
         }
         
      
      else{
             return true 
         }

});

    $( ".sign-up-bt-mbl" ).click(function() {
      
 
        if (document.getElementById('phone_no_31').value.length < 10 || document.getElementById('phone_no_31').value.length > 10 ) {

             alert("Please Enter Valid User Phone Number"); 
              return false;
         }
         
      
      else{
             return true 
         }

});
</script>
        <br><br>
@endsection
@section('footer')
@parent
@endsection
@section('footerscript')
@parent
@endsection
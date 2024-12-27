<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SchoolsPe</title>
    @section('headerscript')
    <link rel="icon" type="image/x-icon" href="{{url('public/images/favicon.png')}}">
    <script src="../cdn-cgi/apps/head/2oc_RD5SS6wgN5SiQnSEnWVNHg8.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('public/vendors/font-awesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{url('public/vendors/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('public/vendors/slick/slick.css')}}">
    <link rel="stylesheet" href="{{url('public/vendors/animate.css')}}">

    <link rel="stylesheet" href="{{url('public/css/style.css')}}">
    <link rel="stylesheet" href="{{url('public/css/resposive.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    

    @show
</head>

<body>


    <div id="site-wrapper" class="site-wrapper starter demo-header">

        <!--------------- header section start -------------------->



        <!--------------- animation start -------------------->
        <div class="content animation-section school-edit-form">

 @if(Session::has('status'))
<script>
swal("", "{!!Session::get('status') !!}", "success")
.then(function(){
    window.location.href = "{{route('institute')}}";
})
</script>
@endif

            <section class="my-acc-home form-school">
                <div class="container">
                    <h3 class="mt-8">Submit your Listing</h3>
                    <p><a href="{{url('institute')}}">Home </a>/ Submit Your Listing </p>
                </div>
                <div class="box-my-acc school-form-box">
                    <div class="container">
                    <form action="{{route('institute_store')}}" method="post" enctype="multipart/form-data">
                    @csrf
<input type="hidden"  name="cat" value="{{$cat}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Institution Name
<span style="color:red">&nbsp;*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="" name="name" required>

                                    </div>

                                    <div class="form-group">
                                        <label>City</label><span style="color:red">&nbsp;*</span>
                                        <input type="text" class="form-control" placeholder="" name="city" required>

                                    </div>

                                    <div class="form-group">
                                        <label>State</label><span style="color:red">&nbsp;*</span>
                                        <input type="text" class="form-control" placeholder="" name="state" required>

                                    </div>

                                  
                                        <div class="form-group">
                                        <label>Address</label><span style="color:red">&nbsp;*</span>
                                        <textarea class="form-control" placeholder="" name="address"
                                        value="{{old('address')}}" required></textarea>

                                    <div class="form-group">
                                        <label>Phone</label><span style="color:red">&nbsp;*</span>
                                        <input type="text" class="form-control" id="phone_no_1" placeholder="" name="u_phone" required>

                                    </div>
                                     <div class="form-group">
                                        <label>Email</label><span style="color:red">&nbsp;*</span>
                                        <input type="text" class="form-control" placeholder="" name="ins_email" required>

                                    </div>

                                </div>
                                </div>
                                <div class="col-md-6  edit-form-right">
                                    <label>Profile Logo</label>
                                    <div class="profile-pic">

                                        <img alt="User Pic"
                                            src="{{url('public/images/upload-pic.png')}}"
                                            id="profile-image1" height="200">
                                        <input class="hidden" type="file"
                                            onchange="previewFile()"  name="photo" id="profile-image-upload" >


                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-6 left-sec">
                                    <h4 class="edit-form-text">Key Stats</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ownership

                                                </label><span style="color:red">&nbsp;*</span>
                                                <select class="form-control" name="ownership" required>
                                                    <option value="">Select One</option>
                                                    <option value="Private">Private</option>
                                                    <option value="Private-Aided">Private Aided</option>
                                                    <option value="Govt.Aided">Govt. Aided</option>
                                                    <option value="Autonomous">Autonomous</option>
                                                </select>

                                            </div>
                                        </div>
                                        @if(($cat==="pc")||($cat==="ug")||($cat==="pu"))
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>University</label><span style="color:red">&nbsp;*</span>
                                 
                                                <input  name="board" id="" class="form-control" autocomplete="off" required>

                                              
                                            </div>

                                        </div>
                                        
                                       @else
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Board</label><span style="color:red">&nbsp;*</span>
                                 
                                                <input list="browsers" name="board" id="browser" class="form-control" autocomplete="off" required>

                                              <datalist id="browsers">
                                                     
                                                    <option value="State">State</option>
                                                    <option value="CBSE">CBSE</option>
                                                    <option value="ICSE">ICSE</option>
                                                     
                                                </datalist>
                                            </div>

                                        </div>
                                   @endif
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Year of Establishment

                                                </label><span style="color:red">&nbsp;*</span>
                                                <input type="text" class="form-control" placeholder="" name="establishment" required>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Co-Ed Status

                                                </label><span style="color:red">&nbsp;*</span>
                                                <select class="form-control" name="d_status" required>
                                                    <option value="">Select One</option>
                                                    <option value="1">All</option>
                                                    <option value="2">Boys Only</option>
                                                    <option value="3">Girls Only</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Campus Size (in Acres)

                                                </label><span style="color:red">&nbsp;*</span>
                                                <input type="text" class="form-control" placeholder="" name="acres" required>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Campus Type

                                                </label><span style="color:red">&nbsp;*</span>
                                                <select class="form-control" name="c_type" required>
                                            <option value="">Select One</option>
                                            <option value="Residential">Residential</option>
                                            <option value="Non-Residential">Non-Residential</option>

                                        </select>

                                            </div>

                                        </div>

                                    </div>




                                </div>
                                <div class="col-md-6 right-sec">
                                    <h4 class="edit-form-text">Fee Structure</h4>

                                    <div class="form-group">
                                        <label>Average minimum fee per year</label><span style="color:red">&nbsp;*</span>
                                        <input type="number" class="form-control" placeholder="" name="cost" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Average maximum fee per year</label><span style="color:red">&nbsp;*</span>
                                        <input type="number" class="form-control" placeholder="" name="cost_max" required>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hostel fee per year </label>
                                                <input type="number" class="form-control" placeholder="" name="m_fees" >

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Advance fee  </label><span style="color:red">&nbsp;*</span>
                                                <input type="number" class="form-control" placeholder="" name="admission_fees" required>

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Other fee </label>
                                                <input type="number" class="form-control" placeholder="" name="other_fees" >

                                            </div>
                                    </div>
                                    </div>
                                    


                                </div>
                            </div>

                            <div class="row">
                                 @if(($cat=="s"))
                                <div class="col-md-6 left-sec">
                                    <h4 class="edit-form-text"> Classes Offered </h4>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Classes</label><span style="color:red">&nbsp;*</span>


                                                <select class="form-control" name="c_offered"   id="course_id" required>
        							<option value="">@lang('Select One')</option>
                                    <option value="1">LKG to 10th</option>
                                    <option value="2">LKG to 12th</option>
                                    <option value="3">1st to 10th</option>
                                    <option value="4">1st to 12th</option>
                                                </select>

                                            </div>
                                        </div>


                                    </div>




                                </div>
                                @endif

                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Students Facultys Ratio

                                                </label>
                                                <input type="text" class="form-control" placeholder="" name="ratio" required>

                                            </div>

                                        </div> -->
                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Type of School

                                                </label>
                                                <input type="text" class="form-control" placeholder="" name="school_type" required>

                                            </div>

                                        </div> -->

                              
                                <div class="col-md-6 right-sec">
                                    <h4 class="edit-form-text"> Admission Dates</h4>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date </label><span style="color:red">&nbsp;*</span>
                                                <input type="date" class="form-control" placeholder="" name="start_date" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End Date </label><span style="color:red">&nbsp;*</span>
                                                <input type="date" class="form-control" placeholder="" name="end_date" required>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="edit-form-text">Admission Criteria & Eligibility</h4>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Eligibility

                                        </label><span style="color:red">&nbsp;*</span>
                                        <select class="form-control" name="eligibility" required>
                                            <option value="">Select One</option>
                                            <option value="On-Merit">On Merit</option>
                                            <option value="Entrance-Test">Entrance Test</option>
                                            <option value="Merit-and-Entrance-test">Merit and Entrance test</option>
                                            <option value="Merit-and-Interview">Merit and Interview</option>
                                            <option value="Merit-Entrance-and-Interview">Merit, Entrance and Interview</option>

                                        </select>


                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Minimum  marks(in %) </label><span style="color:red">&nbsp;*</span>


                                        <input type="number" class="form-control" placeholder="" name="marks" required>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Average seats per class

                                        </label><span style="color:red">&nbsp;*</span>
                                        <input type="number" class="form-control" placeholder=""  name="seats" required>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Hostel Accomodation</label>
                                        <input type="text" class="form-control" placeholder=""  name="test" >


                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Student Interaction

                                        </label><span style="color:red">&nbsp;*</span>
                                        <select class="form-control"  name="s_interaction" required>
                                            <option value="">Select One</option>
                                            <option value="Online">Online</option>
                                            <option value="At-Office">At Office</option>
                                            <option value="Online & Offline">Online & Offline</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Parents Interaction  </label><span style="color:red">&nbsp;*</span>
                                      <select class="form-control" name="p_interaction" required>
                                        <option value="">Select One</option>
                                            <option value="Online">Online</option>
                                            <option value="At-Office">At Office</option>
                                            <option value="Online & Offline">Online & Offline</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Form Availablity </label><span style="color:red">&nbsp;*</span>

                                       <select class="form-control" name="form_availibility" required>
                                        <option value="">Select One</option>
                                            <option value="Online">Online</option>
                                            <option value="At-Office">At Office</option>
                                            <option value="Online & Offline">Online & Offline</option>
                                        </select>

                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Addmission Fee Payment</label><span style="color:red">&nbsp;*</span>
                                        <select class="form-control" name="form_payment" required>
                                        <option value="">Select One</option>
                                            <option value="Online">Online</option>
                                            <option value="At-Office">At Office</option>
                                            <option value="Online & Offline">Online & Offline</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="browser">School Timing</label><span style="color:red">&nbsp;*</span>
                               
                                               <select class="form-control" name="school_time" required>
                                            <option value="9 AM - 4 PM">9 AM - 4 PM</option>
                                            <option  value="10.00 AM - 4 PM">10.00 AM - 4 PM </option>
                                            <option  value="9.30 AM - 4 PM ">9.30 AM - 4 PM </option>
                                            <option  value="10.30 AM - 4 PM">10.30 AM - 4 PM </option>
                                            <option  value="9.00 AM - 5 PM">9.00 AM - 5 PM </option>

                                            <option  value="10.00 AM - 5 PM">10.00 AM - 5 PM </option>
                                            <option  value="9.30 AM - 5 PM">9.30 AM - 5 PM </option>
                                            <option  value="10.30 AM - 5 PM">10.30 AM - 5 PM </option>
                                      </select>


                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="browser">Office Timing</label><span style="color:red">&nbsp;*</span>
                                   

                                           
                                            <select class="form-control" name="office_time" required>
                                            <option value="9 AM - 4 PM">9 AM - 4 PM</option>
                                            <option  value="10.00 AM - 4 PM">10.00 AM - 4 PM </option>
                                            <option  value="9.30 AM - 4 PM ">9.30 AM - 4 PM </option>
                                            <option  value="10.30 AM - 4 PM">10.30 AM - 4 PM </option>
                                            <option  value="9.00 AM - 5 PM">9.00 AM - 5 PM </option>

                                            <option  value="10.00 AM - 5 PM">10.00 AM - 5 PM </option>
                                            <option  value="9.30 AM - 5 PM">9.30 AM - 5 PM </option>
                                            <option  value="10.30 AM - 5 PM">10.30 AM - 5 PM </option>
                                           </select>

                                    </div>
                                </div>
                            </div>
                          <div class="form-group">
                                        <label>Awards

                                        </label>
                                        <textarea class="form-control" rows="2" name="awards[]">
                                             
                                     
                                       
                                        </textarea>

                                    </div>
                                    <div class="form-group" id="awd1">
                                        <label>Awards

                                        </label>
                                        <textarea class="form-control" rows="2" name="awards[]">
                                        
                                        </textarea>

                                    </div>
                                    <div class="form-group" id="awd2">
                                        <label>Awards

                                        </label>
                                        <textarea class="form-control" rows="2" name="awards[]">
                                        
                                        </textarea>

                                    </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group student-acv">
                                        <label>Student Achievers

                                        </label>
                                        <div>
                                            <button class="btn  js-add--exam-row"><i class="fa fa-plus"
                                                    aria-hidden="true"></i></button>
                                            <div  id="form"                 >

                                                <div id="form-exams-list" class="row">
                                                    <div class="form-group col-md-3">

                                                        <input type="text" id="exam" placeholder="Student Name" name="student_name[]" /><br>

                                                        <input type="text" id="exam_date" placeholder="Decription" name="student_description[]"  />
                                                    </div>
                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <style>
                                .faciliti-sec .btn-save-sec{
                                  display:block;
                                  margin-top:0rem;
                                }
                                .faciliti-sec .btn-save-sec .btn {
                                   padding: 0.5rem 0rem !important;
                                   width: 40px;
                                    height: 40px;
                                    line-height: 1.5;
                                    padding: 8px;
                                    margin-bottom: 1rem;
                                    border-radius: 100%;
                                    background: rgba(255, 64, 5, 0.73);
                                    color: #fff;
                                }
                            </style>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="edit-form-text">Facilities</h4>
                                    <div class="row faciliti-sec">
                                      
                                              <div class="col-md-4" id="newtask">
                                                 

                                            <div class="form-group">
                                                <!--<label>Academic streams </label>-->

                                          <input type="text" class="form-control" list="browsers-1" id="textfield1" name="Facilities[]">
                                          <datalist id="browsers-1">
                                          <option value="AC Class">
                                          <option value="Smart Classes">
                                         
                                          <option value="Auditorium">
                                          <option value="Library Room">
                                          <option value="Canteen">
                                          <option value="Play Ground">
                                          <option value="CCTV">
                                          <option value="Computer Lab">
                                          <option value="Science Lab">
                                              
                                          <option value="Robotics Lab">
                                          <option value="Art & Craft">
                                          <option value="Dance">
                                          <option value="Debets">
                                          <option value="Dramas">
                                          <option value="Annual Functions">
                                          <option value="Painting Competition">
                                          <option value="Picnic">
                                          <option value="Karate">
                                          <option value="Yoga">
                                          <option value="Indoor Sports">
                                          <option value="Outdoor Sports">
                                          
                                        </datalist>
                                         
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="btn-save-sec">
                                                <a  class="btn btn-fac" id="push"><i class="fa fa-plus" aria-hidden="true"></i></a>

                                            </div>
                                        </div>
                                        
                                     

                                    </div>
                                    <div class="row mt-3 mb-3" id="tasks" >        
   
                                        
                                         
                                    </div>
                                 
                                   
                                    <div class="row faciliti-sec">
                                    <div class="col-md-12">
                                            <div style="display: flex;align-items:center;column-gap:10px">
                                                <label>Gallery</label><br>
                                                <div class="removebtnimg">
                                                    <button type="button" class="btn  bckbtn addmore_img"><i
                                                            class="fa fa-plus" aria-hidden="true"></i><span
                                                            class="glyphicon glyphicon-plus"></span></button></div>
                                            </div>

                                            <div class="upload-img-upload">
                                                <div class="form-group portfolioimgdiv width100">


                                                    <div class="upload-demo col-lg-12">
                                                        <img alt="your image" class="portimg" src="#">
                                                    </div>
                                                    <div class="socialmediaside2">

                                                        <div
                                                            class="form-group hirehide is-empty is-fileinput width100 martop10">
                                                            <input class="fileUpload" accept="image/jpeg, image/jpg"
                                                                name="gallery[]" type="file" value="Upload">

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div style="display: flex;align-items:center;column-gap:10px">
                                                <label>Video</label><br>
                                                <div class="removebtnimg">
                                                    <button type="button" class="btn  bckbtn addmore_img-1"><i
                                                            class="fa fa-plus" aria-hidden="true"></i><span
                                                            class="glyphicon glyphicon-plus"></span></button></div>
                                            </div>

                                            <div class="upload-img-upload">
                                                <div class="form-group portfolioimgdiv-1 width100">


                                                    <div class="upload-demo ">
                                                        <video alt="your image" class="portimg-1" src="#" ></video>

                                                    </div>
                                                    <div class="socialmediaside2">

                                                        <div
                                                            class="form-group hirehide is-empty is-fileinput width100 martop10">
                                                            <input class="fileUpload" accept="video/mp4"
                                                                name="videos[]" type="file" value="Upload">

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row faciliti-sec">
                                        <div class="col-md-12">
                                          
                                        </div>

                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Location Link

                                                </label>
                                                <input type="text" class="form-control" placeholder="" name="u_location" value="">

                                            </div>
                                        </div>
                                    
                                    </div>
                                    </div>

                                    <div class="btn-save-sec">
                                        
                                        <button type="submit" class="btn btn-sb sign-up-btn-4">
                                             @if(($cat=="s"))
                                            SUBMIT
                                              @else
                                        NEXT
                                        @endif
                                            
                                            </button>
                                      
                                        </div>
                                </div>

                        </form>



                    </div>
                </div>
            </section>











        </div>
    </div>


    <div>






    </div>



    </div>
<style>
      .socialmediaside2 .form-group{
            width: 185px;
        }
        .school-form-box form img.portimg,  .school-form-box form video.portimg-1 {
            display: none;
            width: 150px !important;
            height: 150px !important;
            margin-top: 1rem;
            margin-right: 0%;
            object-fit: fill;
        }

        .school-edit-form .school-form-box form .socialmediaside2 input {
            border: none !important;
            margin-top: 1rem;
            width: 1%;
        }

        .socialmediaside2 input::-webkit-file-upload-button {
            position: absolute;
            padding: 6px 10px;
            background-color: #D9F1F6;
            ;
            border: none;
            border-radius: 5px;
            color: black;
            font-weight: 600;
            text-transform: uppercase;
            box-shadow: 0px 3px 3px -2px rgba(0, 0, 0, 0.2), 0px 3px 4px 0px rgba(0, 0, 0, 0.14), 0px 1px 8px 0px rgba(0, 0, 0, 0.12);
            transition: 100ms ease-out;
            cursor: pointer;


        }

        .upload-demo {
            padding-left: 0%;
            display: flex;
            align-items: flex-start;
        }

        .socialmediaside2 input::-webkit-file-upload-button:hover {


            background-color: #D9F1F6;
            ;
            box-shadow: 0px 3px 5px -1px rgba(0, 0, 0, 0.2), 0px 5px 8px 0px rgba(0, 0, 0, 0.14), 0px 1px 14px 0px rgba(0, 0, 0, 0.12)
        }

        .addmore_img,     .addmore_img-1{
            display: inline-block;
            font-weight: 600;
            color: #fff !important;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #FF4005;
            border-color: #FF4005;
            border-radius: 50%;
            margin-top: 0% !important;
            font-size: 17px;
            width: 40px;
            line-height: 1;
            height: 40px;

        }

        .removebtn i {
            display: inline-block;
            font-weight: 600;
            color: #FF4005 !important;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;

            border-radius: 50%;
            margin-top: 0% !important;
            font-size: 21px;

            line-height: 1;

            border: none;
            margin-bottom: 1rem;
        }

        button.removebtn:not(:disabled) {
            cursor: pointer;
            border: none;
            background: none;
        }

        .upload-img-upload {
            display: flex;
            flex-flow: row wrap;
        }

        .removebtnimg button.remove_field,  .removebtnimg button.remove_field-1  {
            display: inline-block;
            font-weight: 600;
            color: #fff !important;
            text-align: center;
            /* min-width: 116px; */
            padding: 5px 15px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #FF4005 !important;
            border-color: #FF4005 !important;
            border-radius: 8px;
            margin-top: 0% !important;
            font-size: 16px;
            padding: 6px 26px;
            width: 135px;
            height: 38px;
            line-height: 1;
        }
        select:invalid {
    color: #495057 !important;
    font-weight: 500;
}
@media only screen and (max-width: 767px) {
.school-edit-form .right-sec  {
    padding-left: 1rem !important;
    padding-right:1rem !important;
}
    .school-edit-form .left-sec  {
    padding-left: 1rem !important;
    padding-right:1rem !important;
}
}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{url('public/js/custome.js')}}"></script>
    <script>
        function previewFile() {
            var preview = document.querySelector('img');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
        $(function () {
            $('#profile-image1').on('click', function () {
                $('#profile-image-upload').click();
            });
        });
    </script>
    <script>
        (function () {
            //add rows when add button is clicked
            $(document).on('click', '.js-add--exam-row', function (e) {
                var clone, examsList;
                e.preventDefault();
                examsList = $('#form-exams-list');
                clone = examsList.children('.form-group:first').clone(true);
                clone.append($('<button>').addClass('btn btn-danger js-remove--exam-row').html(
                    '<i class="fa fa-times" aria-hidden="true"></i>'));
                //reset values in cloned inputs and
                //add enumerated ID's to input fields
                clone.find('input').val('').attr('id', function () {
                    return $(this).attr('id') + '_' + (examsList.children('.form-group').length +
                        1);
                });
                return examsList.append(clone);
            });

            //remove rows when remove button is clicked
            $(document).on('click', '.js-remove--exam-row', function (e) {
                e.preventDefault();
                return $(this).parent().remove();
            });

        }).call(this);
    </script>


    <!-------- script for serach  ----------->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>
$(document).ready(function() {

   //material contact form
   $('.contact-form').find('.form-control').each(function() {
       var targetItem = $(this).parent();
       if ($(this).val()) {
           $(targetItem).find('label').css({
               'top': '10px',
               'fontSize': '14px'
           });
       }
   })
   $('.contact-form').find('.form-control').focus(function() {
       $(this).parent('.input-block').addClass('focus');
       $(this).parent().find('label').animate({
           'top': '10px',
           'fontSize': '14px'
       }, 300);
   })
   $('.contact-form').find('.form-control').blur(function() {
       if ($(this).val().length == 0) {
           $(this).parent('.input-block').removeClass('focus');
           $(this).parent().find('label').animate({
               'top': '25px',
               'fontSize': '18px'
           }, 300);
       }
   })

});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('form').on('click', '.remove_field', function () {
            $(this).parent().parent().remove();
        });
        $('.addmore_img').click(function () {
            $('.portfolioimgdiv:last').after(
                '<div class="form-group portfolioimgdivnext width100"><div class="upload-demo col-lg-12"><img alt="your image" class="portimg" src="#"></div><div class="socialmediaside2"><div class="form-group hirehide is-empty is-fileinput width100 martop10"><input class="fileUpload" accept="image/jpeg, image/jpg" name="gallery[]" type="file" value="Choose a file"><div class="input-group"></div></div></div><div class="removebtnimg"><button type="button" class="btn  btn-sm remove_field"><span class="glyphicon glyphicon-trash">Remove</span></button></div></div>'
            );
        });


        function readURL() {
            var $input = $(this);
            var $newinput = $(this).parent().parent().parent().find('.portimg ');
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    reset($newinput.next('.delbtnmrg26'), true);
                    $newinput.attr('src', e.target.result).show();
                    $newinput.after(
                        ' '
                    );
                }
                reader.readAsDataURL(this.files[0]);
            }
        }

        $("form").on('change', '.fileUpload', readURL);
        $("form").on('click', '.delbtnmrg26', function (e) {
            reset($(this));
        });

        function reset(elm, prserveFileName) {
            if (elm && elm.length > 0) {
                var $input = elm;
                $input.prev('.portimg').attr('src', '').hide();
                if (!prserveFileName) {
                    $($input).parent().parent().find('input.fileUpload').val("");
                    $($input).parent().parent().find('.input-group').find('input#uploadre').val("");
                }
                elm.remove();
            }
        }
    </script>
  <script>
        $('form').on('click', '.remove_field-1', function () {
            $(this).parent().parent().remove();
        });
        $('.addmore_img-1').click(function () {



            $('.portfolioimgdiv-1:last').after(
                '<div class="form-group portfolioimgdiv-1next width100"><div class="upload-demo col-lg-12"><video alt="your image" class="portimg-1" src="#"></video></div><div class="socialmediaside2"><div class="form-group hirehide is-empty is-fileinput width100 martop10"><input class="fileUpload" accept="video/mp4" name="videos[]" type="file" value="Choose a file"><div class="input-group"></div></div></div><div class="removebtnimg"><button type="button" class="btn  btn-sm remove_field-1"><span class="glyphicon glyphicon-trash">Remove</span></button></div></div>'
            );
        });


        function readURL() {
            var $input = $(this);
            var $newinput = $(this).parent().parent().parent().find('.portimg-1 ');
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    reset($newinput.next('.delbtnmrg26'), true);
                    $newinput.attr('src', e.target.result).show();
                    $newinput.after(
                        ''
                    );
                }
                reader.readAsDataURL(this.files[0]);
            }
        }

        $("form").on('change', '.fileUpload', readURL);
        $("form").on('click', '.delbtnmrg26', function (e) {
            reset($(this));
        });

        function reset(elm, prserveFileName) {
            if (elm && elm.length > 0) {
                var $input = elm;
                $input.prev('.portimg-1').attr('src', '').hide();
                if (!prserveFileName) {
                    $($input).parent().parent().find('input.fileUpload').val("");
                    $($input).parent().parent().find('.input-group').find('input#uploadre').val("");
                }
                elm.remove();
            }
        }
    </script>



<script>

$(function(){
    $('#course_id').change(function()
    {

        var id=$(this).val();


        $.ajax({
            type:"POST",
            dataType : "json",
            url:'get_subcat',
            data: { 'id': id,_token:'{{csrf_token()}}'},
            success: function(data)
            {


               $("#sub_cat").html(data);
            }
         });
     });
});
</script>
<script>
  document.querySelector('#push').onclick = function(){
      
    if(document.querySelector('#newtask input').value.length == 0){
        alert("Kindly Enter facilities!!!!")
    }

    else{
       
        document.querySelector('#tasks').innerHTML += `
         <div class='col-md-4 mb-3'  style='display:flex; align-items:center'>  <input type='text'name='Facilities[]' class='form-control' id="taskname" style='border-radius: 3px 0px 0px 3px;' value="${document.querySelector('#newtask input').value}"><i class='fa fa-times  delete btn btn-sb js-remove-exam' style='border-radius: 0px 3px 3px 0px; background:#FF4005' aria-hidden='true'></i></div>
        `;
  document.getElementById('textfield1').value = "";
        var current_tasks = document.querySelectorAll(".delete");
        for(var i=0; i<current_tasks.length; i++){
            current_tasks[i].onclick = function(){
                this.parentNode.remove();
            }
        }
    }
}

</script>

// 	end




    </body>



</html>
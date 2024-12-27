<?php
//echo"hi";exit();
?>
@extends('admin.layout.master')
@section('content')

<div class="row align-items-center mb-30 justify-content-between">
	<div class="col-sm-6">
		<h6>{{$title}}</h6>
		@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
 
</div>
@endif
  @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach


	</div>
	<div class="col-sm-12 text-right">
	    	<!--<button type="button" class="btn-sm btn-primary mybtn" data-toggle="modal" data-target=".bd-example-modal-sm" data-link="4">Add</button>-->
		<a href="/add_prod"><button type="button" class="btn-sm btn-primary mybtn" >Add New</button></a> 
	</div>
	

</div>



<!-- Modal -->














				        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl  ">
    <div class="modal-content container school-edit-form">

            <section class="my-acc-home form-school">
          
                <div class="box-my-acc school-form-box">
                    <div class="container">
                    <form action="{{route('institute_datastore')}}" method="post" enctype="multipart/form-data">
                    @csrf
<input type="hidden"  name="cat" value="{{$_GET['cat']}}">
                            <div class="row">
                                   <h4 class="edit-form-text">Vendor Details</h4>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group">
                                        <label>User Name
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
                                <div class="col-md-6  ">
                                    <div class="edit-form-right">
                                    <label>Main image</label>
                                    <div class="profile-pic">

                                        <img alt="User Pic"
                                            src="{{url('public/images/upload-pic.png')}}"
                                            id="profile-image1" height="200" class="img">
                                        <input class="hidden" type="file"
                                            onchange="previewFile()"  name="photo" id="profile-image-upload" >


                                    </div> </div>
                                
                                </div>


                            </div>
                            <div class="row">
                                  <h4 class="edit-form-text">Institute Details</h4>
                                    
                                <div class="col-md-6 left-sec">
                                  
                                            
                                                
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

                                    </div>  </div>
 <div class="col-md-6 left-sec">
                                  
                                        <div class="form-group">
                                        <label>Address</label><span style="color:red">&nbsp;*</span>
                                        <textarea class="form-control" placeholder="" name="address"
                                        value="{{old('address')}}" required></textarea>
                                        </div>
                                    <div class="form-group">
                                        <label>Phone</label><span style="color:red">&nbsp;*</span>
                                        <input type="text" class="form-control" id="mob_no_mother" placeholder="" name="u_phone" required>

                                    </div>
                                     <div class="form-group">
                                        <label>Email</label><span style="color:red">&nbsp;*</span>
                                        <input type="email" class="form-control" placeholder="" name="email" required>

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
                                        @if(($_GET['cat']==="pc")||($_GET['cat']==="ug"))
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
                                        <label>Average minumum fee per year</label><span style="color:red">&nbsp;*</span>
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
                                                <label>Other fee  </label>
                                                <input type="number" class="form-control" placeholder="" name="other_fees" >

                                            </div>
                                        </div>
                                    </div>
                                    


                                </div>
                            </div>

                            <div class="row">
                                 @if(($_GET['cat']=="s"))
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
                                        <label>Average Seats per class

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
                                         @if(($_GET['cat']=="s"))
                                        <label for="browser">School Timing</label><span style="color:red">&nbsp;*</span>
                                        @else
                                 <label for="browser">Institute Timing</label><span style="color:red">&nbsp;*</span>
                                 @endif
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
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="edit-form-text">Academic Achievements</h4>
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
                                </div>
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
                                #tasks i{
                                height: 100%;
    line-height: 1.8;}
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
                                                        <video alt="your image" class="portimg-1" src="#"></video>

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
                                        
                                        <button type="submit" class=" btn btn-sb sign-up-btn" id="submit">
                                             @if(($_GET['cat']=="s"))
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
        				</div>
        		
               
	<div class="row">
		<div class="col-md-12">
        <div class="card mt-3 mb-3 pl-3 pr-3 py-3">
            <h4 style="color: #FF4C00!important;" class="mb-3">Search <i class="fa fa-search" aria-hidden="true"></i>
            &nbsp;<p style="color:black;">(Applicable only for approved institutions)</p></h4>
         
                <form action="{{url('ins_search')}}" >
                <input type="hidden"  name="cat" value="{{$_GET['cat']}}">
                <div class="row">
                <div class="col-md-3">
         <select class="form-control" name="type">
                <option value="1">Institution name</option>
                <option  value="2">Phone number</option>
                <option  value="3">Email</option>
                <option  value="4">Premium member</option>
                <option  value="5">Membership cancelled </option>
                <option  value="6">Premium request</option>
                <option  value="7">Non premium members</option>
            </select></div>
            <div class="col-md-3"> <input type="text" class="form-control" value="{{$keyword}}" name="keyword" placeholder="Keyword"></div>
            <div class="col-md-3">   <input type="submit"class="btn-sm btn-primary" class="btn-sm btn-primary" value="Search">&nbsp;
  

    
    <input type="submit" name="submit" class="btn-sm btn-primary" value="Reset"> 
    </div>      </div>
                
      
        </div>
        <style>

.card .nav-link {
    display: block;
    padding: 0.5rem 1rem;
    color: #000;
    font-weight:600;
    text-decoration: none;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
}
.card .nav-tabs {
    border-bottom: 1px solid #fff;
}
.nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
     border-color: #fff #fff #fff #fff;
     color:#FF4005;
}
.card .nav-tabs .nav-link.active {
    color: #fff;
    background-color: #FF4005;
    border-color: #fff;
}
.btn-sb{
background: #FF2E00;
    color: white}
 </style>
				
        <!-- search end -->

        <?php
$k=1;
$a=$b=$c=0;
if(isset($_GET['tab']))
{
    $k=$_GET['tab'];
}
if($k==1)
{
$a="active";
}
else if($k==2)
{
    $b="active";
}
else if($k==3)
{
    $c="active";
}


// print_r($a);die();
?>

<input type="hidden" id="tabid" value="{{$k}}" name="tab">

			<div class="card">
				<div class="card-body p-5">
                <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="tab nav-item nav-link {{$a}}" data-val="1" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">New Registration</a>
    <a class="tab nav-item nav-link {{$b}}"  data-val="2" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Approved</a>
    <a class="tab nav-item nav-link {{$c}}"  data-val="3"id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Rejected</a>
  </div>
  </form>
</nav>
<div class="tab-content" id="nav-tabContent">   <!-- 1st tab -->
  <div class="tab-pane fade show {{$a}}" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">	<div class="table-responsive">-
		              <table class="table">
		                  <thead>
		                    <tr>
                            <th scope="col">@lang('ID')</th>
                          
		                      <th scope="col">@lang('Institution Name')</th>
		                      <th scope="col">@lang('Address')</th>
		                     
		                      
		                      <th scope="col">@lang('Date')</th>
                             
		                      <th scope="col">@lang('Action')</th>
		                      
		                    </tr>
		                  </thead>
		                  <tbody class="cur-body">
		                  	@forelse($institute as $i)
		                  		<tr>
                                 <td>{{$loop->iteration }}</td>
                                  
		                  			<td>{{ __($i->name) }}</td>
		                  		    <td style="white-space:initial">{{ __($i->city) }},{{ __($i->state) }}</td>
		                  		    <td> {{date('d-m-y',strtotime($i->created_at))}}</td>
		                  			<!--<td>{{ __($i->ownership) }}</td>-->
		                  			
		                  			<!--@if($i->photo=="" || $i->photo==0)-->
		                  			<!--<td>      <img src="{{('public/images/Artboard2.jpg') }}" height="250px" width="150px" style="height:150px;width:150px" alt="Image"></td>-->
		                  			<!--@else-->
		                  		 <!--<td><img src="{{url('public/images').'/'.$i->photo}}" height="250px" width="150px" style="height:150px;width:150px"></td>-->
                       <!--               @endif-->
                                  
		                  			<td>
                                      <a href="{{route('display_institution',$i->id) }}?cat={{$_GET['cat']}}"  >
		                  			
                                      <i class="fa fa-eye"   style="font-size:20px; color:#32CD32;margin-right:5px" ></i>
                                          </a>  &nbsp;&nbsp;


		                  				<a href="{{route('institution_edit',$i->id) }}?cat={{$_GET['cat']}}" ><i class="fas fa-pencil-alt" 
                                                        style="font-size:20px; color: #000000;margin-right:5px"></i></a>
		                  				<i class="fa-solid fa-trash-can"></i>&nbsp;&nbsp;
		                  		<a href="{{ route('institution_destroy',$i->id) }}?cat={{$_GET['cat']}}""   title="Delete the item" onclick="return confirm('Are you sure you want to delete this item?');">
		                  			
                                  <i class="fa fa-trash"     style="font-size:20px; color:#FF0000;margin-right:5px"></i>
		                  			</a>
                                      
                                          <!-- <a href="{{ route('institution_destroy',$i->id) }}" class="btn btn-danger btn-sm"  title="Delete the item" onclick="return confirm('Are you sure you want to delete this item?');">
		                  			
                                      <i class="fa fa-trash"></i>
                                          </a> -->
                                </td>
		                  		</tr>
		                  	@empty
		                  		<tr>
		                  			<td class="text-center" colspan="100%">@lang('Data not found')</td>
		                  		</tr>
		                  	@endforelse
		                  </tbody>
		              </table>
                      <div class="card-footer clearfix">
                       
                        </div>
		          </div></div>   <!-- 2rd tab -->
  <div class="tab-pane fade show {{$b}}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">	<div class="table-responsive">-
		              <table class="table" >
		                  <thead>
		                    <tr>
                            <th scope="col">@lang('ID')</th>
                            <th scope="col">@lang('Premium membership')</th>
		                      <th scope="col">@lang('Institution Name')</th>
		                      <th scope="col">@lang('Address')</th>
		                      
		                      
		                      <th scope="col">@lang('Date')</th>
                              <th scope="col">@lang('Status')</th>
		                      <th scope="col">@lang('Action')</th>
		                      
		                    </tr>
		                  </thead>
		                  <tbody class="cur-body">
                            <?php
                            $k=0;
                            ?>
                          @forelse($instituteapp as $i)
                          <?php
$k++;
                          ?>
		                  		<tr>
                                  <td>{{ $instituteapp->firstItem() + $loop->index }}</td>
                                  <td>
                                    @if($i->premium==0)
                                   
                                    @elseif($i->premium==1)
                                    <!--<button class="btn-sm btn-success">Premium memberhh</button>-->
                                    <button type="button"  data-toggle="modal" data-target="#a{{$loop->iteration}}" class="btn-sm btn-success"><i class="feather icon-edit"></i>Premium member</button>
                                  
                                    
                                    <div class="modal fade" id="a{{$loop->iteration}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">{{ __($i->name) }}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        </div>
        <div class="modal-body">
          
          <form action="{{url('ins_premium_update')}}" method="get">
		@csrf
		<label></label>
		<input type="hidden" value="{{$_GET['cat']}}" name="cat">
		<input type="hidden" value="{{$i->id}}" name="id">
		<select class="form-control" name="action">
			<option value="-4">Cancel</option>
		
		</select>
		<br>
		
		
	  
      </div>
      <div class="modal-footer">
	  <button type="submit" class="btn btn-primary ">Update</button>
       
        </form>
        </div>
        
      </div>
      
    </div>
  </div>
                                    
                                    @elseif($i->premium==-2)
                                    

                                    
                                                        <!---->
                                                        
                                                     

  <!-- Trigger the modal with a button -->
  <button type="button"  data-toggle="modal" data-target="#d{{$loop->iteration}}" class="btn btn-warning"><i class="feather icon-edit"></i>request</button>

  <!-- Modal -->
  <div class="modal fade" id="d{{$loop->iteration}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">{{ __($i->name) }}</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        </div>
        <div class="modal-body">
          
          <form action="{{url('ins_premium_update')}}" method="get">
		@csrf
		<label></label>
		<input type="hidden" value="{{$_GET['cat']}}" name="cat">
		<input type="hidden" value="{{$i->id}}" name="id">
		<select class="form-control" name="action">
			<option value="1">Approved</option>
			<option value="-4">Rejected</option>
		</select>
		<br>
		
		
	  
      </div>
      <div class="modal-footer">
	  <button type="submit" class="btn btn-primary " >Update</button>
       
        </form>
        </div>
        
      </div>
      
    </div>
  </div>
  
  
  
  
  
</div>




                                                        
                                                        <!---->
                                                        
                                                        

                                    @elseif($i->premium==-3)
                                    <button class="btn-sm btn-danger">Rejected</button>
                                    @elseif($i->premium==-4)
                                     <button class="btn-sm btn-primary">Membership Canceled</button>
                                    @endif
                                  </td>
		                  			<td>{{ __($i->name) }}</td>
		                  		    <td style="white-space:initial">{{ __($i->city) }},{{ __($i->state) }}</td>
		                  			
<!--		                  				@if($i->photo=="" || $i->photo==0)-->
<!--		                  			<td>      <img src="{{('public/images/Artboard2.jpg') }}" height="250px" width="150px" style="height:150px;width:150px" alt="Image"></td>-->
<!--		                  			@else-->
<!--		                  		 <td><img src="{{url('public/images').'/'.$i->photo}}" height="250px" width="150px" style="height:150px;width:150px"></td>-->
<!--@endif-->

 <td> {{date('d-m-y',strtotime($i->created_at))}}</td>
                                   <td>
									  <input data-id="{{$i->id}}" class="toggle-class" type="checkbox"
                                    data-onstyle="success" data-style="ios"
                                    data-offstyle="danger" data-toggle="toggle"  data-on="&#10003;" data-off="&#x2716;"
                                    {{$i->enable ? 'checked':''}}>

                                  </td>
		                  			<td>
                                      <a href="{{route('display_institution',$i->id) }}?cat={{$_GET['cat']}}"" >
		                  			
                                      <i class="fa fa-eye" style="font-size:20px; color:#32CD32;margin-right:5px"></i>
                                          </a>  &nbsp;&nbsp;


		                  				<a href="{{route('institution_edit',$i->id) }}?cat={{$_GET['cat']}}"" ><i class="fas fa-pencil-alt" 
                                                        style="font-size:20px; color: #000000;margin-right:5px"></i></a>
		                  				<i class="fa-solid fa-trash-can"></i>&nbsp;&nbsp;
		                  		<a href="{{ route('institution_destroy',$i->id) }}?cat={{$_GET['cat']}}"" title="Delete the item" onclick="return confirm('Are you sure you want to delete this item?');">
		                  			
                                  <i class="fa fa-trash" style="font-size:20px; color:#FF0000;margin-right:5px"></i>
		                  			</a>
                                      
                                          <!-- <a href="{{ route('institution_destroy',$i->id) }}" class="btn btn-danger btn-sm"  title="Delete the item" onclick="return confirm('Are you sure you want to delete this item?');">
		                  			
                                      <i class="fa fa-trash"></i>
                                          </a> -->
                                </td>
		                  		</tr>
		                  	@empty
		                  		<tr>
		                  			<td class="text-center" colspan="100%">@lang('Data not found')</td>
		                  		</tr>
		                  	@endforelse
		                  </tbody>
		              </table>
                      <div class="card-footer">
					{{ $instituteapp->links() }}
			 	</div>
		          </div></div>


                  <!-- 3rd tab -->
  <div class="tab-pane fade  show {{$c}}" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">	<div class="table-responsive">-
		              <table class="table">
		                  <thead>
		                    <tr>
                            <th scope="col">@lang('ID')</th>
		                      <th scope="col">@lang('Institution Name')</th>
		                      <th scope="col">@lang('Address')</th>
		                    
		                    
		                      <th scope="col">@lang('Date')</th>
                             
		                      <th scope="col">@lang('Action')</th>
		                      
		                    </tr>
		                  </thead>
		                  <tbody class="cur-body">
                          @forelse($institutereg as $i)
		                  		<tr>
                                 <td>{{$loop->iteration }}</td>
		                  			<td>{{ __($i->name) }}</td>
		                  		    <td style="white-space:initial">{{ __($i->city) }},{{ __($i->state) }}</td>
		                  		
<!--		                  				@if($i->photo=="" || $i->photo==0)-->
<!--		                  			<td>      <img src="{{('public/images/Artboard2.jpg') }}" height="250px" width="150px" style="height:150px;width:150px" alt="Image"></td>-->
<!--		                  			@else-->
<!--		                  		 <td><img src="{{url('public/images').'/'.$i->photo}}" height="250px" width="150px" style="height:150px;width:150px"></td>-->
<!--@endif-->
                                   <td> {{date('d-m-y',strtotime($i->created_at))}}</td>
		                  			<td>
                                      <a href="{{route('display_institution',$i->id) }}?cat={{$_GET['cat']}}" >
		                  			
                                      <i class="fa fa-eye"  style="font-size:20px; color:#32CD32;margin-right:5px"></i>
                                          </a>  &nbsp;&nbsp;


		                  				<a href="{{route('institution_edit',$i->id) }}?cat={{$_GET['cat']}}" ><i class="fas fa-pencil-alt" 
                                                        style="font-size:20px; color: #000000;margin-right:5px"></i></a>
		                  				<i class="fa-solid fa-trash-can"></i>&nbsp;&nbsp;
		                  		<a href="{{ route('institution_destroy',$i->id) }}?cat={{$_GET['cat']}}" title="Delete the item" onclick="return confirm('Are you sure you want to delete this item?');">
		                  			
                                  <i class="fa fa-trash"  style="font-size:20px; color:#FF0000;margin-right:5px"></i>
		                  			</a>
                                      
                                          <!-- <a href="{{ route('institution_destroy',$i->id) }}" class="btn btn-danger btn-sm"  title="Delete the item" onclick="return confirm('Are you sure you want to delete this item?');">
		                  			
                                      <i class="fa fa-trash"></i>
                                          </a> -->
                                </td>
		                  		</tr>
		                  	@empty
		                  		<tr>
		                  			<td class="text-center" colspan="100%">@lang('Data not found')</td>
		                  		</tr>
		                  	@endforelse
		                  </tbody>
		              </table>
                      <div class="card-footer">
					
			 	</div>
		          </div></div>
</div>
				
		          </div>
				
			 	</div>
			</div>
			</div>













<style>
    .card-footer nav{
        /* display: flex;
    flex-direction: row-reverse;
    justify-content: space-between; */
    }
    
    *[class*="bg"] {
    color: initial !important;
}

.card-footer nav{
        /* display: flex;
    flex-direction: row-reverse;
    justify-content: space-between; */
    }
    
    *[class*="bg"] {
    color: initial !important;
}form .socialmediaside2 input {
    border: none !important;
    margin-top: 1rem;
    width: 1%;
}

      .socialmediaside2 .form-group{
            width: 185px;
        }
         form img.portimg,   form video.portimg-1 {
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
            margin-top:10px;
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

        button.remove_field,   button.remove_field-1  {
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
    padding: 6px 19px;
    width: 120px;
    height: 35px;
    line-height: 1;
        }
        .table thead th, .table tbody td {
    text-align: left;
    padding: 13px 10px;
}
</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
                function previewFile() {
            var preview = document.querySelector('.img');
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

<script>
        jQuery(document).ready(function () {
  ImgUpload1();
});

function ImgUpload1() {
  var imgWrap1 = "";
  var imgArray1 = [];

  $('.upload__inputfile-1').each(function () {
    $(this).on('change', function (e) {
      imgWrap1 = $(this).closest('.upload__box-1').find('.upload__img-wrap-1');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('video.*')) {
          return;
        }

        if (imgArray1.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray1.length; i++) {
            if (imgArray1[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray1.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box-1'><div style='background-image: url(public/images/upload-video.png)' data-number='" + $(".upload__img-close-1").length + "' data-file='" + f.name + "' class='img-bg-1'><div class='upload__img-close-1'></div></div></div>";
              imgWrap1.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close-1", function (e) {
    var file1 = $(this).parent().data("file");
    for (var i = 0; i < imgArray1.length; i++) {
      if (imgArray1[i].name === file1) {
        imgArray1.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
    </script>
 
 <script>
    jQuery(document).ready(function () {
ImgUpload();
});

function ImgUpload() {
var imgWrap = "";
var imgArray = [];

$('.upload__inputfile').each(function () {
$(this).on('change', function (e) {
  imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
  var maxLength = $(this).attr('data-max_length');

  var files = e.target.files;
  var filesArr = Array.prototype.slice.call(files);
  var iterator = 0;
  filesArr.forEach(function (f, index) {

    if (!f.type.match('image.*')) {
      return;
    }

    if (imgArray.length > maxLength) {
      return false
    } else {
      var len = 0;
      for (var i = 0; i < imgArray.length; i++) {
        if (imgArray[i] !== undefined) {
          len++;
        }
      }
      if (len > maxLength) {
        return false;
      } else {
        imgArray.push(f);

        var reader = new FileReader();
        reader.onload = function (e) {
          var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
          imgWrap.append(html);
          iterator++;
        }
        reader.readAsDataURL(f);
      }
    }
  });
});
});

$('body').on('click', ".upload__img-close", function (e) {
var file = $(this).parent().data("file");
for (var i = 0; i < imgArray.length; i++) {
  if (imgArray[i].name === file) {
    imgArray.splice(i, 1);
    break;
  }
}
$(this).parent().parent().remove();
});
}
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

<script>

    $(function(){
        $('.toggle-class').change(function()
        {
            var enable = $(this).prop('checked') == true ? 1:0;
            var id = $(this).data('id');
            $.ajax({
                type:"GET",
                dataType : "json",
                url:'institutionstatus',
                data: {'enable':enable, 'id': id},
                success: function(data)
                {
                    console.log(data.success)
                }
            });
        });
    });
   

    $(function(){
        $('.tab').click(function()
        {
            var id=($(this).attr("data-val"));
          $("#tabid").val(id);
        //  alert(id)
        });
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
                '<div class="form-group portfolioimgdiv-1next width100"><div class="upload-demo col-lg-12"><video alt="your image" class="portimg-1" src="#"></video></div><div class="socialmediaside2"><div class="form-group hirehide is-empty is-fileinput width100 martop10"><input class="fileUpload" accept="video/mp4" name="profilepic[]" type="file" value="Choose a file"><div class="input-group"></div></div></div><div class="removebtnimg"><button type="button" class="btn  btn-sm remove_field-1"><span class="glyphicon glyphicon-trash">Remove</span></button></div></div>'
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
        $(function() {
            $('#email').keyup(function() {

                 var email = $(this).val();
                  var id = $(this).attr("data-id");
            // alert(id)

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: 'get_user_email',
                    data: {
                        'id': id,
                        'email':email,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(data) {
                                 if(data==1)
                                 {

                                     $("#email_msg").html("Email already taken");
                                     
                                       $("#submit").attr("disabled", true);
                                 }
                                 else
                                 {
                                     $("#email_msg").html("");
                                      $("#submit").attr("disabled", false);
                                 }
                    }
                });
            });
        });
    </script>
<script>
        $(function() {
            $('#submit').click(function() {

                 var id = $("#email").val();
              
               
             //   var  data-id = $(this).attr('data-id');

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: 'get_user_email',
                    data: {
                        'id': id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(data) {
                                 if(data==1)
                                 {
alert("email already exist");
                                     $("#email_msg").html("Email already taken");
                                     return false;
                                     
                                 }
                                 else
                                 {
                                     $("#email_msg").html("");
                                 }
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
        
        
    
      
   
      
      
       
      
             
             
        
    //   }
       
         
             
         

});
    </script>

      <script>
           
         $( ".sign-up-btn" ).click(function() {
      //mob_no_fathet----father
       //mob_no_mother----mother
        if(document.getElementById('mob_no_fathet').value.length == 0 || document.getElementById('mob_no_fathet').value.length < 10 || document.getElementById('mob_no_fathet').value.length > 10){
             alert("Please Enter Valid User Phone Number "); 
         return false;
           
      }
       else if (document.getElementById('mob_no_mother').value.length == 0 || document.getElementById('mob_no_mother').value.length < 10  || document.getElementById('mob_no_mother').value.length > 10) {
             alert("Please Enter Valid Institute Phone Number"); 
              return false;
         }
           
        
   
         
         });
      </script>
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
  
	@push('js')

@endpush
@endsection

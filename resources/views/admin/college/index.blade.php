@extends('admin.layout.master')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />


<div class="row align-items-center mb-30 justify-content-between">
	<div class="col-sm-6">
		<h6>Colleges</h6>
	</div>
	<div class="col-sm-6 text-right">
		<button type="button" class="btn-sm btn-primary mybtn" data-toggle="modal" data-target=".bd-example-modal-sm" data-link="4">Add New</button>
	</div>
</div>
				        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl  ">
    <div class="modal-content container school-edit-form">
	<form action="{{route('college_storedata')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                                <div class="col-md-6">
                                    
                                             
                                <div class="form-group">
                                     <label for="" class="mobile-label mt-3">Type of Institute</label>
                                     <select name="type" class="form-control" >
                                                            <option>--Select One--</option>
                                                            <option value="college_pu">pu-junior college</option>
                                                            <option value="college_pc">polytechnic college</option>
                                                            <option value="college_ug">UG_PG college</option>
                                                        </select>
                                  </div>
                                  
                                    <div class="form-group">
                                    <label for="" class="mobile-label">User Name</label>
                                    <input type="name" id="phone" class="form-control" name="user_name">
                                    </div>
                                    
                                    
                                 <div class="form-group">
                                    <label for="" class="mobile-label"> Enter Email Address</label>
                                    <input type="email" id="phone" class="form-control" name="email">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label>Institution Name
                                          <!--<span style="color:red">&nbsp;*</span>-->
                                        </label>
                                        <input type="text" class="form-control" placeholder="" name="name" required>

                                    </div>
                                    
                                    
                                    

                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" placeholder="" name="city" required>

                                    </div>

                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-control" placeholder="" name="state" required>

                                    </div>

                                    
                                </div>
                                <div class="col-md-6  edit-form-right">
                                    <label>Profile Logo</label>
                                    <div class="profile-pic">

                                        <img alt="User Pic"
                                            src="{{url('public/images/upload-pic.png')}}"
                                            id="profile-image1" height="200" class="img">
                                        <input class="hidden" type="file"
                                            onchange="previewFile()"  name="photo" id="profile-image-upload" required>


                                    </div>
                                </div>


                            </div>

                            <div class="row">
                               
                                <div class="col-md-6 right-sec">
                                    <h4 class="edit-form-text">Fee Structure</h4>

                                    <div class="form-group">
                                        <label>Average fee per year</label>
                                        <input type="text" class="form-control" placeholder="" name="cost" required>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hostel fee per year </label>
                                                <input type="text" class="form-control" placeholder="" name="m_fees" required>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 left-sec">
                                    <h4 class="edit-form-text">Courses Offered </h4>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Classes/Courses</label>


                                                <select class="form-control" name="c_offered"   id="course_id" required>
        							<option value="">@lang('Select One')</option>
                                    @foreach ($courses as $c)
                                            <option value="{{$c->id }}"> 
                                                {{ $c->name }} 
                                            </option>
                                        @endforeach    
        						
        						</select>
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Academic streams </label>

                                                <select class="form-control" name="a_session" id="sub_cat"  >
        							<option value="">@lang('Select category')</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  
                                         </select>
        						
        						
        						
                                               

                                            </div>

                                        </div>


                                    </div>




                                </div>
                                <div class="col-md-6 right-sec">
                                    <h4 class="edit-form-text"> Admission Dates</h4>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date </label>
                                                <input type="date" class="form-control" placeholder="" name="start_date" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End Date </label>
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

                                        </label>
                                        <select class="form-control" name="eligibility" required>
                                            <option>Select One</option>
                                            <option value="On-Merit">On Merit</option>
                                            <option value="Entrance-Test">Entrance Test</option>
                                            
                                        </select>


                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Minimum  marks(%) required</label>

                                        
                                        <input type="text" class="form-control" placeholder="" name="marks" required>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Seats

                                        </label>
                                        <input type="text" class="form-control" placeholder=""  name="seats" required>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Hostel Accomodation</label>
                                        <input type="text" class="form-control" placeholder=""  name="test" required>
                                        

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Student Interaction

                                        </label>
                                        <select class="form-control"  name="s_interaction" required>
                                            <option>Select One</option>
                                            <option value="Online">Online</option>
                                            <option value="At-Office">At Office</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Parents Interaction  </label>
                                      <select class="form-control" name="p_interaction" required>
                                        <option>Select One</option>
                                            <option value="Online">Online</option>
                                            <option value="At-Office">At Office</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Form Availablity </label>
                                       
                                       <select class="form-control" name="form_availibility" required>
                                        <option>Select One</option>
                                            <option value="Online">Online</option>
                                            <option value="At-Office">At Office</option>
                                        </select>

                                    </div>
                                        
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Addmission Fee Payment</label>
                                        <select class="form-control" name="form_payment" required>
                                        <option>Select One</option>
                                            <option value="Online">Online</option>
                                            <option value="At-Office">At Office</option>
                                        </select>
                                     
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>School Timing

                                        </label>
                                       
                                        <input list="browsers"  id="browser"class="form-control" name="school_time" required>

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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Office Timing

                                        </label>
                                        <input list="browsers1"  id="browser1"class="form-control" name="office_time" required>
                                        <datalist id="browsers1">
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
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="edit-form-text">Academic Achievements</h4>
                                    <div class="form-group">
                                        <label>Awards

                                        </label>
                                        <textarea class="form-control" rows="4" name="awards" required>

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

                                                        <input type="text" id="exam" placeholder="Student Name" name="student_name[]" required/><br>

                                                        <input type="text" id="exam_date" placeholder="Decription" name="student_description[]" required />
                                                    </div>
                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="edit-form-text">Faciliies</h4>
                                    <div class="row faciliti-sec">
                                        <div class="col-md-2 ">
                                        <label>Class</label>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineCheckbox1">AC Classes</label>

                                                <input type="checkbox" id="check1" name="class[]" value="ACClasses" >
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineCheckbox1">Smart
                                                    Classes</label>

                                                <input type="checkbox" id="check1" name="class[]" value="SmartClasses" >

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Infrastructure</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label"
                                                        for="inlineCheckbox1">Auditorium</label>
                                                    <input type="checkbox" id="check1" name="infrastructure[]" value="Auditorium">

                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineCheckbox1">Library
                                                        Room</label>
                                                    <input type="checkbox" id="check1" name="infrastructure[]" value="LibraryRoom">
                                                        
                                                </div>
                                            </div>

                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineCheckbox1">Canteen
                                                    </label>

                                                    <input type="checkbox" id="check1" name="infrastructure[]" value="Canteen">

                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label"
                                                        for="inlineCheckbox1">Playground</label>

                                                    <input type="checkbox" id="check1" name="infrastructure[]" value="Playground">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label>
                                                Safety & Security</label>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineCheckbox1">CCTV
                                                </label>
                                                <input type="checkbox" id="check1" name="security[]" value="CCTV">


                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <label>
                                                Lab</label><br>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineCheckbox1">Computer Lab
                                                </label>
                                                <input type="checkbox" id="check1" name="lab[]" value="ComputerLab">

                                                <label class="form-check-label" for="inlineCheckbox1">Science Lab
                                                </label>

                                                <input type="checkbox" id="check1" name="lab[]" value="ScienceLab">
                                                <label class="form-check-label" for="inlineCheckbox1">Robotics Lab
                                                </label>

                                                <input type="checkbox" id="check1" name="lab[]" value="RoboticsLab">

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row faciliti-sec">
                                        <div class="col-md-12 ">
                                            <label>Extra Activities</label><br>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineCheckbox1">Art &
                                                    craft</label>

                                                <input type="checkbox" id="check1" name="activities[]" value="Art&craft">
                                                    
                                                <label class="form-check-label" for="inlineCheckbox1">Dance</label>

                                                <input type="checkbox" id="check1" name="activities[]" value="Dance">
                                                <label class="form-check-label" for="inlineCheckbox1">Debets</label>

                                                <input type="checkbox" id="check1" name="activities[]" value="Debets">
                                                <label class="form-check-label" for="inlineCheckbox1">Dramas</label>

                                                <input type="checkbox" id="check1" name="activities[]" value="Dramas">
                                                <label class="form-check-label" for="inlineCheckbox1">Annual
                                                    Functions</label>

                                                <input type="checkbox" id="check1" name="activities[]" value="AnnualFunctions">
                                                  
                                                <label class="form-check-label" for="inlineCheckbox1">Painting
                                                    Competetions</label>

                                                <input type="checkbox" id="check1" name="activities[]" value="PaintingCompetetions">
                                                   
                                                <label class="form-check-label" for="inlineCheckbox1">Picnic &
                                                    excursion</label>

                                                <input type="checkbox" id="check1" name="activities[]" value="Picnic&excursion">
                                                   
                                            </div>

                                        </div>



                                    </div>
                                    <div class="row faciliti-sec">
                                        <div class="col-md-12 ">
                                            <label>Sports Activities</label><br>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineCheckbox1">Karate</label>

                                                <input type="checkbox" id="check1" name="s_activities[]" value="Karate">
                                                <label class="form-check-label" for="inlineCheckbox1">Yoga</label>

                                                <input type="checkbox" id="check1" name="s_activities[]" value="Yoga">
                                                <label class="form-check-label" for="inlineCheckbox1">Outdoor
                                                    Sports</label>

                                                <input type="checkbox" id="check1" name="s_activities[]" value="Outdoor">
                                                   
                                                <label class="form-check-label" for="inlineCheckbox1">Indoor
                                                    Sports</label>
                                                    <input type="checkbox" id="check1" name="s_activities[]" value="Indoor">
                                            </div>

                                        </div>



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
                                            <h4 class="edit-form-text">Address & Contact Details</h4><br>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address

                                                </label>
                                                <input type="text" class="form-control" placeholder="" name="u_address" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number

                                                </label>
                                                <input type="text" class="form-control" placeholder="" name="u_phone" required> 

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Location Link

                                                </label>
                                                <input type="text" class="form-control" placeholder="" name="u_location" required>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="btn-save-sec" style="    text-align: center;">
                                        <button type="submit" class="btn btn-sb  btn-primary">SUBMIT</button></div>
                                </div>

                        </form>





                  

</div>
                        </div>
        				</div>
        			</div>

               
	<div class="row">
		<div class="col-md-12">
        <div class="card mt-3 mb-3 pl-3 pr-3 py-3">
            <h4 style="color: #FF4C00!important;" class="mb-3">Search <i class="fa fa-search" aria-hidden="true"></i></h4>
         
                <form action="{{url('clg_search')}}" >
                <div class="row">
                <div class="col-md-3">
         <select class="form-control" name="type">
                <option value="1">Institution name</option>
                <option  value="2">Phone number</option>
                <option  value="3">Email</option>
            </select></div>
            <div class="col-md-3"> <input type="text" class="form-control" name="keyword"></div>
            <div class="col-md-3"><button class="btn-sm btn-primary" style="
    padding: 0.5rem 1rem;">Search</button></div>      </div>
                
      
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

<input type="hidden" id="tabid" value="1" name="tab">

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
                            <th scope="col">@lang('ID1')</th>
		                      <th scope="col">@lang('Institution Name')</th>
		                      <th scope="col">@lang('Address')</th>
		                      
		                      
		                      <th scope="col" style="width:400px">@lang('Image')</th>
                             
		                      <th scope="col">@lang('Action')</th>
		                      
		                    </tr>
		                  </thead>
		                  <tbody class="cur-body">
		                  	@forelse($college as $c)
		                  		<tr>
                                  <td>{{ $loop->iteration }}</td>
		                  			<td>{{ __($c->name) }}</td>
		                  		    <td>{{ __($c->u_address) }}</td>
		                  			
		                  			
		                  		 <td><img src="{{url('public/images').'/'.$c->photo}}" height="250px" width="150px" style="height:150px;width:400px"></td>

                                  
		                  			<td>
                                    <a href="{{route('display_college',$c->id) }}" >
		                  			
                                      <i class="fa fa-eye" style="font-size:20px; color:#32CD32;margin-right:5px"
 ></i>
                                          </a>  &nbsp;&nbsp;


		                  				<a href="{{route('college_edit',$c->id) }}" >
		                  				    <i class="fas fa-pencil-alt"  style="font-size:20px; color: #000000;margin-right:5px"></i></a>
		                  				    
		                  			&nbsp;&nbsp;
		                  		      <a href="{{ route('college_destroy',$c->id) }}"   title="Delete the item" onclick="return confirm('Are you sure you want to delete this item?')">
		                  			
                                      <i class="fa fa-trash" style="font-size:20px; color:#FF0000;margin-right:5px"></i>
 
		                  			  </a>
                                      
                                      
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
                        {!! $college->links() !!}
                        </div>
		          </div></div>   <!-- 2rd tab -->
  <div class="tab-pane fade show {{$b}}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">	<div class="table-responsive">
		              <table class="table" >
		                  <thead>
		                    <tr>
                            <th scope="col">@lang('ID2')</th>
		                      <th scope="col">@lang('College Name')</th>
		                      <th scope="col">@lang('Address')</th>
		                     
		                      
		                      <th scope="col" style="width:400px">@lang('Image')</th>
                              <th scope="col">@lang('Status')</th>
		                      <th scope="col">@lang('Action')</th>
		                      
		                    </tr>
		                  </thead>
		                  <tbody class="cur-body">
                          @forelse($collegeapp as $c)
		                  		<tr>
                                  <td>{{ $loop->iteration }}</td>
		                  			<td>{{ __($c->name) }}</td>
		                  		    <td>{{ __($c->u_address) }}</td>
		                  		
		                  			
		                  		 <td><img src="{{url('public/images').'/'.$c->photo}}" height="250px" width="150px" style="height:150px;width:400px"></td>

                                   <td>
									  <input data-id="{{$c->id}}" class="toggle-class" type="checkbox"
                                    data-onstyle="success" data-style="ios"
                                    data-offstyle="danger" data-toggle="toggle"  data-on="&#10003;" data-off="&#x2716;"
                                    {{$c->enable ? 'checked':''}}>

                                  </td>
		                  			<td>
                                      <a href="{{route('display_college',$c->id) }}"  >
		                  			
                                      <i class="fa fa-eye"  style="font-size:20px; color:#32CD32;margin-right:5px"></i>
                                          </a>  &nbsp;&nbsp;



		                  				<a href="{{route('college_edit',$c->id) }}" >
		                  				    <i class="fas fa-pencil-alt"   style="font-size:20px; color: #000000;margin-right:5px"></i></a>
		                  				
		                  				
		                  				&nbsp;&nbsp;
		                  	      	<a href="{{ route('college_destroy',$c->id) }}"   title="Delete the item" onclick="return confirm('Are you sure you want to delete this item?');">
		                  			
                                  <i class="fa fa-trash" style="font-size:20px; color:#FF0000;margin-right:5px"></i>
		                  			</a>
                                      
                                    
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
					{{ $collegeapp->links() }}
			 	</div>
		          </div></div>


                  <!-- 3rd tab -->
  <div class="tab-pane fade  show {{$c}}" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">	<div class="table-responsive">-
		              <table class="table">
		                  <thead>
		                    <tr>
                            <th scope="col">@lang('ID3')</th>
		                      <th scope="col">@lang('College Name')</th>
		                      <th scope="col">@lang('Address')</th>
		                     
		                    
		                      <th scope="col" style="width:400px">@lang('Image')</th>
                             
		                      <th scope="col">@lang('Action')</th>
		                      
		                    </tr>
		                  </thead>
		                  <tbody class="cur-body">
                          @forelse($collegeeg as $c)
		                  		<tr>
                                  <td>{{ $loop->iteration }}</td>
		                  			<td>{{ __($c->name) }}</td>
		                  		    <td>{{ __($c->u_address) }}</td>
		                  			
		                  			
		                  		 <td><img src="{{url('public/images').'/'.$c->photo}}" height="250px" width="150px" style="height:150px;width:400px"></td>

                                  
		                  			<td>
                                    <a href="{{route('display_college',$c->id) }}" >
		                  			
                                      <i class="fa fa-eye"  style="font-size:20px; color:#32CD32;margin-right:5px" ></i>
                                          </a>  &nbsp;&nbsp;

		                  				<a href="" class="btn btn-primary btn-sm">
		                  				    <i class="fas fa-pencil-alt" style="font-size:20px; color: #000000;margin-right:5px" ></i></a>
		                  				
		                  				
		                  			&nbsp;&nbsp;
		                  		<a href="{{ route('college_destroy',$c->id) }}"  title="Delete the item" onclick="return confirm('Are you sure you want to delete this item?');">
		                  			
                                  <i class="fa fa-trash" style="font-size:20px; color:#FF0000;margin-right:5px"></i>
		                  			</a>
                                      
                                         
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
					{{ $collegeeg->links() }}
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
        .table tbody td {
    text-align: center;
    padding: 13px 7px;
}
    
</style>
            <!--============= scripts starts ===============-->
    
   
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
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
                url:'collegestatus',
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

	@push('js')

@endpush
@endsection

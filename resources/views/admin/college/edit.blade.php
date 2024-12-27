<?php

// print_r($institute->student_description);
// exit();

?>
@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
    <section class="content">

        <div class="container-fluid  ">

            <div class="row">
                <div class="col-12">

                    <div class="card card-primary mt-3 school-edit-form">

                        <div class="card-header" style="display: flex;
                              justify-content: space-between;">
                            <h3 class="card-title">Edit College</h3>
                            <a onclick="history.back()" class="btn"
                                style="background-color: #FF4005;color:white;float:right"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i>&nbsp;&nbsp;Back</a>
                        </div>
                        
                        
                        
                        <a href="{{route('edit_college_course',$institute->id) }}" class="btn"
                                style="background-color: #FF4005;color:white;float:right"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i>&nbsp;&nbsp;Course edit</a>
                        
                        <form action="{{route('college_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control"value="{{$institute->id}}" name="id"required>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Institution Name

                                        </label>
                                        <input type="text" class="form-control" placeholder="" name="name"
                                        value="{{old('name',$institute->name)}}"required>

                                    </div>
                                    
                                    <div class="form-group">
                                        <label>City</label><span style="color:red">&nbsp;*</span>
                                        <input type="text" class="form-control" placeholder="" name="city" value="{{$institute->city}}"required>

                                    </div>

                                    <div class="form-group">
                                        <label>State</label><span style="color:red">&nbsp;*</span>
                                        <input type="text" class="form-control" placeholder="" name="state" value="{{$institute->state}}"required>

                                    </div>

                                    <!--<div class="form-group">-->
                                    <!--    <label>Address</label>-->
                                    <!--   <textarea class="form-control richEditor" placeholder="" name="address"-->
                                    <!--    value="{{old('address', $institute->address)}}">{{$institute->address}}</textarea>-->

                                    <!--</div>-->
                                    
                                </div>
                                <div class="col-md-6  edit-form-right">
                                    <label>Upload profile Logo</label>
                                    <div class="profile-pic">

                                        <img alt="User Pic"
                                            src="{{ url('public/images').'/'.$institute->photo }}"
                                            id="preview" height="200">
                                        <input id="profile-image-upload" class="hidden" type="file"
                                            onchange="previewFile()"  name="photo">

                                          


                                    </div>
                                


                            

                            




                                </div>
                                <div class="col-md-6 right-sec">
                                    <h4 class="edit-form-text">Fee Structure</h4>

                                    <div class="form-group">
                                        <label>Average fee per year </label>
                                        <input type="number" class="form-control" placeholder="" name="cost"
                                        value="{{old('cost', $institute->cost)}}"required>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hostel fee per year </label>
                                                <input type="number" class="form-control" placeholder="" name="m_fees"
                                                value="{{old('m_fees', $institute->m_fees)}}"required>

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
                                                <input type="date" class="form-control" placeholder="" name="start_date"
                                                value="{{old('start_date', $institute->start_date) }}">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End Date </label>
                                                <input type="date" class="form-control" placeholder="" name="end_date"
                                                value="{{old('end_date', $institute->end_date) }}">

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
                                        <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institute->eligibility=="On-Merit")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institute->eligibility=="Entrance-Test")
                                        {
                                            $c2="selected";
                                        }
                                      
                                       
                                       
                                       

                                        ?>
                                        <select class="form-control" name="eligibility" required>
                                            <option>Select One</option>
                                            <option value="On-Merit"<?=$c1?>>On Merit</option>
                                            <option value="Entrance-Test"><?=$c2?>Entrance Test</option>
                                            
                                        </select>

                                    </div>
                                </div>







                              


                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Minimum  marks(%) required </label>
                                        <input type="number" class="form-control" placeholder="" name="marks"
                                        value="{{old('marks', $institute->marks) }}"required>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Seats

                                        </label>
                                        <input type="number" class="form-control" placeholder=""  name="seats"
                                        value="{{old('seats',$institute->seats) }}"required>

                                    </div>
                                </div>
                                <!--<div class="col-md-3">-->
                                <!--    <div class="form-group">-->
                                <!--        <label>Total Hostel Accomodation</label>-->
                                <!--        <input type="number" class="form-control" placeholder=""  name="test" value="{{old('seats',$institute->hostel_num) }}"required>-->
                                        

                                <!--    </div>-->
                                <!--</div>-->
                                

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Student Interaction

                                        </label>
                                        <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institute->s_interaction=="Online")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institute->s_interaction=="At-Office")
                                        {
                                            $c2="selected";
                                        }
                                      
                                       
                                       
                                       

                                        ?>
                                        <select class="form-control"  name="s_interaction" required>
                                            <option>Select One</option>
                                            <option value="Online"<?=$c1?>>Online</option>
                                            <option value="At-Office"<?=$c2?>>At Office</option>
                                        </select>

                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Parents Interaction

                                        </label>
                                        <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institute->p_interaction=="Online")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institute->p_interaction=="At-Office")
                                        {
                                            $c2="selected";
                                        }
         
                                        ?>
                                        
                                        <select class="form-control" name="p_interaction" required>
                                        <option>Select One</option>
                                            <option value="Online"<?=$c1?>>Online</option>
                                            <option value="At-Office"<?=$c2?>>At Office</option>
                                        </select>
                                        

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Form Availablity

                                        </label>
                                        <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institute->form_availibility=="Online")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institute->form_availibility=="At-Office")
                                        {
                                            $c2="selected";
                                        }
         
                                        ?>
                                        <select class="form-control" name="form_availibility" required>
                                        <option>Select One</option>
                                            <option value="Online"<?=$c1?>>Online</option>
                                            <option value="At-Office"<?=$c2?>>At Office</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Addmission fee payment

                                        </label>
                                        <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institute->form_payment=="Online")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institute->form_payment=="At-Office")
                                        {
                                            $c2="selected";
                                        }
         
                                        ?>
                                        <select class="form-control" name="form_payment" required>
                                        <option>Select One</option>
                                            <option value="Online"<?=$c1?>>Online</option>
                                            <option value="At-Office"<?=$c1?>>At Office</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                       
                                        <label for="browser">School Timing</label>
                               <input list="browsers"  id="browser"class="form-control" name="school_time" value="{{$institute->school_time}}"required>

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
                                        <input list="browsers1"  id="browser1"class="form-control" name="office_time" value="{{$institute->office_time}}"required>

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
                                        <textarea class="form-control" rows="4" name="awards">
                                        <?php echo $institute->awards ?>
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
<?php

$student=$institute->student_name;
$student=(array)$institute->student_name;
$scount=count($student);
// print_r($student);exit();
$classes=$institute->class;
$classes=(array)$classes;
$classes_count=count($classes);

$security=$institute->security;
$security=(array)$security;
$security_count=count($security);

$infrastructure=$institute->infrastructure;
$infrastructure=(array)$infrastructure;
$infrastructure_count=count($infrastructure);


$activities=$institute->activities;
$activities=(array)$activities;

$s_activities=$institute->s_activities;
$s_activities=(array)$s_activities;


$lab=$institute->lab;
$lab=(array)$lab;
$lab_count=count($lab);
// print_r($student);exit();
$student_description=$institute->student_description;
$student_description=(array)($institute->student_description);

?>
                                                <div id="form-exams-list" class="row">
                                                @for($i=0;$i<$scount;$i++)
                                                    <div class="form-group col-md-3">

                                                        <input type="text" id="exam" placeholder="Student Name"value="{{$student[$i]}}" name="student_name[]"/><br>

                                                        <input type="text" id="exam_date" value="{{$student_description[$i]}}"placeholder="Decription" name="student_description[]" />
                                                    <button class="btn btn-danger js-remove--exam-row"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                    </div>
                                                    @endfor
                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="edit-form-text">Facilities</h4>
                                    <div class="row faciliti-sec">
                                        <div class="col-md-2 ">
                                            <label>Class</label>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineCheckbox1">AC Classes</label>
                                                
                                                <input type="checkbox" id="check1" name="class[]" value="ACClasses" 
                                                @if(in_array("ACClasses", $classes, TRUE)) checked="checked"@endif
                                                 >
                                                
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineCheckbox1">Smart
                                                    Classes</label>

                                    <input type="checkbox" id="check1" name="class[]" value="SmartClasses" 
                                     @if(in_array("SmartClasses", $classes, TRUE)) checked="checked"@endif>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Infrastructure</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label"
                                                        for="inlineCheckbox1">Auditorium</label>
                                                    <input type="checkbox" id="check1" name="infrastructure[]" value="Auditorium"
                                                    @if(in_array("Auditorium", $infrastructure, TRUE)) checked="checked"@endif>

                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineCheckbox1">Library
                                                        Room</label>
               <input type="checkbox" id="check1" name="infrastructure[]" value="LibraryRoom" @if(in_array("LibraryRoom", $infrastructure, TRUE)) checked="checked"@endif>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label" for="inlineCheckbox1">Canteen
                                                    </label>

                                                    <input type="checkbox" id="check1" name="infrastructure[]" value="Canteen" @if(in_array("Canteen", $infrastructure, TRUE)) checked="checked"@endif>

                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label"
                                                        for="inlineCheckbox1">Playground</label>

                                                    <input type="checkbox" @if(in_array("Playground", $infrastructure, TRUE)) checked="checked"@endif id="check1" name="infrastructure[]" value="Playground">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label>
                                                Safety & Security</label>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineCheckbox1" >CCTV
                                                </label>
                                                <input type="checkbox" id="check1" name="security[]" value="CCTV" @if(in_array("CCTV", $security, TRUE)) checked="checked"@endif>


                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <label>
                                                Lab</label><br>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineCheckbox1">Computer Lab
                                                </label>
                                                <input type="checkbox" id="check1" name="lab[]" value="ComputerLab" @if(in_array("ComputerLab", $lab, TRUE)) checked="checked"@endif>

                                                <label class="form-check-label" for="inlineCheckbox1"@if(in_array("ComputerLab", $lab, TRUE)) checked="checked"@endif>Science Lab
                                                </label>

                                                <input type="checkbox" id="check1" name="lab[]" value="ScienceLab"@if(in_array("ScienceLab", $lab, TRUE)) checked="checked"@endif>
                                                <label class="form-check-label" for="inlineCheckbox1">Robotics Lab
                                                </label>

                                                <input type="checkbox" id="check1" name="lab[]" value="RoboticsLab" @if(in_array("RoboticsLab", $lab, TRUE)) checked="checked"@endif>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row faciliti-sec">
                                        <div class="col-md-12 ">
                                            <label>Extra Activities</label><br>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineCheckbox1">Art &
                                                    craft</label>
                                                    
                                                <input type="checkbox" id="check1" name="activities[]" value="Art&craft" @if(in_array("RoboticsLab", $activities, TRUE)) checked="checked"@endif>
                                                <label class="form-check-label" for="inlineCheckbox1">Dance</label>

                                                <input type="checkbox" id="check1" name="activities[]" value="Dance"@if(in_array("Dance", $activities, TRUE)) checked="checked"@endif>
                                                <label class="form-check-label" for="inlineCheckbox1">Debets</label>

                                                <input type="checkbox" id="check1" name="activities[]" value="Debets"@if(in_array("Debets", $activities, TRUE)) checked="checked"@endif>
                                                <label class="form-check-label" for="inlineCheckbox1">Dramas</label>

                                                <input type="checkbox" id="check1" name="activities[]" value="Dramas"@if(in_array("Dramas", $activities, TRUE)) checked="checked"@endif>
                                                <label class="form-check-label" for="inlineCheckbox1">Annual
                                                    Functions</label>

                                                <input type="checkbox" id="check1" name="activities[]" value="AnnualFunctions"@if(in_array("AnnualFunctions", $activities, TRUE)) checked="checked"@endif>
                                                <label class="form-check-label" for="inlineCheckbox1">Painting
                                                    Competetions</label>

                            <input type="checkbox" id="check1" name="activities[]" value="PaintingCompetetions"@if(in_array("PaintingCompetetions", $activities, TRUE)) checked="checked"@endif>
                                                <label class="form-check-label" for="inlineCheckbox1">Picnic &
                                                    excursion</label>

                                                <input type="checkbox" id="check1" name="activities[]" value="Picnic&excursion" @if(in_array("Picnic&excursion", $activities, TRUE)) checked="checked"@endif>
                                            </div>

                                        </div>



                                    </div>
                                    <div class="row faciliti-sec">
                                        <div class="col-md-12 ">
                                            <label>Sports Activities</label><br>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label" for="inlineCheckbox1">Karate</label>

                                                <input type="checkbox" id="check1" name="s_activities[]" value="Karate" @if(in_array("Karate", $s_activities, TRUE)) checked="checked"@endif>
                                                <label class="form-check-label" for="inlineCheckbox1">Yoga</label>

                                                <input type="checkbox" id="check1" name="s_activities[]" value="Yoga" @if(in_array("Yoga", $s_activities, TRUE)) checked="checked"@endif>
                                                <label class="form-check-label" for="inlineCheckbox1">Outdoor
                                                    Sports</label>

                                                <input type="checkbox" id="check1" name="s_activities[]" value="Outdoor"  @if(in_array("Outdoor", $s_activities, TRUE)) checked="checked"@endif
                                                    >
                                                <label class="form-check-label" for="inlineCheckbox1">Indoor
                                                    Sports</label>
                                                    <input type="checkbox" id="check1" name="s_activities[]" value="Indoor" @if(in_array("Indoor", $s_activities, TRUE)) checked="checked"@endif
                                                    >

                                            </div>

                                        </div>
                                    </div>
                                 



                                    </div>
                                  



                                    </div>
                             <div class="row faciliti-sec">
                                    <div class="col-md-12 mt-2 mb-4">
                                        <div
                                            class="bg__dark p-2 text-white d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0 text-white">@lang('Gallery')</h5>
                                            <button type="button" class="btn btn__success text-white addImage"><i
                                                    class="las la-plus"></i>
                                                @lang('Add New')</button>
                                        </div>
                                       
                                        <div class="row imageElement">
                                        @if($institute->gallery)
                                            <?php
											$Features=$institute->gallery;
											$Features_count=count($institute->gallery);
											for($i=0;$i<$Features_count;$i++)
											{
												?>
															<div class="col-md-3">
                                                <div class="image-upload-area mt-3 position-relative">
                                                    
                                                    <div class="custom-file">
                                                       

                                                        <div class="col-md-12 extra-img">
														<a h="#"><button type="button" class="btn btn__danger imageRemove position-absolute text-white"data-catlog="{{$institute->id}}"
														data-count="{{$i}}"><i class="fa fa-times" aria-hidden="true"></i></button></a>
                                                            <img  id="preview" src="{{ url('public/images/'. $Features[$i]) }}" 
                                                                alt="Image">
																<input type="file" name="gallery[]"
                                                            class="custom-file-input upload-image" id="upload0">
                                                        </div>



                                                        <!--<label class="pick-image" for="upload0">@lang('Upload')</label>-->

                                                    </div>

                                                </div>
                                            </div>
											<?php	}
							                ?>	@endif
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12 mt-2 mb-4">
                                        <div
                                            class="bg__dark p-2 text-white d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0 text-white">@lang(' Videos')</h5>
                                            <button type="button" class="btn btn__success text-white addImage-1"><i
                                                    class="las la-plus"></i>
                                                @lang('Add New')</button>
                                        </div>
                                        <div class="row imageElement1">
                                            <?php
											$Features=$institute->videos;
											$Features_count=count($institute->videos);
											for($i=0;$i<$Features_count;$i++)
											{
												?>
															<div class="col-md-3">
                                                <div class="image-upload-area mt-3 position-relative">
                                                    
                                                    <div class="custom-file">
                                                       

                                                        <div class="col-md-12 extra-img">
														<button type="button" class="btn btn__danger videoRemove  position-absolute text-white"data-catlog="{{$institute->id}}"
														data-count="{{$i}}"><i class="fa fa-times kkk" aria-hidden="true"></i></button>
                                                            <video  id="preview" src="{{ url('public/images/'. $Features[$i]) }}" 
                                                                alt="Image" style="width: 178px;"></video>
																<input type="file" name="videos[]"
                                                            class="custom-file-input upload-image" id="upload0">
                                                        </div>



                                                        <!--<label class="pick-image" for="upload0">@lang('Upload')</label>-->

                                                    </div>

                                                </div>
                                            </div>
											<?php	}
							                   ?>	
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
                                                <input type="text" class="form-control" placeholder="" name="u_address"
                                                value="{{old('u_address', $institute->u_address) }}">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number

                                                </label>
                                                <input type="number" class="form-control" placeholder="" name="u_phone"
                                                value="{{old('u_phone', $institute->u_phone) }}" required> 

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Location Link

                                                </label>
                                                <input type="text" class="form-control" placeholder="" name="u_location" value="{{old('u_phone', $institute->u_location) }}">

                                            </div>
                                        </div>

                                    </div>

                                    <div class="btn-save-sec">
                                        <button type="submit" class="btn btn-sb btn-primary">SUBMIT</button></div>
                                </div>

                        </form>

                    </div>
                </div>
            </div>
           

            <style>
            .check-bx {
                width: 40px;
                height: 40px;
            }

            .removeFeature {
                width: 42px;
                height: 42px;
            }

            .featureSize input {
                margin-left: 1rem;
            }


            .price-form {
                margin-left: 6px !important;
                border-radius: 0.25rem !important;
                width: 85px !important;

            }

            .rem-fee {
                margin-left: 1rem;
                border-radius: 0.25rem !important;
            }

            center input.form-control,
            select.form-control {

                padding: 7px !important;
            }

            .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
                border-top-right-radius: 0.25rem !important;
                border-bottom-right-radius: 0.25rem !important;
            }

            .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
                border-top-right-radius: 0.25rem !important;
                border-bottom-right-radius: 0.25rem !important;
                border-top-left-radius: 0.25rem !important;
                border-bottom-left-radius: 0.25rem !important;
            }

            .fea-input {
                align-items: center !important;
            }
            .image-upload-area img{
                height:270px;
            }
            .custom-file{
                height:auto !important;
            }
            </style>
            @push('js')

            @endpush
            @endsection

            @push('js')
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
    <script>
        function previewFile() {
            var preview = document.querySelector('#preview');
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
            $('#preview').on('click', function () {
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
                // clone.append($('<button>').addClass('btn btn-danger js-remove--exam-row').html(
                //     '<i class="fa fa-times" aria-hidden="true"></i>'));
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
              var html = "<div class='upload__img-box-1'><div style='background-image: url({{ url('public/images/upload-video.png') }})' data-number='" + $(".upload__img-close-1").length + "' data-file='" + f.name + "' class='img-bg-1'><div class='upload__img-close-1'></div></div></div>";
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
          console.log(imgArray);
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

            @endpush
            <style>
            .check-bx {
                width: 40px;
                height: 40px;
            }

            .removeFeature {
                width: 42px;
                height: 42px;
            }

            .featureSize input {
                margin-left: 1rem;
            }


            .price-form {
                margin-left: 6px !important;
                border-radius: 0.25rem !important;
                width: 85px !important;

            }

            .rem-fee {
                margin-left: 1rem;
                border-radius: 0.25rem !important;
            }

            center input.form-control,
            select.form-control {

                padding: 7px !important;
            }

            .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
                border-top-right-radius: 0.25rem !important;
                border-bottom-right-radius: 0.25rem !important;
            }

            .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
                border-top-right-radius: 0.25rem !important;
                border-bottom-right-radius: 0.25rem !important;
                border-top-left-radius: 0.25rem !important;
                border-bottom-left-radius: 0.25rem !important;
            }

            .fea-input {
                align-items: center !important;
            }
            .image-upload-area img{
                height:270px;
            }
            .custom-file{
                height:auto !important;
            }
            </style>
            @push('js')

            @endpush
         

            @push('js')
            <script>
            //(function($){
            "use strict"

            //image upload preview
            function readURL(input, thisElement) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    var parentElement = thisElement.closest('.image-upload-area');
                    var previewElement = parentElement.find('#preview');
                    reader.onload = function(e) {
                        previewElement.attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
            
            $(document).on('change','.upload-image',function() {
		    var thisElement = $(this);
		    readURL(this,thisElement);
		  });

		  var imgI = 1;
		  var i=0;
		  $('.addImage').on('click',function(){
		  	
		  	    // alert(i+"inc")
		  	    if(i<9){
		  	    	i++
			  	var imageElement = `
			  		<div class="col-md-3">
						<div class="image-upload-area mt-3 position-relative">
							<button type="button" class="btn btn-sm btn__danger text-white position-absolute imageRemove"><i class="fa fa-times" aria-hidden="true"></i></button>
							<img id="preview" src="{{ url('assets/property') }}" alt="Image"/>
							<div class="custom-file">
								<input type="file" name="gallery[]" class="custom-file-input upload-image" id="upload${imgI}">
								<label class="pick-image" for="upload${imgI}">@lang('Upload')</label>
							</div>
						</div>
					</div>
			  	`;
		  }
			  	$('.imageElement').append(imageElement);

		  		imgI++;
		  	
		  });

          
		  var imgII = 1;
		  var i=0;
		  $('.addImage-1').on('click',function(){
		  	
		  	    // alert(i+"inc")
		  	    if(i<9){
		  	    	i++
			  	var imageElement1 = `
			  		<div class="col-md-3">
						<div class="image-upload-area mt-3 position-relative">
							<button type="button" class="btn btn-sm btn__danger text-white videoRemove"><i class="fa fa-times" aria-hidden="true"></i></button>
							<video id="preview" src="{{ url('assets/property') }}" style="width: 178px;" alt="Image"/></video>
							<div class="custom-file">
								<input type="file" name="videos[]" class="custom-file-input upload-image" id="upload${imgII}">
								<label class="pick-image" for="upload${imgII}">@lang('Upload')</label>
							</div>
						</div>
					</div>
			  	`;
		  }
			  	$('.imageElement1').append(imageElement1);

		  		imgII++;
		  	
		  });

    //         $(document).on('change', '.upload-image', function() {
    //             var thisElement = $(this);
    //             readURL(this, thisElement);
    //         });

    //         var imgI = 1;
    //         var i = 0;
    //         $('.addImage').on('click', function() {

            
               
    //                 i++
    //                 var imageElement = `
			 // 		<div class="col-md-3">
				// 		<div class="image-upload-area mt-3 position-relative">
				// 			<button type="button" class="btn btn-sm btn__danger text-white position-absolute imageRemove"><i class="fa fa-times" aria-hidden="true"></i></button>
				// 			<img id="preview" src="{{ url('assets/property') }}" alt="Image"/>
				// 			<div class="custom-file">
				// 				<input type="file" name="cat_images[]" class="custom-file-input upload-image" id="upload${imgI}">
				// 				<label class="pick-image" for="upload${imgI}">@lang('Upload')</label>
				// 			</div>
				// 		</div>
				// 	</div>
			 // 	`;
                
    //             $('.imageElement').append(imageElement);

    //             imgI++;

    //         });


//feature
            var featureI = 5;
            var k = 0
            $('.addFeature').on('click', function() {

                if (k < 6) {
                    k++
                    var featureElement = `

			  		<div class="col-md-12">
						<div class="form-group">
						<div class="input-group  fea-input">
							 <textarea class="form-control" name="features[]"  id="exampleFormControlTextarea1" rows="2" placeholder="@lang('Features')" required></textarea>
								
								<div class="input-group-append">
									<button type="button" class="btn__danger text-white input-group-text removeFeature rem-fee"><i class="fa fa-times" aria-hidden="true"></i></button>
								</div>
							</div>
						</div>
					</div>

			  	`;
                }
                $('.featureElement').append(featureElement);

                featureI++;

            });

//featureend



            var featurI = 5;
            var i = 0
            $('.addSize').on('click', function() {





                if (i < 6) {
                    i++
                    var featurElement = `

			  		<div class="col-md-4">
						<div class="form-group">
							<div class="input-group">
							<input type="text" name="size[]" class="form-control" placeholder="@lang('Size')" >
								<input type="text" name="price_size[]"  class="form-control price-form" placeholder="@lang('price')" required>
								<div class="input-group-append">
									<button type="button" class="btn__danger text-white input-group-text removeFeatur"><i class="fa fa-times" aria-hidden="true"></i></button>
								</div>
							</div>
						</div>
					</div>

			  	`;
                }
                $('.featureSize').append(featurElement);

                featurI++;

            });

           

            

            $(document).on('click', '.removeFeatur', function() {
                $(this).closest('.col-md-4').remove();
                featurI--;
                if (i > 0) {
                    i--;
                    // alert(i+"--")
                }
            });
            $(document).on('click', '.removeFeature', function() {
                $(this).closest('.col-md-12').remove();
                featureI--;
                if (k > 0) {
                    k--;
                    // alert(i+"--")
                }
            });


            $(document).on('click', '.imageRemove', function() {
                $(this).closest('.col-md-3').remove();
                imgI--;

                
            });
            $(document).on('click', '.videoRemove', function() {
                $(this).closest('.col-md-3').remove();
                imgII--;

                
            });


            $(document).on('click', '.contactRemove', function() {
                $(this).closest('.col-md-4').remove();
                contactI--;
            });



            
            // sub cat select start

            // 
           

            $("#cat_id").on('change', function(e) {

                var country = $(this).children("option:selected").val();
                $.ajax({
                    url: "{{url('get_subcat')}}",
                    type: 'post',
                    data: {
                        pos: country
                    },

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(msg) {
                        $("#sub_id").html(msg);
                    },
                    error: function(xhr, desc, err) {
                        // alert('failed');
                    }
                });

            });

            // 	end
    $(".imageRemove").on('click', function(e) {


                var count=$(this).attr("data-count");
                 var catlogid=$(this).attr("data-catlog");
             //    alert(catlogid)
                $.ajax({
                    url: "{{url('get_college_imageRemove')}}",
                    type: 'post',
                    data: {
                        pos: count,
                        catlogid:catlogid,_token:'{{csrf_token()}}'
                    },

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                   
                    success: function(msg) {
                         
                    },
                    error: function(xhr, desc, err) {
                        // alert('failed');
                    }
                });

            });



            // sub cat select end
            </script> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
            <script>
         $(".videoRemove").on('click', function(e) { 
    alert("button is clicked");
    
    var count=$(this).attr("data-count");
                 var catlogid=$(this).attr("data-catlog");
             //    alert(catlogid)
                $.ajax({
                    url: "{{url('get_college_videoRemove')}}",
                    type: 'post',
                    data: {
                        pos: count,
                        catlogid:catlogid,_token:'{{csrf_token()}}'
                    },

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                   
                    success: function(msg) {
                         
                    },
                    error: function(xhr, desc, err) {
                        // alert('failed');
                    }
                });
});
    </script>@endpush
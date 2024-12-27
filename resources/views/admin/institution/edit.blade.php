<?php

// print_r($institute);
// exit();

?>
@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
    <section class="content">

        <div class="container-fluid  ">

            <div class="row">
                <div class="col-12">
                    
                    
                    <div class="card">
		
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>The Email id already taken </li>
                @endforeach
            </ul>
        </div>
        @endif

			<div class="card-header" style="display: flex;
                              justify-content: space-between;">
                            <h3 class="card-title">Edit User Details</h3></div>
                            <form action="{{route('admin_user_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" class="form-control" value="{{$user->id}}" name="id" required>
                         <input type="hidden" class="form-control" value="{{$_GET['cat']}}" name="cat" required>
                            	<div class="card-body">
                            	    <div class="row">
                            	          <div class="col-md-5">
                            	              <label><b>User Name</b></label>:
                            	              <input type="text" class="form-control" name="user_name"  value="{{old('user_name',$user->user_name)}}" ><br>
                            	               
                            	               <label><b>Email</b></label>:
                            	           <input type="text" class="form-control" name="email"  value="{{old('email',$user->email)}}" ><br>
                            	          <label><b>Mobile Number</b></label>:
                            	             <input type="text" class="form-control " name="user_phone"  value="{{old('phone',$user->user_phone)}}" id="mob_no1" ><br>
                            	    </div>
                            </div>
                            <button type="submit" value="submit" class="btn sign-up-edit-1" style="background-color: #FF4005;color:white;float:right;margin-right:1rem">Update</button>
                            </div></div>
                            </form>
                        

                    <div class="card card-primary mt-3 school-edit-form">

                        <div class="card-header" style="display: flex;
                              justify-content: space-between;">
                            <h3 class="card-title">Edit User</h3>
                            <div>
                           &nbsp;&nbsp;&nbsp;&nbsp;
                           @if($institute->type=="s")
                           @else
                           <a href="{{url('edit_admin_course_offered')}}?id={{$institute->id}}&&cat={{$institute->type}}" class="btn"
                                style="background-color: #FF4005;color:white;float:right; margin-left:1rem">Edit course</a>
                                
                                @endif
                                 <a href="{{url('institution')}}?cat={{$_GET['cat']}}" class="btn"
                                style="background-color: #FF4005;color:white;float:right;margin-right:1rem"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i>&nbsp;&nbsp;Back</a></div>
                        </div>
                        
                        	
                        
                        
                        
                        <form action="{{route('admin_ins_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control"value="{{$institute->id}}" name="id"required>
                    <input type="hidden" class="form-control"value="{{$institute->type}}" name="cat"required>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Institution Name

                                        </label><span style="color:red">&nbsp;*</span>
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
                                    
                                     <div class="form-group">
                                        <label>Address</label><span style="color:red">&nbsp;*</span>
                                       <textarea class="form-control richEditor" placeholder="" name="address"
                                        value="{{old('address', $institute->address)}}">{{$institute->address}}</textarea>

                                    </div>
                                    
                                    <div class="form-group">
                                                <label>Phone 

                                                </label><span style="color:red">&nbsp;*</span>
                                                <input type="number" class="form-control" placeholder="" name="u_phone" id="mob_no2"
                                                value="{{old('u_phone', $institute->u_phone) }}" required> 

                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Email

                                                </label><span style="color:red">&nbsp;*</span>
                                                <input type="email" class="form-control" placeholder="" name="email"
                                                value="{{old('u_phone', $institute->email) }}" required> 

                                            </div>
                                    
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


                            </div>

                            <div class="row">
                                <div class="col-md-6 left-sec">
                                    <h4 class="edit-form-text">Key Status</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ownership

                                                </label><span style="color:red">&nbsp;*</span>
                                                <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institute->ownership=="Private")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institute->ownership=="Private-Aided")
                                        {
                                            $c2="selected";
                                        }
                                        else if($institute->ownership=="Govt.Aided")
                                        {
                                            $c3="selected";
                                        }
                                       

                                        ?>
                                                <select class="form-control" name="ownership"required>
                                              
                                                    <option value="Private"<?=$c1?>>Private</option>
                                                    <option value="Private-Aided"<?=$c2?>>Private Aided</option>
                                                    <option value="Govt.Aided"<?=$c3?>>Govt. Aided</option>
                                                </select>

                                            </div>
                                        </div>
                                        
                                    <div class="col-md-6">
                                            <div class="form-group">                
                                    @if($institute->type=="s")
                                     <label>Board</label> <span style="color:red">&nbsp;*</span>
<input list="browsers" name="board" id="browser" class="form-control" autocomplete="off" required value="{{$institute->board}}">

                                              <datalist id="browsers">
                                                     
                                                    <option value="State">State</option>
                                                    <option value="CBSE">CBSE</option>
                                                    <option value="ICSE">ICSE</option>
                                                     
                                                </datalist>
                                                @else
                                                 <label>University</label> <span style="color:red">&nbsp;*</span>
                                                <input type="board" name="board" class="form-control" value="{{$institute->board}}" required>
                                                @endif
                                            </div>
  </div>

                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Year of Establishment

                                                </label><span style="color:red">&nbsp;*</span>
                                                <input type="text" class="form-control" placeholder="" name="establishment"
                                                value="{{old('establishment', $institute->establishment) }}"required>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Co-Ed Status

                                                </label><span style="color:red">&nbsp;*</span>
                                                <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institute->d_status==1)
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institute->d_status==2)
                                        {
                                            $c2="selected";
                                        }
                                        else if($institute->d_status==3)
                                        {
                                            $c3="selected";
                                        }
                                       

                                        ?>
                                                <select class="form-control" name="d_status">
                                             
                                                    <option value="1" <?=$c1?>>All</option> 
                                                    <option value="2" <?=$c2?>>All Boys</option>
                                                    <option value="3" <?=$c3?>>All Girls</option>
                                                </select>

                                            </div>
                                        </div>
                                          </div>
                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Campus size (in acres)

                                                </label><span style="color:red">&nbsp;*</span>
                                                <input type="text" class="form-control" placeholder="" name="acres"
                                                value="{{old('acres', $institute->acres) }}"required>

                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Campus Type

                                                </label><span style="color:red">&nbsp;*</span>
                                                <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institute->c_type=="Residential")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institute->c_type=="Non-Residential")
                                        {
                                            $c2="selected";
                                        }
                                       
                                       

                                        ?>
                                                <select class="form-control" name="c_type" required>
                                        
                                            <option value="Residential"<?=$c1?>>Residential</option>
                                            <option value="Non-Residential"<?=$c2?>>Non-Residential</option>
                                            
                                        </select>

                                            </div>

                                        </div>

                                    </div>




                                </div>
                                <div class="col-md-6 right-sec">
                                    <h4 class="edit-form-text">Fee Structure</h4>

                                    <div class="form-group">
                                        <label>Average minimum fee per year </label><span style="color:red">&nbsp;*</span>
                                        <input type="number" class="form-control" placeholder="" name="cost"
                                        value="{{old('cost', $institute->cost) }}"required>

                                    </div>
                                     <div class="form-group">
                                        <label>Average maximum fee per year </label><span style="color:red">&nbsp;*</span>
                                        <input type="text" class="form-control" placeholder="" name="cost_max"
                                        value="{{old('cost_max', $institute->max_cost) }}"required>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hostel fee per year </label>
                                                <input type="number" class="form-control" placeholder="" name="m_fees" 
                                                  value="{{old('m_fees', $institute->m_fees) }}">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Advance fee </label><span style="color:red">&nbsp;*</span>
                                                <input type="number" class="form-control" placeholder="" name="admission_fees"
                                                  value="{{old('admission_fees', $institute->admission_fee) }}" required>

                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Other fee </label>
                                                <input type="number" class="form-control" placeholder="" name="other_fees"
                                                  value="{{old('other_fees', $institute->other_fees) }}" >

                                            </div>
                                        </div>
                                        </div>

                                </div>
                        

 
                            <div class="row">
                                <div class="col-md-6 left-sec">
                                     @if(($institute->type=="s"))
                                    <h4 class="edit-form-text">Class offered</h4>
                                    <div class="row">
                                      
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Classes

                                                </label><span style="color:red">&nbsp;*</span>
                                                <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institute->c_offered==1)
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institute->c_offered==2)
                                        {
                                            $c2="selected";
                                        }
                                        else  if($institute->c_offered==3)
                                        {
                                            $c3="selected";
                                        }
                                        else  if($institute->c_offered==4)
                                        {
                                            $c4="selected";
                                        }
                                       
                                       

                                        ?>
                                                <select class="form-control" name="c_offered"required>
                                    <option value="1"<?=$c1?>>LKG to 10th</option>
                                    <option value="2"<?=$c2?>>LKG to 12th</option>
                                    <option value="3"<?=$c3?>>1st to 10th</option>
                                    <option value="4"<?=$c4?>>1st to 12th</option>
                                                </select>

                                            </div>
                                        </div>
                                        


                                       
                                        

                                    </div>
 @endif


                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12 left-sec">
                                    <h4 class="edit-form-text"> Admission Dates</h4>


                              
                                </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date </label><span style="color:red">&nbsp;*</span>
                                                <input type="date" class="form-control" placeholder="" name="start_date"
                                                value="{{old('start_date', $institute->start_date) }}">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End Date </label><span style="color:red">&nbsp;*</span>
                                                <input type="date" class="form-control" placeholder="" name="end_date"
                                                value="{{old('end_date', $institute->end_date) }}">

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
                                         <?php
                                        $c1=$c2=$c3=$c4=$c5="";
                                        if($institute->eligibility=="On-Merit")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institute->eligibility=="Entrance-Test")
                                        {
                                            $c2="selected";
                                        }
                                      else  if($institute->eligibility=="Merit-and-Entrance-test")
                                        {
                                            $c3="selected";
                                        }
                                        else  if($institute->eligibility=="Merit-and-Interview")
                                        {
                                            $c4="selected";
                                        }
                                        else  if($institute->eligibility=="Merit-Entrance-and-Interview")
                                        {
                                            $c5="selected";
                                        }
                                       
                                       
                                       

                                        ?>
                                        <select class="form-control" name="eligibility" required>
                                            <option value="">Select One</option>
                                            <option value="On-Merit"<?=$c1?>>On Merit</option>
                                            <option value="Entrance-Test"<?=$c2?>>Entrance Test</option>
                                            <option value="Merit-and-Entrance-test"<?=$c3?>>Merit and Entrance test</option>
                                            <option value="Merit-and-Interview"<?=$c4?>>Merit and Interview</option>
                                            <option value="Merit-Entrance-and-Interview"<?=$c5?>>Merit, Entrance and Interview</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Minimum  marks(in %) </label><span style="color:red">&nbsp;*</span>
                                        <input type="number" class="form-control" placeholder="" name="marks"
                                        value="{{old('marks', $institute->marks) }}"required>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Average seats per class

                                        </label><span style="color:red">&nbsp;*</span>
                                        <input type="number" class="form-control" placeholder=""  name="seats"
                                        value="{{old('seats',$institute->seats) }}"required>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Hostel Accomodation</label>
                                        <input type="number" class="form-control" placeholder=""  name="test" value="{{old('seats',$institute->hostel_num) }}">
                                        

                                    </div>
                                </div>
                                

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Student Interaction

                                        </label><span style="color:red">&nbsp;*</span>
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
                                      else  if($institute->s_interaction=="Online & Offline")
                                        {
                                            $c3="selected";
                                        }
                                       
                                       
                                       

                                        ?>
                                        <select class="form-control"  name="s_interaction" required>
                                         
                                            <option value="Online"<?=$c1?>>Online</option>
                                            <option value="At-Office"<?=$c2?>>At Office</option>
                                          <option value="Online & Offline"<?=$c3?>>Online & Offline</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Parents Interaction

                                        </label><span style="color:red">&nbsp;*</span>
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
                                        else  if($institute->p_interaction=="Online & Offline")
                                        {
                                            $c3="selected";
                                        }
         
                                        ?>
                                        
                                        <select class="form-control" name="p_interaction" required>
                                       
                                            <option value="Online"<?=$c1?>>Online</option>
                                            <option value="At-Office"<?=$c2?>>At Office</option>
                                             <option value="Online & Offline"<?=$c3?>>Online & Offline</option>
                                        </select>
                                        

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Form Availablity

                                        </label><span style="color:red">&nbsp;*</span>
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
                                         if($institute->form_availibility=="Online & Offline")
                                        {
                                            $c3="selected";
                                        }
         
                                        ?>
                                        <select class="form-control" name="form_availibility" required>
                                    
                                            <option value="Online"<?=$c1?>>Online</option>
                                            <option value="At-Office"<?=$c2?>>At Office</option>
                                             <option value="Online & Offline"<?=$c3?>>Online & Offline</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Admission Fee Payment

                                        </label><span style="color:red">&nbsp;*</span>
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
                                         else  if($institute->form_payment=="Online & Offline")
                                        {
                                            $c3="selected";
                                        }
         
                                        ?>
                                        <select class="form-control" name="form_payment" required>
                                     
                                            <option value="Online"<?=$c1?>>Online</option>
                                            <option value="At-Office"<?=$c1?>>At Office</option>
                                             <option value="Online & Offline"<?=$c3?>>Online & Offline</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                       @if($institute->type=="s")
                                        <label for="browser">School Timing</label><span style="color:red">&nbsp;*</span>
                                        @else
                                         <label for="browser">Institute Timing</label><span style="color:red">&nbsp;*</span>
                                         @endif
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

                                        </label><span style="color:red">&nbsp;*</span>
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
                                     <!--<button class="btn  js-add--exam-row" id="awd"><i class="fa fa-plus"-->
                                     <!--               aria-hidden="true"></i></button>-->
                                   
                                   
                                   <?php
                                   $aw1=$aw2=$aw3="";
                                    if($institute->awards)
                                    {
                                          $awards=$institute->awards;
                                          $awd_count=count($institute->awards);
                                          for($i=0;$i<count($institute->awards);$i++)
                                          {
                                                  if($awards[0])
                                                  {
                                                  $aw1=$awards[0];
                                                  }
                                                  if($awards[1])
                                                  {
                                                  $aw2=$awards[1];
                                                  }
                                                  if($awards[2])
                                                  {
                                                   $aw3=$awards[2];
                                                   }
                                           }
                                   
                                    }
                                   ?>
                                    <div class="form-group">
                                        <label>Awards

                                        </label>
                                        <textarea class="form-control" rows="2" name="awards[]">
                                             
                                        <?php echo $aw1; ?>
                                       
                                        </textarea>

                                    </div>
                                    <div class="form-group" id="awd1">
                                        <label>Awards

                                        </label>
                                        <textarea class="form-control" rows="2" name="awards[]">
                                         <?php echo $aw2; ?>
                                        </textarea>

                                    </div>
                                    <div class="form-group" id="awd2">
                                        <label>Awards

                                        </label>
                                        <textarea class="form-control" rows="2" name="awards[]">
                                         <?php echo $aw3 ?>
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


// print_r($student);exit();
$student_description=$institute->student_description;
$student_description=(array)($institute->student_description);
$facilities=(array)($institute->facilities);
$facil_count=count($facilities);

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
                            @if($institute->facilities)
                @for($i=0;$i<$facil_count;$i++)      
                            <div class='col-md-4 mb-3'  style='display:flex; align-items:center'>  
                     
    <input type='text'name='Facilities[]' class='form-control' id="taskname" style='border-radius: 3px 0px 0px 3px;' value="<?php echo $facilities[$i]; ?>">
    <i class='fa fa-times  delete btn btn-sb js-remove-exam' style='border-radius: 0px 3px 3px 0px; background:#FF4005' aria-hidden='true'></i></div> 
   @endfor
                @endif                        
                                         
   </div>





                                </div>
                            </div>
                            
                            
                            
                             <div class="row faciliti-sec">
                                    <div class="col-md-12 mt-2 mb-4">
                                      <div style="display:flex;gap:10px;align-items:center;margin-bottom:1rem">
                                          <h4 class="edit-form-text"  style="margin-top:0%">Gallery</h4>
                                            <button type="button" class="btn btn__success text-white addImage" style="background:#FF4005"><i
                                                    class="las la-plus" ></i>
                                                @lang('Add New')</button></div>
                                        
                                       
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
                                        <div style="display:flex;gap:10px;align-items:center;margin-bottom:1rem">
                                        <h4 class="edit-form-text"  style="margin-top:0%">videos</h4>
                                           
                                            <button type="button" class="btn btn__success text-white addImage-1" style="background:#FF4005"><i
                                                    class="las la-plus"></i>
                                                @lang('Add New')</button> </div>
                                   
                                        <div class="row imageElement1">
                                        @if($institute->videos)
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
                                                      	<a h="#">
														<button type="button" class="btn btn__danger videoRemove   text-white" data-catlog="{{$institute->id}}"
														data-count="{{$i}}" id="btnClick"><i class="fa fa-times " aria-hidden="true"></i></button></a>
                                                            <video  id="preview-1" src="{{ url('public/images/'. $Features[$i]) }}" 
                                                                alt="Image" style="width: 178px;"  accept="video/mp4"></video>
																<input type="file" name="videos[]"
                                                            class="custom-file-input upload-image" id="upload0">
                                                        </div>



                                                        <!--<label class="pick-image" for="upload0">@lang('Upload')</label>-->

                                                    </div>

                                                </div>
                                            </div>
											<?php	}
							                   ?>
                                               @endif	
                                        </div>

                                    </div>
                                    
                             </div>
                                    <div class="row faciliti-sec">
                                       
                                       
                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Location Link

                                                </label>
                                                <input type="text" class="form-control" placeholder="" name="u_location" value="{{old('u_phone', $institute->u_location) }}">

                                            </div>
                                        </div>

                                    </div>

                                    <div class="btn-save-sec">
                                        <button type="submit" class="btn btn-sb btn-primary sign-up-edit sign-up-btn">SUBMIT</button></div>
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
            .btn-fac{
            background: #FF4005;
        color: #fff !important;
    margin-top: 0.4rem;}
        .js-remove-exam{
            height: 100%;
            color: #fff !important;
            padding-top: 0.8rem;
        }
        .image-upload-area-1 video, .image-upload-area video {
    height: 125px;
    width: 100%;
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
            .image-upload-area-1 {
    padding: 10px;
    border: 1px solid #cacaca;
    border-radius: 5px;
}
.custom-file-input-1 {
      position: relative;
    z-index: 2;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    margin: 0;
    opacity: 0;
}
.image-upload-area-1 .pick-image {
    display: block;
    border: 1px solid #cacaca;
    text-align: center;
    padding: 4px 0px;
    position: relative;
    color: #767676;
    cursor: pointer;
    font-weight: 500;
    margin-top: 10px;
    margin-bottom: 0px;
}
.image-upload-area-1 .pick-image::after {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 3;
    display: block;
    padding: 0.375rem 0.75rem;
    line-height: 1.2;
    color: #767676;
    font-family: 'Font Awesome 5 Free';
    content: "\f030";
    font-weight: 700;
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
                      var parentElementt = thisElement.closest('.image-upload-area-1');
                    var previewElement = parentElement.find('#preview');
                     var previewElement1 = parentElementt.find('#preview-1');
                    reader.onload = function(e) {
                        previewElement.attr('src', e.target.result);
                          previewElement1.attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }
            
            $(document).on('change','.upload-image',function() {
		    var thisElement = $(this);
		    readURL(this,thisElement);
		  });
		         $(document).on('change','.upload-image-1',function() {
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
						<div class="image-upload-area-1 mt-3 position-relative">
						 <div class="col-md-12 extra-img">
						<a h="#"><button type="button" class="btn btn__danger videoRemove   text-white"  id="btnClick"><i class="fa fa-times " aria-hidden="true"></i></button></a>
							<video id="preview-1" src="{{ url('assets/property') }}" style="width: 178px;" alt="Image"/></video>
							<div class="custom-file">
								<input type="file" name="videos[]" class="custom-file-input-1 upload-image" id="upload1${imgII}">
								<label class="pick-image" for="upload1${imgII}">@lang('Upload')</label>
							</div></div>
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
                    url: "{{url('get_imageRemove')}}",
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
    //alert("button is clicked");
    
    var count=$(this).attr("data-count");
                 var catlogid=$(this).attr("data-catlog");
             //    alert(catlogid)
                $.ajax({
                    url: "{{url('get_videoRemove')}}",
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
let awd=0;
// $("#awd1").hide();
// $("#awd2").hide();
$(document).on('click', '#awdrr', function (e) {
               $("#awd1").show();
               awd++
              
               if(awd==2)
               {
                   $("#awd2").show();
               }
               if(awd==3)
               {
                   alert("only three awardsare allowed");
               }
            });
$(document).on('click', '.js-remove-exam', function (e) {
                e.preventDefault();
                return $(this).parent().remove();
            });
            
       $( ".sign-up-edit-1" ).click(function() {
            if (document.getElementById('mob_no1').value.length < 10 || document.getElementById('mob_no1').value.length > 10 ) {

             alert("Please Enter Valid Mobile Number"); 
              return false;
         }
      else{
             return true 
         }

});       
            
               
  $( ".sign-up-edit" ).click(function() {
      
      if(document.getElementById('mob_no2').value.length < 10 || document.getElementById('mob_no2').value.length > 10 ) {

             alert("Please Enter Valid Phone Number"); 
              return false;
         }
      else{
             return true 
         }

});

</script>




    @endpush
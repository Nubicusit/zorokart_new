
<?php

// print_r($institution);
// exit();
?>
@extends('institute.layouts.master')
@section('content')
<!--<meta name="csrf-token" content="{{ csrf_token() }}">-->






<style>
    .card-header {
 
     border-bottom: 0px solid #f1f2f6; 
    padding-left:0.6rem !important;
}
</style>
<div class="contents">
    <section class="content">

        <div class="container-fluid  ">

            <div class="row">
                <div class="col-12 card-edit-school">

                    <div class="card card-primary mt-3 school-edit-form p-5">

                        <div class="card-header" style="display: flex;
                              justify-content: space-between; ">
                            <h2 class="card-title" style="font-size:23px;font-weight:600">Edit User</h2>
                        </div>
                        <div class="card-header" style="display: flex;
                              justify-content: space-between;">
                            
                            <a href="{{url('profile1')}}" class="btn"
                                style="background-color: #FF4005;color:white;float:right"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i>&nbsp;&nbsp;Back</a>
                                    @if($institution->type=="s")
                                    @else
                                    <a href="{{url('edit_ins_course')}}?id={{$institution->id}}&&cat={{$institution->type}}" class="btn"
                                style="background-color: #FF4005;color:white;float:right">Edit course</a>
                                @endif
                        </div>
                       
                        <section class="my-acc-home form-school">
              @if ($message = Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
 
</div>
@endif
                <div class="box-my-acc school-form-box">
                    <div class="container">
                     <form action="{{url('institution_update1')}}" method="post" enctype="multipart/form-data">
      @csrf
                    
                    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
                    <!--<input type="hidden" name="_token" value="rilyhnNAiKpmSYOwxaXFncSNhMZVjhglr53bSunN">-->
                    <input type="hidden" class="form-control" value="{{$institution->id}}" name="id" required>  
                    <input type="hidden"  name="cat" value="pu">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Institution Name
                                         <span style="color:red">&nbsp;*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="" name="name" required   value="{{old('name', $institution->name) }}">

                                    </div>

                                   
                                     <div class="form-group">
                                        <label>City</label><span style="color:red">&nbsp;*</span>
                                        <input type="text" class="form-control" placeholder="" name="city" value="{{$institution->city}}" required>

                                    </div>
                                    
                                     <div class="form-group">
                                        <label>State</label><span style="color:red">&nbsp;*</span>
                                        <input type="text" class="form-control" placeholder="" name="state"  value="{{$institution->state}}" required>

                                    </div>
                                    
                                      <div class="form-group">
                                        <label>Address</label><span style="color:red">&nbsp;*</span>
                                       <textarea class="form-control richEditor" placeholder="" name="address"
                                        value="{{old('address', $institution->address)}}" required>{{old('address', $institution->address)}}</textarea>

                                    </div>
                                
                               
                                          <div class="form-group">
                                                <label>Phone Number</label><span style="color:red">&nbsp;*</span>
                                                <input type="text" class="form-control" placeholder="" name="u_phone"
                                                 value="{{old('u_phone', $institution->u_phone) }}" id="phone_no" required>

                                            </div>
                                            
                                             <div class="form-group">
                                                <label>Email</label><span style="color:red">&nbsp;*</span>
                                                <input type="text" class="form-control" placeholder="" name="email" 
                                                 value="{{old('email', $institution->email) }}" required>

                                            </div>

                                   

                                  
                                      
                                </div>
                                <div class="col-md-6  edit-form-right">
                                    <label>Profile Logo</label>
                                    <div class="profile-pic">

                                        <img alt="User Pic"
                                            src="{{url('public/images').'/'.$institution->photo}}"
                                            id="profile-image1" height="200" class="img">
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
                                                <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institution->ownership=="Private")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institution->ownership=="Private-Aided")
                                        {
                                            $c2="selected";
                                        }
                                        else if($institution->ownership=="Govt.Aided")
                                        {
                                            $c3="selected";
                                        }
                                       

                                        ?>
                                              <select class="form-control" name="ownership" required>
                                                
                                                    <option value="Private"<?=$c1?>>Private</option>
                                                    <option value="Private-Aided"<?=$c2?>>Private Aided</option>
                                                    <option value="Govt.Aided"<?=$c3?>>Govt. Aided</option>
                                                </select>

                                            </div>
                                        </div>
                                        
                                        
                                         <div class="col-md-6">
                                            <div class="form-group">
                                               
                                    @if($institution->type=="s")
                                     <label>Board</label> <span style="color:red">&nbsp;*</span>
<input list="browsers" name="board" id="browser" class="form-control" autocomplete="off" required value="{{$institution->board}}">

                                              <datalist id="browsers">
                                                     
                                                    <option value="State">State</option>
                                                    <option value="CBSE">CBSE</option>
                                                    <option value="ICSE">ICSE</option>
                                                     
                                                </datalist>
                                                @else
                                                 <label>University</label> <span style="color:red">&nbsp;*</span>
                                                <input type="board" name="board" class="form-control" value="{{$institution->board}}" required>
                                                @endif
                                            </div>

                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Year of Establishment

                                                </label><span style="color:red">&nbsp;*</span>
                                                <input type="text" class="form-control" placeholder="" name="establishment"
                                                value="{{old('establishment', $institution->establishment) }}"required>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><span style="color:red">&nbsp;*</span>
                                                <label>Co-Ed Status

                                                </label>
                                                  <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institution->d_status==1)
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institution->d_status==2)
                                        {
                                            $c2="selected";
                                        }
                                        else if($institution->d_status==3)
                                        {
                                            $c3="selected";
                                        }
                                       

                                        ?> 
                                             <select class="form-control" name="d_status" required>
                                                
                                                    <option value="1" <?=$c1?>>All</option> 
                                                    <option value="2" <?=$c2?>>All Boys</option>
                                                    <option value="3" <?=$c3?>>All Girls</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Campus Size(In Acres)

                                                </label><span style="color:red">&nbsp;*</span>
                                                <input type="text" class="form-control" placeholder="" name="acres" value="{{old('acres', $institution->acres) }}"required>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Campus Type

                                                </label><span style="color:red">&nbsp;*</span>
                                                  <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institution->c_type=="Residential")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institution->c_type=="Non-Residential")
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
                                          value="{{old('cost', $institution->cost) }}" required>

                                    </div>
                                     <div class="form-group">
                                        <label>Average maximum fee per year </label><span style="color:red">&nbsp;*</span>
                                        <input type="number" class="form-control" placeholder="" name="cost_max" 
                                          value="{{old('cost_max', $institution->max_cost) }}" required>

                                    </div>
                                    <div class="row">
                                       
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                <label>Hostel fee per year </label>
                                                <input type="number" class="form-control" placeholder="" name="m_fees"
                                                   value="{{old('m_fees', $institution->m_fees) }}" >

                                            </div>   </div>
                                              <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Advance Fee </label><span style="color:red">&nbsp;*</span>
                                                <input type="text" class="form-control" placeholder="" name="admission_fees"
                                                   value="{{old('m_fees', $institution->admission_fee) }}" required>

                                            </div>   </div>
                                            
                                             
                                        </div>
                                          <div class="row"> <div class="col-md-6"><div class="form-group">
                                                <label>Other Fee </label><span style="color:red">&nbsp;*</span>
                                                <input type="text" class="form-control" placeholder="" name="other_fees"
                                                   value="{{old('other_fees', $institution->other_fees) }}" >

                                            </div> </div></div>
                           
                                    


                                </div>
                            </div>

                            <div class="row">
                                 @if($institution->type=="s")
                                     <div class="col-md-6 left-sec">
                                    <h4 class="edit-form-text">Academic Status</h4>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Class offered

                                                </label><span style="color:red">&nbsp;*</span>
                                                <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institution->c_offered==1)
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institution->c_offered==2)
                                        {
                                            $c2="selected";
                                        }
                                        else  if($institution->c_offered==3)
                                        {
                                            $c3="selected";
                                        }
                                        else  if($institution->c_offered==4)
                                        {
                                            $c4="selected";
                                        }
                                       
                                       

                                        ?>
                                                <select class="form-control" name="c_offered" required>
                                    <option value="1"<?=$c1?>>LKG to 10th</option>
                                    <option value="2"<?=$c2?>>LKG to 12th</option>
                                    <option value="3"<?=$c3?>>1st to 10th</option>
                                    <option value="4"<?=$c4?>>1st to 12th</option>
                                                </select>

                                            </div>
                                        </div>
                                        


                                       
                                        

                                    </div>




                                </div> 
@endif
                              
                                <div class="col-md-6 right-sec">
                                    <h4 class="edit-form-text"> Admission Dates</h4>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date </label><span style="color:red">&nbsp;*</span>
                                                <input type="date" class="form-control" placeholder="" name="start_date" 
                                                value="{{old('start_date', $institution->start_date) }}" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>End Date </label><span style="color:red">&nbsp;*</span>
                                                <input type="date" class="form-control" placeholder="" name="end_date" 
                                                value="{{old('start_date', $institution->end_date) }}" required>

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
                                         <?php
                                        $c1=$c2=$c3=$c4=$c5="";
                                        if($institution->eligibility=="On-Merit")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institution->eligibility=="Entrance-Test")
                                        {
                                            $c2="selected";
                                        }
                                      else  if($institution->eligibility=="Merit-and-Entrance-test")
                                        {
                                            $c3="selected";
                                        }
                                        else  if($institution->eligibility=="Merit-and-Interview")
                                        {
                                            $c4="selected";
                                        }
                                        else  if($institution->eligibility=="Merit-Entrance-and-Interview")
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


                                        <input type="number" class="form-control" placeholder="" name="marks"  value="{{old('marks', $institution->marks) }}" required>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Average Seats per class

                                        </label><span style="color:red">&nbsp;*</span>
                                        <input type="number" class="form-control" placeholder=""  name="seats"  value="{{old('seats',$institution->seats) }}" required>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Hostel Accomodation</label>
                                        <input type="text" class="form-control" placeholder=""  name="test"  value="{{old('seats',$institution->hostel_num) }}">


                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Student Interaction

                                        </label><span style="color:red">&nbsp;*</span>
                                           <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institution->s_interaction=="Online")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institution->s_interaction=="At-Office")
                                        {
                                            $c2="selected";
                                        }
                                           else  if($institution->s_interaction=="Online & Offline")
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
                                        <label>Parents Interaction</label><span style="color:red">&nbsp;*</span>
                                         <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institution->p_interaction=="Online")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institution->p_interaction=="At-Office")
                                        {
                                            $c2="selected";
                                        }
                                          else  if($institution->p_interaction=="Online & Offline")
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
                                        <label>Form Availablity </label><span style="color:red">&nbsp;*</span>
                                         <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institution->form_availibility=="Online")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institution->form_availibility=="At-Office")
                                        {
                                            $c2="selected";
                                        }
                                          else  if($institution->form_availibility=="Online & Offline")
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
                                        <label> Fee Payment</label><span style="color:red">&nbsp;*</span>
                                           <?php
                                        $c1=$c2=$c3=$c4="";
                                        if($institution->form_payment=="Online")
                                        {
                                          $c1="selected";
                                        }
                                        else  if($institution->form_payment=="At-Office")
                                        {
                                            $c2="selected";
                                        }
                                         else  if($institution->form_payment=="Online & Offline")
                                        {
                                            $c3="selected";
                                        }
         
                                        ?>
                                        <select class="form-control" name="form_payment" required>
                                      
                                            <option value="Online"<?=$c1?>>Online</option>
                                            <option value="At-Office"<?=$c2?>>At Office</option>
                                            <option value="Online & Offline"<?=$c3?>>Online & Offline</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      
                                        <label for="browser">School Timing</label><span style="color:red">&nbsp;*</span>
                               <input list="browsers"  id="browser"class="form-control" name="school_time" value="{{$institution->school_time}}"required>

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
                                        <input list="browsers1"  id="browser1"class="form-control" name="office_time" value="{{$institution->office_time}}"required>

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
                            <?php
                                   $aw1=$aw2=$aw3="";
                                    if($institution->awards)
                                    {
                                          $awards=$institution->awards;
                                          $awd_count=count($institution->awards);
                                          for($i=0;$i<count($institution->awards);$i++)
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
                                            
                                            $student=$institution->student_name;
                                            $student=(array)$institution->student_name;
                                            $scount=count($student);
                                            // print_r($student);exit();
                                            
                                            
                                            // print_r($student);exit();
                                            $student_description=$institution->student_description;
                                            $student_description=(array)($institution->student_description);
                                            $facilities=(array)($institution->facilities);
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
                            <style>
                                .faciliti-sec .btn-save-sec{
                                  display:block;
                                  margin-top:0rem;
                                }
                                .faciliti-sec .btn-save-sec .btn {
                                   padding: 0.5rem 0rem 0.5rem 0.5rem !important;
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
                            @if($institution->facilities)
                @for($i=0;$i<$facil_count;$i++)      
                            <div class='col-md-4 mb-3'  style='display:flex; align-items:center'>  
                     
    <input type='text'name='Facilities[]' class='form-control' id="taskname" style='border-radius: 3px 0px 0px 3px;' value="<?php echo $facilities[$i]; ?>">
    <i class='fa fa-times  delete btn btn-sb js-remove-exam' style='border-radius: 0px 3px 3px 0px; background: #FF4005; height: 100%; color: #fff;' aria-hidden='true'></i></div> 
   @endfor
                @endif                        
                                         
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
                                                        <img alt="your image" class="portimg" src="#" >
                                                    </div>
                                                    <div class="socialmediaside2">

                                                        <div class="form-group hirehide is-empty is-fileinput width100 martop10">
                                                             
                                                            <input class="fileUpload" accept="image/jpeg, image/jpg"
                                                                name="gallery[]" type="file" value="Upload">

                                                        </div>
                                                    </div>

                                                </div>
                                                   </div>
                                                   <div class="row">
                                          @if($institution->gallery)
                                            <?php
											$Features=$institution->gallery;
											$Features_count=count($institution->gallery);
											for($i=0;$i<$Features_count;$i++)
											{
											?>
                                         


                                                    <div class="upload-demo col-lg-3" style="flex-direction: column; justify-content: center; align-content: center; gap: 10px;align-items: center;">
                                                        <div>
                                                        <img alt="your image" class="portimg" style="display:block" src="{{ url('public/images/'. $Features[$i]) }}" > </div>
                                                        <div class="removebtnimg">
                                                            <a href="{{url('remove_ins_image')}}/{{$i}}/{{$institution->id}}"><button type="button" class="btn  btn-sm remove_field"><span class="glyphicon glyphicon-trash">Remove</span></button></a></div>
                                                    </div>
                                         

                                        
                                              <?php	
											    
											}
							                ?>
							                @endif    </div>
                                        </div>
                                      
                                        <div class="col-md-12 mt-3">
                                            
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
                                                        <video alt="your image" class="portimg-1" src="#"  ></video>

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
                                            <div class="row">
                                            <?php
											$Features=$institution->videos;
											$Features_count=count($institution->videos);
											for($i=0;$i<$Features_count;$i++)
											{
											?>
                                           

                                                    <div class="upload-demo col-md-3 " style="flex-direction: column; justify-content: center; align-content: center; gap: 10px;align-items: center;">
                                                      <div>  <video alt="your image" class="portimg-1" src="{{ url('public/images/'. $Features[$i]) }}" style="display:block" ></video>
                                                        </div>
                                                        <div class="removebtnimg">
                                                            <a href="{{url('remove_ins_video')}}/{{$i}}/{{$institution->id}}"><button type="button" class="btn  btn-sm remove_field"><span class="glyphicon glyphicon-trash">Remove</span></button></a></div>
                                                    </div>
                                                 

                                           
                                             <?php
                                             }
							                ?>
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
                                                <input type="text" class="form-control" placeholder="" name="u_location" value=""
                                                value="{{old('u_location', $institution->u_location) }}">

                                            </div>
                                        </div>
                                    
                                    </div>
                                    
                                    
                                   
                                             

                                       
                                       
                          
                                      
                                     
                                    <div class="btn-save-sec">
                                        
                                        
                                        <button type="submit" class="btn btn-sb sign-up-btn">
                                          Submit
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
            <style>
           
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
            padding: 0.6rem 0.7rem;

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
    text-align: center;
    padding: 13px 10px;
}

.profile-pic img{


    box-shadow: 0px 0px 5px 0px #c1c1c1;
    cursor: pointer;
    width: 150px !important;
    height: 150px;
}
#profile-image-upload{
    display: none;
}
.edit-form-right{
    text-align: center;
}
.edit-form-right label{
    text-align: left;
    margin-right: 5rem;
}
.edit-form-text{
    color:black !important;
    margin-top: 2rem;
    font-size: 23px !important;
}

#form-exams-list input{
    padding: 10px;
margin-bottom: 1rem;
}
  .school-edit-form .form-school a{
    color:#000 !important;
    text-decoration: none;

  }
  .school-edit-form .form-school a:hover{
    color:#FF4005 !important;
  }
  .school-edit-form  .school-form-box{
    box-shadow: none;

  }
  .school-edit-form .form-school .box-my-acc  {
    text-align: left;
}
.school-edit-form  .school-form-box form input,  .school-edit-form  .school-form-box form select {
    height: 41px;
    border: 1px solid #FF4005 !important;

}
.school-edit-form  .school-form-box form textarea{
    border: 1px solid #FF4005 !important;
}
.school-edit-form label {
    color: #000000 !important;
    font-weight: 600;
    margin-top:0.8rem;
}
.profile-badge{
    border:1px solid #c1c1c1;
    padding:5px;
    position: relative;
}

.user-detail{
    background-color: #fff;
    position: relative;
    padding:115px 0px 10px 0px;
    color:#8B8B89;
}
.user-detail h3{
    margin: 0px;
    margin:0px 0px 5px 0px;
    color: #000;
}
.user-detail p{
    font-size:14px;
}
.js-add--exam-row{
    width: 40px;
    height: 40px;
    line-height: 12px;
    padding: 8px;
    margin-bottom: 1rem;
    border-radius: 100%;
    background: rgba(255, 64, 5, 0.73);
    color: #fff;
    padding: 0 1rem 0 1.4rem;
}

.js-add--exam-row i{
    font-size: 20px;
}
.js-remove--exam-row, .js-remove--exam-row:hover, .js-add--exam-row:hover{
  background: #FF4005;
}
.faciliti-sec .form-check-inline label{
font-weight: 400;
font-size: 15px;
margin-top: 0%;
}
.faciliti-sec{
    margin-top: 1.5rem;
}
.faciliti-sec .form-check-inline input{
    margin: 0px 20px 0px 5px;
}

  .faciliti-sec .form img{
  height: 150px;
    width: 150px;
    object-fit: fill;}

  .faciliti-sec .form__container{
    text-align: center;
    display: block;
    padding-top:2.5rem ;
  }
  .faciliti-sec .form__container .btn,  .faciliti-sec .form__container .btn:hover{
    margin-top: 1rem;
    color: #fff !important;
  }
  .school-edit-form .form-school a.btn{
    color: #fff !important;
  }
  .school-edit-form .form-check-inline {
    flex-flow: row wrap;
  }
  .school-edit-form .form-check-inline input{
    width: 15px;
  }
  .school-edit-form .school-form-box .btn-save-sec .btn {
    padding: 0.5rem 2rem;
}
.school-edit-form .my-acc-home {
    padding: 0rem 0rem 2rem 0rem;
}
.school-edit-form .left-sec{
    padding-right: 5rem;
}
.school-edit-form .right-sec{
    padding-right: 5rem;
}


.upload__box, .upload__box-1 {
    padding: 40px;
    border: 1px solid #E1E1E1;
    border-radius: 10px;
    text-align: center;
    background: #D9F1F6;

}
  .upload__inputfile,  .upload__inputfile-1 {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  .upload__btn, .upload__btn:hover,   .upload__btn-1, .upload__btn-1:hover {
    display: inline-block;
    font-weight: 600;
    color: #fff !important;
    text-align: center;
    min-width: 116px;
    padding: 5px 15px;
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid;
    background-color:
    #FF4005;
    border-color:
    #FF4005;
    border-radius: 8px;
    margin-top: 0% !important;

    font-size: 16px;
  }
  label.upload__btn,   label.upload__btn-1{
    color: #fff !important;
  }
  label.upload__btn p, label.upload__btn-1 p{
    color: #fff !important;
    margin-bottom: 0% !important;
  }

  .upload__btn-box,   .upload__btn-box-1 {
    margin-bottom: 10px;
  }
  .upload__img-wrap,   .upload__img-wrap-1 {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -10px;
    justify-content: center;
  }
  .upload__img-box,   .upload__img-box-1 {
    width: 150px;
    padding: 0 10px;
    margin-bottom: 12px;
  }
  .upload__img-close,   .upload__img-close-1 {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    top: 10px;
    right: 10px;
    text-align: center;
    line-height: 24px;
    z-index: 1;
    cursor: pointer;
  }
  .upload__img-close:after,  .upload__img-close-1:after {
    content: "âœ–";
    font-size: 14px;
    color: white;
  }
.btn-save-sec {
    display: flex;
    justify-content: center;
    margin: auto;
    margin-top: 2rem;
}
.school-edit-form .school-form-box .btn-save-sec .btn {
    padding: 0.5rem 2rem;
}
.school-edit-form .school-form-box .btn-save-sec .btn-sb, .school-edit-form .school-form-box .btn-save-sec .btn-sb:hover {
     background: #FF2E00; 
    color: white;
    height: 43px;
}
  .js-remove--exam-row{
                height: 40px;
    width: 40px;
    padding: 0rem;
    line-height: 1.6;
    padding-left: 0.4rem;
            }
            
            @media (min-width:1200px) and (max-width:1300px){
                .school-edit-form label {
 
    font-size: 13px !important;}
            }
            </style>
           

           
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


            @endpush
  
         

            @push('js')
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
  document.querySelector('#push').onclick = function(){
      
    if(document.querySelector('#newtask input').value.length == 0){
        alert("Kindly Enter facilities!!!!")
    }

    else{
       
        document.querySelector('#tasks').innerHTML += `
         <div class='col-md-4 mb-3'  style='display:flex; align-items:center'>  <input type='text'name='Facilities[]' class='form-control' id="taskname" style='border-radius: 3px 0px 0px 3px;' value="${document.querySelector('#newtask input').value}"><i class='fa fa-times  delete btn btn-sb js-remove-exam' style='border-radius: 0px 3px 3px 0px; background:#FF4005;    height: 100%;color: #fff;' aria-hidden='true'></i></div>
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
 $(document).on('click', '.js-remove-exam', function (e) {
                e.preventDefault();
                return $(this).parent().remove();
            });
</script> 


<script>
  document.querySelector('#push-1').onclick = function(){
      
    if((document.querySelector('#newtask-1 .input-1').value.length == 0) || (document.querySelector('#newtask-1 .input-2').value.length == 0)){
        alert("Kindly Enter facilities!!!!")
    }

    else{
       
        document.querySelector('#tasks-1').innerHTML += `
        
        `;
  document.getElementById('textfield1').value = "";
    document.getElementById('textfield12').value = "";
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
        $(function() {
            $('#course_id').change(function() {

                var id = $(this).val();


                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: 'get_subcat',
                    data: {
                        'id': id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(data) {


                        $("#sub_cat").html(data);
                    }
                });
            });
        });
    </script>
@endpush
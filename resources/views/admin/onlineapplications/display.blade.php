
<?php
// print_r($listing->infrastructure);exit();
?>
@extends('admin.layout.master')
@section('content')

<div class="row">
	<div class="col-md-12">
	<a onclick="history.back()" class="btn btn-sm"
                                style="background-color: #FF4005;color:white;float:right;line-height: 1.9;margin-bottom:1rem"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i>&nbsp;&nbsp;Back</a>
                                      <a href="{{url('admission_pdf1/'.$listing->id)}}" target="blank" class="btn btn-primary" ><i class="fas fa-share-square"></i>&nbsp;Export To PDF</a>
                                      
                                       <a href="{{ route('onlineapp_destroy',$listing->id) }}"  class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this student details?');">Cancel</a>
                                      
                                      
									<div class="clearfix"><br></div>
									
									
		<div class="card">
			<div class="card-body">


<!-- Button trigger modal -->

     <div class="profile-detail-form">
            <main>

              <div>
              <form action="{{route('application_store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                           
                               <h4>Student Details</h4>

                            <div class="row">
                                <div class=" profile-form">
                                    <img src="{{url('public/images/apptemp/'.$listing->photo)}}" style="width: 250px; margin-top: 1rem; height: 250px;">
                                </div>
                            </div>
                         

                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name of the Student
                                        </label>
                                           <input type="text" class="form-control" placeholder="" name="name" value="{{ $listing->name }}" readonly>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Email ID</label>
                                       <input type="email" class="form-control" placeholder="" name="email" value="{{ $listing->email }}" readonly>

                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth
                                        </label>
                                        <input type="date" class="form-control" placeholder="" name="dob"  value="{{ $listing->dob }}" readonly>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label><br>
                                        
                                        @if($listing->gender=="option1")
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio1" value="option1" checked>
                                            <img src="{{url('public/images/male.png')}}">
                                        </div>
                                        @else
                                         <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                id="inlineRadio2" value="option2" name="gender" checked>
                                            <img src="{{url('public/images/female.png')}}">
                                        </div>
                                        @endif

                                    </div>

                                </div>

                            </div>
                            <div class="row  third-row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>In Which Class</label>
                                      <input type="text" class="form-control" placeholder="" name="s_class"  value="{{ $listing->s_class }}" readonly>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Religion</label>
                                  <input type="text" class="form-control" placeholder="" name="religion" value="{{ $listing->religion }}" readonly>

                                </div>

                            </div>
                             <div class="row  third-row"> 
                             <div class="col-md-6">
                                    <label>Caste</label>
                                   <input type="text" class="form-control" placeholder="" name="cast"  value="{{ $listing->cast }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                            <input type="text" class="form-control" placeholder="" name="category"  value="{{ $listing->category }}" readonly>

                                    </div>
                                </div></div>
                                    <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Student (Adhar card) No.
                                        </label>
                                         <input type="text" class="form-control" placeholder="" name="adhaar" value="{{ $listing->adhaar}}" readonly>

                                    </div>
                                </div>
                               
                                
                            </div>
<hr>
 <h4 >Parent Details</h4><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Father’s Name
                                        </label>
                                         <input type="text" class="form-control" placeholder="" name="f_name" value="{{ $listing->f_name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" placeholder="" name="f_phone" value="{{ $listing->f_phone }}" readonly>

                                    </div>
                                </div>


                            </div>

                            <div class="row  third-row">
                                <div class="col-md-4">
                                    <label>Qualification</label>
                                      <input type="text" class="form-control" placeholder="" name="f_qualification"   value="{{ $listing->f_qualification }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Occupation</label>
                                      <input type="text" class="form-control" placeholder="" name="f_occupation" value="{{ $listing->f_occupation }}" readonly>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Annual Income</label>
                                            <input type="text" class="form-control" placeholder="" name="f_income"  value="{{ $listing->f_income }}" readonly>


                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mother’s Name
                                        </label>
                                          <input type="text" class="form-control" placeholder="" name="m_name" value="{{ $listing->m_name }}" readonly>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                         <input type="text" class="form-control" placeholder="" name="m_phone" value="{{ $listing->m_phone }}" readonly>

                                    </div>
                                </div>


                            </div>

                            <div class="row  third-row">
                                <div class="col-md-4">
                                    <label>Qualification</label>
                                      <input type="text" class="form-control" placeholder="" name="m_qualification" value="{{ $listing->m_qualification }}" readonly>

                                </div>
                                <div class="col-md-4">
                                    <label>Occupation</label>

                                     <input type="text" class="form-control" placeholder="" name="m_occupation" value="{{ $listing->m_occupation }}" readonly>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Annual Income</label>
                                       <input type="text" class="form-control" placeholder="" name="m_income" value="{{ $listing->m_income }}" readonly>


                                    </div>
                                </div>
                            </div>
                        <hr>
                              <h4 > Address Details</h4><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Permanent Address
                                        </label>
                                           <textarea class="form-control" rows="2" id="per-1" name="address" value="{{ $listing->address }}" readonly>{{ $listing->address }}</textarea>

                                    </div>
                                </div>
                            </div>



                            <div class="row  third-row">
                                <div class="col-md-4">
                                    <label>District</label>
                                       <input type="text" class="form-control" placeholder="" name="district"  id="per-2" value="{{ $listing->district }}" readonly>


                                </div>
                                <div class="col-md-4">
                                    <label>State</label>
                                     <input type="text" class="form-control" placeholder="" name="state" id="per-3" value="{{ $listing->state }}" readonly>


                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>PIN Code</label>
                                       <input type="text" class="form-control" placeholder="" id="per-4" name="pincode" value="{{ $listing->pincode }}" readonly>

                                    </div>
                                </div>
                            </div>

                            <div class="row  third-row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-check form-check-inline" style="display:flex; align-items:center">
                                        <input class="form-check-input" type="checkbox" id="address_same" checked>
                                        <label class="form-check-label"> Same as Permanent Address</label>
                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Correspondence Address
                                        </label>
                                             <textarea class="form-control" rows="2" id="cor-1" name="cor_address" value="{{ $listing->cor_address }}" readonly>{{ $listing->cor_address }}</textarea>

                                    </div>
                                </div>
                            </div>

                            <div class="row  third-row">
                                <div class="col-md-4">
                                    <label>District</label>
                                   <input type="text" class="form-control" placeholder=""  id="cor-2" name="cor_district" value="{{ $listing->cor_district }}" readonly>

                                </div>
                                <div class="col-md-4">
                                    <label>State</label>
                                     <input type="text" class="form-control" placeholder="" id="cor-3" name="cor_state" value="{{ $listing->cor_state }}" readonly>


                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>PIN Code</label>
                                      <input type="text" class="form-control" placeholder="" id="cor-4" name="cor_pincode" value="{{ $listing->cor_pincode }}" readonly>


                                    </div>
                                </div>
                            </div>
                            
                               <hr>
                               
                               <h4 >Institute Details</h4><br>
                               
                                 <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name Of Institute</label>
                                      <input type="text" class="form-control" placeholder="" id="cor-4" name="cor_pincode" value="{{$institute->name}}" readonly>


                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address </label>
                                      <input type="text" class="form-control" placeholder="" id="cor-4" name="cor_pincode" value="{{$institute->address}}" readonly>


                                    </div>
                                </div>
                                
                                 <div class="row  third-row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                   <input type="text" class="form-control" placeholder=""  id="cor-2" name="cor_district" value="{{$institute->u_phone}}" readonly>

                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                      <input type="text" class="form-control" placeholder="" id="cor-4" name="cor_pincode" value="{{$institute->email}}" readonly>


                                    </div>
                                </div>
                            </div>
                            </div>

                          <hr>
                              <h4 >Billing Info</h4><br>
                               <div class="row">
                                   <div class="row  third-row">
                                <div class="col-md-6">
                                    <label>Amount</label>
                                   <input type="text" class="form-control" placeholder=""  id="cor-2" name="cor_district" value="{{$institute->admission_fee}}" readonly>

                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mode Of Payment</label>
                                         @if($listing->mode_of_pay==1)
                                      <input type="text" class="form-control" placeholder="" id="cor-4" name="cor_pincode" value="Offline" readonly>
                                         @else($listing->mode_of_pay==2)
                                          <input type="text" class="form-control" placeholder="" id="cor-4" name="cor_pincode" value="Online" readonly>
                                          @endif


                                    </div>
                                </div>
                            </div>
                            
                            
                               <div class="row  third-row">
                                <div class="col-md-6">
                                    <label>Date</label>
                                   <input type="text" class="form-control" placeholder=""  id="cor-2" name="cor_district" value="{{date('d-m-Y',strtotime($listing->created_at))}}" readonly>

                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        @if($listing->status==1)
                                      <input type="text" class="form-control" placeholder="" id="cor-4" name="cor_pincode" value="Payment Completed" readonly>
                                      @else
                                       <input type="text" class="form-control" placeholder="" id="cor-4" name="cor_pincode" value="Payment Not Completed" readonly>
                                       @endif
                                         


                                    </div>
                                </div>
                            </div>
                                   
                                   </div>

  
                        </form>
              </div>
            </main>
          </div>
					

					
				


					 


				

@endsection
@push('top-area')
<!--<button class="btn btn-primary" data-toggle="modal" data-target="#actionModal">@lang('Action')</button>-->
@endpush
@push('css')
<style>
	.listing-data th{
		width: 150px;
	}
	.feature-list{
	    color:black;
	    font-weight:500;
	}
		.feature-list ul{
		    list-style:ordered;
		    margin-left:1rem;
		}
		.extra-img img{
		    height:275px;
		}
		.tbale-1{
			margin-top:2rem;
		}
	.tbale-1 table th, .tbale-1 table td{
		
padding:10px 20px !important;
	}
	
element.style {
}
.tbale-1 table th, .tbale-1 table td {
    padding: 10px 20px !important;
}
table th:last-child, table td:last-child {
    text-align:left !important;
}
.listing-data th {
    width: 30%;
}
</style>
@endpush

<?php
// print_r($listing->infrastructure);exit();
?>
@extends('admin.layout.master')
@section('content')

<div class="row">
	<div class="col-md-12">
	<a onclick="history.back()"class="btn btn-sm"
                                style="background-color: #FF4005;color:white;float:right;line-height: 1.9;margin-bottom:1rem"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i>&nbsp;&nbsp;Back</a>
									<div class="clearfix"><br></div>
		<div class="card">
			<div class="card-body">


			<div class="card-header" style="display: flex;
                              justify-content: space-between;">
                            <h3 class="card-title">College Details</h3>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Action
</button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
 Add
</button>

                        </div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{url('clg_action')}}" method="post">
		@csrf
		<label></label>
		<input type="hidden" value="{{$listing->id}}" name="id">
		<select class="form-control" name="action">
			<option value="1">Approved</option>
			<option value="3">Rejected</option>
		</select>
		<br>
		<textarea type="message"  class="form-control" row="5" name="message" placeholder="message"></textarea>
		
	  
      </div>
      <div class="modal-footer">
	  <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>





<!-- Modal2 -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Display</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <section class="my-acc-home form-school">
               
                <div class="box-my-acc school-form-box">
                    <div class="container">
                        <form action="{{route('college_offered')}}" method="post" enctype="multipart/form-data">
                            @csrf





                            <div class="row card">
                                <div class="col-md-10 left-sec">
                                    <h4 class="edit-form-text">Courses Offered </h4>
                                    <div class="row">
                                        <div class="col-md-4 ">
                                            <div class="form-group">
                                                <label>Course</label>


                                                <select class="form-control" name="course_id" id="course_id" required>
                                                    <option value="">@lang('Select One')</option>
                                                    @foreach ($courses as $c)
                                                    <option value="{{$c->id }}">
                                                        {{ $c->name }}
                                                    </option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Academic streams </label>

                                                <select class="form-control" name="stream_id" id="sub_cat" required>
                                                    <option value="">@lang('Select course')</option>


                                                </select>

                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="btn-save-sec">
                                                <button type="submit" class="btn btn-sb"><i class="fa fa-plus" aria-hidden="true"></i></button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                    </div>


                    </form>
                </div>
        </div>
        </section>
        <section class="school-edit-form">

            <div class="container course-off-sec my-acc-home form-school">
                <div class=" card">
                <div class="row">
                    <div class="col-md-1">
                        <label></label>
                    </div>
                    <div class="col-md-3"> <label>Course Name</label></div>
                    <div class="col-md-3"> <label>Stream Name</label>
                    </div>
                    <!--<div class="col-md-3"> <label>Institution</label></div>-->
                    <div class="col-md-2"> <label>Remove</label></div>
                </div>
                <!--<div class="row course-off-sec">-->
                <!--    @forelse($course_offered as $co)-->

                <!--    <div class="col-md-1">-->
                <!--        <div class="number"> {{ $loop->iteration }}</div>-->
                <!--    </div>-->
                <!--    <div class="col-md-3">-->
                <!--         @foreach($courses->where('id',$co->course_id)->values() as $a)-->
                <!--         <div class="form-control">  {{$a->name}}</div>-->
                <!--        @endforeach-->
                <!--    </div>-->
                <!--    <div class="col-md-3"> <div class="form-control">-->
                <!--    @foreach($stream->where('course_id',$co->course_id)->values() as $a)    -->
                <!--    {{($a->stream)}}-->
                <!--    @endforeach-->
                <!--</div></div>-->
                <!--    <div class="col-md-3"> <div class="form-control"> {{($co->ins_id)}}</div></div>-->
                <!--    <div class="col-md-2"> <div class="btn-save-sec btn-sec-del">-->
                <!--                                <button type="submit" class="btn btn-sb"><i class="fa fa-times" aria-hidden="true"></i></button>-->

                <!--                            </div></div>-->
                <!--    @empty-->
                <!--    @endforelse-->
                <!--</div>-->
        

                </div>
            </div>

   
    </section>
      </div>
    </div>
  </div>
</div>


				<div class="row">
					<div class="col-md-4">
						<img src="{{url('public/images/'.$listing->photo) }}" alt="Image" style="margin-top: 1.2rem;">
					</div>
					<div class="col-md-8">
						<h3>{{($listing->name) }}</h3>
                        <h3>{{ ($listing->u_address) }}</h3>
						<p>@php echo $listing->details @endphp</p>

                        <h3>Key School Status</h3>
						<table class="table table-bordered listing-data top-table">
						  <tbody>
						      
						      
						   	<tr>
						      <th>@lang('City')</th>
						     <td>
							     {{($listing->city) }}
							 </td>
						    </tr>
						    
						    
						   	<tr>
						      <th>@lang('State')</th>
						     <td>
							     {{($listing->state) }}
							 </td>
						    </tr>


						
						   	<tr>
						      <th>@lang('Total cost for new addmission')</th>
						     <td>
							     {{($listing->cost) }}
							 </td>
						    </tr>

						

					  	<tr>
						      <th>@lang('Monthly fees')</th>
						     <td>
							     {{($listing->m_fees) }}
							 </td>
						    </tr>

						
						</table>
					</div>
					
					
					<br>
					<br>
					<br>

<div class="container" style="padding:2rem 5rem">
				


					  <div class="col-md-12">
						    <h3 class="mt-5 mb-3">Admission Dates</h3>
						    {{date('d-m-Y',strtotime($listing->start_date))}} &nbsp;&nbsp;   TO &nbsp;&nbsp; {{date('d-m-Y',strtotime($listing->end_date))}}
					</div>


					<br>
					<br>
					<br>

					
					<div class="row tbale-1">
					<h3>Admission Criteria and Eligibility</h3>
					 <table class=" table-bordered listing-data">
		                  <tbody class="cur-body">
						  <tr>
						      <th>@lang('Eligibility')</th>
						     <td>
							     {{($listing->eligibility) }}
							 </td>
						    </tr>

							<tr>
						      <th>@lang('Marks')</th>
						     <td>
							     {{($listing->marks) }}
							 </td>
						    </tr>

							

							<tr>
						      <th>@lang('Total seats')</th>
						     <td>
							     {{($listing->seats) }}
							 </td>
						    </tr>

							

							<tr>
						      <th>@lang('Student interaction')</th>
						     <td>
							     {{($listing->s_interaction) }}
							 </td>
						    </tr>

							<tr>
						      <th>@lang('Parent interaction')</th>
						     <td>
							     {{($listing->p_interaction) }}
							 </td>
						    </tr>

							<tr>
						      <th>@lang('Form availibility')</th>
						     <td>
							     {{($listing->form_availibility) }}
							 </td>
						    </tr>

							<tr>
						      <th>@lang('Form payment')</th>
						     <td>
							     {{($listing->form_payment) }}
							 </td>
						    </tr>

							<tr>
						      <th>@lang('School timing')</th>
						     <td>
							     {{($listing->school_time) }}
							 </td>
						    </tr>

							<tr>
						      <th>@lang('Office timing')</th>
						     <td>
							     {{($listing->office_time) }}
							 </td>
						    </tr>
		                  		
		                  </tbody>
		              </table>
		                
					  </div>

					  <div class="col-md-12">
						    <h3 class="mt-5 mb-3">Academic Achievements</h3>
					{{($listing->awards )}}
					</div>


					<div class="row tbale-1">
					<h3>Student Achievers</h3><br><br><br>
						<table class=" table-bordered listing-data">
							 <thead>
							   <tr>
							   <th scope="col">@lang('Student Name')</th>
								 <th scope="col">@lang('Description')</th>
							   </tr>
							 </thead>
							 <tbody>
							 <?php
							$student_name=$listing->student_name;
							$student_name=(array)$student_name;
							$student_description=$listing->student_description;
							$student_description_count=count($listing->student_description);
							$student_name_count=count($student_name);
							
							for($i=0;$i<$student_name_count;$i++)
							{
							    ?>
								<tr>
									<td> <?php echo $student_name[$i];?></td>
									<td><?php echo $student_description[$i];?></td>
								</tr>
								<?php	}
							?>
							 </tbody>
					
					

									
						
						
						</tbody>
						 </table>
						   
						 </div>

					<br>
					<br>
					<br>

					
					<div class="row tbale-1">
					<h3>Facilities</h3><br><br><br>
				    <table class=" table-bordered listing-data">
		                 
		                  <tbody class="cur-body">
		                  		<tr>
								  <th scope="col">@lang('Class')</th>
								  <td> 
									<?php
							$class=$listing->class;
							$class_count=count($listing->class);
							for($i=0;$i<$class_count;$i++)
							{
							    ?>
							    <li>
							   <?php echo $class[$i];?>
							   </li>
							   
						<?php	}
							?>
							</td>
					           </tr>

							   <tr>
							   <th scope="col">@lang('Infrastructure')</th>
								  <td>
								  <?php
								  $infrsatructure=$listing->infrastructure;
								//   print_r($listing->infrsatructure);
								  $infrsatructure=(array)$infrsatructure;
							$infrsatructure_count=count($infrsatructure);
							for($i=0;$i<$infrsatructure_count;$i++)
							{
							    ?>
							    <li><?php
								echo"hi";
								// print_t($listing->infrsatructure);exit();
								?>
							   <?php echo $infrsatructure[$i];?>
							   </li>
							   
						<?php	}
							?>
								</td>
					           </tr>

					             <tr>
								 <th scope="col">@lang('Safety and security')</th>
								  <td>
								  <?php
							$security=$listing->security;
							$security_count=count($listing->security);
							for($i=0;$i<$security_count;$i++)
							{
							    ?>
							    <li>
							   <?php echo $security[$i];?>
							   </li>
							   
						<?php	}
							?>
									
								</td>
								</tr>

								<tr>
								<th scope="col">@lang('Lab')</th>
								  <td>
								  <?php
							$lab=$listing->lab;
							$lab_count=count($listing->lab);
							for($i=0;$i<$lab_count;$i++)
							{
							    ?>
							    <li>
							   <?php echo $lab[$i];?>
							   </li>
							   
						<?php	}
							?>
									
								 </td>
								</tr>


								<tr>
								<th scope="col">@lang('Extra activities')</th>
								  <td>
								  <?php
							$activities=$listing->activities;
							$activities_count=count($listing->activities);
							for($i=0;$i<$activities_count;$i++)
							{
							    ?>
							    <li>
							   <?php echo $activities[$i];?>
							   </li>
							   
						<?php	}
							?>
						
						</td>
								</tr>

								<tr>
								<th scope="col">@lang('Sports activities')</th>
								  <td>
								  <?php
							$s_activities=$listing->s_activities;
							$s_activities_count=count($listing->s_activities);
							for($i=0;$i<$s_activities_count;$i++)
							{
							    ?>
							    <li>
							   <?php echo $s_activities[$i];?>
							   </li>
							   
						<?php	}
							?>
								
								</td>
					           </tr>
		                  			
		                        </tr>
		                  		
		                  </tbody>
		              </table>
		                
					  </div>
				
					 
<br>
<br>
<br>

					  <div class="col-md-12">
						
						<div class="row mt-3">
						<h4>@lang('Gallery')</h4><br><br><br>
						<?php
							$Features=$listing->gallery;
							$Features_count=count($listing->gallery);
							for($i=0;$i<$Features_count;$i++)
							{
							    ?>
							    <div class="col-md-4 extra-img">
							    <img src="{{ url('public/images/'. $Features[$i]) }}" alt="Image">
							 </div>
							  
							   
						<?php	}
							?>	
						</div>
					</div>


					<div class="col-md-12">
						
						<div class="row mt-3">
						<h4>@lang('Videos')</h4><br><br><br>
						<?php
							$Features=$listing->videos;
							$Features_count=count($listing->videos);
							for($i=0;$i<$Features_count;$i++)
							{
							    ?>
							    <div class="col-md-4 extra-img">
							    <video controls="controls" preload="none"  width="300" height="200" src="{{ url('public/images/'. $Features[$i]) }}"  >
							 </div>
					<?php	}
							?>	
						</div>
					</div>


					<div class="col-md-12">
						    <h3 class="mt-5 mb-3">Address and Contact Details</h3>
					<p>Address :
					{{($listing->u_address )}}
					</p>
					<br>

					<p>Phone number :
					{{($listing->u_phone )}}
					</p>
					<br>

					
					
					<br>

					</div>	<div class="col-md-12">
					<p>Location link</p>
					@php echo $listing->u_location @endphp
					</div>
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
	.top-table th{
		width:auto;
	}
	table.top-table  td:last-child{
		text-align: left;
	}
	table th:last-child, table td:last-child {
    text-align: left;
}
video{width:100%}
  .school-edit-form .school-form-box form .socialmediaside2 input {
            border: none !important;
            margin-top: 1rem;
            width: 1%;
        }
         .school-edit-form .school-form-box form input,
        .school-edit-form .school-form-box form select {
            font-size: 18px;
            height: 100%;

        }
        .school-edit-form label {
            font-size: 20px;
        }
         .school-edit-form .school-form-box .btn-save-sec .btn {

            border-radius: 100%;
            padding-left: 0%;
            padding-right: 1rem;
            font-size: 24px;
            line-height: 1;
            width: 53px;
            height: 53px;
        }
        .school-edit-form .card{
    border-radius: 10px;
    border: none;
    box-shadow: 0 0 5px rgb(181 181 181);
 
    padding: 1.5rem;

}
</style>
@endpush
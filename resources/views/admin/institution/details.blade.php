<?php
// print_r($listing->infrastructure);exit();
?>
@extends('admin.layout.master')
@section('content')


<div class="row">
    <div class="col-md-12">
        <a href="{{url('institution')}}?cat={{$_GET['cat']}}" class="btn btn-sm" style="background-color: #FF4005;color:white;float:right;line-height: 1.9;margin-bottom:1rem"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;Back</a>
        <div class="clearfix"><br></div>
        <div class="card">



            <div class="card-header" style="display: flex;
                              justify-content: space-between;">
                <h3 class="card-title">User Details</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <label style="color:#000;font-weight:500">User Name:&nbsp; &nbsp;{{$user->user_name}} </label><br>

                        <label style="color:#000;font-weight:500">Mobile Number:&nbsp; &nbsp; {{$user->user_phone}}</label><br>

                        <label style="color:#000;font-weight:500">Email:&nbsp; &nbsp; {{$user->email}}</label>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="clearfix"><br></div>
        <div class="card">
            <div class="card-body">

  <div class="card-header" style="display: flex;
                              justify-content: space-between;">
                    <h3 class="card-title">Institution Details</h3>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Action
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
                                <form action="{{url('ins_action')}}" method="post">
                                    @csrf
                                    <label></label>
                                    <input type="hidden" value="{{$listing->id}}" name="id">
                                    <select class="form-control" name="action">
                                        <option value="1">Approve</option>
                                        <option value="3">Reject</option>
                                    </select>
                                    <br>
                                    <textarea type="message" class="form-control" row="5" name="message" placeholder="message"></textarea> <br>
  <button type="submit" class="btn btn-primary btn-sm">Save changes </button>

                            </div>
                            <div class="modal-footer" style="text-align:center;justify-content: center;">
                              
                               
                                </form>
                                <?php if($user->enable_admin==0)
                                {
                                ?>
                                   <a href="{{url('enable_ins')}}?id={{$listing->id}}">
                                <button class="btn-sm btn-success" onclick="myFunction()">Enable admin access to  institution dashboard</button>
                                </a>
                             <?php
                                }
                                else
                                {
                             ?>
                                 <a href="{{url('disable_ins')}}?id={{$listing->id}}">
<button class="btn-sm btn-danger" onclick="myFunction1()">Disable admin access to  institution dashboard</button>
 </a>
 <?php
 }
 ?>
 <?php if($user->status==0)
                                {
                                ?>
                                   <a href="{{url('enable_del_ins')}}?id={{$user->id}}">
                                <button class="btn-sm btn-info" onclick="myFunction2()">Enable institution</button>
                                </a>
                             <?php
                                }
?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                    	@if($listing->photo=="" || $listing->photo==0)
                    	<img src="{{url('public/images/Artboard2.jpg') }}"alt="Image" style="margin-top: 1.2rem;">
                    	@else
                        <img src="{{url('public/images/'.$listing->photo) }}" alt="Image" style="margin-top: 1.2rem;">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h3>{{($listing->name) }}</h3>
                        <h5>{{ ($listing->address) }}</h5>
                        <p>@php echo $listing->details @endphp</p>

                        <h3>Key School Status</h3>
                        <table class="table table-bordered listing-data top-table">
                            <tbody>
                                <tr>
                                    <th>@lang('Owenership')</th>
                                    <td>
                                        {{($listing->ownership) }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>@lang('Board')</th>
                                    <td>

                                        {{($listing->board) }}
                                    </td>
                                </tr>



                                <tr>
                                    <th>@lang('Year of establishment')</th>
                                    <td>
                                        {{($listing->establishment) }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>@lang('Co-Ed status ')</th>
                                    <td><?php
                                        $c1 = $c2 = $c3 = $c4 = "";
                                        if ($listing->d_status == 1) {
                                            $c1 = "All";
                                        } else  if ($listing->d_status == 2) {
                                            $c1 = "All Boys";
                                        } else if ($listing->d_status == 3) {
                                            $c1 = "All Girls";
                                        }


                                        ?>
                                        {{($c1) }}
                                    </td>
                                </tr>

                                <!--<tr>-->
                                <!--     <th>@lang('Average fees per class')</th>-->
                                <!--    <td>-->
                                <!--     {{($listing->m_fees) }}-->
                                <!-- </td>-->
                                <!--   </tr>-->

                                <tr>
                                    <th>@lang('Campus size(In Acres)')</th>
                                    <td>
                                        {{($listing->acres) }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>@lang('Campus type')</th>
                                    <td>
                                        {{($listing->c_type) }}
                                    </td>
                                </tr>
                        </table>
                    </div>

                </div>
   </div>

                </div>   </div>

                </div>
             
<div class="row">
    <div class="col-md-12">

        <div class="clearfix"><br></div>
        <div class="card" style="padding:0rem 1rem">
            <div class="card-body">
                @if(($listing->type=="pc")||($listing->type=="ug")||($listing->type=="pu"))
                <div class="row tbale-1" style="margin-top:0rem">
                    <h3>Courses Offered</h3><br>
                    <table class=" table-bordered listing-data">
                        <thead>
                            <tr>
                                <th scope="col">@lang('Course')</th>
                               @if(($listing->type=="pc")||($listing->type=="ug"))
                                <th scope="col">@lang('Stream')</th>
                            @endif
                                <th scope="col">@lang('Course Fee')</th>
                                <th scope="col">@lang('Course Duration')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($course_offered as $co)

                            <tr>
                                <td> @foreach($courses->where('id',$co->course_id)->values() as $a)
                                    {{$a->name}}
                                    @endforeach
                                </td>
                                @if(($listing->type=="pc")||($listing->type=="ug"))
                                <td> @foreach($stream->where('id',$co->stream_id)->values() as $ad)
                                    {{($ad->stream)}}
                                    @endforeach

                                </td>
                                @endif
                                <td> {{$co->course_fee}}</td>
                                <td> {{$co->course_duration}}</td>
                            </tr>
                            @empty
                            <tr>No data</tr>
                            @endforelse
                        </tbody>






                        </tbody>
                    </table>

                </div>
   </div>   </div>   </div>   </div>
















                @else
                <div class="row">
    <div class="col-md-12">

        <div class="clearfix"><br></div>
        <div class="card" style="padding:0rem 1rem">
            <div class="card-body">
                <div class="container" style="padding:2rem 5rem">
                    <h3>Academic Status</h3><br>
                    <div class="row tbale-1">

                        <table class=" table-bordered listing-data">
                            <tbody class="cur-body">

                                <tr>

                                    <th>@lang('Class offered')</th>
                                    <td>
                                        <?php
                                        $c = "";
                                        if ($listing->c_offered == 1) {
                                            $c = "LKG to 10th";
                                        } else  if ($listing->c_offered == 2) {
                                            $c = "LKG to 12th";
                                        } else  if ($listing->c_offered == 3) {
                                            $c = "1st to 10th";
                                        } else  if ($listing->c_offered == 4) {
                                            $c = "1st to 12th";
                                        }



                                        ?>
                                        {{($c) }}
                                    </td>
                                </tr>





                            </tbody>
                        </table>
  </div>  </div>  </div>  </div> </div>
                    </div>
                    @endif
<div class="row">
    <div class="col-md-12">

        <div class="clearfix"><br></div>
        <div class="card" style="padding:0rem 1rem">
            <div class="card-body">
                    <div class="row tbale-1" style="margin-top:0rem">
                        <h3>Fee Structure</h3><br>
                        <table class=" table-bordered listing-data">
                            <tbody class="cur-body">
                                <tr>
                                    <th>@lang('Average fee per year')</th>
                                    <td>
                                        {{($listing->cost) }} - {{($listing->max_cost) }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>@lang('Hostel fee per year')</th>
                                    <td>
                                        {{($listing->m_fees) }}
                                    </td>
                                </tr>



                                <tr>
                                    <th>@lang('Advance Fees')</th>
                                    <td>
                                        {{($listing->admission_fee) }}
                                    </td>
                                </tr>





                            </tbody>
                        </table>

                    </div>
                    
                          </div>
                    </div>      </div>
                    </div>


<div class="row">
    <div class="col-md-12">

        <div class="clearfix"><br></div>
        <div class="card" style="padding:0rem 1rem">
            <div class="card-body">

                    <div class="col-md-12">
                        <h3 class="">Admission Dates</h3><br>
                        {{date('d-m-Y',strtotime($listing->start_date))}}&nbsp;&nbsp; TO &nbsp;&nbsp; {{date('d-m-Y',strtotime($listing->end_date))}}
                    </div>


                   </div>
                    </div>      </div>
                    </div>




<div class="row">
    <div class="col-md-12">

        <div class="clearfix"><br></div>
        <div class="card" style="padding:0rem 1rem">
            <div class="card-body">
                    <div class="row tbale-1"  style="margin-top:0rem">
                        <h3>Admission Criteria and Eligibility</h3><br>
                        <table class=" table-bordered listing-data">
                            <tbody class="cur-body">
                                <tr>
                                    <th>@lang('Eligibility')</th>
                                    <td>
                                        {{($listing->eligibility) }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>@lang('Minimun marks (in %)')</th>
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
                                    <th>@lang('Total hostel accomodation')</th>
                                    <td>
                                        {{($listing->hostel_num) }}
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
                                    <th>@lang('Admission fee payment')</th>
                                    <td>
                                        {{($listing->form_payment) }}
                                    </td>
                                </tr>

                                <tr>
                                       @if(($listing->type=="pc")||($listing->type=="ug")||($listing->type=="pu"))
                                    <th>@lang('Institute timing')</th>
                                    @else
                                      <th>@lang('School timing')</th>
                                      @endif
                                    
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
                    
                          </div>
                    </div>      </div>
                    </div>

<div class="row">
    <div class="col-md-12">

        <div class="clearfix"><br></div>
        <div class="card" style="padding:0rem 1rem">
            <div class="card-body">
                    <div class="col-md-12">
                        <h3 >Academic Achievements</h3><br>
                        <?php
                        $aw1 = $aw2 = $aw3 = "";
                        if ($listing->awards) {
                            $awards = $listing->awards;
                            $awd_count = count($listing->awards);
                            for ($i = 0; $i < count($listing->awards); $i++) {
                                if ($awards[0]) {
                                    $aw1 = $awards[0];
                                }
                                if ($awards[1]) {
                                    $aw2 = $awards[1];
                                }
                                if ($awards[2]) {
                                    $aw3 = $awards[2];
                                }
                            }
                        }
                        ?>
                        {{($aw1 )}}
                        <br>
                        {{($aw2 )}}
                        <br>
                        {{($aw3 )}}
                    </div>
                    
                          </div>
                    </div>      </div>
                    </div>


<div class="row">
    <div class="col-md-12">

        <div class="clearfix"><br></div>
        <div class="card" style="padding:0rem 1rem">
            <div class="card-body">
                    <div class="row tbale-1"  style="margin-top:0rem">
                        <h3>Student Achievers</h3><br>
                        <table class=" table-bordered listing-data">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('Student Name')</th>
                                    <th scope="col">@lang('Description')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $student_name = $listing->student_name;
                                $student_name = (array)$student_name;
                                $student_description = $listing->student_description;
                                $student_description_count = count($listing->student_description);
                                $student_name_count = count($student_name);

                                for ($i = 0; $i < $student_name_count; $i++) {
                                ?>
                                    <tr>
                                        <td> <?php echo $student_name[$i]; ?></td>
                                        <td><?php echo $student_description[$i]; ?></td>
                                    </tr>
                                <?php    }
                                ?>
                            </tbody>






                            </tbody>
                        </table>

                    </div>

                
                          </div>
                    </div>      </div>
                    </div>


<div class="row">
    <div class="col-md-12">

        <div class="clearfix"><br></div>
        <div class="card" style="padding:0rem 1rem">
            <div class="card-body">
                    <div class="row tbale-1"  style="margin-top:0rem">
                        <h3>Facilities</h3><br>
                        <table class=" table-bordered listing-data">
                            <?php
                            $class = $listing->facilities;
                            if ($class) {
                            ?>
                                <tbody class="cur-body">
                                    <tr>

                                        <td>
                                            <?php
                                            $class_count = count($listing->facilities);
                                            for ($i = 0; $i < $class_count; $i++) {
                                            ?>
                                                <li>
                                                    <?php echo $class[$i]; ?>
                                                </li>

                                            <?php    }

                                            ?>
                                        </td>
                                    </tr>



                                    </td>
                                    </tr>



                                    </tr>

                                    </tr>

                                </tbody>
                            <?php

                            }
                            ?>
                        </table>

                    </div>

                          </div>
                    </div>      </div>
                    </div>


                 
<div class="row">
    <div class="col-md-12">

        <div class="clearfix"><br></div>
        <div class="card" style="padding:0rem 1rem">
            <div class="card-body">
                    <div class="col-md-12">

                        <div class="row mt-3">
                            <h4>@lang('Gallery')</h4><br>
                            <?php
                            $Features = $listing->gallery;
                            $Features_count = count($listing->gallery);
                            for ($i = 0; $i < $Features_count; $i++) {
                            ?>
                                <div class="col-md-4 extra-img">
                                    <img src="{{ url('public/images/'. $Features[$i]) }}" alt="Image">
                                </div>


                            <?php    }
                            ?>
                        </div>
                    </div>


                    <div class="col-md-12">

                        <div class="row mt-3">
                            <h4>@lang('Videos')</h4><br>
                            <?php
                            $Features = $listing->videos;
                            $Features_count = count($listing->videos);
                            for ($i = 0; $i < $Features_count; $i++) {
                            ?>
                                <div class="col-md-4 extra-img">
                                    <video controls="controls" preload="none" width="300" height="200" src="{{ url('public/images/'. $Features[$i]) }}">
                                </div>
                            <?php    }
                            ?>
                        </div>
                    </div>
                          </div>
                    </div>      </div>
                    </div>

<div class="row">
    <div class="col-md-12">

        <div class="clearfix"><br></div>
        <div class="card" style="padding:0rem 1rem">
            <div class="card-body">
                    <div class="col-md-12">
                        <h3 >Address and Contact Details</h3>

                        <p>City :
                            {{($listing->city )}}
                        </p>
                       
                        <p>State :
                            {{($listing->state )}}
                        </p>
                      



                        <p>Address :
                            {{($listing->address )}}
                        </p>
                      
                        <p>Phone number :
                            {{($listing->u_phone )}}
                        </p>
                       

                        <p>Email :
                            {{($listing->email )}}
                        </p>
                       



                        <br>

                        <!--</div>	<div class="col-md-12">-->
                        <p><b>Location link</b></p>
                        @php echo $listing->u_location @endphp
                    </div>
                </div>

                          </div>
                    </div>      </div>
                    </div>

                @endsection
                @push('top-area')
                <!--<button class="btn btn-primary" data-toggle="modal" data-target="#actionModal">@lang('Action')</button>-->
                @endpush
                @push('css')
                <style>
                    .listing-data th {
                        width: 150px;
                    }

                    .feature-list {
                        color: black;
                        font-weight: 500;
                    }

                    .feature-list ul {
                        list-style: ordered;
                        margin-left: 1rem;
                    }

                    .extra-img img {
                        height: 275px;
                    }

                    .tbale-1 {
                        margin-top: 2rem;
                    }

                    .tbale-1 table th,
                    .tbale-1 table td {

                        padding: 10px 20px !important;
                    }

                    .top-table th {
                        width: auto;
                    }

                    table.top-table td:last-child {
                        text-align: left;
                    }

                    table th:last-child,
                    table td:last-child {
                        text-align: left;
                    }

                    video {
                        width: 100%
                    }
                    
                    iframe{
                        width:300px;
                        height:100%;
                    }
                </style>
                <script>
function myFunction() {
  let text = "Are you sure want to enable admin access into institution dashboard?";
  if (confirm(text) == true) {
   
  } else {
   return false;
  }
  document.getElementById("demo").innerHTML = text;
}
function myFunction1() {
  let text = "Are you sure want to Disable admin access into institution dashboard?";
  if (confirm(text) == true) {
   
  } else {
   return false;
  }
  document.getElementById("demo").innerHTML = text;
}
function myFunction2() {
  let text = "Are you sure want to Enable  access into institution dashboard?";
  if (confirm(text) == true) {
   
  } else {
   return false;
  }
  document.getElementById("demo").innerHTML = text;
}
</script>
                @endpush
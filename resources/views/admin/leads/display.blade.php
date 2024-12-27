
<?php
// print_r($listing->infrastructure);exit();
?>
@extends('admin.layout.master')
@section('content')

<div class="row">
	<div class="col-md-12">
	<a href="{{url('customer')}}"class="btn btn-sm"
                                style="background-color: #FF4005;color:white;float:right;line-height: 1.9;margin-bottom:1rem"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i>&nbsp;&nbsp;Back</a>
									<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Action
</button>
@if ($message = Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
 
</div>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remarks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form   action="{{ url('freshlead_action/'.$listing->id .' ') }}" method="post" >
		{{ method_field('PUT') }}
    {{ csrf_field() }}

			<div class="row">
				<div class="col-md-12">
			<label>Status</label>
			<select name="status" class="form-control" >
			    <?php 
			    $m1="";
			    $m2="";
			    $m3="";
			    $status=$listing->status;
			    if($status=="C")
			    {
			        $m1="selected";
			    }
			    else if($status=="F")
			    {
			        $m2="selected";
			    }
			    else if($status=="D")
			    {
			        $m3="selected";
			    }
			    
			    ?>
				<option value="C" <?=$m1;?>>Completed</option>
				<option value="F" <?=$m2;?>>Following</option>
				<option value="D" <?=$m3;?>>Not Interested</option>

			</select>
			</div>
			<div class="col-md-12 mt-2">
				<br><label>Remark</label>
			<textarea col="5" row="5"  class="form-control" name="remarks" value="{{ old('remarks', $listing->remarks)}}">
{{ old('remarks', $listing->remarks)}}

			</textarea></div>
			</div>
			
		
      </div>
      <div class="modal-footer">
      
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
	  </form>
    </div>
  </div>
</div>
									<div class="clearfix"><br></div>
		<div class="card">
			<div class="card-body">


<!-- Button trigger modal -->


				<div class="row">
					
					<h3>Fresh Leads Details</h3>
					<div class="row tbale-1">
						
					 <table class=" table-bordered listing-data">
		                  <tbody class="cur-body">
		                      @forelse($data1->where('user_id',$listing->id) as $data)
                          <tr>
						      <th>@lang('Photo')</th>
						     <td>
							   <img src="{{url('public/images/parant').'/'.$listing->image}}" style="width:150px;height:100px">
							 </td>
						    </tr>
@empty
@endforelse

						  <tr>
						      <th>@lang('Full Name')</th>
						     <td>
							   {{($listing->name)}}
							 </td>
						    </tr>

							<tr>
						      <th>@lang('Email ID')</th>
						     <td>
							    {{($listing->email)}}
							 </td>
						    </tr>

							<tr>
						      <th>@lang('Mobile Number')</th>
						     <td>
							    {{($listing->phone)}}
							 </td>
						    </tr>

                         
@forelse($data1->where('user_id',$listing->id) as $data)
                            <tr>
						      <th>@lang('Fathers Name')</th>
						     <td>
							     {{($data->fname)}}
							 </td>
						    </tr>

                            <tr>
						      <th>@lang('Mothers Name')</th>
						     <td>
							       {{($data->mname)}}
							 </td>
						    </tr>

                            <tr>
						      <th>@lang('Address')</th>
						     <td>
							    {{($data->address)}}
							 </td>
						    </tr>

                            <tr>
						      <th>@lang('State')</th>
						     <td>
							      {{($data->state)}}
							 </td>
						    </tr>

                            <tr>
						      <th>@lang('City')</th>
						     <td>
							    {{($data->city)}}
							 </td>
						    </tr>
						    
						    
                            <tr>
						      <th>@lang('State')</th>
						     <td>
							    {{($data->state)}}
							 </td>
						    </tr>
						    
						    
                            <tr>
						      <th>@lang('Pincode')</th>
						     <td>
							    {{($data->pincode)}}
							 </td>
						    </tr>
						    
						    @empty
						    @endforelse
						      <tr>
						      <th>@lang('Date')</th>
						     <td>
							   {{date('d-m-y',strtotime($listing->created_at))}}
							 </td>
						    </tr>

                             <tr>
						      <th>@lang('Status')</th>
						     <td>
						         @if($listing->status=="C")
							  <button type="button" class="btn btn-success">Completed</button>
							  @elseif($listing->status=="F")
							  <button type="button" class="btn btn-warning">Following</button>
							 @elseif($listing->status=="D")
							  <button type="button" class="btn btn-danger">Not Interested</button>
							  	 @else
							  <button type="button" class="btn btn-info">New Lead</button>
							  @endif
							 </td>
						    </tr>

		                  		
		                  </tbody>
		              </table>
		                
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
	table th:first-child, table td:first-child,table th:last-child, table td:last-child {
   
    text-align: left!important;
}
.listing-data th {
    width: 35%;
}
</style>
@endpush
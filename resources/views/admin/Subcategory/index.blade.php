@extends('admin.layout.master')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{ session('success')  }}
            </div>
            @endif
            <div class=" mb-2 " style=" display:flex; align-items:center">
           
                    <h3 style="text-align:center">Subcategory</h3>
               
              

                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#categoryModal" style="float:right;margin-left:auto">@lang('Add
                       Subcategory')</button>
            

            </div>

        </div>
    </section>
    
    
     <!-- search start -->
    <section>
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3 mb-3 pl-3 pr-3 py-3">
                <h4 style="color: #FF4C00!important;" class="mb-3">Search <i class="fa fa-search" aria-hidden="true"></i></h4>

                <form action="{{url('stream_search')}}">
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-control" name="type" required>
                                <option value="1">Subcategory Name</option>
                              

                            </select>
                        </div>
                        <div class="col-md-3"> 
                        <input type="text" class="form-control" name="keyword" ></div>
                                              <div class="col-md-3">   <input type="submit"class="btn-sm btn-primary" class="btn-sm btn-primary" value="Search">
&nbsp;<input type="submit" name="submit" class="btn-sm btn-primary" value="Reset">    
</div>
                </form>
            </div>
        </div>
    </div>
    </section>
    
    
    <section class="content">
       
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary">


                        <div class="card-body table-responsive p-b-0">

                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                       
                                        <th>Stream Name</th>
                                         <th>Course Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                      

                                    </tr>
                                </thead>
                                <tbody class="cur-body">
                                    <td class="icons">
                                        @forelse($Subcategory as $s)
                                        <tr>
                                          <td>{{ $Subcategory->firstItem() + $loop->index }}</td>

                                            <td>{{($s->sub_name)}}</td>
                                            <td>
									@foreach($category->where('id',$s->cat_id)->values() as $a)
									{{$a->name}}
									@endforeach
									</td>
                                           
                                         

                                            <td>
									  <input data-id="{{$s->id}}" class="toggle-class" type="checkbox"
                                    data-onstyle="success" data-style="ios"
                                    data-offstyle="danger" data-toggle="toggle"  data-on="&#10003;" data-off="&#x2716;"
                                    {{$s->status ? 'checked':''}}>

                                  </td>
                                        
                                  <td>

            <a href="{{ route('streams_edit',$s->id) }}" data-bs-toggle="modal" data-bs-target="#a{{ $loop->iteration }}"><i class="fas fa-pencil-alt" 
        style="font-size:20px; color: #000000;margin-right:5px"></i></a>

    <!--           <a href="{{ route('streams_destroy',$s->id) }}" title="Delete the item"-->
    <!--onclick="return confirm('Are you sure you want to delete this item?');">-->
    <!--<i class="fa fa-trash" aria-hidden="true"-->
    <!--    style="font-size:20px;color:#e84118;margin-right:5px"></i>-->
    <!--      </a>-->


</td>
                                            
                                          
                                           

<!-- Modal -->
<div class="modal fade" id="a{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Subcategory</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                <div class="col-md-12">
                                <form action="{{ route('streams_update') }}" method="POST"
                            enctype="multipart/form-data">
                             @csrf
                             <input type="hidden" name="id" value="{{$s->id}}">
                             <div class="form-group">
								<label>@lang('Select Course')</label>
        						<select class="form-control" name="cat_id" required>
        							<option value="<?php ?>">@lang('Select One')</option>
        							@foreach($category  as $c)
        							<?php
        							if($s->cat_id==$c->id)
        							{
        							    $selected="selected";
        							}
        							else
        							{
        							    $selected="";
        							}
        							?>
	                                <option value="{{$c->id }}"<?php echo $selected;?>>{{ __($c->name) }}</option>
	                                @endforeach
        						</select>
								</div>
                             <div class="form-group">
                                        <label>@lang('Subcategory Name')</label>
                                        <input type="text" name="stream" class="form-control" required  value="{{ old('stream', $s->sub_name) }}">
                                        @if ($errors->has('name'))
                                        <span class="text-danger"
                                            style="font-weight:bold">{{ $errors->first('name') }}</span>
                                        @endif

                                    </div>
                             
                             <input type="hidden" name="id" value="{{$s->id}}">

                                    


                                    

                                </div>
                            </div>
                       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</form>
</div>

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-center" colspan="100%">@lang('Data not found')</td>
                                        </tr>
                                        @endforelse
                                </tbody>
                            </table>
                            {{$Subcategory->links()}}

                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <span class="float-right"></span>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>
</div>



<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">@lang('Add New Subcategory')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{'streams_store'}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                <div class="col-md-12">

                                   


                                    <div class="form-group">
								<label>@lang('Select Category')</label>
        						<select class="form-control" name="course" required>
        							<option value="">@lang('Select One')</option>
        							@foreach($category  as $c)
	                                <option value="{{$c->id }}">{{ __($c->name) }}</option>
	                                @endforeach
        						</select>
								</div>
 <div class="form-group">
                                        <label>@lang('Subcategory Name')</label>
                                        <input type="text" name="stream" class="form-control" required>
                                        @if ($errors->has('stream'))
                                        <span class="text-danger"
                                            style="font-weight:bold">{{ $errors->first('stream') }}</span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn-primary">@lang('Save changes')</button>
                        </div>
            </form>
        </div>
    </div>
</div>



<style>
    .form-group {
    margin-bottom: 1rem;
    text-align: left;
}
    </style>

<script>
(function($) {
    "use strict";
    $('.editBtn').on('click', function() {
        var editModal = $('#editCategoryModal');
        editModal.find('#preview').attr('src', $(this).data('image'));
        editModal.find('input[name=name]').val($(this).data('name'));
        if ($(this).data('status') == 1) {
            editModal.find('input[name=status]').bootstrapToggle('on')
        }
        editModal.find('form').attr('action', $(this).data('action'));

    });
})(jQuery);
</script>


<script>

    $(function(){
        $('.toggle-class').change(function()
        {
            var status = $(this).prop('checked') == true ? 1:0;
            var id = $(this).data('id');
            $.ajax({
                type:"GET",
                dataType : "json",
                url:'streamsstatus',
                data: {'status':status, 'id': id},
                success: function(data)
                {
                    console.log(data.success)
                }
            });
        });
    });
    </script>



<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>





<script type="text/javascript">
$(document).ready(function() {
    $('#data_table').DataTable({

    });
});
</script>



@endsection
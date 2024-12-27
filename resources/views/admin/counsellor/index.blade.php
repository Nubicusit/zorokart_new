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
           
                    <h3 style="text-align:center">Consellor</h3>
               
              

                   
            

            </div>

        </div>
    </section>
    
    <!-- search start -->
    <section>
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3 mb-3 pl-3 pr-3 py-3">
                <h4 style="color: #FF4C00!important;" class="mb-3">Search <i class="fa fa-search" aria-hidden="true"></i></h4>

                <form action="{{url('counsellor_search')}}">
                    <div class="row">
                        <div class="col-md-3">
                           
                             <?php
                            $c1=$c2=$c3=$c4=$c5=$c6="";
                            if($type==1)
                            {
                                $c1="selected";
                            }
                            else if($type==2)
                            {
                                $c2="selected"; 
                            }
                              else if($type==3)
                            {
                                $c3="selected"; 
                            }
                              else if($type==4)
                            {
                                $c4="selected"; 
                            }
                              else if($type==5)
                            {
                                $c5="selected"; 
                            }
                              else if($type==6)
                            {
                                $c6="selected"; 
                            }
                         
                            ?>
                            <select class="form-control" name="type" id="seeAnotherField" required>
                                <option value="1"<?=$c1?>>Full Name</option>
                                <option value="2"<?=$c2?>>Phone</option>
                                <option value="3"<?=$c3?>>New Lead</option>
                                <option value="4"<?=$c4?>>Completed</option>
                                <option value="5"<?=$c5?>>Following</option>
                                <option value="6"<?=$c6?>>Not Interested</option>

                            </select>
                        </div>
                        <div class="col-md-3" id="inp_hi"> <input type="text" class="form-control" name="keyword" value="{{$keyword}}"></div>
                        <div class="col-md-3"> <input type="submit"class="btn-sm btn-primary" class="btn-sm btn-primary" value="Search">
                              &nbsp;<input type="submit" name="reset" class="btn-sm btn-primary" value="Reset"> </div>
                           
                            <div class="col-md-3">    <button class="btn btn-primary" type="submit" name="export" style="float:right">EXPORT</button></div>
                </form>
            </div>
        </div>
    </div>
    </section>


<!-- searcch end -->
    <section class="content">
    
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary">


                        <div class="card-body table-responsive p-b-0">

                            <table class="table table-hover" style="white-space: initial;text-align-last:left;text-align:left">
                                <thead>
                                    <tr>
                                        <th >No</th>
                                        <th >Name</th>
                                        <th>Phone</th>
                                        <th >Callback Time</th>
                                        <th >Message</th>
                                        <th >Date</th>
                                        <th >Status</th>
                                       
                            
                                      

                                    </tr>
                                </thead>
                                <tbody class="cur-body">
                                    <td class="icons">
                                        @forelse($counsellordata as $c)
                                        <tr>
                                            <td>{{ $counsellordata->firstItem() + $loop->index }}</td>

                                            <td>{{ __($c->name) }}</td>
                                            <td>{{ __($c->phone) }}</td>
                                            <td>{{ __($c->callback) }}</td>
                                            <td>{{ __($c->message) }}</td>
  <td> {{date('d-m-y',strtotime($c->created_at))}}</td>
                                            <td>

@if($c->leadstatus=='C')
<?php
$btn="btn-sm btn-success";
$action="Completed";
?>
@elseif($c->leadstatus=='F')
<?php
$btn="btn-sm btn-warning";
$action="Following";
?>
@elseif($c->leadstatus=='D')
<?php
$btn="btn-sm btn-danger";
$action="Not Interested";
?>
@else
<?php
$btn="btn-sm btn-info";
$action="New Lead";
?>
@endif

<button type="button" class="{{$btn}}" data-toggle="modal"
 data-target="#d{{$loop->iteration}}">
{{$action}}
</button>


<!-- Modal -->
<div class="modal fade" id="d{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Remarks</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form   action="{{ url('counsellor_action/'.$c->id .' ') }}" method="post" >
{{ method_field('PUT') }} 
{{ csrf_field() }}

<div class="row">
<div class="col-md-12">
<label>Status</label>

 <?php 
			    $m1="";
			    $m2="";
			    $m3="";
			    $status=$c->leadstatus;
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
<select name="status" class="form-control">
<option value="C"<?=$m1;?>>Completed</option>
<option value="F"<?=$m2;?>>Following</option>
<option value="D" <?=$m3;?>>Not Interested</option>

</select>
</div>
<div class="col-md-12 mt-2">
<br><label>Remark</label>
<textarea col="5" row="5"  class="form-control" name="remarks" value="{{ old('remarks', $c->remarks)}}">
{{ old('remarks', $c->remarks)}}

</textarea></div>
</div>


</div>
<div class="modal-footer">

<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div></td>
                                           



                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-center" colspan="100%">@lang('Data not found')</td>
                                        </tr>
                                        @endforelse
                                </tbody>
                            </table>         
                                        
{{$counsellordata->links()}}
                                         
                                       


<style>
    .form-group {
    margin-bottom: 1rem;
    text-align: left;
}
table th:last-child, table td:last-child {
    text-align: left;
}
.table thead th, .table tbody td {
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
                url:'coursesstatus',
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

<script>
    $("#seeAnotherField").change(function() {
  if ($(this).val() == "1" || $(this).val() == "2") {
    $('#inp_hi').show();
   
  } else {
    $('#inp_hi').hide();
   
  }
});
</script>



@endsection
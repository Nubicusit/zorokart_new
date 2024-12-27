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
           
                    <h3 style="text-align:center">Offline Applications</h3>
               
              

                   
            

            </div>
            <div class="card mt-3 mb-3 pl-3 pr-3 py-3">
            <h4 style="color: #FF4C00!important;" class="mb-3">Search <i class="fa fa-search" aria-hidden="true"></i></h4>
         
                <form action="{{url('offlineapp_search')}}">
                    <div class="row">
                        <div class="col-md-3">
                          
                            <select class="form-control" name="type" required>
                                <option value="1">Full Name</option>
                                <option value="2">Email ID</option>
                                <option value="3">Phone</option>
                                <option value="4">Application Number</option>

                            </select>
                        </div>
                        <div class="col-md-3"> <input type="text" class="form-control" name="keyword" value=""></div>
                        <div class="col-md-3"> <input type="submit"class="btn-sm btn-primary" class="btn-sm btn-primary" value="Search">
                              &nbsp;<input type="submit" name="reset" class="btn-sm btn-primary" value="Reset"> </div>
                           
                           
                </form>
      
        </div>

        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary">


                        <div class="card-body table-responsive p-b-0">

                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Application No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Action</th>
                            
                                      

                                    </tr>
                                </thead>
                                <tbody class="cur-body">
                                    <td class="icons">
                                        @forelse( $offline as $offl)
                                        <tr>
                                            <td>{{ $offline->firstItem() + $loop->index }}</td>
                                            <td>{{ __($offl->application_no) }}</td>
                                            <td>{{ __($offl->name) }}</td>
                                            <td>{{ __($offl->email) }}</td>
                                            <td>{{ __($offl->f_phone) }}</td>
                                            <td> {{date('d-m-y',strtotime($offl->created_at))}}</td>


                                            <td>
                                      <a href="{{route('display_offlineapplications', $offl->id) }}" class="btn btn-success btn-sm" >
		                  			
                                      <i class="fa fa-eye" ></i>
                                          </a> 
                                          
                                          
                                           <!--<a href="" title="Delete the item"-->
                                           <!--         onclick="return confirm('Are you sure you want to delete this item?');">-->
                                           <!--         <i class="fa fa-trash" aria-hidden="true"-->
                                           <!--             style="font-size:20px;color:#e84118;margin-right:5px"></i>-->
                                           <!--     </a>-->
                                    </td>



                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-center" colspan="100%">@lang('Data not found')</td>
                                        </tr>
                                        @endforelse
                                </tbody>
                            </table>         
                                        
{{$offline->links()}}
                                         
                                       


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



@endsection
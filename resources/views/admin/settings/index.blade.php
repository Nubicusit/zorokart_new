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
           
                    <h3 style="text-align:center">Address Setting</h3>
               
              

                   
            

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
                                        <th>Sl.No.</th>
                                        <th>LOGO</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                      
                            
                                      

                                    </tr>
                                </thead>
                                <tbody class="cur-body">
                                    <td class="icons">
                                        @forelse($settingsdata as $s)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td style="width:200px !important" >
                                                <img class="img-rounded " style="max-width:100px !important;height:70px" 
                                               src="{{ url('public/images/logo/'.$s->logo.'')}}">
                                         </td>
                                            <td>{{ __($s->phone) }}</td>
                                            <td>{{ __($s->email) }}</td>
                                            <td style="white-space:initial">{{ __($s->address) }}</td>
                    


                                            <td>
                                            <a href="{{ route('settings_edit',$s->id) }}" data-bs-toggle="modal" data-bs-target="#a{{ $loop->iteration }}">
                                                <i class="fas fa-pencil-alt" style="font-size:20px; color: #000000;margin-right:5px"></i></a>

                                    </td>

<!-- Modal -->
<div class="modal fade" id="a{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">@lang('Edit Settings')</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <form action="{{'settings_update'}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                @csrf

                <input type="hidden" name="id" value="{{$s->id}}">

                    <div class="modal-body">
                        <div class="row">
                           
                                <div class="col-md-12">
                                           <div class="form-group">
                                                  <div class="image-upload-area">
                                                      <img id="preview" src="{{ asset('assets/images/default.png') }}" alt="Gateway Image"/>
                                                      <div class="custom-file" style="display: block;padding:50px">
                                                          <input type="file" name="image" class="custom-file-input upload-image" id="upload">
                                                    <BR>
                                                             <label class="pick-image" for="upload">@lang('Upload')</label>
                                                      </div>
                                                  </div>
                                              
                                     </div>
                                </div>
                                    <div class="col-md-12">


                                        <div class="form-group">
                                            <label>@lang('Phone1')</label>
                                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $s->phone) }}" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>@lang('Phone2')</label>
                                            <input type="text" name="phone1" class="form-control" value="{{ old('phone', $s->phone1) }}" >
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>@lang('Phone3')</label>
                                            <input type="text" name="phone2" class="form-control" value="{{ old('phone', $s->phone2) }}" >
                                        </div>


                                        <div class="form-group">
                                            <label>@lang('Email')</label>
                                            <input type="text" name="email" class="form-control" value="{{ old('email', $s->email) }}" required>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label>@lang('Address')</label>
                                            <input type="text" name="address" class="form-control" value="{{ old('address', $s->address) }}" required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button> -->
                                <button type="submit" class="btn btn-primary">@lang('Save changes')</button>
                            </div>
                </form>
            </div>
        </div>
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
                                        
     
                                       


<style>
    /* .form-group {
    margin-bottom: 1rem;
    text-align: left; */
/* } */
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#data_table').DataTable({

        });
    });
    imgInp.onchange = evt => {
const [file] = imgInp.files
if (file) {
blah.src = URL.createObjectURL(file)
}
}
</script>


@endsection
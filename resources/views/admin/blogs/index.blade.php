@extends('admin.layout.master')

@section('content')

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">@lang('Add Blog')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{'blogs_store'}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                <div class="col-md-12">
                                    
                                    
                                <div class="form-group">
                                    								    <lable>Upload Image</lable>
								<div class="image-upload-area">

										<!--<img id="preview" src="{{ asset('assets/images/default.jpg') }}" alt=" Image" style="width:100%;height:200px"/>-->
										<div >
											<input type="file" name="image" required>
											<!--<label class="pick-image" for="upload">@lang('Upload')</label>-->
										</div>
									</div>
                                </div>

                                    <div class="form-group">
                                        <label>@lang('Heading')</label>
                                        <input type="text" name="heading" class="form-control" required>
                                     </div>

                                     <div class="form-group">
                                        <label>@lang('Content')</label>
                                      	<textarea class="richEditor" rows="5" name="content" required></textarea>
                                     </div>
                                     
                                     <div class="form-group">
                                        <label>@lang('Key Description')</label>
                                      	<textarea  rows="3" name="key_description" class="form-control" maxlength="100" required></textarea>
                                     </div>

                                     <div class="form-group">
                                        <label>@lang('Author')</label>
                                        <input type="text" name="author" class="form-control" required>
                                     </div>

                                     <div class="form-group">
                                        <label>@lang('Date')</label>
                                        <input type="date" name="date" class="form-control" required>
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

 </div>
</div>
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
           
                    <h3 style="text-align:center">Blogs</h3>
               
              

                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#categoryModal" style="float:right;margin-left:auto">@lang('Add
                        Blog')</button>
            

            </div>

        </div>
    </section>
    
       <div class="card mt-3 mb-3 pl-3 pr-3 py-3">
            <h4 style="color: #FF4C00!important;" class="mb-3">Search <i class="fa fa-search" aria-hidden="true"></i></h4>
         
              <form action="{{url('blogs_search')}}">
                    <div class="row">
                        <div class="col-md-3">
                          
                            <select class="form-control" name="type" required>
                                <option value="1">Heading</option>
                                <option value="2">Author</option>
                                <option value="3">Date</option>
                             

                            </select>
                        </div>
                        <div class="col-md-3"> <input type="text" class="form-control" name="keyword" value=""></div>
                        <div class="col-md-3"> <input type="submit"class="btn-sm btn-primary" class="btn-sm btn-primary" value="Search">
                              &nbsp;<input type="submit" name="reset" class="btn-sm btn-primary" value="Reset"> </div>
                           
                           
                </form>
                
      
        </div>

        </div>
        
    <section class="content">
     
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary">


                        <div class="card-body table-responsive p-b-0">

                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width:200px !important" >Image</th>
                                        <th>Heading</th>
                                        <th>Content</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                      

                                    </tr>
                                </thead>
                                <tbody class="cur-body">
                                    <td class="icons">
                                        @forelse($blogs as $b)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                           	    
		                  		<td style="width:200px !important" >
		                  		     <img class="img-rounded " style="max-width:200px !important" 
                                      src="{{ url('public/images/blogs/'.$b->image.'')}}">
                                </td>
                                            <td  style="width:300px !important;white-space: initial,font-size:12px;" >{{ __($b->heading) }}</td>
                                            <td class="text-box" height="10"style="white-space: initial;width: 399px; text-align: justify">
                                        {!!html_entity_decode($b->content)!!}
                                                <!--{!!html_entity_decode($b->content) !!}...-->
                                               </td>
                                            <td>{{ __($b->author) }}</td>
                                            <td> {{date('d-m-Y',strtotime($b->date))}}</td>
                                         

                                            <td>
									  <input data-id="{{$b->id}}" class="toggle-class" type="checkbox"
                                    data-onstyle="success" data-style="ios"
                                    data-offstyle="danger" data-toggle="toggle"  data-on="&#10003;" data-off="&#x2716;"
                                    {{$b->status ? 'checked':''}}>

                                  </td>
                                        

                                            <td>

                                                <!--<a href="{{ route('blogs_edit',$b->id) }}" data-bs-toggle="modal" data-bs-target="#a{{ $loop->iteration }}"><i class="fas fa-pencil-alt" -->
                                                <!--        style="font-size:20px; color: #000000;margin-right:5px"></i></a>-->

 <a href="{{ route('blogs_edit',$b->id) }}">
													<i class="fas fa-pencil-alt" 
                                                        style="font-size:20px; color: #000000;margin-right:5px"></i></a>
                                            
                                                <a href="{{ route('blogs_destroy',$b->id) }}" title="Delete the item"
                                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fa fa-trash" aria-hidden="true"
                                                        style="font-size:20px;color:#e84118;margin-right:5px"></i>
                                                </a>


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





<style>
    .form-group {
    margin-bottom: 1rem;
    text-align: left;
}
.table thead th, .table tbody td {
    text-align: center;
    padding: 13px 10px;
     max-height: 20px;
}
    </style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>  

 <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function () { // 
            $(".text-box").each(function () {
                var maxwidth = 100;
                if ($(this).text().length > maxwidth) {
                    $(this).text($(this).text().substring(0, maxwidth));
                    $(this).html($(this).html() + '...');
                }
            });
        }); 
    </script>
    

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


<!-- <script>
(function($) {
    "use strict";
    $('.editBtn').on('click', function() {
        var editModal = $('#editCategoryModal');
        editModal.find('#preview1').attr('src', $(this).data('image'));
        editModal.find('input[name=name]').val($(this).data('name'));
        if ($(this).data('status') == 1) {
            editModal.find('input[name=status]').bootstrapToggle('on')
        }
        editModal.find('form').attr('action', $(this).data('action'));

    });
})(jQuery);
</script> -->

<script>

    $(function(){
        $('.toggle-class').change(function()
        {
            var status = $(this).prop('checked') == true ? 1:0;
            var id = $(this).data('id');
            $.ajax({
                type:"GET",
                dataType : "json",
                url:'blogsstatus',
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
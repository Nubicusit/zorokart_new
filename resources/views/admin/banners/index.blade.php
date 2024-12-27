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
            
            @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <div class=" mb-2 " style=" display:flex; align-items:center">

                <h3 style="text-align:center">Banners</h3>



                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#categoryModal" style="float:right;margin-left:auto">@lang('Add
                    Banner')</button>


            </div>

        </div>

    </section>




    <!-- search start -->
    <section>
    <div class="row">
       <div class="col-md-12">
            <div class="card mt-3 mb-3 pl-3 pr-3 py-3">
                <h4 style="color: #FF4C00!important;" class="mb-3">Search <i class="fa fa-search" aria-hidden="true"></i></h4>

                <form action="{{ route('banners.index') }}" method="GET">
                    
                    <div class="row">
                        <div class="col-md-3">
                        <select name="category_id" class="form-control" required>
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{(isset($input["category_id"]) && $category["id"] == $input["category_id"])?"selected": ""}}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                       </select>
                        </div>
                        
                           <div class="col-md-3">   <input type="submit" class="btn-sm btn-primary" class="btn-sm btn-primary" value="Search">
                           &nbsp;
                           <a type="button" href="{{route('banners.index')}}" class="btn-sm btn-primary">Reset</a>
                         </div>
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

                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Banner</th>
                                            <th>Category</th>
                                            <th>Caption</th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody class="cur-body">
                                        <td class="icons">
                                        
                                            @forelse($banners as $banner)
                                            <tr>
                                                <td>{{ $banners->firstItem() + $loop->index }}</td>

                                               <td style="width:200px !important" >
                                                    <img class="img-rounded " style="max-width:100px !important;height:100px" 
                                                    src="{{ url('public/images/banners/'.$banner->banner_image.'')}}">
                                               </td>
                                               <td>{{ __($banner->main_category->name) }}</td>
                                               <td>{{ __($banner->banner_caption) }}</td>
                                               <td>{{ __($banner->banner_order) }}</td>
                                               

                                                <td>
                                                    <input data-id="{{$banner->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-style="ios" data-offstyle="danger" data-toggle="toggle" data-on="&#10003;" data-off="&#x2716;" {{$banner->status ? 'checked':''}}>

                                                </td>


                                                <td>

                                                    <a href="{{ route('banners.update',$banner->id) }}" data-bs-toggle="modal" data-bs-target="#a{{ $loop->iteration }}"><i class="fas fa-pencil-alt" style="font-size:20px; color: #000000;margin-right:5px"></i></a>

                                                   <a href="javascript:void(0)" title="Delete the item" class="link-click" id="{{$banner->id}}">
                                                       <i class="fa fa-trash" aria-hidden="true" style="font-size:20px;color:#e84118;margin-right:5px"></i>
                                                    </a>
                                                    <form id="delete-form{{$banner->id}}" action="{{ route('banners.destroy', $banner->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                    </form>


                                                </td>


                                                <!-- Modal -->
                                                <div class="modal fade" id="a{{$loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Banner</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">

                                                                            <div class="col-md-12">
                                                                                <form action="{{ route('banners.update',$banner->id) }}" method="POST" enctype="multipart/form-data"  runat="server">
                                                                                    @method('patch')
                                                                                    @csrf
                                                                                    <input type="hidden" name="id" value="{{$banner->id}}">

                                                                               
                                                                                    <div class="form-group">
                                                                                        <div class="image-upload-area">
                                                                                            <img id="preview" src="{{ url('public/images/banners/'.$banner->banner_image.'')}}" alt="Gateway Image"/>
                                                                                            <div class="custom-file" style="display: block;">
                                                                                                <input type="file" name="banner_image" class="custom-file-input upload-image" id="upload{{$banner->id}}">
                                                                                                <label class="pick-image" for="upload{{$banner->id}}">@lang('Upload')</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <small class="text-primary">@lang('Banner Image will resize into 350x190 px')</small>
                                                                                    </div> 
                                                                                 

                                                                                   <div class="form-group">
                                                                                        <label>@lang('Main Category')</label>
                                                                                        <select name="main_category_id" id="main_category_id" class="form-control">
                                                                                            <option selected disabled>Select a Main Category</option>
                                                                                            @foreach($categories as $category)
                                                                                            <option value="{{$category->id}}" {{$banner->main_category_id == $category->id ? 'selected':''}}>{{$category->name}}</option>
                                                                                            @endforeach 
                                                                                        </select>
                                                                                        @if ($errors->has('main_category_id'))
                                                                                        <span class="text-danger" style="font-weight:bold">{{ $errors->first('main_category_id') }}</span>
                                                                                        @endif

                                                                                </div>



                                                                                    <div class="form-group">
                                                                                        <label>@lang('Caption')</label>
                                                                                        <input type="text" name="banner_caption" class="form-control" required value="{{ old('banner_caption', $banner->banner_caption) }}">
                                                                                        @if ($errors->has('name'))
                                                                                        <span class="text-danger" style="font-weight:bold">{{ $errors->first('banner_caption') }}</span>
                                                                                        @endif

                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>@lang('order')</label>
                                                                                        <input type="text" name="banner_order" class="form-control" required value="{{ old('banner_order', $banner->banner_order) }}">
                                                                                        @if ($errors->has('order'))
                                                                                        <span class="text-danger" style="font-weight:bold">{{ $errors->first('banner_order') }}</span>
                                                                                        @endif

                                                                                    </div>

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
                                {{$banners->links()}}
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
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="bannerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">@lang('Add Banner')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('banners.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">

                                    <div class="col-md-12">

                            <div class="col-md-12">
								<div class="form-group">
									<div class="image-upload-area">
										<img id="preview" src="{{ asset('assets/images/default.png') }}" alt="Gateway Image"/>
										<div class="custom-file">
											<input type="file" name="banner_image" class="custom-file-input upload-image" id="upload">
											<label class="pick-image" for="upload">@lang('Upload')</label>
										</div>
									</div>
									<small class="text-primary">@lang('Banner Image will resize into 350x190 px')</small>
								</div>
							</div>

                                        <div class="form-group">
                                            <label>@lang('Main Category')</label>
                                            <select name="main_category_id" id="main_category_id" class="form-control">
                                                <option selected disabled>Select a Main Category</option>
                                                @foreach($categories as $category)
                                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach 
                                            </select>
                                            @if ($errors->has('main_category_id'))
                                            <span class="text-danger" style="font-weight:bold">{{ $errors->first('main_category_id') }}</span>
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <label>@lang('Caption')</label>
                                            <input type="text" name="banner_caption" class="form-control" required>
                                            @if ($errors->has('banner_caption'))
                                            <span class="text-danger" style="font-weight:bold">{{ $errors->first('banner_caption') }}</span>
                                            @endif

                                        </div>
                                         <div class="form-group">
                                            <label>@lang('Order')</label>
                                            <input type="text" name="banner_order" class="form-control" required>
                                            @if ($errors->has('banner_order'))
                                            <span class="text-danger" style="font-weight:bold">{{ $errors->first('banner_order') }}</span>
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
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
          
                $.ajax({
                    type: "POST", 
                    dataType: "json",
                    url: '{{ route("banners.change-status", ["id" => "__ID__"]) }}'.replace('__ID__', id),
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'status': status,
                   
                    },
                    success: function(data) {
                        Swal.fire(data.message)
                    }
                });
            });
            $(".link-click").click(function(){
             var id = $(this).attr('id');
            
            if (confirm('Are you sure you want to delete this item?')) {
                $("#delete-form"+id).submit();
            }

            });
            

        });
    </script>



    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>





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
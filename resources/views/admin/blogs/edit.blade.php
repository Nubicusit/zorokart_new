@extends('admin.layout.master')

@section('content')

<div class="content-wrapper">
    <section class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">

                    <div class="card card-primary mt-3">

                        <div class="card-header" style="display: flex;
                              justify-content: space-between;">
                            <h3 class="card-title">Edit Blog</h3><a href="{{url('blogs')}}" class="btn btn-primary"
                                style="float:right;color:#fff"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i>&nbsp;&nbsp;Back</a>
                        </div>
                          <form action="{{ route('blogs_update')}}" method="POST"  enctype="multipart/form-data">
                             {{csrf_field()}}  
		@csrf
		
        <input type="hidden" name="id" value="{{$blogs->id}}">
                            <div class="card-body mt-5">
                                <div class="row">




							 <div class="form-group">
  <label>Upload profile Logo</label>
                                    <div class="profile-pic">

                                        <img alt="User Pic"
                                           src="{{url('public/images/blogs').'/'.$blogs->image}}"
                                            id="preview" height="200">
                                        <input id="profile-image-upload" class="hidden" type="file"
                                            onchange="previewFile()"  name="image">

                                          


                                    </div>
                                    </div>
                                </div>
                                   
                                   <div class="form-group">
                                        <label>@lang('Heading')</label>
                                        <input type="text" name="heading" class="form-control"  value="{{ old('heading', $blogs->heading)}}" required>
                                     </div>
                                     
                                      <div class="form-group">
                                        <label>@lang('Content')</label>
                                       
                                         	<textarea class="richEditor" rows="5" name="content" value="{{ old('content', $blogs->content)}}" required>
                                         	 {{$blogs->content}}
                                         	</textarea>
                                     </div>
                                     
                                     
                                      <div class="form-group">
                                        <label>@lang('Key Description')</label>
                                      	<textarea  rows="3" name="key_description" class="form-control" maxlength="100" value="{{ old('key_description', $blogs->key_description)}}" required>
                                      	    	 {{$blogs->key_description}}
                                      	</textarea>
                                     </div>

                                   <div class="form-group">
                                        <label>@lang('Author')</label>
                                        <input type="text" name="author" class="form-control" value="{{ old('author', $blogs->author)}}" required>
                                     </div>

                                     <div class="form-group">
                                        <label>@lang('Date')</label>
                                        <input type="date" name="date" class="form-control"  value="{{ old('date', $blogs->date)}}" required>
                                     </div>

                                 
                            <div class="card-footer" style="display: flex;justify-content: center;">
                                <button type="submit" value="submit"
                                    class="btn btn-primary">@lang('Save')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if ( Session::has('flash_message') )

            <div class="alert {{ Session::get('flash_type') }}">
                <h3 class="text-success">{{ Session::get('flash_message') }}</h3>
            </div>

            @endif

            <style>
            .check-bx {
                width: 40px;
                height: 40px;
            }

            .removeFeature {
                width: 42px;
                height: 42px;
            }

            .featureSize input {
                margin-left: 1rem;
            }


            .price-form {
                margin-left: 6px !important;
                border-radius: 0.25rem !important;
                width: 85px !important;

            }

            .rem-fee {
                margin-left: 1rem;
                border-radius: 0.25rem !important;
            }

            center input.form-control,
            select.form-control {

                padding: 7px !important;
            }

            .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
                border-top-right-radius: 0.25rem !important;
                border-bottom-right-radius: 0.25rem !important;
            }

            .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
                border-top-right-radius: 0.25rem !important;
                border-bottom-right-radius: 0.25rem !important;
                border-top-left-radius: 0.25rem !important;
                border-bottom-left-radius: 0.25rem !important;
            }

            .fea-input {
                align-items: center !important;
            }
            .image-upload-area img{
                height:270px;
            }
            .custom-file{
                height:auto !important;
            }
            </style>
            @push('js')

            @endpush
            @endsection

            @push('js')
          
            
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
        function previewFile() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
        $(function () {
            $('#preview').on('click', function () {
                $('#profile-image-upload').click();
            });
        });
    </script>
            @endpush
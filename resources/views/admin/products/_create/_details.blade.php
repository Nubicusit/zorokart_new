
<form id="prod_step1_frm" enctype="multipart/form-data">

<input type="hidden" name="product_id" id="productid" />

<div class="card-body">
    <h4 class="font-20 mb-20">Basic Details</h4>
  
    <div class="row">


        <div class="col-lg-12">
      
            
             <div class="form-group">
             <label for="name" class="mb-2 font-14 bold">Main Catgeory</label>
                <select class="form-control" name="main_category_id" id="main_category">
                    <option selected disabled>Select a Main Category</option>
                    @foreach($main_categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
             </div>

             <div class="form-group mb-3">
             <label for="name" class="mb-2 font-14 bold">Catgeory</label>
                <select id="category_id" name="category_id" class="form-control">

                </select>

            </div>

            <div class="form-group">
            <label for="name" class="mb-2 font-14 bold">Sub Catgeory</label>
                <select id="sub_category_id" name="sub_category_id" class="form-control">

                </select>

            </div>

            <div class="form-group">
            <label for="name" class="mb-2 font-14 bold">Upload Image</label>
									<div class="image-upload-area">
										<img id="preview" src="{{ asset('assets/images/default.png') }}" alt="Gateway Image"/>
										<div class="custom-file">
											<input type="file" name="default_image" class="custom-file-input upload-image" id="upload">
											<label class="pick-image" for="upload">@lang('Upload')</label>
										</div>
									</div>
								
								</div>
         
    
        </div>



 

    </div>

</div>
</form>

@push('js')
<script>

$(document).ready(function () {



    /*------------------------------------------

    --------------------------------------------

    Main Category Dropdown Change Event

    --------------------------------------------

    --------------------------------------------*/

    $('#main_category').on('change', function () {
        

        var idMainCategory = this.value;

        $("#category_id").html('');

        $.ajax({

            url: "{{route('products.fetch-category')}}",

            type: "POST",

            data: {

                main_category_id: idMainCategory,

                _token: '{{csrf_token()}}'

            },

            dataType: 'json',

            success: function (result) {

                $('#category_id').html('<option value="" selected disabled>-- Select Category --</option>');

                $.each(result.categories, function (key, value) {

                    $("#category_id").append('<option value="' + value

                        .id + '">' + value.name + '</option>');

                });

                $('#sub_category_id').html('<option value="" selected disabled>-- Select Sub Category --</option>');

            }

        });

    });



    /*------------------------------------------

    --------------------------------------------

    Category Dropdown Change Event

    --------------------------------------------

    --------------------------------------------*/

    $('#category_id').on('change', function () {

        var idCategory = this.value;

        $("#sub_category_id").html('');

        $.ajax({

            url: "{{route('products.fetch-sub-category')}}",

            type: "POST",

            data: {

                category_id: idCategory,

                _token: '{{csrf_token()}}'

            },

            dataType: 'json',

            success: function (res) {

                $('#sub_category_id').html('<option value="" selected disabled>-- Select Sub Category --</option>');

                $.each(res.subcategories, function (key, value) {

                    $("#sub_category_id").append('<option value="' + value

                        .id + '">' + value.sub_name + '</option>');

                });

            }

        });

    });



});
</script>

@endpush
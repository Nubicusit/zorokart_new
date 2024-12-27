
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
                    <?php $__currentLoopData = $main_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
										<img id="preview" src="<?php echo e(asset('assets/images/default.png')); ?>" alt="Gateway Image"/>
										<div class="custom-file">
											<input type="file" name="default_image" class="custom-file-input upload-image" id="upload">
											<label class="pick-image" for="upload"><?php echo app('translator')->get('Upload'); ?></label>
										</div>
									</div>
								
								</div>
         
    
        </div>



 

    </div>

</div>
</form>

<?php $__env->startPush('js'); ?>
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

            url: "<?php echo e(route('products.fetch-category')); ?>",

            type: "POST",

            data: {

                main_category_id: idMainCategory,

                _token: '<?php echo e(csrf_token()); ?>'

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

            url: "<?php echo e(route('products.fetch-sub-category')); ?>",

            type: "POST",

            data: {

                category_id: idCategory,

                _token: '<?php echo e(csrf_token()); ?>'

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

<?php $__env->stopPush(); ?><?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/admin/products/_create/_details.blade.php ENDPATH**/ ?>
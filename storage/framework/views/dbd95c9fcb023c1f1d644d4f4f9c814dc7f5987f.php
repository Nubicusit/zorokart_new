<?php $__env->startSection('content'); ?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>
            <div class=" mb-2 " style=" display:flex; align-items:center">

                <h3 style="text-align:center">Products</h3>



                <a href="<?php echo e(route('products.create')); ?>" class="btn btn-sm btn-primary" style="float:right;margin-left:auto"><?php echo app('translator')->get('Add
                    Product'); ?></a>


            </div>

        </div>
    </section>

    <div class="card mt-3 mb-3 pl-3 pr-3 py-3">
        <h4 style="color: #FF4C00!important;" class="mb-3">Search <i class="fa fa-search" aria-hidden="true"></i></h4>

        <form action="">
            <div class="row">

                <div class="col-md-3"> <input type="text" class="form-control" name="keyword" value=""></div>
                <div class="col-md-3"> <input type="submit" class="btn-sm btn-primary" class="btn-sm btn-primary" value="Search">
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
                                <th style="width:200px !important">Image</th>
                                <th>Name</th>
                                <th>Main Category</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Status</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody class="cur-body">
                            <td class="icons">
                                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>

                                    <td style="width:200px !important">
                                        <img class="img-rounded " style="max-width:200px !important"
                                            src="<?php echo e(url('public/images/products/'.$product->image.'')); ?>">
                                    </td>


                                    <td> </td>
                                    <td> <?php echo e($product->main_category->name); ?></td>
                                    <td> <?php echo e($product->category->name); ?></td>
                                    <td> <?php echo e($product->sub_category->sub_name); ?></td> </td>

                                    <td>
                                        <input data-id="<?php echo e($product->id); ?>" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-style="ios"
                                            data-offstyle="danger" data-toggle="toggle" data-on="&#10003;" data-off="&#x2716;"
                                            <?php echo e($product->status ? 'checked':''); ?>>

                                    </td>


                                    <td>



                                        <a href="<?php echo e(route('products.edit',$product->id)); ?>">
                                            <i class="fas fa-pencil-alt"
                                                style="font-size:20px; color: #000000;margin-right:5px"></i></a>

                                        <a href="" title="Delete the item"
                                        onclick="event.preventDefault(); 
            if(confirm('Are you sure you want to delete this item?')) {
                document.getElementById('delete-form-<?php echo e($product->id); ?>').submit();
            }">
                                            <i class="fa fa-trash" aria-hidden="true"
                                                style="font-size:20px;color:#e84118;margin-right:5px"></i>
                                        </a>
                                        <form method="post" action="<?php echo e(route('products.destroy',$product->id)); ?>" style="display:none" id="delete-form-<?php echo e($product->id); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                       </form>


                                    </td>




                            </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td class="text-center" colspan="100%"><?php echo app('translator')->get('Data not found'); ?></td>
                            </tr>
                            <?php endif; ?>
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

    .table thead th,
    .table tbody td {
        text-align: center;
        padding: 13px 10px;
        max-height: 20px;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() { // 
        $(".text-box").each(function() {
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
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: '<?php echo e(route("products.change-status", ["id" => "__ID__"])); ?>'.replace('__ID__', id),
                data: {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'status': status,

                },
                success: function(data) {
                    Swal.fire(data.message)
                }
            });
        });
        $(".link-click").click(function() {
            var id = $(this).attr('id');

            if (confirm('Are you sure you want to delete this item?')) {
                $("#delete-form" + id).submit();
            }

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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/admin/products/index.blade.php ENDPATH**/ ?>
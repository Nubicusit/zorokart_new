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
                                        <?php $__empty_1 = true; $__currentLoopData = $settingsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td style="width:200px !important" >
                                                <img class="img-rounded " style="max-width:100px !important;height:70px" 
                                               src="<?php echo e(url('public/images/logo/'.$s->logo.'')); ?>">
                                         </td>
                                            <td><?php echo e(__($s->phone)); ?></td>
                                            <td><?php echo e(__($s->email)); ?></td>
                                            <td style="white-space:initial"><?php echo e(__($s->address)); ?></td>
                    


                                            <td>
                                            <a href="<?php echo e(route('settings_edit',$s->id)); ?>" data-bs-toggle="modal" data-bs-target="#a<?php echo e($loop->iteration); ?>">
                                                <i class="fas fa-pencil-alt" style="font-size:20px; color: #000000;margin-right:5px"></i></a>

                                    </td>

<!-- Modal -->
<div class="modal fade" id="a<?php echo e($loop->iteration); ?>" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel"><?php echo app('translator')->get('Edit Settings'); ?></h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <form action="<?php echo e('settings_update'); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo csrf_field(); ?>

                <input type="hidden" name="id" value="<?php echo e($s->id); ?>">

                    <div class="modal-body">
                        <div class="row">
                           
                                <div class="col-md-12">
                                           <div class="form-group">
                                                  <div class="image-upload-area">
                                                      <img id="preview" src="<?php echo e(asset('assets/images/default.png')); ?>" alt="Gateway Image"/>
                                                      <div class="custom-file" style="display: block;padding:50px">
                                                          <input type="file" name="image" class="custom-file-input upload-image" id="upload">
                                                    <BR>
                                                             <label class="pick-image" for="upload"><?php echo app('translator')->get('Upload'); ?></label>
                                                      </div>
                                                  </div>
                                              
                                     </div>
                                </div>
                                    <div class="col-md-12">


                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Phone1'); ?></label>
                                            <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone', $s->phone)); ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Phone2'); ?></label>
                                            <input type="text" name="phone1" class="form-control" value="<?php echo e(old('phone', $s->phone1)); ?>" >
                                        </div>
                                        
                                         <div class="form-group">
                                            <label><?php echo app('translator')->get('Phone3'); ?></label>
                                            <input type="text" name="phone2" class="form-control" value="<?php echo e(old('phone', $s->phone2)); ?>" >
                                        </div>


                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Email'); ?></label>
                                            <input type="text" name="email" class="form-control" value="<?php echo e(old('email', $s->email)); ?>" required>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Address'); ?></label>
                                            <input type="text" name="address" class="form-control" value="<?php echo e(old('address', $s->address)); ?>" required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button> -->
                                <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Save changes'); ?></button>
                            </div>
                </form>
            </div>
        </div>
    </div>
                                      

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td class="text-center" colspan="100%"><?php echo app('translator')->get('Data not found'); ?></td>
                                        </tr>
                                        <?php endif; ?>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/admin/settings/index.blade.php ENDPATH**/ ?>
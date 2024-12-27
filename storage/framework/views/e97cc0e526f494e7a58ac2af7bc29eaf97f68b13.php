<?php

$matches[0]=Auth::guard('admin')->user()->role;
//print_r($matches[0]);exit();
?>




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

                <h3 style="text-align:center"> Schoolspe Users </h3>



                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#categoryModal" style="float:right;margin-left:auto"><?php echo app('translator')->get('Add
                    User'); ?></button>


            </div>

        </div>
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3 mb-3 pl-3 pr-3 py-3">
                <h4 style="color: #FF4C00!important;" class="mb-3">Search <i class="fa fa-search" aria-hidden="true"></i></h4>

                <form action="<?php echo e(url('user_search')); ?>">
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-control" name="type" required>
                                <option value="1">User name</option>
                                <option value="2">Phone number</option>
                                <option value="3">Email</option>

                            </select>
                        </div>
                        <div class="col-md-3"> <input type="text" class="form-control" name="keyword" ></div>
                        <div class="col-md-3">   <input type="submit"class="btn-sm btn-primary" class="btn-sm btn-primary" value="Search">
&nbsp;<input type="submit" name="submit" class="btn-sm btn-primary" value="Reset">    
</div>
    </form>
                    </div>
</div>
                
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-outline card-primary">


                                        <div class="card-body table-responsive p-b-0">

                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="cur-body">
                                                    <td class="icons">
                                                        <?php $__empty_1 = true; $__currentLoopData = $schoolpeusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <tr>
                                                       <td><?php echo e($schoolpeusers->firstItem() + $loop->index); ?></td>
 

                                                            <td><?php echo e(__($s->name)); ?></td>
                                                            <td><?php echo e(__($s->email)); ?></td>
                                                            <td><?php echo e(__($s->phone)); ?></td>
                                                          

                                                            <td>

                                                                <a href="<?php echo e(route('schoolpseupdate_user',$s->id)); ?>" data-bs-toggle="modal" data-bs-target="#a<?php echo e($loop->iteration); ?>"><i class="fas fa-pencil-alt" style="font-size:20px; color: #000000;margin-right:5px"></i></a>

                                                                <a href="<?php echo e(route('schoolpeusers_destroy',$s->id)); ?>" title="Delete the item" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                    <i class="fa fa-trash" aria-hidden="true" style="font-size:20px;color:#e84118;margin-right:5px"></i>
                                                                </a>


                                                            </td>
                                                            <td>
                                                                <!-- Button trigger modal -->
 <!-- Modal -->
 <div class="modal fade modai-3" id="a<?php echo e($loop->iteration); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">

                                                                            <div class="col-md-12">
                                                                                <form action="<?php echo e(route('schoolpseupdate_user')); ?>" method="POST" enctype="multipart/form-data">
                                                                                    <?php echo e(csrf_field()); ?>

                                                                                    <?php echo csrf_field(); ?>
                                                                                    <input type="hidden" name="id" value="<?php echo e($s->id); ?>">

                                                                                    <div class="form-group">

                                                        <div class="col-md-12">

                                                            <div class="form-group">
                                                                <label><?php echo app('translator')->get('User Name'); ?></label>
                                                                <input type="text" name="name" class="form-control"  value="<?php echo e($s->name); ?>"  required>
                                                                <?php if($errors->has('name')): ?>
                                                                <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('name')); ?></span>
                                                                <?php endif; ?>

                                                            </div>

                                                            <div class="form-group">
                                                                <label><?php echo app('translator')->get('Email'); ?></label>
                                                                <input type="text" name="email" class="form-control" autofill="off" value="<?php echo e($s->email); ?>" required>
                                                                <?php if($errors->has('email')): ?>
                                                                <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('email')); ?></span>
                                                                <?php endif; ?>
                                                            </div>

                                                            <div class="form-group">
                                                                <label><?php echo app('translator')->get('Phone'); ?></label>
                                                                <input type="number" name="phone" class="form-control" value="<?php echo e($s->phone); ?>" required>
                                                                <?php if($errors->has('phone')): ?>
                                                                <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('phone')); ?></span>
                                                                <?php endif; ?>

                                                            </div>


                                                            <div class="form-group">
                                                                <label><?php echo app('translator')->get('Password'); ?></label>
                                                                <input type="password" name="password" class="form-control" id="password1" required>
                                                                <?php if($errors->has('password')): ?>
                                                                <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('password')); ?></span>
                                                                <?php endif; ?>

                                                            </div>


                                                            <div class="form-group">
                                                                <label><?php echo app('translator')->get('Confirm Password'); ?></label>
                                                                <input type="password" name="cpassword" class="form-control" id="password2" required>
                                                                <?php if($errors->has('password')): ?>
                                                                <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('password')); ?></span>
                                                                <?php endif; ?>

                                                            </div>
                                                            
                                                            
                                                            
                                                            <div class="form-group">
                                                                <label><?php echo app('translator')->get('Select Previlages'); ?></label>
                                                                   <div class="clearfix"><br></div>
                                                                <?php
                                                       $matches1[0]=$s->role;
                                                      
                                                    
                                                                                    ?>
                                                              
                                                            <input type="checkbox" name="role[]" value="1" <?php $checked=""; if(in_array(1, $matches1[0]) != false){$checked="checked";} ?><?=$checked;?>>&nbsp;&nbsp;&nbsp;Schoolspe Users&nbsp;&nbsp;&nbsp;
                                                            <input type="checkbox" name="role[]" value="2" <?php $checked=""; if(in_array(2, $matches1[0]) != false){$checked="checked";} ?><?=$checked;?>>&nbsp;&nbsp;&nbsp;Client details&nbsp;&nbsp;&nbsp;
                                                            <input type="checkbox" name="role[]" value="3" <?php $checked=""; if(in_array(3, $matches1[0]) != false){$checked="checked";} ?><?=$checked;?>>&nbsp;&nbsp;&nbsp;Course Entries&nbsp;&nbsp;&nbsp;
                                                         <br>   <input type="checkbox" name="role[]" value="4" <?php $checked=""; if(in_array(4, $matches1[0]) != false){$checked="checked";} ?><?=$checked;?>>&nbsp;&nbsp;&nbsp;Institution&nbsp;&nbsp;&nbsp;
                                                      
                                                            <input type="checkbox" name="role[]" value="5" <?php $checked=""; if(in_array(5, $matches1[0]) != false){$checked="checked";} ?><?=$checked;?>>&nbsp;&nbsp;&nbsp;Applications&nbsp;&nbsp;&nbsp;
                                                           <input type="checkbox" name="role[]" value="6" <?php $checked=""; if(in_array(6, $matches1[0]) != false){$checked="checked";} ?><?=$checked;?>>&nbsp;&nbsp;&nbsp;Leads&nbsp;&nbsp;&nbsp;
                                                           </br>
                                                            <input type="checkbox" name="role[]" value="7" <?php $checked=""; if(in_array(7, $matches1[0]) != false){$checked="checked";} ?><?=$checked;?>>&nbsp;&nbsp;&nbsp;Blogs&nbsp;&nbsp;&nbsp;
                                                           <input type="checkbox" name="role[]" value="8" <?php $checked=""; if(in_array(8, $matches1[0]) != false){$checked="checked";} ?><?=$checked;?>>&nbsp;&nbsp;&nbsp;Settings&nbsp;&nbsp;&nbsp;
                                                          

                                                            </div>




                                                        </div>
                                                        </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        
                                                        <button type="submit" class="btn btn-primary" onclick=" return matchPassword()"><?php echo app('translator')->get('Save changes'); ?></button>
                                                        </div>

                        <!-- Modal -->
                                                              
                </form>
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
            
            <?php echo e($schoolpeusers->links()); ?>


        </div>
        <div class="card-footer clearfix">
          
        </div>

    </div>

</div>

</div>

</div>



<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel"><?php echo app('translator')->get('Add New User'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e('addschoolpe_user'); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('User Name'); ?></label>
                                        <input type="text" name="name" class="form-control" required>
                                        <?php if($errors->has('name')): ?>
                                        <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('name')); ?></span>
                                        <?php endif; ?>

                                    </div>

                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('Email'); ?></label>
                                        <input type="text" name="email" class="form-control" autofill="off" required>
                                        <?php if($errors->has('email')): ?>
                                        <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('email')); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('Phone'); ?></label>
                                        <input type="number" name="phone" class="form-control" required>
                                        <?php if($errors->has('phone')): ?>
                                        <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('phone')); ?></span>
                                        <?php endif; ?>

                                    </div>


                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('Password'); ?></label>
                                        <input type="password" name="password" class="form-control" id="password1" required>
                                        <?php if($errors->has('password')): ?>
                                        <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('password')); ?></span>
                                        <?php endif; ?>

                                    </div>


                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('Confirm Password'); ?></label>
                                        <input type="password" name="cpassword" class="form-control" id="password2" required>
                                        <?php if($errors->has('password')): ?>
                                        <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('password')); ?></span>
                                        <?php endif; ?>

                                    </div>
                                    
                                    
                                    
                                       <div class="form-group">
                                        <label><?php echo app('translator')->get('Select Previlages'); ?></label>
                                        <div class="clearfix"><br></div>
                                        </br>
                                       <input type="checkbox" name="role[]" value="1">&nbsp;&nbsp;&nbsp;Schoolspe Users&nbsp;&nbsp;&nbsp;
                                       <input type="checkbox" name="role[]" value="2">&nbsp;&nbsp;&nbsp;Client Details&nbsp;&nbsp;&nbsp;
                                       <input type="checkbox" name="role[]" value="3">&nbsp;&nbsp;&nbsp;Course Entries&nbsp;&nbsp;&nbsp;
                                       <input type="checkbox" name="role[]" value="4">&nbsp;&nbsp;&nbsp;Institution&nbsp;&nbsp;&nbsp;
                                       <br>
                                       <input type="checkbox" name="role[]" value="5">&nbsp;&nbsp;&nbsp;Applications&nbsp;&nbsp;&nbsp;
                         
                                       <input type="checkbox" name="role[]" value="6">&nbsp;&nbsp;&nbsp;Leads&nbsp;&nbsp;&nbsp;
                                       <input type="checkbox" name="role[]" value="7">&nbsp;&nbsp;&nbsp;Blogs&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" name="role[]" value="8">&nbsp;&nbsp;&nbsp;Settings&nbsp;&nbsp;&nbsp;
                                       

                                    </div>




                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn btn-primary" onclick=" return matchPassword()"><?php echo app('translator')->get('Save changes'); ?></button>
                        </div>
            </form>
        </div>
    </div>
</div>

<style>

 .modai-3 label,   #categoryModal label{
        float:left !important;
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
    function matchPassword() 
{  
 var pass1 = document.getElementById("password1").value;  
  var pass2 = document.getElementById("password2").value;  
//   alert(pass1);
//   alert(pass2)

if(pass1 != pass2)  
  {   
    alert("Passwords did not match");  
    return false;
  } 
 else
 {
    return true;  
 }
} 
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/admin/schoolpeusers/index.blade.php ENDPATH**/ ?>
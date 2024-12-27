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

                <h3 style="text-align:center">Institute  Users </h3>&nbsp;&nbsp;
<small>(List of users registered without institution.)</small>


                <!--<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#categoryModal" style="float:right;margin-left:auto"><?php echo app('translator')->get('Add-->
                <!--    User'); ?></button>-->


            </div>

        </div>
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3 mb-3 pl-3 pr-3 py-3">
                <h4 style="color: #FF4C00!important;" class="mb-3">Search <i class="fa fa-search" aria-hidden="true"></i></h4>

                <form action="<?php echo e(url('userdata_search')); ?>">
                    <div class="row">
                        <div class="col-md-3">
                            <?php
                            $E=$P=$u=$c1=$c2=$c3=$c4="";
                            if($type==1)
                            {
                                $u="selected";
                            }
                            else if($type==2)
                            {
                                $P="selected";
                            }
                            else if($type==3)
                            {
                                $E="selected";
                            }
                              else if($type==4)
                            {
                                $c1="selected";
                            }
                            else if($type==5)
                            {
                                $c2="selected";
                            }
                              else if($type==6)
                            {
                                $c3="selected";
                            }
                            else if($type==7)
                            {
                                $c4="selected";
                            }
                            
                            ?>
                            <select class="form-control" name="type" id="seeAnotherField">
                                <option value="1"<?=$u?>>User Name</option>
                                <option value="2"<?=$P?>>Phone Number</option>
                                <option value="3"<?=$E?>>Email</option>
                                <option value="4"<?=$c1?>>New Lead</option>
                                <option value="5"<?=$c2?>>Completed</option>
                                <option value="6"<?=$c3?>>Following</option>
                                <option value="7"<?=$c4?>>Not Interested</option>
                               
                               




                            </select>
                        </div>
                        <div class="col-md-3" id="inp_hi"> <input type="text" class="form-control" name="keyword" maxlength="20" value="<?php echo e($keyword); ?>"placeholder="Enter Keyword" >
                        <p><small>20 Maximum Characters</small></p>
                        </div>
                        
                       <div class="col-md-3">
                           <input type="submit"class="btn-sm btn-primary" class="btn-sm btn-primary" value="Search">
&nbsp;<input type="submit" name="submit" class="btn-sm btn-primary" value="Reset">    
</div>

    </form>
          <div class="col-md-3">    <button class="btn btn-primary" type="submit" name="export" style="float:right">EXPORT</button></div>  
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
                                                        <th>Date</th>
                                                         <th>Status</th>

                                                        <!--<th>Action</th>-->

                                                    </tr>
                                                </thead>
                                                <tbody class="cur-body">
                                                    <td class="icons">
                                                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <tr>
                                                            <td><?php echo e($users->firstItem() + $loop->index); ?></td>
                                                            <td><?php echo e(__($u->user_name)); ?></td>
                                                            <td><?php echo e(__($u->email)); ?></td>
                                                            <td><?php echo e(__($u->user_phone)); ?></td>
                                                            
                                                                        <td> <?php echo e(date('d-m-Y',strtotime($u->created_at))); ?></td>
                                       
                                                            
                                            <td>
                                                <?php
                                                $btnclass="btn-sm btn-info";
                                                $textbtn="New Lead";
                                                ?>
                                                <?php if($u->status=="C"): ?>
                                                
                                                <?php 
                                                $btnclass="btn-sm btn-success";
                                                $textbtn="Completed";
                                                
                                                ?>
                                                <?php elseif($u->status=="F"): ?>
                                              
                                                <?php 
                                                $btnclass="btn-sm btn-warning";
                                                $textbtn="Following";
                                                
                                                ?>
                                                <?php elseif($u->status=="D"): ?>
                                                
                                                <?php 
                                                $btnclass="btn-sm btn-danger";
                                                $textbtn="Not Interested";
                                                
                                                ?>
                                                <?php endif; ?>
                                                <button type="button" class="<?php echo e($btnclass); ?>" data-toggle="modal" data-target="#a<?php echo e($users->firstItem() + $loop->index); ?>">
<?php echo e($textbtn); ?>

</button><!-- Modal -->
<div class="modal fade" id="a<?php echo e($users->firstItem() + $loop->index); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remarks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form   action="<?php echo e(url('user_action/'.$u->id .' ')); ?>" method="post" >
		<?php echo e(method_field('PUT')); ?>

    <?php echo e(csrf_field()); ?>


			<div class="row">
				<div class="col-md-12" style="text-align:left">
			<label>Status</label>
			<select name="status" class="form-control" >
			    <?php 
			    $m1="";
			    $m2="";
			    $m3="";
			    $status=$u->status;
			    if($status=="C")
			    {
			        $m1="selected";
			    }
			    else if($status=="F")
			    {
			        $m2="selected";
			    }
			    else if($status=="D")
			    {
			        $m3="selected";
			    }
			    
			    ?>
				<option value="C" <?=$m1;?>>Completed</option>
				<option value="F" <?=$m2;?>>Following</option>
				<option value="D" <?=$m3;?>>Not Interested</option>

			</select>
			</div>
			<div class="col-md-12 mt-2" style="text-align:left">
				<br><label >Remark</label>
			<textarea col="5" row="5"  class="form-control" name="remarks" value="<?php echo e(old('remarks', $u->remarks)); ?>">
<?php echo e(old('remarks', $u->remarks)); ?>


			</textarea></div>
			</div>
			
		
      </div>
      <div class="modal-footer">
     
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
	  </form>
    </div>
  </div>
</div>
<!--model end-->
                                               
                                            </td>
                                                            
                                                <!--<td>-->
                                                <!--    <input data-id="<?php echo e($u->id); ?>" class="toggle-class" type="checkbox" data-onstyle="success" data-style="ios" data-offstyle="danger" data-toggle="toggle" data-on="&#10003;" data-off="&#x2716;" <?php echo e($u->status ? 'checked':''); ?>>-->

                                                <!--</td>-->
                                                           
                                                            <!--<td>-->

                                                            <!--    <a href="" data-bs-toggle="modal" data-bs-target="#a<?php echo e($loop->iteration); ?>"><i class="fas fa-pencil-alt" style="font-size:20px; color: #000000;margin-right:5px"></i></a>-->

                                                            <!--    <a href="<?php echo e(route('userdestroy',$u->id)); ?>" title="Delete the item" onclick="return confirm('Are you sure you want to delete this item?');">-->
                                                            <!--        <i class="fa fa-trash" aria-hidden="true" style="font-size:20px;color:#e84118;margin-right:5px"></i>-->
                                                            <!--    </a>-->


                                                            <!--</td>-->
                                                            <td>
                                                                <!-- Button trigger modal -->


                                                                <!-- Modal -->
                                                                <div class="modal fade" id="a<?php echo e($loop->iteration); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">

                                                                                            <div class="col-md-12">
                                                                                                <form action="<?php echo e(route('userupdate')); ?>" method="POST" enctype="multipart/form-data">
                                                                                                    <?php echo csrf_field(); ?>
                                                                                                    <input type="hidden" name="id" class="form-control" required value="<?php echo e(old('id', $u->id)); ?>">
                                                                                                    <div class="form-group">
                                                                                                        <label><?php echo app('translator')->get('User Name'); ?></label>
                                                                                                        <input type="text" name="name" class="form-control" required value="<?php echo e(old('name', $u->name)); ?>">
                                                                                                        <?php if($errors->has('name')): ?>
                                                                                                        <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('name')); ?></span>
                                                                                                        <?php endif; ?>

                                                                                                    </div>

                                                                                                    <div class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Email'); ?></label>
                                                                                                        <input type="text" name="email" class="form-control" required value="<?php echo e(old('name', $u->email)); ?>">
                                                                                                        <?php if($errors->has('email')): ?>
                                                                                                        <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('email')); ?></span>
                                                                                                        <?php endif; ?>
                                                                                                    </div>

                                                                                                    <div class="form-group">
                                                                                                        <label><?php echo app('translator')->get('Phone'); ?></label>
                                                                                                        <input type="number" name="phone" class="form-control" required value="<?php echo e(old('name', $u->phone)); ?>">
                                                                                                        <?php if($errors->has('phone')): ?>
                                                                                                        <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('phone')); ?></span>
                                                                                                        <?php endif; ?>

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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td class="text-center" colspan="100%"><?php echo app('translator')->get('Data not found'); ?></td>
            </tr>
            <?php endif; ?>
            </tbody>
            </table>

        </div>
        <div class="card-footer clearfix">
            <?php echo $users->links(); ?>

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
            <form action="<?php echo e('adduser'); ?>" method="post" enctype="multipart/form-data">
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
                                        <input type="text" name="email" class="form-control" required>
                                        <?php if($errors->has('email')): ?>
                                        <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('email')); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('Phone'); ?></label>
                                        <input type="number" name="user_phone" class="form-control" required>
                                        <?php if($errors->has('phone')): ?>
                                        <span class="text-danger" style="font-weight:bold"><?php echo e($errors->first('phone')); ?></span>
                                        <?php endif; ?>

                                    </div>
                                    
                                    
                                    <!--   <div class="form-group">-->
                                    <!--    <label><?php echo app('translator')->get('Select Previlages'); ?></label>-->
                                    <!--    <div class="clearfix"> </div>-->
                                    <!--    </br>-->
                                    <!--   <input type="checkbox" name="role[]" value="1">&nbsp;&nbsp;&nbsp;Users&nbsp;&nbsp;&nbsp;-->
                                    <!--   <input type="checkbox" name="role[]" value="2">&nbsp;&nbsp;&nbsp;Master Entries&nbsp;&nbsp;&nbsp;-->
                                    <!--   <input type="checkbox" name="role[]" value="3">&nbsp;&nbsp;&nbsp;Institute&nbsp;&nbsp;&nbsp;-->
                                    <!--   <input type="checkbox" name="role[]" value="4">&nbsp;&nbsp;&nbsp;College&nbsp;&nbsp;&nbsp;-->
                                    <!--   </br>-->
                                    <!--   <input type="checkbox" name="role[]" value="5">&nbsp;&nbsp;&nbsp;Leads&nbsp;&nbsp;&nbsp;-->
                                    <!--   <input type="checkbox" name="role[]" value="6">&nbsp;&nbsp;&nbsp;Blogs&nbsp;&nbsp;&nbsp;-->
                                       

                                    <!--</div>-->




                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Save changes'); ?></button>
                        </div>
            </form>
        </div>
    </div>
</div>


<style>
    #categoryModal label{
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
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: 'userstatus',
                    data: {
                        'status': status,
                        'id': id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            });
        });
    </script>
    
    <script>
    $("#seeAnotherField").change(function() {
  if ($(this).val() == "1" || $(this).val() == "2" || $(this).val() == "3"  ) {
    $('#inp_hi').show();
   
  } else {
    $('#inp_hi').hide();
   
  }
});
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/admin/user/index.blade.php ENDPATH**/ ?>
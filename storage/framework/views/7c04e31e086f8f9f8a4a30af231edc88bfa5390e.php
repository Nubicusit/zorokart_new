<?php $__env->startSection('content'); ?>
<div class="content-wrapper">

        <div class="content-header">
          <div class="container-fluid">
              <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>

            <div class="row">
              <div class="col-sm-12">
                <h1 class="m-0 text-dark">Change Password</h1>
              </div>
            </div>
          </div>
        </div>

        <div class="content">
          <div class="container-fluid">

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                 
                  <div class="card-body pt-5">

                    <form action="<?php echo e(url('admin_change_password')); ?>" method="post" onSubmit = "return checkPassword(this)">
            <?php echo csrf_field(); ?>
            
							<div class="form-group row"><label for="name" class="col-sm-3 col-form-label">
                        New Password<sup class="text-danger">*</sup></label>
                      <div class="col-sm-4">
									<input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"name="password" id="password1"> 
									<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
							</div>

							<div class="form-group row"><label for="name" class="col-sm-3 col-form-label">
                        Confirm New Password<sup class="text-danger">*</sup></label>
                      <div class="col-sm-4">
									<input type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password1" id="password2"> 
									<?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
							
							</div>

	<div class="form-group row"><label for="select"
						class="col-sm-3 col-form-label"></label>
					 <div class="col-sm-2"><button type="submit" class="btn btn-primary mr-2" onclick=" return matchPassword()">Save</button>
                </div>
					</div>

					
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>

    <script>

function matchPassword() 
{  
  var pass1 = document.getElementById("password1").value;  
  var pass2 = document.getElementById("password2").value;  
  
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
<?php echo $__env->make('admin.layout.master', ['title' => 'Change Password'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/admin/password/edit.blade.php ENDPATH**/ ?>
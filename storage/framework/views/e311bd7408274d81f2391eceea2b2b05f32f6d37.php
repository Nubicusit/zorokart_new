<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <!-- site favicon -->
  <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('assets/images/logo/favicon.png')); ?>">
  <!-- bootstrap 4  -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap.min.css')); ?>">
  <!-- fontawesome 5  -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/all.min.css')); ?>">
  <?php echo $__env->yieldPushContent('css-link'); ?>
  <!-- main css -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/app.css')); ?>">
  <?php echo $__env->yieldPushContent('css'); ?>
</head>
  <body>
  <!-- Authentication Area Start -->
    <div class="authentication-area">
      <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
      </div>
    </div>
  <!-- Authentication Area End -->
  <!-- jQuery library -->
  <script src="<?php echo e(asset('assets/admin/js/jquery-3.5.1.min.js')); ?>"></script>
  <!-- bootstrap js -->
  <?php echo $__env->yieldPushContent('js-link'); ?>
  <script src="<?php echo e(asset('assets/admin/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/admin/js/bootstrap-notify.min.js')); ?>"></script>
  <script>
    (function($){
      "use strict";
      <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emsg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          $.notify("<?php echo e($emsg); ?>", {
            type:'danger',
            newest_on_top: true,
          });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    })(jQuery);
  </script>
  <?php echo $__env->yieldPushContent('js'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\zorokart\resources\views/admin/layout/auth.blade.php ENDPATH**/ ?>
<!-- Topbar start -->

<div class="topbar">
    <div class="topbar-left bar-toggle">
      <span class="top-bar-icon"></span>
    </div>
    <div class="topbar-right">
      <div class="profile-dropdown-area dropdown">
        <a href="javascript:void(0)" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
          <img src="<?php echo e(url('public/images/young-user-icon 1.png')); ?>">
        </a>
        <div class="dropdown-menu pb-0 pt-0" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="<?php echo e(url('user_profile')); ?>"><i class="fas fa-user"></i> <?php echo app('translator')->get('Profile'); ?></a>
          <a class="dropdown-item" href="<?php echo e(url('password')); ?>"><i class="fas fa-key"></i> <?php echo app('translator')->get('Change Password'); ?></a>
          <a class="dropdown-item" href="<?php echo e(route('admin_logout')); ?>"><i class="fas fa-sign-out-alt"></i> <?php echo app('translator')->get('Logout'); ?></a>
        </div>
      </div>
    </div>
  </div>
  <style>
      .dropdown-item.active, .dropdown-item:active {
    color: #FF4005!important;
    text-decoration: none;
    background-color: #fff;
}
.topbar .topbar-right .profile-dropdown-area .dropdown-menu .dropdown-item:hover {
   background-color: #fff;
    color: #FF4005!important;
}
.topbar .topbar-right .profile-dropdown-area img {
   
     border: 1px solid #fff;}
  </style>
  <!-- Topbar End --><?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/admin/includes/topbar.blade.php ENDPATH**/ ?>
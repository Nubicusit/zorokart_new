     <!-- Sidebar Start -->

<style>

  .blue

  {

    background-color:#fff;

    color:
#FF4C00!important;

  }
  .pagination {
      margin-top:1rem;
  }

  </style>
<?php

$matches[0]=Auth::guard('admin')->user()->role;
//print_r($matches[0]);exit();
?>
<div class="res-sidebar-sign">

      <span class="sidebar-arrow">

      </span>

    </div>

    <div class="sidebar light-sidebar">

      <div class="sidebar-wrapper">

        <div class="sidebar-logo-area">

          <a href="<?php echo e(url('/')); ?>" target="_blank"  class="sidebar-logo"><img src="<?php echo e(url('public/images/logoz.png')); ?>" alt="logo" style="width:70%"></a>

          <a href="#" class="sidebar-favicon"><img src="<?php echo e(url('public/images/logo.png')); ?>" alt="logo" style="width:70%"></a>

        </div>

        <div class="sidebar-menu-area  scrollbar" id="style-1">

          <ul class="sidebar-menu ">

            <li class="sidebar-menu-item">

              <a href="#" class="blue">

                <i class="fas fa-home"></i>

                <span class="sidebar-menu-title"><?php echo app('translator')->get('Dashboard'); ?></span>

              </a>

            </li>



   <!--USERS-->
   <?php if(in_array(1, $matches[0]) != false){?>
            <li class="sidebar-menu-item has-child-menu">

              <a href="#" class="">

              <i class="fa fa-user" aria-hidden="true"></i>



                <span class="sidebar-menu-title"><?php echo app('translator')->get(' Users'); ?></span>

                <span class="fa-arrow"></span>

              </a>

              <div class="sidebar-child-menu ">

                <ul>

                  <li class="sidebar-menu-item">

                    <a href="<?php echo e(route('schoolpeusers')); ?>" class="">

                      <span class="sidebar-menu-title">   <?php echo app('translator')->get('Manage Users'); ?></span>

                    </a>

                 

                  </li>


                </ul>

              </div>

            </li> 
            <?php } ?>
            
            
   
   
   <!-- Cilent Details -->
     <?php if(in_array(2, $matches[0]) != false){?>

<li class="sidebar-menu-item has-child-menu">

<a href="#" class="">

<i class="fa fa-users" aria-hidden="true"></i>

  <span class="sidebar-menu-title"><?php echo app('translator')->get('Client Details'); ?></span>

  <span class="fa-arrow"></span>

</a>

<div class="sidebar-child-menu ">

  <ul>
      


<!--<li class="sidebar-menu-item has-child-menu">-->

<!--<a href="<?php echo e(route('usercontact')); ?>">-->

<!--   <span class="sidebar-menu-title"><?php echo app('translator')->get('Contact Us'); ?></span>-->

<!--   </a>-->

<!-- </li>-->
 
 

 
 
<!--  <li class="sidebar-menu-item has-child-menu">-->




 <li class="sidebar-menu-item has-child-menu">

<a href="<?php echo e(route('user')); ?>">

   <span class="sidebar-menu-title"><?php echo app('translator')->get('Users'); ?></span>

   </a>

 </li>
    

 </ul>

</div>

</li> 

 <?php } ?>
         
            
            



<!--Course Entries-->
   <?php if(in_array(3, $matches[0]) != false){?>

<li class="sidebar-menu-item has-child-menu">

<a href="#" class="">

<i class="fa fa-th" aria-hidden="true"></i>



  <span class="sidebar-menu-title"><?php echo app('translator')->get('Master Entries'); ?></span>

  <span class="fa-arrow"></span>

</a>

<div class="sidebar-child-menu ">

  <ul>


<li class="sidebar-menu-item">

<a href="<?php echo e(route('Main_category')); ?>"  class="">

  <span class="sidebar-menu-title">   <?php echo app('translator')->get('Main Category'); ?></span>

</a>

</li>



  <li class="sidebar-menu-item">

<a href="<?php echo e(route('category')); ?>"  class="">

  <span class="sidebar-menu-title">   <?php echo app('translator')->get('Category'); ?></span>

</a>

</li>




  <li class="sidebar-menu-item">

<a href="<?php echo e(route('Subcategory')); ?>" class="">

  <span class="sidebar-menu-title">  <?php echo app('translator')->get('Sub-Category'); ?></span>

</a>

</li>
<li class="sidebar-menu-item">

<a href="<?php echo e(route('product_details')); ?>" class="">

  <span class="sidebar-menu-title">  <?php echo app('translator')->get('Product Details'); ?></span>

</a>

</li>

<li class="sidebar-menu-item">

  <a href="<?php echo e(route('banners.index')); ?>" class="">

    <span class="sidebar-menu-title"> Banners</span>

  </a>

</li>
   


  </ul>

</div>

</li> 
 <?php } ?>




<!--Institution-->

 <?php if(in_array(4, $matches[0]) != false)
 {?>
<li class="sidebar-menu-item has-child-menu">

  <a href="<?php echo e(route('products.index')); ?>" class="">
  
  <i class="fa fa-sitemap" aria-hidden="true"></i>
  
  
  
  
    <span class="sidebar-menu-title"><?php echo app('translator')->get('Products'); ?></span>
  
    <span class="fa-arrow"></span>
  
  </a>
  
  
  



   <?php } ?> 
   
   
   
 <!--Applications-->
  <?php if(in_array(5, $matches[0]) != false){?>

<li class="sidebar-menu-item has-child-menu">

<a href="#" class="">

<i class="fa fa-paper-plane" aria-hidden="true"></i>




  <span class="sidebar-menu-title"><?php echo app('translator')->get('Orders'); ?></span>

  <span class="fa-arrow"></span>

</a>

<div class="sidebar-child-menu ">

  <ul>

  <li class="sidebar-menu-item">

<a href="<?php echo e(route('onlineapplications')); ?>"  class="">

  <span class="sidebar-menu-title">   <?php echo app('translator')->get('Online '); ?></span>

</a>

</li>




  <li class="sidebar-menu-item">

<a href="<?php echo e(route('offlineapplications')); ?>" class="">

  <span class="sidebar-menu-title">  <?php echo app('translator')->get('Offline '); ?></span>

</a>

</li>
<li class="sidebar-menu-item">

<a href="<?php echo e(route('pendingapplications')); ?>" class="">

  <span class="sidebar-menu-title">  <?php echo app('translator')->get('Pending '); ?></span>

</a>

</li>

    
  </ul>  
   </div>
 <?php } ?>    
   
   
   
      
 <?php if(in_array(6, $matches[0]) != false){?>

<!--CUSTOMER-->
<li class="sidebar-menu-item has-child-menu">

<a href="#" class="">

<i class="fa fa-user-circle" aria-hidden="true"></i>



  <span class="sidebar-menu-title"><?php echo app('translator')->get('Contact'); ?></span>

  <span class="fa-arrow"></span>

</a>

<div class="sidebar-child-menu ">

  <ul>

    
      








<li class="sidebar-menu-item has-child-menu">

<a href="<?php echo e(url('referals')); ?>">

  <span class="sidebar-menu-title"><?php echo app('translator')->get('Referals'); ?></span>

</a>

</li>


<li class="sidebar-menu-item has-child-menu">

<a href="<?php echo e(url('blogsreply')); ?>">

  <span class="sidebar-menu-title"><?php echo app('translator')->get('Blogs Reply'); ?></span>

</a>

</li>


<li class="sidebar-menu-item has-child-menu">

<a href="<?php echo e(url('contactus')); ?>">

  <span class="sidebar-menu-title"><?php echo app('translator')->get('Contact Us'); ?></span>

</a>

</li>

<li class="sidebar-menu-item has-child-menu">

<a href="<?php echo e(url('advanceleads')); ?>">

  <span class="sidebar-menu-title"><?php echo app('translator')->get('Advance Leads'); ?></span>

</a>

</li>




 </ul>

</div>

</li> 
 <?php } ?>     
 
 
 <!--Blogs-->
 
 <?php if(in_array(7, $matches[0]) != false){?>

<li class="sidebar-menu-item has-child-menu">

<a href="<?php echo e(url('blogs')); ?>">

   <i class="fa fa-book" aria-hidden="true"></i>

     <span class="sidebar-menu-title"><?php echo app('translator')->get('Blogs'); ?></span>

   </a>

 </li>
  <?php } ?> 
  
  <?php if(in_array(8, $matches[0]) != false){?>
<!-- Settings -->
 <li class="sidebar-menu-item has-child-menu">

<a href="<?php echo e(url('settings')); ?>">

   <i class="fa fa-cog" aria-hidden="true"></i>

     <span class="sidebar-menu-title"><?php echo app('translator')->get('Settings'); ?></span>

   </a>

 </li>
  
 <?php } ?>     
 


    </div>

      </div>

    </div>

    <style>

      .sidebar .sidebar-wrapper .sidebar-menu-area .sidebar-child-menu .sidebar-menu-item a:hover{

        background:none !important;

        color:#FF4005 !important;
        font-weight:500;

      }
.scrollbar
{


	height: 95vh;


	overflow-y: scroll;
	margin-bottom: 25px;
}

.force-overflow
{
	min-height: 450px;
}


/*
 *  STYLE 1
 */

#style-1::-webkit-scrollbar-track
{
	/*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);*/
	border-radius: 10px;
	/*background-color: #F5F5F5;*/
}

#style-1::-webkit-scrollbar
{
	width: 6px;
	/*background-color: #F5F5F5;*/
}

#style-1::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	/*-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);*/
	background-color:#ff4c009e;
}


      </style>

  <!-- Sidebar End<?php /**PATH C:\xampp\htdocs\zorokart\resources\views/admin/includes/sidebar.blade.php ENDPATH**/ ?>
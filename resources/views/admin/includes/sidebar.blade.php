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

          <a href="{{url('/')}}" target="_blank"  class="sidebar-logo"><img src="{{url('public/images/logoz.png')}}" alt="logo" style="width:70%"></a>

          <a href="#" class="sidebar-favicon"><img src="{{url('public/images/logo.png')}}" alt="logo" style="width:70%"></a>

        </div>

        <div class="sidebar-menu-area  scrollbar" id="style-1">

          <ul class="sidebar-menu ">

            <li class="sidebar-menu-item">

              <a href="#" class="blue">

                <i class="fas fa-home"></i>

                <span class="sidebar-menu-title">@lang('Dashboard')</span>

              </a>

            </li>



   <!--USERS-->
   <?php if(in_array(1, $matches[0]) != false){?>
            <li class="sidebar-menu-item has-child-menu">

              <a href="#" class="">

              <i class="fa fa-user" aria-hidden="true"></i>



                <span class="sidebar-menu-title">@lang(' Users')</span>

                <span class="fa-arrow"></span>

              </a>

              <div class="sidebar-child-menu ">

                <ul>

                  <li class="sidebar-menu-item">

                    <a href="{{route('schoolpeusers')}}" class="">

                      <span class="sidebar-menu-title">   @lang('Manage Users')</span>

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

  <span class="sidebar-menu-title">@lang('Client Details')</span>

  <span class="fa-arrow"></span>

</a>

<div class="sidebar-child-menu ">

  <ul>
      


<!--<li class="sidebar-menu-item has-child-menu">-->

<!--<a href="{{ route('usercontact') }}">-->

<!--   <span class="sidebar-menu-title">@lang('Contact Us')</span>-->

<!--   </a>-->

<!-- </li>-->
 
 

 
 
<!--  <li class="sidebar-menu-item has-child-menu">-->




 <li class="sidebar-menu-item has-child-menu">

<a href="{{ route('user') }}">

   <span class="sidebar-menu-title">@lang('Users')</span>

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



  <span class="sidebar-menu-title">@lang('Master Entries')</span>

  <span class="fa-arrow"></span>

</a>

<div class="sidebar-child-menu ">

  <ul>


<li class="sidebar-menu-item">

<a href="{{route('Main_category')}}"  class="">

  <span class="sidebar-menu-title">   @lang('Main Category')</span>

</a>

</li>



  <li class="sidebar-menu-item">

<a href="{{route('category')}}"  class="">

  <span class="sidebar-menu-title">   @lang('Category')</span>

</a>

</li>




  <li class="sidebar-menu-item">

<a href="{{route('Subcategory')}}" class="">

  <span class="sidebar-menu-title">  @lang('Sub-Category')</span>

</a>

</li>
<li class="sidebar-menu-item">

<a href="{{route('product_details')}}" class="">

  <span class="sidebar-menu-title">  @lang('Product Details')</span>

</a>

</li>

<li class="sidebar-menu-item">

  <a href="{{route('banners.index')}}" class="">

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

  <a href="{{route('products.index')}}" class="">
  
  <i class="fa fa-sitemap" aria-hidden="true"></i>
  
  
  
  
    <span class="sidebar-menu-title">@lang('Products')</span>
  
    <span class="fa-arrow"></span>
  
  </a>
  
  
  



   <?php } ?> 
   
   
   
 <!--Applications-->
  <?php if(in_array(5, $matches[0]) != false){?>

<li class="sidebar-menu-item has-child-menu">

<a href="#" class="">

<i class="fa fa-paper-plane" aria-hidden="true"></i>




  <span class="sidebar-menu-title">@lang('Orders')</span>

  <span class="fa-arrow"></span>

</a>

<div class="sidebar-child-menu ">

  <ul>

  <li class="sidebar-menu-item">

<a href="{{route('onlineapplications')}}"  class="">

  <span class="sidebar-menu-title">   @lang('Online ')</span>

</a>

</li>




  <li class="sidebar-menu-item">

<a href="{{route('offlineapplications')}}" class="">

  <span class="sidebar-menu-title">  @lang('Offline ')</span>

</a>

</li>
<li class="sidebar-menu-item">

<a href="{{route('pendingapplications')}}" class="">

  <span class="sidebar-menu-title">  @lang('Pending ')</span>

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



  <span class="sidebar-menu-title">@lang('Contact')</span>

  <span class="fa-arrow"></span>

</a>

<div class="sidebar-child-menu ">

  <ul>

    
      








<li class="sidebar-menu-item has-child-menu">

<a href="{{url('referals')}}">

  <span class="sidebar-menu-title">@lang('Referals')</span>

</a>

</li>


<li class="sidebar-menu-item has-child-menu">

<a href="{{url('blogsreply')}}">

  <span class="sidebar-menu-title">@lang('Blogs Reply')</span>

</a>

</li>


<li class="sidebar-menu-item has-child-menu">

<a href="{{url('contactus')}}">

  <span class="sidebar-menu-title">@lang('Contact Us')</span>

</a>

</li>

<li class="sidebar-menu-item has-child-menu">

<a href="{{url('advanceleads')}}">

  <span class="sidebar-menu-title">@lang('Advance Leads')</span>

</a>

</li>




 </ul>

</div>

</li> 
 <?php } ?>     
 
 
 <!--Blogs-->
 
 <?php if(in_array(7, $matches[0]) != false){?>

<li class="sidebar-menu-item has-child-menu">

<a href="{{url('blogs')}}">

   <i class="fa fa-book" aria-hidden="true"></i>

     <span class="sidebar-menu-title">@lang('Blogs')</span>

   </a>

 </li>
  <?php } ?> 
  
  <?php if(in_array(8, $matches[0]) != false){?>
<!-- Settings -->
 <li class="sidebar-menu-item has-child-menu">

<a href="{{url('settings')}}">

   <i class="fa fa-cog" aria-hidden="true"></i>

     <span class="sidebar-menu-title">@lang('Settings')</span>

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

  <!-- Sidebar End
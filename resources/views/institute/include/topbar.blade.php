
<?php

//print_r($institution);exit();
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('ins_change_password')}}" method="post" onSubmit = "return checkPassword(this)">
            @csrf
        <input type="password" class="form-control input1"  name="password1" placeholder="Enter password" id="psw"><br>
         <i class=" fa fa-fw fa-eye-slash toggle-password1 "></i>
        <input type="password" class="form-control input2"   name="password2" placeholder="Enter confirm password" id="psw1">
        <i class=" fa fa-fw fa-eye-slash toggle-password2 "></i>
        <!--<input type="submit" name="password" placeholder="Enter confirm password" value="submit">-->
       
      </div>

      <div class="modal-footer">
       
        <input type="submit" class="btn btn-primary btn-rst" value="submit">
       
      </div>
      </form>
    </div>
  </div>
        </div>
<header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <a href="" class="sidebar-toggle">
                    <img class="svg" src="{{url('public/img/svg/bars.svg')}}" alt="img"></a>
                    @php
                     $logo=$settings->logo;
                    @endphp
                <a class="navbar-brand" href="#"><img class="dark" src="{{url('public/images/logo/'.$logo)}}" alt="svg"></a>
            </div>


            <div class="navbar-right">
                <ul class="navbar-right__menu">
                    <li class="nav-search d-none">
                        <a href="#" class="search-toggle">
                            <i class="la la-search"></i>
                            <i class="la la-times"></i>
                        </a>
                        <form action="/" class="search-form-topMenu">
                            <span class="search-icon" data-feather="search"></span>
                            <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
                        </form>
                    </li>
                    <li class="nav-message">
                        <div class="dropdown-custom">
                            <!--<a  href="{{url('ins_msg')}}?id=" class="nav-item-toggle">-->
                            <!--    <span data-feather="mail"></span></a>-->
                               
                            <!--<div class="dropdown-wrapper">-->
                            <!--    <h2 class="dropdown-wrapper__title">Messages <span-->
                            <!--            class="badge-circle badge-success ml-1">2</span></h2>-->
                               
                                <!--<a href="" class="dropdown-wrapper__more">See All Message</a>-->
                            <!--</div>-->
                        </div>
                    </li>
                    <!-- ends: nav-message -->
                    

                    <!-- ends: .nav-flag-select -->
                    <li class="nav-author">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle"><img src="{{url('public/img/author-nav.jpg')}}" alt=""
                                    class="rounded-circle"></a>
                            <div class="dropdown-wrapper">

                                <div class="nav-author__options">
                                    <ul>
                                        

                                        <li>
                                            <a href="{{url('change-password')}}" data-toggle="modal" data-target="#exampleModal">
                                                <span data-feather="key"></span>Change Password</a>
                                                <!-- Button trigger modal -->




                                        </li>
                                        
                                         <li>
                                            <a href="{{url('ins_delete')}}">
                                                <span data-feather="trash-2"></span>Delete Account</a>
                                        </li>
                                        
                                        
                                        <li>
                                            <a href="{{url('institution_logout')}}">
                                                <span data-feather="log-out"></span> Sign Out</a>
                                        </li>
                                        
                                        

                                    </ul>

                                </div>
                            </div>
                            <!-- ends: .dropdown-wrapper -->
                        </div>
                    </li>
                    <!-- ends: .nav-author -->
                </ul>

            </div>
            <!-- ends: .navbar-right -->
        </nav>
    </header>
    <style>
     .toggle-password2 {
    float: right;
    cursor: pointer;
    margin-right: 10px;
    margin-top: -25px;
    }
    .toggle-password1 {
    float: right;
    cursor: pointer;
    margin-right: 10px;
    margin-top: -52px;
    }
    </style>
    

    
    
   
<?php
// print_r($institution);
// exit();
?>

<?php
//print_r(session('cart'));exit();
$institute= App\Models\InstituteModel::where('user_id',auth()->user()->id)->get();
$institute_premium= App\Models\InstituteModel::where('user_id',auth()->user()->id)->where('premium',1)->count();
//$ins_msg= App\Models\InstituteModel::where('user_id',auth()->user()->id)->get();

?>
<?php

//$ins=DB::table('institute')->get();
//print_r($institution);exit();
// echo $ins_msg;die;
?>
    
<aside class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">

                <li>
                    <a href="<?php echo e(url('profile1')); ?>" class="">
                        <span class="nav-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="menu-text">Profile</span>

                    </a>
                </li>
               
                <?php if(auth()->user()->enable_admin==1): ?>
                <!-- <li>
                            <a href="<?php echo e(url('institute_dashboard')); ?>" class="active">
                                <span class="nav-icon"><i class="fa fa-th" aria-hidden="true"></i></span>
                                <span class="menu-text">Dashboard</span>

                            </a> -->
                </li>
                <li class="has-child ">
                    <a href="<?php echo e(url('institute_addmission',)); ?>" class="">
                        <span class="nav-icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="menu-text">Products</span>
                        <span class="toggle-icon"></span>

                    </a>

                    <ul>

                        <li>
                            <!--<a href="#" data-toggle="modal" data-target=".bd-example-modal-sm"-->
                            <!--    style="padding: 0.05px 30px 17.05px 30px;">Add Institute-->
                            <!--</a>-->
                            <a href="<?php echo e(url('ins_select')); ?>">Add Products</a>
                        </li>



                        <?php $__empty_1 = true; $__currentLoopData = $institute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li>
                            <a href="<?php echo e(url('ins_Institutions/'.$i->id)); ?>" style="padding: 0.05px 30px 17.05px 30px;">
                                <?php echo e($i->name); ?></a>
                        </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <li>No Listing</li>
                <?php endif; ?>
                
                    </ul>
                </li>

                <!--<li>-->
                <!--    <a href="<?php echo e(url('admission')); ?>" class="">-->
                <!--        <span class="nav-icon"><i class="fa fa-cog" aria-hidden="true"></i></span>-->
                <!--        <span class="menu-text">Settings</span>-->

                <!--    </a>-->
                <!--</li>-->
                <li>
                    <a href="<?php echo e(url('help')); ?>" class="">
                        <span class="nav-icon"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                        <span class="menu-text">Help</span>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('ins_msg')); ?>?id=1">
                        <span class="nav-icon"> <i class="fa fa-comments" aria-hidden="true"></i></span>

                        <span class="menu-text">Message</span>

                    </a>
                </li>
                 <?php elseif($institute_premium==0): ?>
                <!-- <li>
                            <a href="<?php echo e(url('index1')); ?>" class="disable">
                                <span class="nav-icon"><i class="fa fa-th" aria-hidden="true"></i></span>
                                <span class="menu-text">Dashboard</span>

                            </a>
                        </li> -->
                <li class="has-child ">
                    <a href="<?php echo e(url('index1')); ?>" class="disable">
                        <span class="nav-icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="menu-text">Products</span>
                        <span class="toggle-icon"></span>

                    </a>
                    <ul>
                        <li>
                            <a href="<?php echo e(url('index1')); ?>" style="padding: 0.05px 30px 17.05px 30px;"
                                class="disable">Online </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('index1')); ?>" style="padding: 0.05px 30px 17.05px 30px;"
                                class="disable">Offline </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="<?php echo e(url('index1')); ?>" class="disable">
                        <span class="nav-icon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                        <span class="menu-text">Settings</span>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('index1')); ?>" class="disable">
                        <span class="nav-icon"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                        <span class="menu-text">Help</span>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('index1')); ?>" class="disable">
                        <span class="nav-icon"><i class="fa fa-comments" aria-hidden="true"></i></span>
                        <span class="menu-text">Message</span>

                    </a>
                </li>



                 <?php else: ?> 
                <!-- <li>
                            <a href="<?php echo e(url('institute_dashboard')); ?>" class="active">
                                <span class="nav-icon"><i class="fa fa-th" aria-hidden="true"></i></span>
                                <span class="menu-text">Dashboard</span>

                            </a> -->
                </li>
                <li class="has-child ">
                    <a href="<?php echo e(url('institute_addmission',)); ?>" class="">
                        <span class="nav-icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="menu-text">Institutions</span>
                        <span class="toggle-icon"></span>

                    </a>

                    <ul>

                        <li>
                            <!--<a href="#" data-toggle="modal" data-target=".bd-example-modal-sm"-->
                            <!--    style="padding: 0.05px 30px 17.05px 30px;">Add Institute-->
                            <!--</a>-->
                            <a href="<?php echo e(url('ins_select')); ?>">Add Institution</a>
                        </li>



                        <?php $__empty_1 = true; $__currentLoopData = $institute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li>
                            <a href="<?php echo e(url('ins_Institutions/'.$i->id)); ?>" style="padding: 0.05px 30px 17.05px 30px;">
                                <?php echo e($i->name); ?></a>
                        </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <li>No Listing</li>
                <?php endif; ?>
                
                    </ul>
                </li>

                <!--<li>-->
                <!--    <a href="<?php echo e(url('admission')); ?>" class="">-->
                <!--        <span class="nav-icon"><i class="fa fa-cog" aria-hidden="true"></i></span>-->
                <!--        <span class="menu-text">Settings</span>-->

                <!--    </a>-->
                <!--</li>-->
                <li>
                    <a href="<?php echo e(url('help')); ?>" class="">
                        <span class="nav-icon"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                        <span class="menu-text">Help</span>

                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('ins_msg')); ?>?id=1">
                        <span class="nav-icon"> <i class="fa fa-comments" aria-hidden="true"></i></span>

                        <span class="menu-text">Message</span>

                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</aside>





<style>
    .card-footer nav{
        /* display: flex;
    flex-direction: row-reverse;
    justify-content: space-between; */
    }
    
    *[class*="bg"] {
    color: initial !important;
}

.card-footer nav{
        /* display: flex;
    flex-direction: row-reverse;
    justify-content: space-between; */
    }
    
    *[class*="bg"] {
    color: initial !important;
}form .socialmediaside2 input {
    border: none !important;
    margin-top: 1rem;
    width: 1%;
}

      .socialmediaside2 .form-group{
            width: 185px;
        }
         form img.portimg,   form video.portimg-1 {
            display: none;
            width: 150px !important;
            height: 150px !important;
            margin-top: 1rem;
            margin-right: 0%;
            object-fit: fill;
        }

        .school-edit-form .school-form-box form .socialmediaside2 input {
            border: none !important;
            margin-top: 1rem;
            width: 1%;
        }

        .socialmediaside2 input::-webkit-file-upload-button {
            position: absolute;
            padding: 6px 10px;
            background-color: #D9F1F6;
    
            border: none;
            border-radius: 5px;
            color: black;
            font-weight: 600;
            text-transform: uppercase;
            box-shadow: 0px 3px 3px -2px rgba(0, 0, 0, 0.2), 0px 3px 4px 0px rgba(0, 0, 0, 0.14), 0px 1px 8px 0px rgba(0, 0, 0, 0.12);
            transition: 100ms ease-out;
            cursor: pointer;


        }

        .upload-demo {
            padding-left: 0%;
            display: flex;
            align-items: flex-start;
            margin-top:10px;
        }

        .socialmediaside2 input::-webkit-file-upload-button:hover {


            background-color: #D9F1F6;
      
            box-shadow: 0px 3px 5px -1px rgba(0, 0, 0, 0.2), 0px 5px 8px 0px rgba(0, 0, 0, 0.14), 0px 1px 14px 0px rgba(0, 0, 0, 0.12)
        }

        .addmore_img,     .addmore_img-1{
            display: inline-block;
            font-weight: 600;
            color: #fff !important;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #FF4005;
            border-color: #FF4005;
            border-radius: 50%;
            margin-top: 0% !important;
            font-size: 17px;
            width: 40px;
            line-height: 1;
            height: 40px;

        }

        .removebtn i {
            display: inline-block;
            font-weight: 600;
            color: #FF4005 !important;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;

            border-radius: 50%;
            margin-top: 0% !important;
            font-size: 21px;

            line-height: 1;

            border: none;
            margin-bottom: 1rem;
        }

        button.removebtn:not(:disabled) {
            cursor: pointer;
            border: none;
            background: none;
        }

        .upload-img-upload {
            display: flex;
            flex-flow: row wrap;
        }

        button.remove_field,   button.remove_field-1  {
            display: inline-block;
    font-weight: 600;
    color: #fff !important;
    text-align: center;
    /* min-width: 116px; */
    padding: 5px 15px;
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid;
    background-color: #FF4005 !important;
    border-color: #FF4005 !important;
    border-radius: 8px;
    margin-top: 0% !important;
    font-size: 16px;
    padding: 6px 19px;
    width: 120px;
    height: 35px;
    line-height: 1;
        }
        .table thead th, .table tbody td {
    text-align: center;
    padding: 13px 10px;
}





 .img-bg,  .img-bg-1 {
 background-repeat: no-repeat;
 background-position: center;
 background-size: cover;
 position: relative;
 padding-bottom: 100%;
 }
</style>



<style>
.disable i {
    color: #d2d2d2;
}

.disable {
    color: #d2d2d2 !important;
}
</style>

<?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/institute/include/sidebar.blade.php ENDPATH**/ ?>
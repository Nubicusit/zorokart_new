<?php $__env->startSection('content'); ?>


        <div class="contents content-dashboard">

            <div class="container-fluid">
                <div class="social-dash-wrap">
                    <div class="row">
                        <div class="col-lg-12">
                        <?php if(0): ?>
                            <div class="breadcrumb-main">
                                <div class="card" style="width: 100%; padding: 2rem; text-align: center;color:red">

                                <p id="req"> Oops..! These services can be accessed only by our premium members</p>
                                <button style="margin: auto; margin-top: 2rem;" class="nav-btn btn btn-primary opt" data-link="<?php echo e(url('get_premium')); ?>" id="premium"> Click here for Premium Membership</button>
                                </div>
                            </div>
<?php elseif(2): ?>
<div class="breadcrumb-main">
                                <div class="card" style="width: 100%; padding: 2rem; text-align: center;color:red">

                                <p style="color:green">You can access this page post approval by team Zorokart</p>
                                
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="breadcrumb-main">
                                <div class="card" style="width: 100%; padding: 2rem; text-align: center;color:red">

                                <p style="color:green">You can access this page post approval by team Zorokart</p>
                                
                                </div>
                            </div>
<?php endif; ?>
                        </div>
                     
                        
                        <div class="col-xxl-4 col-md-12 mb-25">

                            

                        </div>
                    </div>
            
                    <button style="display:none;" data-toggle="modal" href="#my-modal" id="premium_response"></button>
                    <!-- Modal -->
  <div class="modal fade" id="my-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
    
        <div class="modal-body "
         style="text-align:center; color:#45dc2d">

        <i class="fa fa-check-circle" aria-hidden="true" style="font-size: 30px;"></i><br><br>
            <p style="font-size: 17px;">
      Thank you for choosing to be our premium member.Our representative will get in touch with you to help with the further details</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 
    </main>
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>



 
   


    <!-- endinject-->

    <?php $__env->stopSection(); ?>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script>

$(function(){
    $('#premium').click(function()
    {
       
        var status = 1;
        var id = 1;
        $.ajax({
            type:"POST",
            dataType : "json",
            url:'get_premium',
            data: {'status':status, 'id': id,_token:'<?php echo e(csrf_token()); ?>'},
            success: function(data)
            {
                
                $("#premium").hide();
                $("#req").html(" Your Request is under process,our team will contact you soon.");
                $("#req").css({"color":"green"});
               $("#premium_response" ).trigger( "click" );

            }
        });
    });
});
</script>
<?php echo $__env->make('institute.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/institute/index1.blade.php ENDPATH**/ ?>
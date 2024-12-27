<script>
/*---------------------------------------------
Template name :  Dashmin
Version       :  1.0
Author        :  ThemeLooks
Author url    :  http://themelooks.com


** Custom SmartWizard JS

----------------------------------------------*/
//$('#smartwizard2').smartWizard();
$(function () {

$('#smartwizard').smartWizard({
    theme: 'arrows',
    autoAdjustHeight: false,
    toolbar: {
        position: 'bottom', // none|top|bottom|both
        showNextButton: true, // show/hide a Next button
        showPreviousButton: true, // show/hide a Previous button

    },
    keyboardSettings: {
      keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
    },
    toolbarSettings: {
        toolbarExtraButtons: [
            $('<button></button>').text('Cancel')
                .addClass('btn btn-danger')
                .on('click', function () {
                    //$('#smartwizard').smartWizard("reset");
                    window.location = "/products";
                })
        ]
    },
});

// AJAX POST
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// STEP BY STEP
$("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
   
    //let stepNo = 0;
  

    if (stepNumber == 0 && stepDirection == 'forward') {
     

        const formData = new FormData($("#prod_step1_frm")[0]);
        

        if (!formData.get('main_category_id')) {
            $('.error_msg').addClass('alert alert-danger').text("Please select Main Category!");
            return false;
        }
        if (!formData.get('category_id')) {
            $('.error_msg').addClass('alert alert-danger').text("Please select Category!");
            return false;
        }
        if (!formData.get('sub_category_id')) {
            $('.error_msg').addClass('alert alert-danger').text("Please select Sub Category !");
            return false;
        }
    
        if (!formData.get('product_id') && !document.getElementById('upload').files.length) {
            $('.error_msg').addClass('alert alert-danger').text("Please upload a product image!");
            return false;
        }

        // Validation
        $.ajax({
            type: 'POST',
            url: "<?php echo e(route('products.details')); ?>",
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function (xhr) {
                // Show the loader
                $('#smartwizard').smartWizard("loader", "show");
                $('.error_msg').removeClass('alert alert-danger').html('');
            },
            success: function (res) {

                $('#productid').val(res.data);

               // $('#accessories').append(res.data_accessories);

                $('#smartwizard').smartWizard("loader", "hide");

                //  $("#smartwizard").smartWizard("next");
                $('#smartwizard').smartWizard("goToStep", 1);

            },
            error: function (data) {

                let err_str = '';
                $("#smartwizard").smartWizard("prev");
                $('#smartwizard').smartWizard("loader", "hide");
                if (data.responseJSON.errors) {
                    loading = false;
                    $('#loader').html('');
                    err_str = '<dl class="row"><dt class="col-sm-3"></dt><dt class="col-sm-9"><p><b>Whoops!</b> There were some problems with your input.</p></dt>';
                    $.each(data.responseJSON.errors, function (key, val) {
                        err_str += '<dt class="col-sm-3">' + key.replace("_", " ") + ' </dt><dd class="col-sm-9">' + val + '</dd>';
                    });
                    err_str += '</dl>';
                    $('.error_msg').addClass('alert alert-danger').html(err_str);

                    return false;

                }
            }
        });

    }
//     else if (stepNumber == 4 && stepDirection == 'forward') {


//         const formData = new FormData($("#prod_step3_frm")[0]);

            
//                 if (!$('#productid').val()) {
//                     $("#frmimg").addClass('alert alert-danger').text("Please create a product!");
//                     return false;
//                 }
//                 formData.append('product_id', $('#productid').val());

//             $.ajax({
//                 type: 'POST',
//                 url: "/saveApplicationStep3",
//                 data: formData,
//                 dataType: 'JSON',
//                 contentType: false,
//                 cache: false,
//                 processData: false,
//                 beforeSend: function (xhr) {
//                 // Show the loader
//                 $('#smartwizard').smartWizard("loader", "show");
//                 $('.error_msg').removeClass('alert alert-danger').html('');
//             },
//             success: function (res) {


//                 $('#smartwizard').smartWizard("loader", "hide");

//                 //  $("#smartwizard").smartWizard("next");

//                 $('#smartwizard').smartWizard("goToStep", 4);

//             },
//                 error: function(data) {
//                     let err_str = '';
//                     $('#smartwizard').smartWizard("loader", "hide");
//                     if (data.responseJSON.errors) {
//                         loading = false;
//                         $('#loader').html('');
//                         err_str =
//                             '<dl class="row"><dt class="col-sm-3"></dt><dt class="col-sm-9"><p><b>Whoops!</b> There were some problems with your input.</p></dt>';
//                         $.each(data.responseJSON.errors, function(key, val) {
//                             err_str += '<dt class="col-sm-3">' + key.replace("_",
//                                     " ") + ' </dt><dd class="col-sm-9">' + val +
//                                 '</dd>';
//                         });
//                         err_str += '</dl>';
//                         $('.error_msg').addClass('alert alert-danger').html(err_str);

//                         return false;
//                     }
//                 }
//             });


// }

});

});

</script>
<?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/admin/products/js/customSmartWizard.blade.php ENDPATH**/ ?>
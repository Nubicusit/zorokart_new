@extends('admin.layout.master')

@push('css')
<link href="{{ asset('assets/admin/plugins/jquery-smartwizard/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

<div class="content-wrapper">
    <section class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">

                    <div class="card card-primary mt-3">

                        <div class="card-header" style="display: flex;
                              justify-content: space-between;">
                            <h3 class="card-title">Add Product</h3><a href="" class="btn btn-primary"
                                style="float:right;color:#fff"><i class="fa fa-arrow-left"
                                    aria-hidden="true"></i>&nbsp;&nbsp;Back</a>
                        </div>
                          <form action="" method="POST"  enctype="multipart/form-data">
                        
                        </form>
                    </div>
                </div>
            </div>
            <div class="error_msg"></div>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
        <div class="col-xl-12 mb-30 mb-xl-0">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body p-30">
                    <!-- Add New Task -->

                    <div id="smartwizard">
                        <ul class="nav">
                            <li>
                                <a class="nav-link" href="#step-1">
                                   Details
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-2">
                                    Specifications
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-3">
                                    Gallery
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-4">
                                    <i class="icofont-check-alt"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="step-1" class="tab-pane" role="tabpanel">
                                <!-- Basic Details -->
                               @include('admin.products._edit._details')
                                <!-- End User Details -->
                            </div>
                            <div id="step-2" class="tab-pane" role="tabpanel">
                                <!-- Address-->
                                @include('admin.products._edit._specifications')   
                            
                                <!-- End Address -->
                            </div>
                            <div id="step-3" class="tab-pane" role="tabpanel">
                                <!-- Address-->
                                @include('admin.products._edit._gallery')  
                        
                                <!-- End Address -->
                            </div>
                         
                            <div id="step-4" class="tab-pane" role="tabpanel">
                                <div class="step-done">
                                    <span class="btn-circle done"><i class="icofont-check"></i></span>
                                    <h2 class="text_color font-30 mb-20">Done Successfully!</h2>
                                    <p>You have created product and its content</p>
                                </div>

</div>
                        </div>
                    </div>
                    <div class="error_msg"></div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                
          
                    <!-- End Add New Task -->
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>

        

            <style>
            .check-bx {
                width: 40px;
                height: 40px;
            }

            .removeFeature {
                width: 42px;
                height: 42px;
            }

            .featureSize input {
                margin-left: 1rem;
            }


            .price-form {
                margin-left: 6px !important;
                border-radius: 0.25rem !important;
                width: 85px !important;

            }

            .rem-fee {
                margin-left: 1rem;
                border-radius: 0.25rem !important;
            }

            center input.form-control,
            select.form-control {

                padding: 7px !important;
            }

            .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
                border-top-right-radius: 0.25rem !important;
                border-bottom-right-radius: 0.25rem !important;
            }

            .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
                border-top-right-radius: 0.25rem !important;
                border-bottom-right-radius: 0.25rem !important;
                border-top-left-radius: 0.25rem !important;
                border-bottom-left-radius: 0.25rem !important;
            }

            .fea-input {
                align-items: center !important;
            }
            .image-upload-area img{
                height:270px;
            }
            .custom-file{
                height:auto !important;
            }
            </style>
            @endsection

            @push('js')
            
            <script src="{{ asset('assets/admin/plugins/jquery-smartwizard/jquery.smartWizard.min.js') }}"></script>
            @include('admin.products.js.customSmartWizard')
            


        <script>
            function previewFile() {
                var preview = document.querySelector('#preview');
                var file = document.querySelector('input[type=file]').files[0];
                var reader = new FileReader();

                reader.addEventListener("load", function () {
                    preview.src = reader.result;
                }, false);

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
            $(function () {
                $('#preview').on('click', function () {
                    $('#profile-image-upload').click();
                });
            });
        </script>
        <script>
             $(document).ready(function() {
                $('#spec-add').on('click', function(e) { //on file input change
                    e.preventDefault();
         
                    const formData = new FormData($("#prod_step2_frm")[0]);
                    $('.error_msg').removeClass('alert alert-danger').html('');
                    $("#frmspec").removeClass('alert alert-danger');

                    if (!$('#productid').val()) {
                        $("#frmspec").addClass('alert alert-danger').text("Please create a product!");
                        return false;
                    }
                    if (!$('#product_detail_id').val()) {
                        $("#frmspec").addClass('alert alert-danger').text("Please select a specification !");
                        return false;
                    }
                    if (!$('#value').val()) {
                        $("#frmspec").addClass('alert alert-danger').text("Please enter a value for selected specification!");
                        return false;
                    }
                  

                    formData.append('product_id', $('#productid').val());

                    $.ajax({
                        type: 'POST',
                        url: "{{route('products.specifications')}}",
                        data: formData,
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function(xhr) {
                            // Show the loader
                            $('#smartwizard').smartWizard("loader", "show");
                            $('.error_msg').removeClass('alert alert-danger').html('');
                            $("#frmspec").removeClass('alert alert-danger');
                        },
                        success: function(res) {
                    
                            let atitle = res.product_detail_name,
                                value = res.data.value,
                                specid = res.data.id;

                            let nameRow = '<td>' + atitle + '</td>' +
                                '<td>' + value + '</td>';
                            nameRow += '<td class="text-end"><a href="javascript:void(0);" class="del-sprow" data-id="' + specid + '" title="Delete">' +
                                '<i class="fa fa-trash"></i></a></td> ';

                            let tblrow = '<tr id="sprw-' + specid + '">' + nameRow + '</tr>';
                            $('#tbl-spec tbody').append(tblrow);

                            $('#smartwizard').smartWizard("loader", "hide");

                            document.getElementById("prod_step2_frm").reset();
                            $('#image_type').val('').trigger('change');
                        },
                        error: function(data) {
                            $('.error_msg').show();
                            let err_str = '';
                            $('#smartwizard').smartWizard("loader", "hide");
                            if (data.responseJSON.errors) {
                                loading = false;
                                $('#loader').html('');
                                err_str = '<dl class="row">' +
                                    '<dt class="col-sm-3"></dt>' +
                                    '<dt class="col-sm-9">' +
                                    '<p><b>Whoops!</b> There were some problems with your input.</p>' +
                                    '</dt>';
                                $.each(data.responseJSON.errors, function(key, val) {
                                    err_str += '<dt class="col-sm-3">' + key.replace("_", " ") + ' </dt>' +
                                        '<dd class="col-sm-9">' + val + '</dd>';
                                });
                                err_str += '</dl>';
                                $('.error_msg').addClass('alert alert-danger').html(err_str);
                                return;
                            }
                        }
                    });
                });

                // delete row image
                jQuery(document).delegate('a.del-sprow', 'click', function(e) {
                    e.preventDefault();

                    let rid = jQuery(this).attr('data-id');
                    rid = parseInt(rid);
                    if (confirm("Are you sure you want to delete this specification?")) {
                    var token = $("meta[name='csrf-token']").attr("content");

                    $.ajax({
                        url:"{{ route('specification.delete', ':rid') }}".replace(':rid', rid),
                        type: 'DELETE',
                        data: {
                            "id": rid,
                            "_token": token,
                        },
                        success: function() {
                            jQuery('#sprw-' + rid).remove();
                        }
                    });
                }
                });
             });  
             
             
        </script>    


    @endpush
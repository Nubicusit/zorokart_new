<?php

// print_r($institution->student_description);
// exit();

?>
@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
    <section class="content">

        <div class="container-fluid  ">

            <div class="row">
                <div class="col-12 school-edit-form">

                   

                    
                         <section class="my-acc-home form-school">
               
                
                <div class="box-my-acc school-form-box">
                    <div class="container">
                        <form method="post" enctype="multipart/form-data">
                            @csrf





                            <div class="row card">
                                <div class="col-md-10 left-sec">
                                    <h4 class="edit-form-text">Courses Offered </h4>
                                    <div class="row">
                                        <div class="col-md-4 ">
                                            <div class="form-group">
                                                <label>Course</label>


                                                <select class="form-control" name="course_id" id="course_id" required>
                                                    <option value="">@lang('Select One')</option>
                                                    @foreach ($courses as $c)
                                                    <option value="{{$c->id }}">
                                                        {{ $c->name }}
                                                    </option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Academic streams </label>

                                                <select class="form-control" name="stream_id" id="sub_cat" required>
                                                    <option value="">@lang('Select course')</option>


                                                </select>

                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="btn-save-sec">
                                                <button type="submit" class="btn btn-sb"><i class="fa fa-plus" aria-hidden="true"></i></button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                    </div>


                    </form>
                </div>
                  </section>
       
      
        
         <section class="school-edit-form">

            <div class="container course-off-sec my-acc-home form-school">
                <div class=" card">
                <div class="row">
                    <div class="col-md-1">
                        <label></label>
                    </div>
                    <div class="col-md-3"> <label>Course Name</label></div>
                    <div class="col-md-3"> <label>Stream Name</label>
                    </div>
                    <!--<div class="col-md-3"> <label>Institution</label></div>-->
                    <div class="col-md-2"> <label>Remove</label></div>
                </div>
                <div class="row course-off-sec">
                    @forelse($course_offered as $co)

                    <div class="col-md-1">
                        <div class="number"> {{ $loop->iteration }}</div>
                    </div>
                    <div class="col-md-3">
                         @foreach($courses->where('id',$co->course_id)->values() as $a)
                         <div class="form-control">  {{$a->name}}</div>
                        @endforeach
                    </div>
                    <div class="col-md-3"> <div class="form-control">
                    @foreach($stream->where('course_id',$co->course_id)->values() as $a)    
                    {{($a->stream)}}
                    @endforeach
                </div></div>
                    <div class="col-md-3"> <div class="form-control"> {{($co->ins_id)}}</div></div>
                    <div class="col-md-2"> <div class="btn-save-sec btn-sec-del">
                                                <button type="submit" class="btn btn-sb"><i class="fa fa-times" aria-hidden="true"></i></button>

                                            </div></div>
                    @empty
                    @endforelse
                </div>
        

                </div>
            </div>

   
    </section>
                        
                        
                       </div>
                      </div>
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
            @push('js')

            @endpush
            @endsection

            @push('js')
           <!--============= scripts starts ===============-->
     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{url('public/vendors/jquery.min.js')}}"></script>
    <script src="{{url('public/vendors/popper/popper.js')}}"></script>
    <script src="{{url('public/vendors/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{url('public/vendors/hc-sticky/hc-sticky.js')}}"></script>
    <script src="{{url('public/vendors/isotope/isotope.pkgd.js')}}"></script>
    <script src="{{url('public/vendors/magnific-popup/jquery.magnific-popup.js')}}"></script>
    <script src="{{url('public/vendors/slick/slick.js')}}"></script>
    <script src="{{url('public/vendors/waypoints/jquery.waypoints.js')}}"></script>

    <script src="{{url('public/js/app.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        function previewFile() {
            var preview = document.querySelector('img');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();

            reader.addEventListener("load", function() {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
        $(function() {
            $('#profile-image1').on('click', function() {
                $('#profile-image-upload').click();
            });
        });
    </script>
    <script>
        (function() {
            //add rows when add button is clicked
            $(document).on('click', '.js-add--exam-row', function(e) {
                var clone, examsList;
                e.preventDefault();
                examsList = $('#form-exams-list');
                clone = examsList.children('.form-group:first').clone(true);
                clone.append($('<button>').addClass('btn btn-danger js-remove--exam-row').html(
                    '<i class="fa fa-times" aria-hidden="true"></i>'));
                //reset values in cloned inputs and
                //add enumerated ID's to input fields
                clone.find('input').val('').attr('id', function() {
                    return $(this).attr('id') + '_' + (examsList.children('.form-group').length +
                        1);
                });
                return examsList.append(clone);
            });

            //remove rows when remove button is clicked
            $(document).on('click', '.js-remove--exam-row', function(e) {
                e.preventDefault();
                return $(this).parent().remove();
            });

        }).call(this);
    </script>


    <!-------- script for serach  ----------->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            //material contact form
            $('.contact-form').find('.form-control').each(function() {
                var targetItem = $(this).parent();
                if ($(this).val()) {
                    $(targetItem).find('label').css({
                        'top': '10px',
                        'fontSize': '14px'
                    });
                }
            })
            $('.contact-form').find('.form-control').focus(function() {
                $(this).parent('.input-block').addClass('focus');
                $(this).parent().find('label').animate({
                    'top': '10px',
                    'fontSize': '14px'
                }, 300);
            })
            $('.contact-form').find('.form-control').blur(function() {
                if ($(this).val().length == 0) {
                    $(this).parent('.input-block').removeClass('focus');
                    $(this).parent().find('label').animate({
                        'top': '25px',
                        'fontSize': '18px'
                    }, 300);
                }
            })

        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('form').on('click', '.remove_field', function() {
            $(this).parent().parent().remove();
        });
        $('.addmore_img').click(function() {
            $('.portfolioimgdiv:last').after(
                '<div class="form-group portfolioimgdivnext width100"><div class="upload-demo col-lg-12"><img alt="your image" class="portimg" src="#"></div><div class="socialmediaside2"><div class="form-group hirehide is-empty is-fileinput width100 martop10"><input class="fileUpload" accept="image/jpeg, image/jpg" name="gallery[]" type="file" value="Choose a file"><div class="input-group"></div></div></div><div class="removebtnimg"><button type="button" class="btn  btn-sm remove_field"><span class="glyphicon glyphicon-trash">Remove</span></button></div></div>'
            );
        });


        function readURL() {
            var $input = $(this);
            var $newinput = $(this).parent().parent().parent().find('.portimg ');
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    reset($newinput.next('.delbtnmrg26'), true);
                    $newinput.attr('src', e.target.result).show();
                    $newinput.after(
                        ' '
                    );
                }
                reader.readAsDataURL(this.files[0]);
            }
        }

        $("form").on('change', '.fileUpload', readURL);
        $("form").on('click', '.delbtnmrg26', function(e) {
            reset($(this));
        });

        function reset(elm, prserveFileName) {
            if (elm && elm.length > 0) {
                var $input = elm;
                $input.prev('.portimg').attr('src', '').hide();
                if (!prserveFileName) {
                    $($input).parent().parent().find('input.fileUpload').val("");
                    $($input).parent().parent().find('.input-group').find('input#uploadre').val("");
                }
                elm.remove();
            }
        }
    </script>
    <script>
        $('form').on('click', '.remove_field-1', function() {
            $(this).parent().parent().remove();
        });
        $('.addmore_img-1').click(function() {



            $('.portfolioimgdiv-1:last').after(
                '<div class="form-group portfolioimgdiv-1next width100"><div class="upload-demo col-lg-12"><video alt="your image" class="portimg-1" src="#"></video></div><div class="socialmediaside2"><div class="form-group hirehide is-empty is-fileinput width100 martop10"><input class="fileUpload" accept="video/mp4" name="profilepic[]" type="file" value="Choose a file"><div class="input-group"></div></div></div><div class="removebtnimg"><button type="button" class="btn  btn-sm remove_field-1"><span class="glyphicon glyphicon-trash">Remove</span></button></div></div>'
            );
        });


        function readURL() {
            var $input = $(this);
            var $newinput = $(this).parent().parent().parent().find('.portimg-1 ');
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    reset($newinput.next('.delbtnmrg26'), true);
                    $newinput.attr('src', e.target.result).show();
                    $newinput.after(
                        ''
                    );
                }
                reader.readAsDataURL(this.files[0]);
            }
        }

        $("form").on('change', '.fileUpload', readURL);
        $("form").on('click', '.delbtnmrg26', function(e) {
            reset($(this));
        });

        function reset(elm, prserveFileName) {
            if (elm && elm.length > 0) {
                var $input = elm;
                $input.prev('.portimg-1').attr('src', '').hide();
                if (!prserveFileName) {
                    $($input).parent().parent().find('input.fileUpload').val("");
                    $($input).parent().parent().find('.input-group').find('input#uploadre').val("");
                }
                elm.remove();
            }
        }
    </script>




    <script>
        $(function() {
            $('#course_id').change(function() {

                var id = $(this).val();


                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: 'get_subcat',
                    data: {
                        'id': id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(data) {


                        $("#sub_cat").html(data);
                    }
                });
            });
        });
    </script>
            @endpush
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
            @push('js')

            @endpush
         

            
         
<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SchoolsPe</title>
    @section('headerscript')
    <link rel="icon" type="image/x-icon" href="{{url('public/images/favicon.png')}}">
    <script src="../cdn-cgi/apps/head/2oc_RD5SS6wgN5SiQnSEnWVNHg8.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('public/vendors/font-awesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{url('public/vendors/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('public/vendors/slick/slick.css')}}">
    <link rel="stylesheet" href="{{url('public/vendors/animate.css')}}">

    <link rel="stylesheet" href="{{url('public/css/style.css')}}">
    <link rel="stylesheet" href="{{url('public/css/resposive.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    @show
</head>

<body>


    <div id="site-wrapper" class="site-wrapper starter demo-header">

        <!--------------- header section start -------------------->



        <!--------------- animation start -------------------->
        <div class="content animation-section school-edit-form">

            @if(Session::has('status'))
            <script>
                swal("", "{!!Session::get('status') !!}", "success")
                    .then(function() {
                        window.location.href = "{{route('institute')}}";
                    })
            </script>
            @endif

            <section class="my-acc-home form-school">
                <div class="container">
                    <h3 class="mt-8">Submit your Listing</h3>
                    <p><a href="{{url('institute')}}">Home </a>/ Submit Your Listing </p>
                </div>
             
                <div class="box-my-acc school-form-box">
                    <div class="container">
                        <form action="{{route('college_offered')}}" method="get" enctype="multipart/form-data">
                            @csrf



                        <input type="hidden" value="{{$_GET['id']}}" name="ins_id">

                            <div class="row card">
                                <div class=" left-sec">
                                    <h4 class="edit-form-text">Courses Offered </h4>
                                    <div class="row">
                                       
                                             <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Course</label><span style="color:red">&nbsp;*</span>
                                                


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
                                        
                                
                                  @if($_GET['cat']=="pu")

                                  @else
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Academic streams </label>

                                                <select class="form-control" name="stream_id" id="sub_cat"    >
                                                    <option value="">@lang('Select course')</option>


                                                </select>

                                            </div>

                                        </div>
                                        
                                        
                                       
                                        
                                @endif
        
                                      <div class="col-md-3 ">
                                         <div class="form-group">
                                                    <label>Course Fee</label><span style="color:red">&nbsp;*</span>
                                             <input  class="form-control" type="text" name="course_fee"  style="height: auto;" required>
                                             </div>
                                               </div>
                                               
                                                 <div class="col-md-3 ">
                                         <div class="form-group">
                                                    <label>Course Duration</label><span style="color:red">&nbsp;*</span>
                                             <input  class="form-control" type="text" name="course_duration" style="height: auto;" required>
                                             </div>
                                               </div>
                                        <div class="col-md-2">
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
        </div>
        </section>
        <section class="school-edit-form">

            <div class="container course-off-sec my-acc-home form-school">
                <div class=" card">
                    
                    <table>
                        <tr>
                             <th></th>
                            <th><label>Course Name</label></th>
                           
                               @if($_GET['cat']=="pu")

                               @else
                             <th><label>Stream Name</label></th>
                               @endif
                                 <th><label>Course Fee</label></th>
                              <th><label>Course Duration</label></th>
                        </tr>
                        
                           @forelse($course_offered as $co)
                        <tr>
                            <td><div class="number" style="width:30px"> {{ $loop->iteration }}</div></td>
                              @foreach($courses->where('id',$co->course_id)->values() as $a)
                            <td> <div class="form-contrl">  {{$a->name}}</div> </td>
                               
                      
                            @if($_GET['cat']=="pu")

                             @else 
                            <td><div class="form-contrl">
                            @foreach($stream->where('id',$co->stream_id)->values() as $ad)    
                            {{($ad->stream)}}
                 
                             @endforeach
                                </div> 
                                </td>
                                 @endif
                                 <td> <div class="form-contrl">{{$co->course_fee}}</div> </td>
                                 <td> <div class="form-contrl">{{$co->course_duration}}</div> </td>
                            
                             @endforeach
                             
                             <td>  <div class="btn-save-sec btn-sec-del">
                        <!--<button type="submit" class="btn btn-sb"><i class="fa fa-times" aria-hidden="true"></i></button>-->
                    
                    
                     <a href="{{ url('courseoffered_destroy',$co->id) }}" title="Delete the item" style="margin-bottom: 0.7rem;
                       margin-left: 2rem;"
                                                   >
                                                 <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                                </div></td>
               
                      </tr>
                       @empty
                    @endforelse
                    </table>
                    
                    
        
              
                   
                   
               
                 
                 
            
                
                
         <a href="{{url('profile1')}}"> <button class="btn btn-primary">Submit & Go to Dashboard</button></a>

                </div>
            </div>

           
    </section>
    <style>
        .socialmediaside2 .form-group {
            width: 185px;
        }

        .school-form-box form img.portimg,
        .school-form-box form video.portimg-1 {
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
            ;
            border: none;
            border-radius: 5px;
            color: black;
            font-weight: 600;
            text-transform: uppercase;
            box-shadow: 0px 3px 3px -2px rgba(0, 0, 0, 0.2), 0px 3px 4px 0px rgba(0, 0, 0, 0.14), 0px 1px 8px 0px rgba(0, 0, 0, 0.12);
            transition: 100ms ease-out;
            cursor: pointer;


        }

        .table th,
        .table td {
            border-bottom: 0px solid #dee2e6;
            border-top: 0px solid #dee2e6;
        }

        .table thead th {

            border-bottom: 0px solid #dee2e6;
        }

        .upload-demo {
            padding-left: 0%;
            display: flex;
            align-items: flex-start;
        }

        .socialmediaside2 input::-webkit-file-upload-button:hover {


            background-color: #D9F1F6;
            ;
            box-shadow: 0px 3px 5px -1px rgba(0, 0, 0, 0.2), 0px 5px 8px 0px rgba(0, 0, 0, 0.14), 0px 1px 14px 0px rgba(0, 0, 0, 0.12)
        }

        .addmore_img,
        .addmore_img-1 {
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

        .removebtnimg button.remove_field,
        .removebtnimg button.remove_field-1 {
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
            padding: 6px 26px;
            width: 135px;
            height: 38px;
            line-height: 1;
        }

        .btn-save-sec {
            display: flex;
            justify-content: start;
            margin-top: 3rem;
        }

        .school-edit-form .school-form-box form input,
        .school-edit-form .school-form-box form select {
            font-size: 18px;
            height: 100%;

        }

        .school-edit-form label {
            font-size: 16px;
        }

        .school-edit-form .school-form-box .btn-save-sec .btn {

            border-radius: 100%;
            padding-left: 0%;
            padding-right: 1rem;
            font-size: 24px;
            line-height: 1;
            width: 53px;
            height: 53px;
        }

        .course-off-sec label {
            font-size: 17px;
            color: #000;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .course-off-sec .form-contrl{
            border: 0.7px solid #FF4005 !important;

    border-radius: 10px;
    color: #000 !important;
    font-weight: 600;
    font-size: 17px;
    padding:0.5rem ;
        }
        .course-off-sec  .number{
            color: #000 !important;
            font-weight: 600;
    font-size: 20px;  
        }
        .btn-sec-del {
            margin-top: 0% !important;
            justify-content: center  !important; 
        }
        .btn-sec-del .btn{
           background: none !important;
        color: red;}
    .btn-sec-del  .btn-sb i {
    margin-left: 0.8rem;
}
.school-edit-form .card{
    border-radius: 10px;
    border: none;
    box-shadow: 0 0 5px rgb(181 181 181);
 
    padding: 1.5rem;

}
table{
        width: max-content;
        border-collapse:separate;
        border-spacing:12px 18px;
}

    </style>

    <!-- The Modal for advance search ends-->

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




</body>



</html>
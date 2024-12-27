<?php// print_r($institution);  die;?>
@extends('institute.layouts.master')
@section('content')

<style>
    .avatar-upload {
  position: relative;


}
.avatar-upload .avatar-edit {
    position: absolute;
    right: 0%;
    z-index: 1;
    top: -171%;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
  line-height: 0.6;
    padding: 8px 4px 6px 10px;

}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "";
  font-family: 'FontAwesome' !important;
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;

}
.avatar-upload .avatar-preview {

  width: 120px;
  height: 120px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if(Session::has('status'))
<script>
swal("", "{!!Session::get('status') !!}", "success")
</script>
@endif

<div class="contents">

    <div class="container-fluid">
        <div class="social-dash-wrap">
            <div class="col-xxl-8 mb-25 p-5">
          
                   
                    <div class="card border-0 profile-admin">
                         <h2 style="text-align:center;margin-top:2rem">Contact Us</h2>
                        <div class="profile-detail-form"  style="padding-top:1rem;" >
                            <main class="help-main" style="padding-top:0px;    align-items: center;">
                    <div class="item col-md-10">
                           
                            <div class="form-profile">


                                    <div class="col-md-12 centered" data-animate="fadeInRight">
                     <form action="{{'contactus_store'}}" method="post" enctype="multipart/form-data">
                        @csrf
<input type="hidden" name="role" value="1">
<input type="hidden" name="institute" value="0"
                    

                        </div>
                        <div class="form-group name-group">
                            <div class="palceholder">
                                <label for="name">Your Name</label>
                                <span class="star">*</span>
                            </div>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group email-group">
                            <div class="palceholder">
                                <label>Your Contact Number</label>
                                <span class="star">*</span>
                            </div>
                            <input type="number" name="contact" class="form-control" id="mob_no_1" required>
                        </div>
                        <div class="form-group email-group">
                            <div class="palceholder">
                                <label>Your Email</label>
                                <span class="star">*</span>
                            </div>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
 <label >Message </label>
                            <textarea class="form-control" rows="3" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sb sign-up-btn-1">Submit</button>
                    </form>
                </div>

                            </div>

                            </div>
                            
                            </main>
                    </div>

                    </div>
  </div>
                </div>

            </div>
        </div>
    </div>

</div>

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
<style>
    input[switch] {
        display: none;
    }

    input[switch]+label {
        margin-top: 2rem;
        font-size: 1.2rem;
        line-height: 2;
        width: 200px;
        height: 2.5rem;
        background-color: #ddd;
        background-image: none;
        border-radius: 2rem;
        padding: 0.16666667rem 2rem;
        cursor: pointer;
        display: inline-block;
        text-align: center;
        position: relative;
        box-shadow: 1px 1px 10px rgb(0 0 0 / 20%) inset;
        font-family: inherit;
        -webkit-transition: all 0.1s ease-in-out;
        transition: all 0.1s ease-in-out;

    }

   .adms span {
        /* Label */

    color: #b7b7b7;
    content: attr(data-off-label);
    display: block;
    font-family: inherit;
    font-family: FontAwesome, inherit;
    font-weight: 500;
    font-size: 0.6rem;
    line-height: 1.9rem;
    position: absolute;
    /* right: 28.216667rem; */
    /* margin: 0.21666667rem; */
    top: 1.5px;
    text-align: center;
    min-width: 1.66666667rem;
    overflow: hidden;
    -webkit-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;
    }

      .adms span  {
     
        content: '';
        position: absolute;
        left: 0.16666667rem;
        background-color: #f7f7f7;
        box-shadow: none;
        border-radius: 2rem;
        height: 2.22rem;
        width: 2.22rem;
        -webkit-transition: all 0.1s ease-in-out;
        transition: all 0.1s ease-in-out;
    }

    input[switch]:checked+label {
        background-color: lightblue;
        background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(255, 255, 255, 0.15)), to(rgba(0, 0, 0, 0.2)));
        background-image: linear-gradient(rgba(255, 255, 255, 0.15), rgba(0, 0, 0, 0.2));
        box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.3) inset;
    }

    input[switch]:checked+label:before {
        color: #fff;
        content: attr(data-on-label);
        right: auto;
        left: 0.21666667rem;
    }

    input[switch]:checked+label:after {
        left: 10.1rem;
        background-color: #f7f7f7;
        box-shadow: 1px 1px 10px 0 rgba(0, 0, 0, 0.3);
    }

    input[switch="bool"]+label {
        background-color: #FF0000;
    }

    input[switch="bool"]+label:before {
        color: #fff !important;
        font-size: 1.25rem;
    }

    input[switch="bool"]:checked+label {
        background-color: #258E00;
    }

    input[switch="bool"]:checked+label:before {
        color: #fff !important;
    }

    input[switch="default"]:checked+label {
        background-color: #a2a2a2;
    }

    input[switch="default"]:checked+label:before {
        color: #fff !important;
    }

    input[switch="success"]:checked+label {
        background-color: #BCE954;
    }

    input[switch="success"]:checked+label:before {
        color: #fff !important;
    }

    input[switch="warning"]:checked+label {
        background-color: gold;
    }

    input[switch="warning"]:checked+label:before {
        color: #fff !important;
    }

    .nav-links {
        display: none;
        margin-top: 2rem ;
        margin-bottom: 2rem;
        text-align: center;
        color: #258E00;
        font-weight: 500;
        font-size: 17px;
    }
    .adms{
         margin-top: 2rem;
    font-size: 1.2rem;
    line-height: 1.6;
  
    height: 2.5rem;
    background-color: #ddd;
    background-image: none;
    border-radius: 2rem;
    padding: 0.16666667rem 2rem;
    cursor: pointer;
    display: inline-block;
    text-align: center;
    position: relative;
    box-shadow: 1px 1px 10px rgb(0 0 0 / 20%) inset;
    font-family: inherit;
    -webkit-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;  
     color:#fff;
    }
    .adms:hover{
      color:#fff;  
    }
    .admissin-cls{
  
    background-color: #FF0000;
        padding: 0.16666667rem 1em 0.16rem 2.5rem;
   
    }
    .admissin-opn span{
               right: -0.3rem !important;
    left: auto;

    }
    .admissin-opn{
        background-color: #258E00;
          padding: 0.16666667rem 2.5em 0.16rem 1rem;
    }
   .nav-btn{ 
   margin-top: 4rem;
   font-size: 15px;
  }
    .show {
        display: block;
    }

    .hide {
        display: none;
    }
    .form-profile{
        margin-top: 1rem;

    }
    .swal-icon--success
    {
        display:none;
    }
    .swal-text
    {
        font-weight:600;
        margin-top:1.5rem;
    }
    .swal-button--confirm, .swal-button:not([disabled]):hover
    {
     color: #fff;
    background-color: #FF4005;
    border-color: #FF4005;   
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script>
    const links = document.querySelector(".nav-links")
    const navBtn = document.querySelector('.nav-btn')

    navBtn.addEventListener('click', handleClick, false);

    function handleClick() {
        links.classList.toggle('show');
        navBtn.classList.toggle('hide');

    }
  </script>
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
            data: {'status':status, 'id': id,_token:'{{csrf_token()}}'},
            success: function(data)
            {
                $("#action_msg").hide();
                $("#premium").hide();
               $("#premium_response" ).trigger( "click" );
            }
        });
    });
});
$(function(){
    $('#switch4').click(function()
    {
      //  alert("hi")
       
         var status = this.attr("data-on-label").val();
         alert(status)
        // var id = 1;
        // $.ajax({
        //     type:"POST",
        //     dataType : "json",
        //     url:'get_admission',
        //     data: {'status':status, 'id': id,_token:'{{csrf_token()}}'},
        //     success: function(data)
        //     {
                
        //         //$("#premium").hide();
        //        $("#switch3" ).trigger( "click" );
        //     }
        // });
    });
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$('#my-modal').on('hide', function() {
window.location.reload();
alert('data');
});
</script>
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>



<script>

    $(function(){
        $('.toggle-class').change(function()
        {
            var addmission = $(this).prop('checked') == true ? 1:0;
            var id = $(this).data('id');
           // alert(id)
            if(id==0)
            {
                id=1;
            }
            else{
                id=0
            }
            $.ajax({
                type:"GET",
                dataType : "json",
                url:'get_admission',
                data: {'admission':id, 'id': id},
                success: function(data)
                {
                    console.log(data.success)
                }
            });
        });
    });
   

    $(function(){
        $('.tab').click(function()
        {
            var id=($(this).attr("data-val"));
          $("#tabid").val(id);
        //  alert(id)
        });
    });
   
    </script>
   
@endsection
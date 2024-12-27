<?php //print_r(auth()->user()->image);  exit();?>
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
<div class="contents">

    <div class="container-fluid">
        <div class="social-dash-wrap">
            <div class="col-xxl-8 mb-25 p-5">
            <form action="{{route('ins_profile_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card border-0 profile-admin">
                    <div class="profile-home"><img src="{{url('public/img/images/Mask group.png')}}"></div>
                    <div class="profile-img">
                    <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"><img src="{{url('public/img/images/edit.png')}}" style="width:16px"></label>
        </div>
        <div class="avatar-preview profile-image">
            @if(auth()->user()->image)
            <div  id="imagePreview" style="background-image: url('{{ url('public/images').'/'.auth()->user()->image }}');">
            @else
            <div  id="imagePreview" style="background-image: url('http://i.pravatar.cc/500?img=7');">
          @endif
            </div>
        </div>
    </div>
                        <!-- <img src="{{url('public/img/images/Group 19.png')}}" class="profile-image"> -->
                        <div class="social-media">
                            <p>Share</p>
                            <a href="#"><img src="{{url('public/img/images/Facebook.png')}}"></a>
                            <a href="#"><img src="{{url('public/img/images/Instagram.png')}}"></a>
                            <a href="#"><img src="{{url('public/img/images/Linkedin.png')}}"></a>
                            <a href="#"><img src="{{url('public/img/images/Twitter.png')}}"></a>
                        </div>
                    </div>

                    <div class="profile-detail-form">

                    
                            <div class="head-profile">
                                <h3>My Profile <a type="button" class="btn btn-default btn-edit js-edit"><img src="{{url('public/img/images/edit.png')}}"></a></h3>
                                
                                <!--<a href="{{url('edit_details_of_school')}}" class="btn btn-primary"><img src="{{url('public/img/images/edit-btn.png')}}">&nbsp; Edit Institute-->
                                <!--    Details</a>-->
                                    
                            </div>
                          
                            <div class="form-group">
                                <a style="display:none;" data-toggle="modal" href="#my-modal" id="premium_response"></a>
                               @if(1)

                                 
                                  <div style="text-align:center; color:#379928;margin-top:1.5rem" id="action_msg">
                                  Congrats!!! Your Account  is successfully added.
                                </br>
                                Select premium membership to avail our value added services</div>
                                
                                <a class="nav-btn btn btn-primary opt" 
                                 data-link="{{url('get_premium')}}" id="premium" style="color: white;"  > 
                                 Click here for Premium Membership</a>
                                
                                @elseif(2)
                                <div style="text-align:center; color:#379928;margin-top:1rem">
                                Your Account is not approved, Please contact  Team
                                  
                        </div>
                                             @elseif(2)
                                     <div style="text-align:center; color:#379928;margin-top:1.5rem">
                                    Thank you for choosing to be our premium member.
                                
                                Our representative will get in touch with you to help with the further details
                                </div>
                                
                                @elseif(2)

                                <div style="text-align:center; color:#379928;margin-top:1rem">
                        
                                 Congrats!!! Your Account page is successfully added.
                                </br>
                                Select premium membership to avail our value added services
                                
                                <a class="nav-btn btn btn-primary opt" 
                                 data-link="{{url('get_premium')}}" id="premium" style="color: white;"  > 
                                 Click here for Membership</a> 
                                 

                                 </div>
                                 
                                
                                 
                               


             @elseif(4)
                                <div style="text-align:left; color:#379928;margin-top:1.5rem;line-height:2;height: auto;font-size:16px;" class="form-control col-md-8">
                              

Details submitted successfully .

You can view the institute page post the review by Team Zorokart .


</div>



@elseif(7)
                                <div style="text-align:center; color:#379928;margin-top:1rem">
                                  Congrats!!! You are now our premium member .
                                  
                                  



</div>@endif


                            </div>
                            
                   </form>  
                   
                   
                   
                   
<!--                   @if(7)-->
<!--  <div style="text-align:center; color:#379928;margin-top:1rem">-->
<!--                                Membership is expired, please update-->
<!--<a class="nav-btn btn btn-primary opt" -->
<!--                                 data-link="{{url('get_premium')}}" id="premium" style="color: white;"  > -->
<!--                                 Click here for Premium Membership</a>-->
                               
<!--@else-->
<!--@endif-->
                            
    <!-- Modal -->
<div class="modal fade" id="exampleModal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Admission Dates</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form method="post" action="{{ url('admission_date_update') }}">
                                                  @csrf
                                                 
	<input  type="hidden" value="2" name="id" required>
     
		<label>Start Date </label>
		<input  class="form-control" type="date" value="3" name="start_date" required>
	
	</br>
		<label>End Date</label>
		<input class="form-control" type="date" value="" name="end_date" required>
		<br>
	
	  	<input class="form-control" type="hidden" value="" name="admission" required>
      </div>
      <div class="modal-footer">
	  <button type="submit" class="btn btn-primary">Save changes</button>
      
        </form>
      </div>
    </div>
  </div>
</div>
                           
                            
                          
                            
                            <div class="form-profile">


                                <div class="row form-row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input type="text" class="form-control is-disabled" placeholder="Name" name="name"  value="{{auth()->user()->user_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label> User Email ID</label>
                                            <input type="email" class="form-control is-disabled" placeholder="Email"  name="email" value="{{auth()->user()->email}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control is-disabled" placeholder="phone"  name="phone"value="{{auth()->user()->user_phone}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    
                                    

                                </div>

                                <button class="btn  btn-primary btn-save" >Save Changes</button>



                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

</main>

  <!-- Modal -->
  <div class="modal fade" id="my-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
    
        <div class="modal-body "
         style="text-align:center; color:#45dc2d">

        <!--<i class="fa fa-check-circle" aria-hidden="true" style="font-size: 30px;"></i><br><br>-->
            <!--<p style="font-size: 17px;">Congrats!!! You are now our premium member .</p>-->
            <p style="font-size: 17px;color:#000!important">
            Thank you for choosing to be our premium member.

Our representative will get in touch with you to help with the further details</p>
        <!--Thank you for choosing to be our -->
        <!--                            premium member, our representative -->
        <!--                            will get in touch with you to explain -->
        <!--                            the further process. Service charges a-->
        <!--                            pplicable for premium membership.</p>-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->  
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
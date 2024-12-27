

    <link rel="icon" type="image/x-icon" href="{{url('public/images/favicon.png')}}">
        {{-- <script src="../cdn-cgi/apps/head/2oc_RD5SS6wgN5SiQnSEnWVNHg8.js"></script> Was not working hence removed--}}
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url('public/vendors/font-awesome/css/fontawesome.css')}}">
        <link rel="stylesheet" href="{{url('public/vendors/magnific-popup/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{url('public/vendors/slick/slick.css')}}">
        <link rel="stylesheet" href="{{url('public/vendors/animate.css')}}">

        <link rel="stylesheet" href="{{url('public/css/style.css')}}">
        <link rel="stylesheet" href="{{url('public/css/resposive.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
        <link rel="stylesheet" type="text/css"
              href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
        <link rel="stylesheet" type="text/css"
              href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <script type="text/javascript"
                src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
                integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<style>
    body{
        background:#FDE8DF;
        display:flex;
        justify-content:center;
       
    }
</style>
            
    <section class="institute-selec">
        <div class="container p-10 ">
             <a href="{{url('/')}}"  style="text-decoration:none"> <h6 style="text-align:center;margin-bottom:2rem;color:#FF4005;font-size:25px;"><i class="fa fa-home" aria-hidden="true"></i> HOME</h6></a>
            <!--<h3 style="text-align:center;margin-bottom:2rem;color: #FF4C00;">Register Your Institution</h3>-->
            <div class="card p-10 pt-5" style="padding-top:3rem !important">
          <h6 style="text-align:center;margin-bottom:2rem;color:#FF4005;font-size:25px;">Application confirmed</h6>
           <p style="margin-top: 0; margin-bottom: 1rem; color: #000;font-weight: 500;text-align: justify;"> Congratulations ! 



Your application for <span style="color:green"><b>{{$class}}</b></span>  in <span style="color:green"><b>{{$institution->name}}</b></span> institution has been successfully processed. 



Further visit the institution within 7 working days to complete the documentation and pay the admission fee to confirm your seat. 



Application valid only till the availability of seats.<br><br> Hurry up!!!! Seats are filling fast……



Please download the completed application from your registered email.<br><br></p>

<a href="{{url('admission_pdf_data/'.$app_id)}}" target="_blank" class="btn btn-primary" style="width:150px;margin:auto">Download <i class="fa fa-download" aria-hidden="true"></i></a>
                </div>
        </div>
    </section>        

        


    <style>
    .card{
        border:none;
        border-radius:10px;
        box-shadow: 4px 4px 9px rgb(0 0 0 / 20%);
    }
    .list-inline{
        margin: auto;}
        
      .institute-selec{
                background: #FDE8DF;
        }
    </style> 
            

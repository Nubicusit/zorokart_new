@extends('institute.layouts.master')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<style>
  .owl-carousel .owl-nav.disabled {
    /*display: block !important;*/
  }
</style>
<div class="contents">
  <div class="details-top-sec">
    <div>
      <h3>Admissions</h3>
      <p>Details of admission</p>
    </div>
    <div>
      <a href="{{url('admission/'.$data->ins_id)}}?mode=1" class="btn btn-primary"><i class="fas fa-chevron-left"></i></a>
    </div>
  </div>
  <div class="container-fluid detail-dash">

    <div class="social-dash-wrap">
      <div class="col-xxl-8 mb-25 p-5">

        <div class="card border-0 profile-admin">
          <div class="head-profile">
            <p>Details of admission</p>
            <a href="{{url('admission_pdf/'.$data->id)}}" class="btn btn-primary"><i class="fas fa-share-square"></i>&nbsp;Export</a>
          </div>


          <div class="profile-detail-form">
            <main>

              <div>
              <!--<form action="{{route('application_store')}}" method="post" enctype="multipart/form-data">-->
              <!--              @csrf-->
                           
                               <h4>Student Details</h4>

                            <div class="row">
                                <div class=" profile-form">
                                    <img src="{{url('public/images/apptemp/'.$data->photo)}}" style="width: 250px; margin-top: 1rem; height: 100%;">
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name of the Student
                                        </label>
                                           <input type="text" class="form-control" placeholder="" name="name" value="{{ $data->name }}" readonly>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Email ID</label>
                                       <input type="email" class="form-control" placeholder="" name="email" value="{{ $data->email }}" readonly>

                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth
                                        </label>
                                        <input type="date" class="form-control" placeholder="" name="dob"  value="{{ $data->dob }}" readonly>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label><br>
                                        @if($data->gender=="option1")
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio1" value="option1" checked>
                                            <img src="{{url('public/images/male.png')}}">
                                        </div>
                                        @else
                                         <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" 
                                                id="inlineRadio2" value="option2" name="gender" checked >
                                            <img src="{{url('public/images/female.png')}}">
                                        </div>
                                        @endif

                                    </div>

                                </div>

                            </div>
                            <div class="row  third-row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>In Which Class</label>
                                      <input type="text" class="form-control" placeholder="" name="s_class"  value="{{ $data->s_class }}" readonly>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Religion</label>
                                  <input type="text" class="form-control" placeholder="" name="religion" value="{{ $data->religion }}" readonly>

                                </div>

                            </div>
                             <div class="row  third-row"> 
                             <div class="col-md-6">
                                    <label>Caste</label>
                                   <input type="text" class="form-control" placeholder="" name="cast"  value="{{ $data->cast }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                            <input type="text" class="form-control" placeholder="" name="category"  value="{{ $data->category }}" readonly>

                                    </div>
                                </div></div>
                                    <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Student (Adhar card) No.
                                        </label>
                                         <input type="text" class="form-control" placeholder="" name="adhaar" value="{{ $data->adhaar}}" readonly>

                                    </div>
                                </div>
                               
                                
                            </div>
<hr>
 <h4 >Parent Details</h4><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Father’s Name
                                        </label>
                                         <input type="text" class="form-control" placeholder="" name="f_name" value="{{ $data->f_name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" placeholder="" name="f_phone" value="{{ $data->f_phone }}" readonly>

                                    </div>
                                </div>


                            </div>

                            <div class="row  third-row">
                                <div class="col-md-4">
                                    <label>Qualification</label>
                                      <input type="text" class="form-control" placeholder="" name="f_qualification"   value="{{ $data->f_qualification }}" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label>Occupation</label>
                                      <input type="text" class="form-control" placeholder="" name="f_occupation" value="{{ $data->f_occupation }}" readonly>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Annual Income</label>
                                            <input type="text" class="form-control" placeholder="" name="f_income"  value="{{ $data->f_income }}" readonly>


                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mother’s Name
                                        </label>
                                          <input type="text" class="form-control" placeholder="" name="m_name" value="{{ $data->m_name }}" readonly>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                         <input type="text" class="form-control" placeholder="" name="m_phone" value="{{ $data->m_phone }}" readonly>

                                    </div>
                                </div>


                            </div>

                            <div class="row  third-row">
                                <div class="col-md-4">
                                    <label>Qualification</label>
                                      <input type="text" class="form-control" placeholder="" name="m_qualification" value="{{ $data->m_qualification }}" readonly>

                                </div>
                                <div class="col-md-4">
                                    <label>Occupation</label>

                                     <input type="text" class="form-control" placeholder="" name="m_occupation" value="{{ $data->m_occupation }}" readonly>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Annual Income</label>
                                       <input type="text" class="form-control" placeholder="" name="m_income" value="{{ $data->m_income }}" readonly>


                                    </div>
                                </div>
                            </div>
                        <hr>
                              <h4 > Address Details</h4><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Permanent Address
                                        </label>
                                           <textarea class="form-control" rows="2" id="per-1" name="address" value="{{ $data->address }}" readonly>{{ $data->address }}</textarea>

                                    </div>
                                </div>
                            </div>



                            <div class="row  third-row">
                                <div class="col-md-4">
                                    <label>District</label>
                                       <input type="text" class="form-control" placeholder="" name="district"  id="per-2" value="{{ $data->district }}" readonly>


                                </div>
                                <div class="col-md-4">
                                    <label>State</label>
                                     <input type="text" class="form-control" placeholder="" name="state" id="per-3" value="{{ $data->state }}" readonly>


                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>PIN Code</label>
                                       <input type="text" class="form-control" placeholder="" id="per-4" name="pincode" value="{{ $data->pincode }}" readonly>

                                    </div>
                                </div>
                            </div>

                            <div class="row  third-row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-check form-check-inline" style="display:flex; align-items:center">
                                        <input class="form-check-input" type="checkbox" id="address_same" checked>
                                        <label class="form-check-label"> Same as Permanent Address</label>
                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Correspondence Address
                                        </label>
                                             <textarea class="form-control" rows="2" id="cor-1" name="cor_address" value="{{ $data->cor_address }}" readonly>{{ $data->cor_address }}</textarea>

                                    </div>
                                </div>
                            </div>

                            <div class="row  third-row">
                                <div class="col-md-4">
                                    <label>District</label>
                                   <input type="text" class="form-control" placeholder=""  id="cor-2" name="cor_district" value="{{ $data->cor_district }}" readonly>

                                </div>
                                <div class="col-md-4">
                                    <label>State</label>
                                     <input type="text" class="form-control" placeholder="" id="cor-3" name="cor_state" value="{{ $data->cor_state }}" readonly>


                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>PIN Code</label>
                                      <input type="text" class="form-control" placeholder="" id="cor-4" name="cor_pincode" value="{{ $data->cor_pincode }}" readonly>


                                    </div>
                                </div>
                                
                                
                                 
                            </div>
                            
                            <h4>Billing Information</h4><br>
                               <form action="{{url('billing_info')}}" >
                                     
                       
                                    <input type="hidden" value="{{$data->id}}" name="id">
                             <div class="col-md-4">
                                    <label>Note</label>
                                   <textarea row="5" col="10" type="text" class="form-control" placeholder="" value="{{$data->note}}" id="cor-2" name="note" value="" >{{$data->note}}</textarea>

                                </div>
                                
                                 <div class="col-md-4">
                                    <label>Date of Payment</label>
                                   <input type="date" class="form-control" placeholder=""  id="cor-2"  value="{{$data->date_of_payment}}" name="date_of_payment" value="" >

                                </div>

                        <button class="btn btn-primary btn-sm" style="margin:auto" type="submit">Save</button>

  
                        </form>
              </div>
            </main>
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

    .btn-save-sec{
       display: flex;
    justify-content: center;
    margin-top: 3rem;
    gap: 20px;
    }
     .btn-save-sec .btn{
         width:100px;
     }
    .profile-detail-form main {
   
    padding: 10px 0px 10px;
}
.profile-detail-form label {
    display: inline-block;
    margin-bottom: 10px;
    font-weight: 600;
    color: #000;
}
.profile-detail-form .form-control {
  
    border: 1px solid #ff4005;}
    hr{
            margin-top: 1.67rem;
    margin-bottom: 3.67rem;
    }
    .form-check-inline label{
        margin-bottom:0px !important;
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
    @media (max-width:767px){
        .head-profile {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction: column;
}
.contents{
    margin-top:1rem;
}
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


<!-- endinject-->
@endsection
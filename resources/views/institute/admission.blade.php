<?php

//print_r($keyword);die;
?>
@extends('institute.layouts.master')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<style>
  .owl-carousel .owl-nav.disabled {
    display: block !important;
  }
  .head-profile .form-group{
      padding:0%;
  }
</style>
<div class="contents">
  <div class="details-top-sec del-adm">
    <div>
      <h3>Admissions</h3>
      <p>Details of admission</p>
    </div>
    <div>
      <a  href="{{url('ins_Institutions/'.$id)}}"class="btn btn-primary"><i class="fas fa-chevron-left"></i></a>
    </div>
  </div>
  <div class="container-fluid detail-dash">

    <div class="social-dash-wrap">
      <div class="col-xxl-8 mb-25 p-5">

        <div class="card border-0 profile-admin">
          <div class="head-profile">
            <p>Details of admission</p>
                <form action="{{url('application_search')}}" method="get" class="col-md-8">
        <div class="row adm-row" style="justify-content:flex-end">
       <div class="form-group col-md-8">
      <input type="hidden" name="id" value="{{$id}}">
      <input type="hidden" name="mode" value="{{$_GET['mode']}}">
      <input type="text" class="form-control" name="keyword" value="{{$keyword}}"  placeholder="Admission number/name" style="border-radius: 5px 0px 0px 5px;background: #FFFFFF; box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);height: 45px; padding: 0.6rem; color: #000; font-weight: 500; font-size: 15px;">
       </div>
        <div class="form-group col-md-4">
      <button type="submit" class="btn-primary btn " style="line-height: 2.7; text-align: center;padding:0rem 0.7rem;border-radius: 0px 5px 5px 0px;box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
"><i class="fas fa-search" style="font-size:17px;margin-right:0px"></i></button>
        </div>
        </div>
    </form>
          </div>
          
          <div class="clearfix"></div>
          
          
          

<!--<div class="card">-->
<!--  <div class="card-body">-->
<!--    <form action="{{url('application_search')}}" method="get">-->
<!--        <div class="row">-->
<!--       <div class="form-group col-md-4">-->
<!--      <input type="hidden" name="id" value="{{$id}}">-->
<!--      <input type="hidden" name="mode" value="{{$_GET['mode']}}">-->
<!--      <input type="text" class="form-control" name="keyword"  placeholder="Admission number/name" style="background: #FFFFFF; box-shadow: 0px 4px 4px rgb(0 0 0 / 25%); border-radius: 5px; height: 45px; padding: 0.6rem; color: #000; font-weight: 500; font-size: 15px;">-->
<!--       </div>-->
<!--        <div class="form-group col-md-2">-->
<!--      <input type="submit" value="search" class="btn-primary btn ">-->
<!--        </div>-->
<!--        </div>-->
<!--    </form>-->
<!--  </div>-->
<!--</div>-->
          <div class="profile-detail-form">
            <main>
                
                 

              <div class="owl-carousel owl-theme">
                      
              
                @forelse($listings as $listing)
                @if($listing->id%2==0)
                
            
              
                <div class="item col-md-8">
                   
                       @if($listing->status==1)
                  <button class="btn btn-primary" style="background-color:green;margin: 0px auto 30px;">Payment Done</button>
                  @else
                   <button class="btn btn-primary" style="background-color:red;margin: 0px auto 30px;">Payment Not Done</button>
                   @endif 
                    
                  <div class="form-group">
                      
                      
                    <label>Application No</label>
                    <p class="form-control">{{$listing->application_no}}</p>

                  </div>

                  <div class="form-group">
                    <label>Student Name</label>
                    <p class="form-control">{{$listing->name}}</p>

                  </div>
                  <div class="form-group">
                    <label>Email ID</label>
                    <p class="form-control">{{$listing->email}}</p>

                  </div>
                  <div class="form-group">
                    <label>Phone number</label>
                    <p class="form-control">{{$listing->f_phone}}</p>

                  </div>

                  <div class="form-group">
                    <label>Date of birth</label>
                    <p class="form-control">{{date('d-m-Y',strtotime($listing->dob))}}</p>

                  </div>
                  <div class="form-group">
                    <label>Gender</label>
                    <?php
                    $c1 = $c2 = "";
                    if ($listing->gender == "option1") {
                      $c1 = "Male";
                    } else  if ($listing->gender == "option2") {
                      $c1 = "Female";
                    }

                    ?>
                    <p class="form-control">{{$c1}} </p>

                  </div>
                  <a href="{{url('admission_view/'.$listing->id)}}"><button class="btn btn-primary">View Form Details</button></a>
                </div>
@else

                <div class="item col-md-8">
                    
                        @if($listing->status==1)
                  <button class="btn btn-primary" style="background-color:green;margin: 0px auto 30px;">Payment Done</button>
                  @else
                   <button class="btn btn-primary" style="background-color:red;margin: 0px auto 30px;">Payment Not Done</button>
                   @endif 
                    
                  <div class="form-group">
                    <label>Application No.</label>
                    <p class="form-control">{{$listing->application_no}}</p>

                  </div>

                  <div class="form-group">
                    <label>Student Name</label>
                    <p class="form-control">{{$listing->name}}</p>

                  </div>
                  <div class="form-group">
                    <label>Email ID</label>
                    <p class="form-control">{{$listing->email}}</p>

                  </div>
                  <div class="form-group">
                    <label>Phone number</label>
                    <p class="form-control">{{$listing->f_phone}}</p>

                  </div>
                  <div class="form-group">
                    <label>Date of birth</label>
                    <p class="form-control">{{date('d-m-Y',strtotime($listing->dob))}}</p>

                  </div>
                  <div class="form-group">
                    <label>Gender</label>
                    <?php
                    $c1 = $c2 = "";
                    if ($listing->gender == "option1") {
                      $c1 = "Male";
                    } else  if ($listing->gender == "option2") {
                      $c1 = "Female";
                    }

                    ?>
                    <p class="form-control">{{$c1}} </p>

                  </div>
              
                
                  <a href="{{url('admission_view/'.$listing->id)}}"><button class="btn btn-primary">View Form Details</button></a>
                </div>
                @endif
                @empty
          
                <p style="color:red;font-size:20px;text-align:center">No data</p>
                      <style>
                    .owl-nav{
                        display:none;
                    }
                </style>
                @endforelse
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
<style>
    .profile-detail-form main .item {
   
    margin: auto;
}
main{
    padding-top:9% !important;
}
.profile-detail-form main {
   
    display: block;}
</style>
<div class="overlay-dark-sidebar"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 1
      },
      1200: {
        items: 1
      }
    }
  });
</script>

<!-- endinject-->
@endsection
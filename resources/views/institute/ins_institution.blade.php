<?php

//print_r($institution->seat_remain);exit();

?>
@extends('institute.layouts.master')
@section('content')


<body class="layout-light side-menu overlayScroll">


  <div class="mobile-author-actions"></div>

  <main class="main-content">



    <div class="contents    content-dashboard">

      <div class="container-fluid">
        <div class="social-dash-wrap dashboard-board">
            
          <div class="row">
            <div class="col-lg-12">

              <div class="breadcrumb-main">

                <div>
                  <h3 class="text-capitalize breadcrumb-title">Weclome back, {{$institution->name}}</h3>
                  <?php
                  if($institution->type=="s")
                  $class="class";
                  else
                  {
                      $class="course";
                  }
                  ?>
                  <p class="dashboard-para">{{date('d')}}&nbsp;{{date('M')}}&nbsp;{{date('Y')}}</p>
                </div>
                <div class="breadcrumb-action justify-content-center flex-wrap">

                  <img src="{{url('public/img/images/premium.png')}}">
                </div>
              </div>


              

            </div>
                        <div class="col-lg-12 dashboard-page" style="display:flex;justify-content:space-between;align-items:center">
                 
                                        <div class="form-group">
                                            <p>
                                                <?php
                                                $current_date=date('Y-m-d');
                                              
                                                if (($current_date >= $institution->start_date) && ($current_date <= $institution->end_date))
{?>
 <buttton class="btn admissin-opn adms" data-toggle="modal" data-target="#exampleModal-1">Admission Open<span></span></buttton>
<?php
    
}
else
{?>
<buttton class="btn admissin-cls adms " data-toggle="modal" data-target="#exampleModal-1"><span></span> Admission close</buttton>
<?php
    
}
                                                
                                                ?>
                                                

                                               



                                                

                                            </p>
                                            
                                           
                                        </div>
                                               <div class="form-group">
                                        <a href="{{url('edit_details_of_school/'.$institution->id)}}" class="btn btn-primary" ><img src="{{url('public/img/images/edit-btn.png')}}">&nbsp; Edit Institute
                                    Details</a>

         </div>
                                    </div>
                    
                     
 
            
            <div class="col-lg-12 mb-25 card-dashboard-box">
              <div class="social-overview-wrap row">
                <div class="col-md-4">
                  <div class="card border-0 card-dashb card-app">
                    <div class="img-card-dasb">
                      <div class="dashb-img">
                        <img src="{{url('public/img/images/d-img-1.png')}}">
                      </div>
                      <div>
                        <h3>{{$add_online_count}}</h3>
                        <p>Online Application</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card border-0 card-dashb card-app">
                    <div class="img-card-dasb">
                      <div class="dashb-img  dash-img-2">
                        <img src="{{url('public/img/images/d-img-2.png')}}">
                      </div>
                      <a href="{{url('admission/'.$id)}}?mode=1">
                        <div>
                          <h3>{{$add_offline_count}}</h3>
                          <p>Offline Application</p>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card border-0 card-dashb">
                    <div class="img-card-dasb">
                      <div class="dashb-img dash-img-3">
                        <img src="{{url('public/img/images/d-img-3.png')}}">
                      </div>
                      <div>
                        <h3>{{$institution->view}}+</h3>
                        <p>Total Views</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-xxl-4 col-md-6 mb-25">

              <div class="card border-0 pie-cart-card">
                <h4>Students</h4>
                <section>
                    <?php
                    
                    $admisiion_count=$add_offline_count+$add_online_count;
                    ?>
                    @if(($lead_count==0)&&($admisiion_count==0))
                    
                     <div>
                    <img src="{{url('public/img/images/nodata.png')}}"></div>
                     <ul class="pieID legend" style="text-align:center">
                    <li style="    border-left: 1.25em solid #d3d3d3;">
                      <em style="font-weight:500">NO DATA</em><br>  
                    </li>
                     <li style="    border-left: 1.25em solid #FF9000 ">
                      <em>Total Enquiries</em><br>
                      <span>{{$lead_count}}</span>
                    </li>
                    
                    <li style="    border-left: 1.25em solid #0487ff;">
                      <em>Total Admissions </em><br>
                      <span>{{$add_offline_count+$add_online_count}}</span>
                    </li>

                
                  </ul>
                    @else
                  <div class="pieID pie">

                  </div>
                  <ul class="pieID legend">
                    <li>
                      <em>Total Enquiries</em><br>
                      <span>{{$lead_count}}</span>
                    </li>
                    
                    <li>
                      <em>Total Admissions </em><br>
                      <span>{{$add_offline_count+$add_online_count}}</span>
                    </li>


                  </ul>
                 @endif
                  
                </section>


              </div>

            </div>
            <div class="col-xxl-4 col-md-6 mb-25">

              <div class="card border-0 card-bottom-dashb">

                <h3>Notifications</h3>
                <div class="notification-sec scrollbar" id="style-1">
                  @forelse ($addmissions as $a)
                  <div class="not-induvisual">
                      <div style="display:flex;justify-content:space-between;align-items:center">
                    <button class="btn btn-primary">{{date('d-m-Y',strtotime($a->created_at))}}</button>
                    <p style="font-weight:600;color:#000;font-size:17px !important;margin-right:30px">
                        <i>
                    @if($a->mode_of_pay==1)
                    <?= $mode = "offline"; ?>
                    @else
                    <?= $mode = "online"; ?>
                    @endif </i></p></div>
                    <p>{{$a->name}} has submitted an {{$mode}} application for {{$a->s_class}} {{$class}}.</p>
                  </div>
                  @empty

                  @endforelse

                </div>
              </div>

            </div>

            <div class="col-xxl-4 col-md-12 mb-25">

              <div class="card border-0 card-bottom-dashb">
                <h3>Publish</h3>
                  <form action="{{url('seat_remain')}}">
                <div class="row">
                    
                  <div class="col-md-12"><label>Number of Seats Remaining:</label></div>
        
                    <div class="col-md-6">
                      <input type="hidden" value="{{$institution->id}}" name="id">
                      <input class="form-control" type="text" name="seat" value="{{$institution->seat_remain}}" required>
                    </div>
                    <div class="col-md-2"><button class="btn btn-primary" type="submit">Save</button>

                </div>
                
                         
              </div>
               </form>
              <h3 class="mt-5">Add Discount</h3>
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4"><label>Amount (in %)</label>
          <form action="{{url('discount_date')}}">
          <input type="hidden" value="{{$institution->id}}" name="id">
                    <input class="form-control" type="text" value="{{$institution->discount}}" name="discount" required>
                </div>

                <div class="col-md-4"><label>Valid Till Date</label>
                <input class="form-control" type="date" name="valid_date" value="{{$institution->valid_date}}" required></div>
                <div class="col-md-1"></div>
              </div>
              <div class="row">
                <div class="col-md-5 btn-sec" style="display:flex"><button class="btn btn-primary btn-sm" style="margin:auto" type="submit">Save</button><a  href="{{url('remove_discount/'.$institution->id)}}" class="btn btn-primary btn-sm" style="margin:auto" type="submit">Reset</a>
                
                 <div class="col-md-2 btn-sec">


        </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    </div>
    
    
    
    
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
                                                 
	<input  type="hidden" value="{{$institution->id}}" name="id" required>
     
		<label>Start Date </label>
		<input  class="form-control" type="date" value="{{$institution->start_date}}}" name="start_date" required>
	
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
      .card-app:hover{
         background: #ff400524; 
      }
      .not-induvisual .btn {
   
    padding: 0% 0.6rem;
    height: 31px;}
  </style>

  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script>
  <!-- inject:js-->
  <script src="assets/vendor_assets/js/jquery/jquery-3.5.1.min.js"></script>
  <script src="assets/vendor_assets/js/jquery/jquery-ui.js"></script>
  <script src="assets/vendor_assets/js/bootstrap/popper.js"></script>
  <script src="assets/vendor_assets/js/bootstrap/bootstrap.min.js"></script>
  <script src="assets/vendor_assets/js/moment/moment.min.js"></script>
  <script src="assets/vendor_assets/js/accordion.js"></script>
  <script src="assets/vendor_assets/js/autoComplete.js"></script>
  <script src="assets/vendor_assets/js/Chart.min.js"></script>
  <script src="assets/vendor_assets/js/charts.js"></script>
  <script src="assets/vendor_assets/js/daterangepicker.js"></script>
  <script src="assets/vendor_assets/js/drawer.js"></script>
  <script src="assets/vendor_assets/js/dynamicBadge.js"></script>
  <script src="assets/vendor_assets/js/dynamicCheckbox.js"></script>
  <script src="assets/vendor_assets/js/feather.min.js"></script>
  <script src="assets/vendor_assets/js/footable.min.js"></script>
  <script src="assets/vendor_assets/js/fullcalendar@5.2.0.js"></script>
  <script src="assets/vendor_assets/js/google-chart.js"></script>
  <script src="assets/vendor_assets/js/jquery-jvectormap-2.0.5.min.js"></script>
  <script src="assets/vendor_assets/js/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendor_assets/js/jquery.countdown.min.js"></script>
  <script src="assets/vendor_assets/js/jquery.filterizr.min.js"></script>
  <script src="assets/vendor_assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/vendor_assets/js/jquery.mCustomScrollbar.min.js"></script>
  <script src="assets/vendor_assets/js/jquery.peity.min.js"></script>
  <script src="assets/vendor_assets/js/jquery.star-rating-svg.min.js"></script>
  <script src="assets/vendor_assets/js/leaflet.js"></script>
  <script src="assets/vendor_assets/js/leaflet.markercluster.js"></script>
  <script src="assets/vendor_assets/js/loader.js"></script>
  <script src="assets/vendor_assets/js/message.js"></script>
  <script src="assets/vendor_assets/js/moment.js"></script>
  <script src="assets/vendor_assets/js/muuri.min.js"></script>
  <script src="assets/vendor_assets/js/notification.js"></script>
  <script src="assets/vendor_assets/js/popover.js"></script>
  <script src="assets/vendor_assets/js/select2.full.min.js"></script>
  <script src="assets/vendor_assets/js/slick.min.js"></script>
  <script src="assets/vendor_assets/js/trumbowyg.min.js"></script>
  <script src="assets/vendor_assets/js/wickedpicker.min.js"></script>
  <script src="assets/theme_assets/js/drag-drop.js"></script>
  <script src="assets/theme_assets/js/footable.js"></script>
  <script src="assets/theme_assets/js/full-calendar.js"></script>
  <script src="assets/theme_assets/js/googlemap-init.js"></script>
  <script src="assets/theme_assets/js/icon-loader.js"></script>
  <script src="assets/theme_assets/js/jvectormap-init.js"></script>
  <script src="assets/theme_assets/js/leaflet-init.js"></script>
  <script src="assets/theme_assets/js/main.js"></script>


  <script>
    function sliceSize(dataNum, dataTotal) {
      return (dataNum / dataTotal) * 360;
    }

    function addSlice(sliceSize, pieElement, offset, sliceID, color) {
      $(pieElement).append("<div class='slice " + sliceID + "'><span></span></div>");
      var offset = offset - 1;
      var sizeRotation = -179 + sliceSize;
      $("." + sliceID).css({
        "transform": "rotate(" + offset + "deg) translate3d(0,0,0)"
      });
      $("." + sliceID + " span").css({
        "transform": "rotate(" + sizeRotation + "deg) translate3d(0,0,0)",
        "background-color": color
      });
    }

    function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
      var sliceID = "s" + dataCount + "-" + sliceCount;
      var maxSize = 179;
      if (sliceSize <= maxSize) {
        addSlice(sliceSize, pieElement, offset, sliceID, color);
      } else {
        addSlice(maxSize, pieElement, offset, sliceID, color);
        iterateSlices(sliceSize - maxSize, pieElement, offset + maxSize, dataCount, sliceCount + 1, color);
      }
    }

    function createPie(dataElement, pieElement) {
      var listData = [];
      $(dataElement + " span").each(function() {
        listData.push(Number($(this).html()));
      });
      var listTotal = 0;
      for (var i = 0; i < listData.length; i++) {
        listTotal += listData[i];
      }
      var offset = 0;
      var color = [
        "#FF9000",
        "#0487FF"

      ];
      for (var i = 0; i < listData.length; i++) {
        var size = sliceSize(listData[i], listTotal);
        iterateSlices(size, pieElement, offset, i, 0, color[i]);
        $(dataElement + " li:nth-child(" + (i + 1) + ")").css("border-color", color[i]);
        offset += size;
      }
    }
    createPie(".pieID.legend", ".pieID.pie");
  </script>
  
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
  @endsection
@extends('institute.layouts.master')
@section('content')


<body class="layout-light side-menu overlayScroll">


    <div class="mobile-author-actions"></div>
   
    <main class="main-content">

      

        <div class="contents    content-dashboard">

            <div class="container-fluid">
                <div class="social-dash-wrap">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="breadcrumb-main">

                                <div>
                                    <h3 class="text-capitalize breadcrumb-title">Weclome back, Orchid Schools</h3>
                                    <p class="dashboard-para">Sep 21, Wed</p>
                                </div>
                                <div class="breadcrumb-action justify-content-center flex-wrap">

                                    <img src="{{url('public/img/images/premium.png')}}">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 mb-25">
                            <div class="social-overview-wrap row">
                                <div class="col-md-4">
                                    <div class="card border-0 card-dashb cad-1">
                                        <div class="img-card-dasb">
                                        <div class="dashb-img">
                                            <img src="{{url('public/img/images/d-img-1.png')}}">
                                        </div>
                                        <div>
                                            <h3>1500</h3>
                                            <p>Admitted</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-0 card-dashb cad-1">
                                        <div class="img-card-dasb">
                                        <div class="dashb-img  dash-img-2">
                                            <img src="{{url('public/img/images/d-img-2.png')}}">
                                        </div>
                                        <div>
                                            <h3>100</h3>
                                            <p>Pending Application</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-0 card-dashb cad-1">
                                        <div class="img-card-dasb">
                                        <div class="dashb-img dash-img-3">
                                            <img src="{{url('public/img/images/d-img-3.png')}}">
                                        </div>
                                        <div>
                                            <h3>100+</h3>
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
                                      <div class="pieID pie">
                                        
                                      </div>
                                      <ul class="pieID legend">
                                        <li>
                                          <em>Total Enquiries</em><br>
                                          <span>1000</span>
                                        </li>
                                        <li>
                                          <em>Total Admissions  </em><br>
                                          <span>531</span>
                                        </li>
                                     
                                    
                                      </ul>
                                    </section>
                                   
                            
                            </div>

                        </div>
                        <div class="col-xxl-4 col-md-6 mb-25">

                            <div class="card border-0 card-bottom-dashb">
                               
                                <h3>Notifications</h3>
                                <div class="notification-sec scrollbar" id="style-1">
                                    <div class="not-induvisual">
                                      <button class="btn btn-primary">22 Sept, 2022</button> 
                                      <p>Great School manag mene esom tus eleifend lectus sed maximus mi faucibusnting.</p> 
                                    </div>
                                    <div class="not-induvisual">
                                        <button class="btn btn-primary">22 Sept, 2022</button> 
                                        <p>Great School manag mene esom tus eleifend lectus sed maximus mi faucibusnting.</p> 
                                      </div>
                                      <div class="not-induvisual">
                                        <button class="btn btn-primary">22 Sept, 2022</button> 
                                        <p>Great School manag mene esom tus eleifend lectus sed maximus mi faucibusnting.</p> 
                                      </div>
                                      <div class="not-induvisual">
                                        <button class="btn btn-primary">22 Sept, 2022</button> 
                                        <p>Great School manag mene esom tus eleifend lectus sed maximus mi faucibusnting.</p> 
                                      </div>
                                      <div class="not-induvisual">
                                        <button class="btn btn-primary">22 Sept, 2022</button> 
                                        <p>Great School manag mene esom tus eleifend lectus sed maximus mi faucibusnting.</p> 
                                      </div>
                                </div>
                            </div>

                        </div>
                        
                        <div class="col-xxl-4 col-md-12 mb-25">

                            <div class="card border-0 card-bottom-dashb">
                               <h3>Publish</h3>
                  <div class="row">
                    <div class="col-md-3"><label>Number of Seats Remaining:</label></div>
                    <div class="col-md-5"><input class="form-control" type="text"></div>
                    <div class="col-md-2"><button class="btn btn-primary">Save</button></div>
                  </div>
                  <h3 class="mt-5">Add Discount</h3>
                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4"><label>Ammount</label><input class="form-control" type="text"></div>
                  
                    <div class="col-md-4"><label>Valid Till Date</label><input class="form-control" type="date"></div>
                    <div class="col-md-1"></div>
                  </div>
                  <div class="row"> <div class="col-md-2 btn-sec"><button class="btn btn-primary" style="margin:auto">Save</button></div></div>
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
        
      .cad-1:hover {
    background: #fa8b0c !important;}
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
  $(pieElement).append("<div class='slice "+sliceID+"'><span></span></div>");
  var offset = offset - 1;
  var sizeRotation = -179 + sliceSize;
  $("."+sliceID).css({
    "transform": "rotate("+offset+"deg) translate3d(0,0,0)"
  });
  $("."+sliceID+" span").css({
    "transform"       : "rotate("+sizeRotation+"deg) translate3d(0,0,0)",
    "background-color": color
  });
}
function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
  var sliceID = "s"+dataCount+"-"+sliceCount;
  var maxSize = 179;
  if(sliceSize<=maxSize) {
    addSlice(sliceSize, pieElement, offset, sliceID, color);
  } else {
    addSlice(maxSize, pieElement, offset, sliceID, color);
    iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount+1, color);
  }
}
function createPie(dataElement, pieElement) {
  var listData = [];
  $(dataElement+" span").each(function() {
    listData.push(Number($(this).html()));
  });
  var listTotal = 0;
  for(var i=0; i<listData.length; i++) {
    listTotal += listData[i];
  }
  var offset = 0;
  var color = [
    "#FF9000",  
    "#0487FF"
    
  ];
  for(var i=0; i<listData.length; i++) {
    var size = sliceSize(listData[i], listTotal);
    iterateSlices(size, pieElement, offset, i, 0, color[i]);
    $(dataElement+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
    offset += size;
  }
}
createPie(".pieID.legend", ".pieID.pie");

    </script>
    
        @endsection  
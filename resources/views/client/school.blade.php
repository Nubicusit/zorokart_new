<?php 
header("Expires: Thu, 19 Nov 1981 08:52:00 GMT"); //Date in the past
header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0"); //HTTP/1.1
header("Pragma: no-cache");
?>
<head>
<meta http-equiv='Pragma' content='no-cache'>
<meta http-equiv='Expires' content='-1'>
</head>

<script>
window.onload = function()
{
    if(typeof history.pushState === "function")
    {
        history.pushState("jibberish", null, null);
        window.onpopstate = function()
        {
                history.pushState("newjibberish", null, null);
                
        };
    }
    else
    {
        var ignoreHashChange = true;
        window.onhashchange = function()
        {
            if(!ignoreHashChange )
            {
                ignoreHashChange = true;
                window.location.hash = Math.random();
            }
            else
            {
                ignorehashChange = false;
            }
        };
    }
}
</script>




@extends('client.websitelayout1')
@section('headerscript')
    @parent
@endsection
@section('header')
    @parent
@endsection
@section('content')
<script>
    $(document).ajaxStop(function(){
    window.location.reload();
});
</script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    </div>

<?php

function get_filter_checked($item): string
{
    if ($item == true) {
        return "checked";
    }
    return "";
}


if (Auth::guard('parent')->check()) {
    $uid=Auth::guard('parent')->user()->id;
?>
@php

$wishlist= App\Models\WishlistModel::where('user_id',$uid)->get();
$wishlist_count=App\Models\WishlistModel::where('user_id',$uid)->count();

@endphp
<?php
//print_r($wishlist);die;
}
?>
    <!--------------- banner section ends-------------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--------------- animation start -------------------->
<div class="content animation-section">

    <div id="wrapper-content" class="wrapper-content  pb-0">
        <div class="container">

            @if(Session::has('status'))
                <script>
                    swal("", "{!!Session::get('status') !!}", "success")
                </script>
            @endif
            <div >
              <a href="#" class="cart-btn btn cart fil-btn" onclick="showDiv()"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Filter</a></div>
            <div class="page-container row school-page-cnt">
                
                <div class="sidebar col-12 col-lg-3 order-1 order-lg-0 " id="welcomeDiv">
                    <form action="{{url('search_institutes')}}">
                        {{--<input type="submit" value="search" id="submit" style="display:none">--}}
                        <input type="text" name="type" value="{{$institution_type}}" style="display:none">

                        <div class="card widget-filter bg-white mb-6  border-0 rounded-0 " style="background: #FFFFFF;
                            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                            <div class="primary">
                                <div class="container">
                                    <div class="row">
                                        <div class="fliter-sec-school">
                                            <h2>Customize Search</h2>
                                            <div class="filter-menu">
                                                <form>
                                                    <div class="panel panel-default top-panel">
                                                        <div class="panel-heading">

                                                        </div><!-- /.panel-heading -->

                                                        <div class="panel-body">
                                                            <div class="panel-group" id="filter-menu" role="tablist"
                                                                 aria-multiselectable="true">

                                                                <?php
                                                                if($_GET["type"] == "Schools"){
                                                                    ?>


                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading" role="tab"
                                                                         id="headingOne">
                                                                        <a class="panel-title accordion-toggle collapsed"
                                                                           role="button" data-toggle="collapse"
                                                                           href="#"
                                                                           aria-expanded="false"
                                                                           aria-controls="collapseOne">
                                                                            <img
                                                                                src="{{url('public/images/sd-ic.png')}}">
                                                                            Co-Ed
                                                                            Status
                                                                        </a><!-- /.panel-title -->
                                                                    </div><!-- /.panel-heading -->
                                                                    <div id="collapseOne"
                                                                         class="panel-collapse collapse"
                                                                         role="tabpanel"
                                                                         aria-labelledby="headingTwo">
                                                                        <div class="panel-body inner-sec-body">
                                                                            <div class="checkbox"><label><input
                                                                                        type="checkbox"
                                                                                        name="boys_only"
                                                                                        value="1"
                                                                                        class="trigger" {{get_filter_checked(isset($_GET["boys_only"]))}}>Boy
                                                                                    only</label>
                                                                                {{-- <p class="count">(0)</p>--}}
                                                                            </div>
                                                                            <div class="checkbox"><label><input
                                                                                        type="checkbox"
                                                                                        name="co_education"
                                                                                        value="1"
                                                                                        class="trigger" {{get_filter_checked(isset($_GET["co_education"]))}}>Co-Education</label>
                                                                                {{-- <p class="count">(0)</p>--}}
                                                                            </div>
                                                                            <div class="checkbox"><label><input
                                                                                        type="checkbox"
                                                                                        name="girls_only"
                                                                                        value="1"
                                                                                        class="trigger" {{get_filter_checked(isset($_GET["girls_only"]))}}>Girls
                                                                                    only</label>
                                                                                {{-- <p class="count">(0)</p>--}}
                                                                            </div>
                                                                        </div><!-- /.panel-body -->
                                                                    </div><!-- /.panel-collapse -->
                                                                </div><!-- /.panel -->

                                                                <?php } ?>
                                                                <?php
                                                                if ($_GET["type"] == "Schools"){
                                                                    ?>
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading" role="tab"
                                                                         id="headingTwo">
                                                                        <a class="panel-title accordion-toggle collapsed"
                                                                           role="button" data-toggle="collapse"
                                                                           href="#"
                                                                           aria-expanded="false"
                                                                           aria-controls="collapseTwo">
                                                                            <img
                                                                                src="{{url('public/images/sd-ic-1.png')}}">
                                                                            Class
                                                                        </a><!-- /.panel-title -->
                                                                    </div><!-- /.panel-heading -->
                                                                    <div id="collapseTwo"
                                                                         class="panel-collapse collapse"
                                                                         role="tabpanel"
                                                                         aria-labelledby="headingTwo">
                                                                        <?php  
                                                                        
                                                                        $select_1=$select_2=$select_3=$select_4="";
                                                                          if(in_array(1, $stdArray))
                                                                       
  {
$select_1="checked";
  }
else if(in_array(2, $stdArray))
  {
 $select_2="checked";
  }
  else if(in_array(3, $stdArray))
  {
 $select_3="checked";
  }
  else  if(in_array(4, $stdArray))
  {
 $select_4="checked";
  }
  ?>
                                                                        <div class="panel-body inner-sec-body">
                                                                            <div class="checkbox"><label><input
                                                                                        type="checkbox"
                                                                                        {{$select_1}}
                                                                                        name="lkg_to_10th"
                                                                                        value="1"
                                                                                        class="trigger" {{get_filter_checked(isset($_GET["lkg_to_10th"]))}}>LKG
                                                                                    to
                                                                                    10th</label>
                                                                                {{-- <p class="count">(0)</p>--}}
                                                                            </div>
                                                                            <div class="checkbox"><label><input
                                                                                        type="checkbox"
                                                                                        {{$select_2}}
                                                                                        name="lkg_to_12th"
                                                                                        value="2"
                                                                                        class="trigger" {{get_filter_checked(isset($_GET["lkg_to_12th"]))}}>LKG
                                                                                    to
                                                                                    12th</label>
                                                                                {{-- <p class="count">(0)</p>--}}
                                                                            </div>
                                                                            <div class="checkbox"><label><input
                                                                            {{$select_3}}
                                                                                        type="checkbox"
                                                                                        name="1st_to_10th"
                                                                                        value="3"
                                                                                        class="trigger" {{get_filter_checked(isset($_GET["1st_to_10th"]))}}>1st
                                                                                    to
                                                                                    10th</label>
                                                                                {{-- <p class="count">(0)</p>--}}
                                                                            </div>
                                                                            <div class="checkbox"><label><input
                                                                                        type="checkbox"
                                                                                        {{$select_4}}
                                                                                        name="1st_to_12th"
                                                                                        value="4"
                                                                                        class="trigger" {{get_filter_checked(isset($_GET["1st_to_12th"]))}}>1st
                                                                                    to
                                                                                    12th</label>
                                                                                {{-- <p class="count">(0)</p>--}}
                                                                            </div>
                                                                        </div><!-- /.panel-body -->
                                                                    </div><!-- /.panel-collapse -->
                                                                </div><!-- /.panel -->

                                                                <?php } ?>

                                                                <?php
                                                                if ($_GET["type"] != "Schools"){
                                                                    ?>
                                                                        <div class="panel panel-default">
                                                                    <div class="panel-heading" role="tab"
                                                                         id="headingTwo1">
                                                                        <a class="panel-title accordion-toggle collapsed"
                                                                           role="button" data-toggle="collapse"
                                                                           href="#"
                                                                           aria-expanded="false"
                                                                           aria-controls="collapseTwo">
                                                                            <img
                                                                                src="{{url('public/images/sd-ic-6.png')}}">
                                                                           Course
                                                                        </a><!-- /.panel-title -->
                                                                    </div><!-- /.panel-heading -->
                                                                    <div id="collapseTwo1"
                                                                         class="panel-collapse collapse"
                                                                         role="tabpanel"
                                                                         aria-labelledby="headingTwo1">
                                                                        <div class="panel-body inner-sec-body" style="height: 200px;">
                                                                            @forelse($courses as $c)
                                                                            <div class="checkbox"><label>
                                                                                <?php  if (in_array($c->id, $course_item))
  {
$select_course="checked";
  }
else
  {
 $select_course="";
  }
  ?>
                                                                                
                                                                                <input
                                                                                        type="checkbox"
                                                                                        {{$select_course}}
                                                                                        name="course[]"
                                                                                        value="{{$c->id}}"
                                                                                        class="trigger" {{get_filter_checked(isset($_GET["stream_ba"]))}}>{{$c->name}}</label>
                                                                                {{-- <p class="count">(0)</p>--}}
                                                                            </div>
                                                                           @empty
                                                                           @endforelse
                                                                            
                                                                           
                                                                            
                                                                        </div><!-- /.panel-body -->
                                                                    </div><!-- /.panel-collapse -->
                                                                </div><!-- /.panel -->
                                                                <?php
                                                                if ($_GET["type"] != "PU-Junior-College"){
                                                                    ?>
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading" role="tab"
                                                                         id="headingTwo">
                                                                        <a class="panel-title accordion-toggle collapsed"
                                                                           role="button" data-toggle="collapse"
                                                                           href="#"
                                                                           aria-expanded="false"
                                                                           aria-controls="collapseTwo">
                                                                            <img
                                                                                src="{{url('public/images/sd-ic-1.png')}}">
                                                                            Stream
                                                                        </a><!-- /.panel-title -->
                                                                    </div><!-- /.panel-heading -->
                                                                    <div id="collapseTwo"
                                                                         class="panel-collapse collapse"
                                                                         role="tabpanel"
                                                                         aria-labelledby="headingTwo">
                                                                        <div class="panel-body inner-sec-body" style="height: 280px;">
                                                                            @foreach($courses as $c)
                                                                             <p style=""><b>{{$c->name}}</b></p>
                                                                            @forelse($streams->where('course_id',$c->id) as $s)
                                                                           
                                                                            <div class="checkbox"><label>
                                                                                <?php  if (in_array($s->id, $streams_item))
  {
$select_stream="checked";
  }
else
  {
 $select_stream="";
  }
  ?>
                                                                                <input
                                                                                        type="checkbox"
                                                                                        {{$select_stream}}
                                                                                        name="streams[]"
                                                                                        value="{{$s->id}}"
                                                                                        class="trigger" {{get_filter_checked(isset($_GET["stream_ba"]))}}>{{$s->stream}}</label>
                                                                                {{-- <p class="count">(0)</p>--}}
                                                                            </div>
                                                                            @empty
                                                                           
                                                                            @endforelse
                                                                           @endforeach 
                                                                        </div><!-- /.panel-body -->
                                                                    </div><!-- /.panel-collapse -->
                                                                </div><!-- /.panel -->
 <?php } ?>
                                                                <?php } ?>


                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading" role="tab">
                                                                        <a class="panel-title  collapsed"
                                                                           role="button" data-toggle="collapse"
                                                                           aria-expanded="false"
                                                                           aria-controls="collapseThree">
                                                                            <img
                                                                                src="{{url('public/images/sd-ic-2.png')}}">
                                                                            Fee Range
                                                                        </a><!-- /.panel-title -->
                                                                    </div><!-- /.panel-heading -->

                                                                   
                                                                    <div class="panel-collapse " role="tabpanel">
                                                                        <div class="panel-body range-slide">
                                                                           
                                                                           
                                                <input type="Number" value="{{$min}}" name="fees_min"style="color:black;font-weight:600; margin-bottom:1rem;" placeholder="Min Price">
                                                                           
                                                <input type="Number" value="{{$max}}"name="fees_max"style="color:black;font-weight:600"  placeholder="Max Price">
                                                                            
                                                                        </div><!-- /.panel-body -->
                                                                    </div><!-- /.panel-collapse -->
                                                                </div><!-- /.panel -->

                                                               

                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading" role="tab"
                                                                         id="headingFive">
                                                                        <a class="panel-title accordion-toggle collapsed"
                                                                           role="button" data-toggle="collapse"
                                                                           href="#"
                                                                           aria-expanded="false"
                                                                           aria-controls="collapseFive">
                                                                            <img
                                                                                src="{{url('public/images/sd-ic-3.png')}}"
                                                                                style="width:18px">
                                                                                 <?php
                                                                                
                                                                if (($_GET["type"] == "Schools")||($_GET["type"] == "PU-Junior-College")){
                                                                    ?>Board
                                                                    
                                                                    <?php
                                                                    
                                                                }
                                                                else
                                                                {
                                                                ?>
                                                                University
                                                                <?php
                                                                }
                                                                ?>
                                                                        </a><!-- /.panel-title -->
                                                                    </div><!-- /.panel-heading -->
                                                                    <div id="collapseFive"
                                                                         class="panel-collapse collapse"
                                                                         role="tabpanel"
                                                                         aria-labelledby="headingFive">
                                                                        <div class="panel-body inner-sec-body">
                                                                           @foreach($ins_board as $ins)
                                                                            <div class="checkbox"><label>
                                                                              <?php  if (in_array($ins->board, $boardArray))
  {
$select_board="checked";
  }
else
  {
 $select_board="";
  }
  ?>
                                                                            <input
                                                                                        type="checkbox"{{$select_board}}
                                                                                        name="board[]"
                                                                                        value="{{$ins->board}}"
                                                                                        class="trigger" >{{$ins->board}}</label>
                                                                                {{-- <p class="count">(0)</p>--}}
                                                                            </div>
                                                                            @endforeach
                                                                            
                                                                        </div><!-- /.panel-body -->
                                                                    </div><!-- /.panel-collapse -->
                                                                </div><!-- /.panel -->


                                                                
                                                              
                                                            


                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading" role="tab"
                                                                         id="headingSix">
                                                                        <a class="panel-title accordion-toggle collapsed"
                                                                           role="button" data-toggle="collapse"
                                                                           href="#"
                                                                           aria-expanded="false"
                                                                           aria-controls="collapseSix">
                                                                            <img
                                                                                src="{{url('public/images/sd-ic-4.png')}}"
                                                                                style="width:18px"> Campus Type
                                                                        </a><!-- /.panel-title -->
                                                                    </div><!-- /.panel-heading -->
                                                                    <div id="collapseSix"
                                                                         class="panel-collapse collapse"
                                                                         role="tabpanel"
                                                                         aria-labelledby="headingSix">
                                                                        <div class="panel-body inner-sec-body">
                                                                            <div class="checkbox trigger">
                                                                                <label><input
                                                                                        type="checkbox"
                                                                                        name="is_residential"
                                                                                        value="Residential" {{get_filter_checked(isset($_GET["is_residential"]))}}>Residential
                                                                                </label>
                                                                                {{-- <p class="count">(0)</p>--}}
                                                                            </div>
                                                                            <div class="checkbox trigger">
                                                                                <label><input
                                                                                        type="checkbox"
                                                                                        name="is_non_residential"
                                                                                        value="Non-Residential" {{get_filter_checked(isset($_GET["is_non_residential"]))}}>Non
                                                                                    -
                                                                                    Residential
                                                                                </label>
                                                                                {{-- <p class="count">(0)</p>--}}
                                                                            </div>

                                                                        </div><!-- /.panel-body -->
                                                                    </div><!-- /.panel-collapse -->
                                                                </div>
                                                              
                                                                <div class=" "
                                                                     style="margin: 10px;display: flex; gap: 10px;justify-content: space-between;">
                                                                    <button type="submit" value="search" id="submit"
                                                                            class="btn btn-sb ">
                                                                        Apply
                                                                    </button>
                                                                     <a href="{{url('search_reset')}}?type={{$_GET['type']}}" type="submit" value="search" id="submit"
                                                                            class="btn btn-sb btn-clr ">
                                                                        Clear All
                                                                    </a>
                                                                </div>

                                                                <!-- /.panel -->
                                                                <!-- <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab">
                                                                            <a class="panel-title collapsed"
                                                                                role="button" data-toggle="collapse"
                                                                                href="#collapseSeven"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapseSeven">
                                                                                <img src="{{url('public/images/sd-ic-5.png')}}"
                                                                                    style="width:18px"> Location &
                                                                                Distance
                                                                            </a>
                                                                        </div>
                                                                        <div class="panel-collapse" role="tabpanel"
                                                                            aria-labelledby="headingSeven">
                                                                            <div
                                                                                class="panel-body inner-sec-body inner-sec-location">
                                                                                <div class="loc-edit">
                                                                                    <p><i
                                                                                            class="fal fa-location-arrow"></i><span
                                                                                            class="d-inline-block ml-1 ">Bangalore</span>
                                                                                    </p>

                                                                                    <a href="#form-ser"><i
                                                                                            class="far fa-edit"></i></a>
                                                                                </div>

                                                                                <div class="__range __range-step">
                                                                                    <input value="0" type="range"
                                                                                        max="4" min="1" step="1"
                                                                                        list="ticks1" class="se">
                                                                                    <datalist id="ticks1">
                                                                                        <option value="1">1KM</option>
                                                                                        <option value="2">5KM</option>
                                                                                        <option value="3">10KM</option>
                                                                                        <option value="4">15KM</option>

                                                                                    </datalist>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>/.panel -->
                                                            </div><!-- /.panel-group -->
                                                        </div><!-- /.panel-body -->

                                                    </div><!-- /.panel -->
                                                </form>
                                            </div><!-- /.filter-menu -->
                                        </div>


                                    </div>

                                </div><!-- /.container -->
                            </div><!-- /.primary -->

                        </div>
                </div>
                </form>

                <!-- SECTION -->

                <div class="page-content col-12 col-lg-9">

                    <div class="explore-filter d-lg-flex  d-block">
                        <div>
                            <ul class="breadcrumb breadcrumb-style-02 school ">
                                <li class="breadcrumb-item"><a href="<?=Config::get('app.url');?>">Home</a>/{{$_GET['type']}}</li>
                                {{--  <li class="breadcrumb-item">Bangalore </li>
                                  <li class="breadcrumb-item">Schools in Bangalore</li>--}}
                            </ul>
                            <h3 class="head-student"><?= $queryString ?></h3>
                            <div class="  mb-4 mb-lg-0 btn school-count"> <?= $result_count ?> </div>
                        </div>
                        <div class="form-filter d-flex  ml-auto">
                            <div class="format-listing ml-auto ">
                                
                                    @if (Auth::guard('parent')->check()) 
                                     <a href="{{url('wishlist')}}" class="cart-btn btn cart">
                                    <input type="hidden" id="wishlist_count_data" value="{{$wishlist_count}}">
                                    <span class="count" id="wishlist_count">{{$wishlist_count}}</span><i class="fas fa-cart-arrow-down material-icons"></i>
                                    Cart</a>
                                    @else
                                    <a  class="cart-btn btn cart login_ask">
                                    <span class="count" >0</span><i class="fas fa-cart-arrow-down material-icons login_ask"></i>Cart</a>
                                    
                                    @endif

                            </div>
                        </div>
                    </div>

                    <div class="store-listing-style store-listing-style-02">
                       
                        @foreach($institute as $s)
                              
                            <div class="mb-6">


                                <div class="store media align-items-stretch bg-white job-store row">

                                    <div class="w-content w-display-container slider" >

                                            <?php
                                            
                                            $s1 = $s->gallery;
                                            $s1 = (array)$s1;
                                            $gallery_count = count($s->gallery);
                                            ?>
                                        @if($gallery_count>=1)
                                            <div>
                                                <a href="{{url('school_single')}}?id={{$s->id}}">
                                                    <img src="{{('public/images/'. $s1[0]) }}" alt="Image">
                                                </a>
                                                
                                                 <?php
                                                $current_date=date('Y-m-d');
                                             
                                              
                                                  if ((strtotime($current_date) > strtotime($s->start_date)) && (strtotime($current_date) < strtotime($s->end_date)))
{
$admission=1;
?>
  <p class="adm-label btn"> Admission Open</p>
<?php
    
}
else
{
$admission=0;
?>
 <p class="adm-label btn btn-danger" style="background: #ff0000;">
                                                        Admission close</p>
<?php
    
}
                                                
                                                ?>
                                            </div>
                                        @else
                                            <div>
                                                <a href="{{route('school_single') }}?id={{$s->id}}">
                                                    <img src="{{('public/images/Artboard2.jpg') }}" alt="Image">
                                                </a>
                                                <?php
                                                $current_date=date('Y-m-d');
                                             
                                              
                                                 if ((strtotime($current_date) > strtotime($s->start_date)) && (strtotime($current_date) < strtotime($s->end_date)))
{
$admission=1;
?>
  <p class="adm-label btn"> Admission Open</p>
<?php
    
}
else
{
$admission=0;
?>
 <p class="adm-label btn btn-danger" style="background: #ff0000;">
                                                        Admission close</p>
<?php
    
}
                                                
                                                ?>
                                               
                                            </div>
                                        @endif

                                        @if (Auth::guard('parent')->check()) 
                                         @forelse($wishlist->where('ins_id',$s->id)->values() as $w)
                                        <span class="favourite ml-auto  heart " data-id="{{$s->id}}"
                                              data-col="1"><i class="fa fa-heart" aria-hidden="true"></i></span>
                                                                      @empty
                                                                      <span class="favourite ml-auto  heart" data-id="{{$s->id}}"
                                              data-col="2"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                                                                      @endforelse
                                                                      @else
                                                                       <span class="favourite ml-auto  heart" data-id="{{$s->id}}"
                                              data-col="3"><i class="far fa-heart-o"
                                                                      aria-hidden="true"></i> </span>
                                                                      
                                                                      @endif
                                        <a class="w-btn-floating w3-display-left"
                                           onclick="plusDivs(this,-1)">&#10094;</a>
                                        <a class="w-btn-floating w3-display-right"
                                           onclick="plusDivs(this,1)">&#10095;</a>
                                    </div>

                                    <div class="media-body  px-md-4   col-md-9">
                                        <div class="d-flex lh-1">
                                            <a href="{{route('school_single') }}?id={{$s->id}}"
                                               class="h5  d-flex align-items-center store-name">
                                                <span class="letter-spacing-25">{{$s->name}}</span>
                                            </a>
                                            @if($s->premium==1)
                                                <span class="favourite ml-auto text-darker-light">    <img
                                                        src="{{url('public/img/images/premium.png')}}" style="width:60px"></span>
                                            @endif
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6 location-school">
                                                <span class="d-inline-block ">{{$s->address}},{{$s->city}},{{$s->state}}</span>
                                                <!--<p><i class="fal fa-location-arrow"></i><span-->
                                                <!--        class="d-inline-block ml-1 ">Bangalore</span></p>-->
                                            </div>
                                        </div>
                                        <div class="row stu-mid ">
                                            <div class=" stu-st">
                                                <img src="{{url('public/images/Book icon.png')}}">
                                                @if($s->type=="s")
                                                <div>
                                                    <p>Classes offered</p>
                                                    <?php
                                                    $class_off="";
                                                    if($s->c_offered==1)
                                                    {
                                                        $class_off="LKG TO 10TH";
                                                    }
                                                    
                                                    else if($s->c_offered==2)
                                                    {
                                                         $class_off="LKG TO 12TH";
                                                    }
                                                    else if($s->c_offered==3)
                                                    {
                                                         $class_off="1 TO 10TH";
                                                    }
                                                    else if($s->c_offered==4)
                                                    {
                                                         $class_off="1 TO 12TH";
                                                    }
                                                    
                                                    ?>
                                                    <h5>{{$class_off}}</h5>
                                                </div>
                                                @else
                                                 <div>
                                                    <p>Course offered</p>
                                                    <?php
                                                    $i=0;
                                                    ?>
                                                    @foreach($course_offered->where('ins_id',$s->id)->values() as $co)
                                                    
                                                   <?php $i++;
                                                   ?>
                                                    @endforeach
                                                    {{$i}}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class=" stu-st">
                                                <img src="{{url('public/images/Rs Icon.png')}}">
                                                <div>
                                                    <p>Average Fee/year</p>
                                                    <h5>{{$s->cost}}-{{$s->max_cost}}</h5>
                                                </div>
                                            </div>
                                            <div class=" stu-st">
                                                <img src="{{url('public/images/ic-s.png')}}">
                                                <div>
                                                    <p>
                                                        @if(($s->type=="s")||($s->type=="pu"))
                                                        Board
                                                        @else
                                                        University
                                                        @endif
                                                        </p>
                                                    <h5>{{$s->board}}</h5>
                                                </div>
                                            </div>
                                            <div class=" stu-st">
                                                <img src="{{url('public/images/scc.png')}}">
                                                <div>
                                                    <p>Campus Type</p>
                                                    <h5>{{$s->c_type}}</h5>
                                                </div>
                                            </div>
   
                                        </div>
                                        
                             
                                                
                                                
                                                
                                        <div class="d-flex lh-1  store-name-2">
                                            <a href="#" class="h5  d-flex align-items-center store-name">
                                                    <span class="letter-spacing-25 eye-scholl"><i
                                                            class="far fa-eye"></i>&nbsp;{{$s->view}} 
                                                        Views</span>
                                                <!--<button class="btn v-n-btn revie-bt"><i class="fas fa-star"></i>-->
                                                <!--    4.5-->
                                                <!--</button>-->
                                            </a>
                                            <div class="tlk-btn-sec">
                                                <a href="#" class="btn btn-sb" data-toggle="modal"
                                                   data-target="#a{{$s->id}}">Talk to Counsellor</a>
                                                   <!--model-->
                                                   <!----- Modal for request to call --------->

<div class="modal fade  careers-modal" id="a{{$s->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">


            <!-- Modal body -->
            <div class="modal-body">


                <form action="{{ route('counsellordata_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h4>Submit for Free Counselling</h4>
 <input type="hidden" class="form-control" name="ins_id" value="{{$s->id}}" placeholder="Please enter your name">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Your Name <span>*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Please enter your name">
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Contact Number <span>*</span></label>
                            <input type="number" class="form-control" name="phone"
                                   placeholder="Please Enter your number"  id="phone_noogggggggggggg">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Time For Callback <span>*</span></label>

                            <input list="browsers" id="browser" class="form-control" name="callback" required>

                            <datalist id="browsers">
                                <option value="9 AM - 4 PM">9 AM - 4 PM</option>
                                <option value="10.00 AM - 4 PM">10.00 AM - 4 PM</option>
                                <option value="9.30 AM - 4 PM">9.30 AM - 4 PM</option>
                                <option value="10.30 AM - 4 PM">10.30 AM - 4 PM</option>
                                <option value="9.00 AM - 5 PM">9.00 AM - 5 PM</option>
                                <option value="10.00 AM - 5 PM">10.00 AM - 5 PM</option>
                                <option value="9.30 AM - 5 PM">9.30 AM - 5 PM</option>
                                <option value="10.30 AM - 5 PM">10.30 AM - 5 PM</option>
                            </datalist>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Message</label>
                            <textarea class="form-control" rows="4"
                                      placeholder="Please type your requirements" name="message"></textarea>
                        </div>
                    </div>
                    <div class="bottom-btn-md">
                        <a href="#" class="cancel btn mt-5" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn  mt-5 sign-up-btnn btn-primary pull-right" >Send message</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

                                                   
                                                   <!--model end-->
                                                   @if (Auth::guard('parent')->check()) 
                                                   
                                                   @if(($s->premium==1) && ($admission==1))
                                                   
                                                   <a href="{{url('school_apply_form/'.$s->id)}}" class="btn btn-sb" >Apply Now </a>
                                                   
                                                   @else
                                                   
                                                   
                                                      <button  class="btn btn-sb" data-toggle="modal" data-target="#myModal-apply">Apply Now  </button>
                                                       @endif
                                                   @else
                                                    <button  class="btn btn-sb login_ask" >Apply Now  </button>
                                                   
                                                   @endif
                                                
                                            </div>
                                        </div>
                                                    
                                         <div class="row stu-mid " style="margin-top:1rem; margin-bottom: 0%; justify-content: flex-start; gap: 43px; margin-left: 1rem;align-items: center;">
                                            @if($s->seat_remain>0)
                                            <div class=" stu-st">
                                                  <div class="discount-label red-1"> <i> <span>Hurry up : <strong class="bold"> {{$s->seat_remain}} seats left </strong> </span> </i></div>
                                             </div> 
                                             @endif
                                             @if($s->discount>0)
                                             @if((strtotime($s->valid_date))>strtotime(date('Y-m-d')))
                                                 <div class=" stu-st">
                                                                                                  <p class="ribbon">
                                                
  <span class="text"><i><strong class="bold">Offer :</strong> {{$s->discount}} % Off Till {{date('d-m-Y',strtotime($s->valid_date))}}</span></i>
</p>
           
      
                                                  </div>
                                                  @endif
                                                  @endif
                                                  </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="pagination">
                             <section class="pagination text-center page-section">
                                 <div class="container">
                                     <ul class="pagination">
                                         <li class="page-item">
                                             <a class="page-link" href="#" aria-label="Previous">
                                                 <span aria-hidden="true"> <i class="fa fa-long-arrow-left"
                                                         aria-hidden="true"></i></span>
                                                 <span class="sr-only">Previous</span>
                                             </a>
                                         </li>
                                         <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                         <li class="page-item"><a class="page-link" href="#">2</a></li>
                                         <li class="page-item"><a class="page-link" href="#">3</a></li>
                                         <li class="page-item">
                                             <a class="page-link" href="#" aria-label="Next">
                                                 <span aria-hidden="true"> <i class="fa fa-long-arrow-right"
                                                         aria-hidden="true"></i></span>
                                                 <span class="sr-only">Next</span>
                                             </a>
                                         </li>
                                     </ul>
                                 </div>
                             </section>
                         </div>--}}
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>

<div>


</div>
<style>
    .cart {
        position: relative;
        display: block;

        height: auto;
        overflow: hidden;
    }

    .cart .material-icons {
        position: relative;
        top: 4px;
        z-index: 1;
        font-size: 24px;

    }

    .cart .count {
        position: absolute;
        top: 3px;
        left: 23px;
        z-index: 2;
        font-size: 11px;
        border-radius: 50%;
        background: #000;
        width: 16px;
        height: 16px;
        line-height: 16px;
        display: block;
        text-align: center;
        color: white;
        font-family: "Roboto", sans-serif;
        font-weight: bold;
    }
    .btn-clr{
        color:#FF2E00;
        border:1px solid #FF2E00;
        background:#fff;
    }
    
    .ribbon{
  font-size:20px;
  position:relative;
  display:inline-block;
  margin:0em;
  text-align:center;
}
.text{
 display: inline-block;
    padding: 0.5em 1em;
    min-width: 10em;
    line-height: 1.2em;
    background: #FFD72A;
    position: relative;
}
.ribbon:after,.ribbon:before,
.text:before,.text:after,
.bold:before{
  content:'';
  position:absolute;
  border-style:solid;
}
.ribbon:before{
  top:0.3em; left:0.2em;
  width:100%; height:100%;
  border:none;
  background:#EBECED;
  z-index:-2;
}
.text:before{
  bottom:100%; left:0;
  border-width: .5em .7em 0 0;
  border-color: transparent #FC9544 transparent transparent;
}
.text:after{
  top:100%; right:0;
  border-width: .5em 2em 0 0;
  border-color: #FC9544 transparent transparent transparent;
}
.ribbon:after, .bold:before{
  top:0.5em;right:-2em;
  border-width: 1.1em 1em 1.1em 3em;
  border-color: #FECC30 transparent #FECC30 #FECC30;
  z-index:-1;
}
.bold:before{
  border-color: #EBECED transparent #EBECED #EBECED;
  top:0.7em;
  right:-2.3em;
}

.discount-label {
 padding:4px; 
 position:relative;
  float:left;

-webkit-border-radius:0 4px 0 4px;
-moz-border-radius:0 4px 0 4px;
border-radius:0 4px 4px 0;

}

.discount-label:after { 

    right: 100%; 
    border: solid transparent; content: " "; 
    height: 0; 
    width: 0; 
    position: absolute;
    border-color: rgba(136, 183, 213, 0);
     
    border-width: 20px; 
    top: 50%; 
    margin-top: -20px;} 

    .discount-label:before {
  content: '';
  z-index: 2;
  position: absolute;
  top: 42%;
  right: 100%;
  width: 7px;
  height: 7px;
  opacity: .95;
  background: #ffffff;
  border-radius: 7px;
  -webkit-box-shadow: inset .5px 0 rgba(0, 0, 0, 0.6);
  box-shadow: inset .5px 0 rgba(0, 0, 0, 0.6);

}


    .discount-label span {
      color:#fff;
  font-size:13px;
  font-weight:500;
text-align:center;
  

}
/*.red-1{ */
/*background: linear-gradient(to bottom, #5c3292 0%, #7e3794 100%);*/
/*}*/

/*.red-1:after{ */
/*border-right-color:#5c3292;*/
  
/*}*/
.red-1{ 
background: #003468;
}

.red-1:after{ 
border-right-color:#003468;
  
}

.range-slide {
    margin: 0rem 0rem 0rem;
}
/*.red-1{ */
/*background: #39b6ba;*/
/*}*/

/*.red-1:after{ */
/*border-right-color: #39b6ba;*/
  
/*}*/




</style>





  <!-- The Modal -->
  <div class="modal" id="myModal-apply">
    <div class="modal-dialog">
      <div class="modal-content">
      
        
       
        
        <!-- Modal body -->
        <div class="modal-body p-5">
       <h6 style="font-size:16px">Kindly talk to our counsellor for applying to this institute</h6> 
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer" style="padding:5px">
          <button type="button" class="btn btn-primary" data-dismiss="modal" style="font-size: 0.7rem;">OK</button>
        </div>
        
      </div>
    </div>
  </div>

  <!-- The Modal -->
  <div class="modal" id="myModal-apply-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background: #efefef">
      
        
       
        
        <!-- Modal body -->
        <div class="modal-body " style="padding:1rem 1rem">
               <div class="form-search form-search-1 form-search-style-02 form-home" data-animate="fadeInDown">
                    <form action="{{url('home_search')}}" name="myForm" onsubmit="return validateForm()">
                        @csrf
                        <div class="row align-items-end no-gutters">
                          
                            <div
                                class="col-xl-9 mb-4 mb-xl-0  bg-white position-relative rounded-right form-search-item">

                                <div class="input-group dropdown show" style="padding:5px 20px !important;">
                                    <input type="text" name="region"
                                           class="form-control form-control-mini border-0 px-0 bg-transparent"
                                           placeholder="Location / Name of Institue" required >


                                </div>
                            </div>
                            <div class="col-xl-3 button" style="padding-left:0% !important;">
                                <button type="submit"
                                        class="btn btn-icon-left btn-block"  data-toggle="modal" data-target="#myModal-apply-2" style="line-height: 1;background: none; boreder: 0px solid #fff; color: #FF2E00; font-weight: 600; margin-right: 0%; font-size: 15px;padding-left:0% !important;width:100%"><i class="fa fa-location-arrow" aria-hidden="true" style="margin-right: 5px; border: none; color: #FF2E00; font-size: 15px;"></i>Detect My location
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
        
      
        
      </div>
    </div>
  </div>


<!-- Modal -->
<div class="modal fade" id="myModal-apply-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="padding: 0.6rem 1rem;">
        <h5 class="modal-title" id="exampleModalCenterTitle">Detected Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
          <p style="color:#000">
       We got <strong>Loremm loremm  560000 amian</strong> as your location.If this is your location you can proceed.</p>
       
       <button class="btn btn-primary" style="font-size: 12px;">Yes,this is my location </button>
       
       <h2  style="border-bottom:1px solid #c4c4c4;line-height:0.1em; width:100%;margin-top:1rem"><span style="padding:0px 10px;font-size:16px;color:#918a8a;background:white">Or</span></h2>
       
       
       <form><input type="text" class="form-control" placeholder="Serch Location,City, Locality" style="margin-top: 2rem; background: #f0f0f0; margin-bottom: 1rem;"></form>
      </div>
 
    </div>
  </div>
</div>

<style>
    .starter .sidebar, .document .sidebar {
        max-height: 100%;
        width: 100%;
    }
    .form-home .col-xl-9, .form-home .col-xl-6 {
    box-shadow: 10px 10px 10px rgb(0 0 0 / 20%);
}
.inner-sec-body{
    
	height: 130px;

	overflow-y: scroll;

}
.inner-sec-body::-webkit-scrollbar-track
{

	background-color: #fff;
}

.inner-sec-body::-webkit-scrollbar
{
	width: 6px;
	background-color: #fff;
}

.inner-sec-body::-webkit-scrollbar-thumb
{
	background-color: #FF2E00;}
	.panel-collapse.collapse:not(.show) {
    display: block;
}
.range-slide input::placeholder{
  color:#575656 !important; 
  font-weight:500;
}
.range-slide input{
   
    font-size:15px;
}
 form .cancel {
    color: #fff !important;
    background: #D00C00 !important;
}
.range-slide{
text-align: center;}
/*.inner-sec-body{*/
/*    height:100px;*/
/*    overflow-y:scroll;*/
/*}*/
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


<script>
    (function () {

        function addSeparator(nStr) {
            nStr += '';
            var x = nStr.split(',');
            var x1 = x[0];
            var x2 = x.length > 1 ? ',' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

        function rangeInputChangeEventHandler(e) {
            var rangeGroup = $(this).attr('name'),
                minBtn = $(this).parent().children('.min'),
                maxBtn = $(this).parent().children('.max'),
                range_min = $(this).parent().children('.range_min'),
                range_max = $(this).parent().children('.range_max'),
                minVal = parseInt($(minBtn).val()),
                maxVal = parseInt($(maxBtn).val()),
                origin = $(this).context.className;

            if (origin === 'min' && minVal > maxVal - 5) {
                $(minBtn).val(maxVal - 5);
            }
            var minVal = parseInt($(minBtn).val());
            $(range_min).html(' ₹ ' + addSeparator(minVal * 1000));


            if (origin === 'max' && maxVal - 5 < minVal) {
                $(maxBtn).val(5 + minVal);
            }
            var maxVal = parseInt($(maxBtn).val());
            $(range_max).html(' ₹' + addSeparator(maxVal * 1000));
        }

        $('input[type="range"]').on('input', rangeInputChangeEventHandler);
    })();
</script>
<script>
    var sliderObjects = [];
    createSliderObjects();

    function plusDivs(obj, n) {
        var parentDiv = $(obj).parent();
        var matchedDiv;
        $.each(sliderObjects, function (i, item) {
            if ($(parentDiv[0]).attr('id') == $(item).attr('id')) {
                matchedDiv = item;
                return false;
            }
        });
        matchedDiv.slideIndex = matchedDiv.slideIndex + n;
        showDivs(matchedDiv, matchedDiv.slideIndex);
    }

    function createSliderObjects() {
        var sliderDivs = $('.slider');
        $.each(sliderDivs, function (i, item) {
            var obj = {};
            obj.id = $(item).attr('id');
            obj.divContent = item;
            obj.slideIndex = 1;
            obj.slideContents = $(item).find('.mySlides');
            showDivs(obj, 1);
            sliderObjects.push(obj);
        });
    }

    function showDivs(divObject, n) {

        var i;
        if (n > divObject.slideContents.length) {
            divObject.slideIndex = 1
        }
        if (n < 1) {
            divObject.slideIndex = divObject.slideContents.length
        }
        for (i = 0; i < divObject.slideContents.length; i++) {
            divObject.slideContents[i].style.display = "none";
        }
        divObject.slideContents[divObject.slideIndex - 1].style.display = "block";

    }
</script>


<!-- script for range slider of kilometeer -->

<script>
    document.querySelectorAll(".__range-step").forEach(function (ctrl) {
        var el = ctrl.querySelector('input');
        var output = ctrl.querySelector('output');
        var newPoint, newPlace, offset;
        el.oninput = function () {
            // colorize step options
            ctrl.querySelectorAll("option").forEach(function (opt) {
                if (opt.value <= el.valueAsNumber)
                    opt.style.backgroundColor = '#FF4005';
                else
                    opt.style.backgroundColor = '';
            });
            // colorize before and after
            var valPercent = (el.valueAsNumber - parseInt(el.min)) / (parseInt(el.max) - parseInt(el
                .min));
            var style = 'background-image: -webkit-gradient(linear, 0% 0%, 100% 0%, color-stop(' +
                valPercent + ', #FF4005), color-stop(' +
                valPercent + ', #aaa));';
            el.style = style;

            // Popup
            if ((' ' + ctrl.className + ' ').indexOf(' ' + '__range-step-popup' + ' ') > -1) {
                var selectedOpt = ctrl.querySelector('option[value="' + el.value + '"]');
                output.innerText = selectedOpt.text;
                output.style.left = "50%";
                output.style.left = ((selectedOpt.offsetLeft + selectedOpt.offsetWidth / 2) - output
                    .offsetWidth / 2) + 'px';
            }
        };
        el.oninput();
    });

    window.onresize = function () {
        document.querySelectorAll(".__range").forEach(function (ctrl) {
            var el = ctrl.querySelector('input');
            el.oninput();
        });
    };
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js">
</script>
<script>
    (function ($) {
        "use strict";
        $(".trigger").keyup(function () {
            //alert("hi")

            // $("#submit").trigger("click");
        });
        $(".trigger").click(function () {
            //alert("hi2")
            //$("#submit").trigger("click");
        });

    })(jQuery)

</script>
<script>

    $(function () {
     
        
        
        $('.heart').click(function () {
             var e    =  $(this);
            var id   = $(this).attr('data-id');
            var type = "school";
            var datacol=$(this).attr('data-col');
          //  alert(datacol+"data-col");
             var heart=e.html();
 if(heart=='<i class="fa fa-heart-o" aria-hidden="true"></i>')
                                    {
                                                                    
                                                                                
                                                                                var status=2;
                                                                                var change=1;
                                                                              
                                                                     
                                  }
                             else
                             {
                                                                 
                                                                    
                                                                            var status=1;
                                                                            var change=-1;
                                                                         
                                }
                                         
    
          
           

            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'get_wishlist',
                data: {'id': id,'status':status, 'type': type, _token: '{{csrf_token()}}'},
                success: function (data) {
                   

                    if(data==2)
                    {
                          $(".wishlist_active").trigger("click");
                    }
                    else
                    {
                        var heart=e.html();
                   //  alert(heart)
                                          if(heart=='<i class="fa fa-heart-o" aria-hidden="true"></i>')
                                    {
                                                                    
                                                                                 e.html('<i class="fa fa-heart" aria-hidden="true"></i>');
                                                                                        e.addClass("liked");
                                                                                var status=2;
                                                                                var change=1;
                                                                               // alert("full")
                                                                     
                                  }
                             else
                             {
                                                                 
                                                                     e.html('<i class="fa fa-heart-o" aria-hidden="true"></i>');
                                                                                    e.removeClass("liked");
                                                                            var status=1;
                                                                            var change=-1;
                                                                            // alert("empty")
                                }
                                         
                     
               var count=$("#wishlist_count_data").val();
                                        //   alert(count+"count");
                                        //   alert(change+"change")
                                            var orgcount=parseInt(count)+parseInt(change);
                                            //alert(orgcount+"orgcount")
                                             $("#wishlist_count_data").val(orgcount);
                                            $("#wishlist_count").html(orgcount);
                    }
                    //  $("#sub_cat").html(data);
                }
            });
        });
    });
</script>

<script type = "text/javascript">
            function fun() {
          alert ("kindly talk to our counsellor for applying to this institute");
            }
      </script>    
<script>
 $( ".login_ask" ).click(function() {
      $(".wishlist_active").trigger("click");
 });
    $( ".sign-up-btnn" ).click(function() {
      
 
        if (document.getElementById('phone_noo').value.length < 10 || document.getElementById('phone_noo').value.length > 10 ) {

             alert("Please Enter Valid User Phone Number"); 
              return false;
         }
         
      
      else{
             return true 
         }

});


</script>

<script>
function showDiv() {
  var x = document.getElementById("welcomeDiv");
  if (x.style.display === "block") {
    x.style.display = "none";
     event.target.innerText = 'Filter'
    
  } else {
    x.style.display = "block";
    event.target.innerText = 'Cancel'
  }
}


</script>


@endsection
@section('footer')
    @parent
@endsection
@section('footerscript')
    @parent
@endsection

@extends('client.websitelayout')
@section('headerscript')
    @parent
@endsection
@section('header')
    @parent
@endsection
@section('content')

    <section id="section-01" class="home-main-intro blog-hero">
        <div class="home-main-intro-container">
            <div class="container">

                <?php
                $mainBlog = $blogs1;
                ?>


                <img src="{{url('public/images/blogs/'.$mainBlog["image"])}}">
            </div>
        </div>
    </section>
    </div>

    <div class="content  animation-section">

        <!--<div class="leaf">-->
        <!--    <div><img src="{{url('public/images/Icons/Ic-1.png')}}" height="75px" width="75px"></img></div>-->
        <!--    <div><img src="{{url('public/images/Icons/Ic-2.png')}}" height="75px" width="75px"></img></div>-->
        <!--    <div><img src="{{url('public/images/Icons/Ic-3.png')}}" height="75px" width="75px"></img></div>-->
        <!--    <div><img src="{{url('public/images/Icons/Ic-4.png')}}" height="75px" width="75px"></img></div>-->
        <!--    <div><img src="{{url('public/images/Icons/Ic-5.png')}}" height="45px" width="35px"></img></div>-->
        <!--    <div><img src="{{url('public/images/Icons/Ic-6.png')}}" height="75px" width="75px"></img></div>-->
        <!--    <div><img src="{{url('public/images/Icons/Ic-7.png')}}" height="75px" width="75px"></img></div>-->
        <!--    <div><img src="{{url('public/images/Icons/Ic-8.png')}}" height="75px" width="75px"></img></div>-->
        <!--    <div><img src="{{url('public/images/Icons/ic-9.png')}}" height="75px" width="75px"></img></div>-->
        <!--    <div><img src="{{url('public/images/Icons/ic-10.png')}}" height="75px" width="75px"></img></div>-->
        <!--    <div><img src="{{url('public/images/Icons/ic-11.png')}}" height="75px" width="75px"></img></div>-->
        <!--    <div><img src="{{url('public/images/Icons/ic-12.png')}}" height="75px" width="75px"></img></div>-->
        <!--    <div><img src="{{url('public/images/Icons/ic-13.png')}}" height="75px" width="75px"></img></div>-->
        <!--    <div><img src="{{url('public/images/Icons/ic-15.png')}}" height="75px" width="75px"></img></div>-->

        <!--</div>-->
        <section class="blog-inner mt-5">
            <div class="container">

                <h3>{{$mainBlog["heading"]}}</h3>
                <div class="sub-para">
                    <p>by {{$mainBlog["author"]}} </p>
                    <p>{{date('d-m-Y',strtotime($mainBlog->date))}}</p>
                </div>

                <p class="para-blog">
                {{$mainBlog["key_description"]}}
                </p>

                <a href="{{url('blog_single')}}?id={{$mainBlog['id']}}" class="read-full-text">Read Full <i
                        class="fa fa-long-arrow-right"></i></a>
            </div>
        </section>

<section class="mt-5 bolg-boxes">
            <div class="container">
                <div class="wrapper grid row">
                    
                    
                         <?php
                        $leftBlogs = [];
                        $rightBlogs = [];
                        foreach ($blogs as $key => $blog) {
                            if ($key > 0) {
                                if ($key % 2 == 0) {
                                    $rightBlogs[] = $blog;
                                } 
                                else {
                                    $rightBlogs[] = $blog;
                                }
                            }
                        }
                        ?>
 
                 
                        <?php 
                        $i=1;
                        foreach ($blogs as $key => $blog){
                       

    ?>


          <div class="grid left col-md-6">
                        <div class="box git11">
                            <div class="card " data-animate="zoomIn11">
                                <a href="{{url('blog_single')}}?id={{$blog['id']}}" class="hover-scale">
                                    <img src="{{url('public/images/blogs/'.$blog["image"])}}" alt="Image"
                                         class="card-img-top image">
                                </a>
                                <div class="card-body ">
                                    <h5 class="card-title lh-13 letter-spacing-25">
                                        <a href="{{url('blog_single')}}?id={{$blog['id']}}"
                                           class="link-hover-dark-primary text-capitalize">
                                            {{$blog["heading"]}}</a>
                                    </h5>
                                    <ul class="list-inline blog-line">
                                        <li class="list-inline-item">
                                            <a href="#" class="link-hover-dark-primary">by {{$blog["author"]}}</a>
                                        </li>
                                        <li class="list-inline-item mr-0">
                                            <span class=" ml-5">{{date('d-m-Y',strtotime($blog->date))}} </span>
                                        </li>
                                    </ul>
                                    <p>{{$blog["key_description"]}}...</p>

                                    <div class="blog-box d-flex justify-content-between">
                                        <p>10 Min Read </p>
                                        <a href="{{url('blog_single')}}?id={{$blog['id']}}" class="read-full-text">Read
                                            Full <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         </div>  
                      
<?php } ?>
                   
         </div>

            </div>
         
        </section>             

                        

                        <!--<div class="box git">-->
                        <!--    <div class="card " data-animate="zoomIn">-->
                        <!--        <a href="{{url('blog_single')}}?id={{$blog['id']}}" class="hover-scale">-->
                        <!--            <img src="{{url('public/images/blogs/'.$blog["image"])}}" alt="Image"-->
                        <!--                 class="card-img-top image">-->
                        <!--        </a>-->
                        <!--        <div class="card-body ">-->
                        <!--            <h5 class="card-title lh-13 letter-spacing-25">-->
                        <!--                <a href="{{url('blog_single')}}?id={{$blog['id']}}"-->
                        <!--                   class="link-hover-dark-primary text-capitalize">-->
                        <!--                    {{$blog["heading"]}}</a>-->
                        <!--            </h5>-->
                        <!--            <ul class="list-inline blog-line">-->
                        <!--                <li class="list-inline-item">-->
                        <!--                    <a href="#" class="link-hover-dark-primary">by {{$blog["author"]}}</a>-->
                        <!--                </li>-->
                        <!--                <li class="list-inline-item mr-0">-->
                        <!--                    <span class=" ml-5">{{date('d-m-Y',strtotime($blog->date))}} </span>-->
                        <!--                </li>-->
                        <!--            </ul>-->
                        <!--            <p> {!!html_entity_decode(mb_strimwidth($blog["content"],0,50) )!!}...</p>-->

                        <!--            <div class="blog-box d-flex justify-content-between">-->
                        <!--                <p>10 Min Read </p>-->
                        <!--                <a href="{{url('blog_single')}}?id={{$blog['id']}}" class="read-full-text">Read-->
                        <!--                    Full <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->

                       

              
        
        
        
        {{-- <section class="pagination text-center page-section">
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
         </section>--}}
    </div>

    <br><br>

@endsection
@section('footer')
    @parent
@endsection
@section('footerscript')
    @parent
@endsection

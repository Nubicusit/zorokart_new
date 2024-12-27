@extends('client.websitelayout')
@section('headerscript')
@parent
@endsection
@section('header')
@parent
@endsection
@section('content')


@if(Session::has('status'))
<script>
swal("", "{!!Session::get('status') !!}", "success")
</script>
@endif
            
            <section id="section-01" class="home-main-intro blog-hero blog-single-hero">
                <div class="home-main-intro-container">
                    <div class="container">
                        <div class="row">
                            @foreach($blogs as $b)
                            <div class="col-md-6" data-animate="fadeInLeft"> <img
                            src="{{url('public/images/blogs/' .$b->image)}}" ></div>
                            <div class="col-md-6 text-section " data-animate="fadeInRight">
                                <h3>{{$b->heading}}</h3>
                                <div class="sub-para">
                                    <p>by {{$b->author}}</p>
                                    <p>{{date('d-m-Y',strtotime($b->date))}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </section>

        </div>

        <div class="content  animation-section">

            <!--<div class="leaf">-->
            <!--<div> <img src="{{url('public/images/Icons/Ic-1.png')}}" height="75px" width="75px"></img></div>-->
            <!--    <div> <img src="{{url('public/images/Icons/Ic-2.png')}}" height="75px" width="75px"></img></div>-->
            <!--    <div> <img src="{{url('public/images/Icons/Ic-3.png')}}" height="75px" width="75px"></img></div>-->
            <!--    <div> <img src="{{url('public/images/Icons/Ic-4.png')}}" height="75px" width="75px"></img></div>-->
            <!--    <div> <img src="{{url('public/images/Icons/Ic-5.png')}}" height="45px" width="35px"></img></div>-->
            <!--    <div> <img src="{{url('public/images/Icons/Ic-6.png')}}" height="75px" width="75px"></img></div>-->
            <!--    <div> <img src="{{url('public/images/Icons/Ic-7.png')}}" height="75px" width="75px"></img></div>-->
            <!--    <div> <img src="{{url('public/images/Icons/Ic-8.png')}}" height="75px" width="75px"></img></div>-->
            <!--    <div> <img src="{{url('public/images/Icons/ic-9.png')}}" height="75px" width="75px"></img></div>-->
            <!--    <div> <img src="{{url('public/images/Icons/ic-10.png')}}" height="75px" width="75px"></img></div>-->
            <!--    <div> <img src="{{url('public/images/Icons/ic-11.png')}}" height="75px" width="75px"></img></div>-->
            <!--    <div> <img src="{{url('public/images/Icons/ic-12.png')}}" height="75px" width="75px"></img></div>-->
            <!--    <div> <img src="{{url('public/images/Icons/ic-13.png')}}" height="75px" width="75px"></img></div>-->
               
            <!--    <div> <img src="{{url('public/images/Icons/ic-15.png')}}" height="75px" width="75px"></img></div>-->


            <!--</div>-->
            <section class="blog-inner">
                <div class="container">

<pre style="white-space: break-spaces;">  {!!html_entity_decode($b->content )!!}</pre>


                    <!-- <p class="para-blog">To benefit our students’ community and other stakeholders, the following
                        write-up attempts to bring striking happen-ings across Indian Universities and Colleges lately.
                        To benefit our students’ community and other stakeholders, the following write-up attempts to
                        bring striking happen-ings across Indian Universities and Colleges lately.
                    </p>
                    <p class="para-blog">
                        To benefit our students’ community and other stakeholders, the following write-up attempts to
                        bring striking happen-ings across Indian Universities and Colleges lately.
                        To benefit our students’ community and other stakeholders, the following write-up attempts to
                        bring striking happen-ings across Indian Universities and Colleges lately.
                    </p>
                    <p class="para-blog">
                        To benefit our students’ community and other stakeholders, the following write-up attempts to
                        bring striking happen-ings across Indian Universities and Colleges lately.
                        To benefit our students’ community and other stakeholders, the following write-up attempts to
                        bring striking happen-ings across Indian Universities and Colleges lately.
                    </p>
                    <p class="para-blog">
                        To benefit our students’ community and other stakeholders, the following write-up attempts to
                        bring striking happen-ings across Indian Universities and Colleges lately.
                        To benefit our students’ community and other stakeholders, the following write-up attempts to
                        bring striking happen-ings across Indian Universities and Colleges lately.
                    </p> -->


                </div>
            </section>
            @endforeach

            <section class="form-blog" data-animate="fadeInUp">
                <div class="container">
                    <h3>Leave a Reply</h3>
                    <form method="post" action="{{url('blogsreply_store')}}"  enctype="multipart/form-data">
                @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label>Your Name<sup>*</sup> </label><br>
                                <input type="text" name="name" required>
                            </div>
                            <div class="col-md-4">
                                <label>Your Email<sup>*</sup> </label><br>
                                <input type="email" name="mail" required>
                            </div>
                            <div class="col-md-4">
                                <label>Your Website</label><br>
                                <input type="text" name="website" >
                            </div>
                            <div class="col-md-12">
                                <label>Message<sup>*</sup> </label>
                                <textarea class="form-control" rows="4" name="message" ></textarea>
                            </div>
                        </div>
                        <button class="btn btn-sb" type="submit">Comments</button>
                    </form>
                </div>
            </section>


             <section id="section-05" class="pt-11 pb-11 tips-article">
                <div class="container">
                    <div class="d-flex align-items-center mb-7 flex-wrap flex-sm-nowrap">
                        <h2 class="mb-3 mb-sm-0">
                            <span class="see-text">Recent Posts</span>

                        </h2>

                    </div>
                    <div class="row">
                    @foreach($blogdata as $bd)
                        <div class="col-md-4 mb-4" data-animate="zoomIn">
                            <div class="card border-0">
                                <a href="{{url('blog_single')}}?id={{$bd['id']}}" class="hover-scale">
                                    <img src="{{url('public/images/blogs/' .$bd->image)}}" alt="product 1" class="card-img-top image">
                                </a>
                                <div class="card-body ">

                                    <h5 class="card-title lh-13 letter-spacing-25">
                                        <a href="{{url('blog_single')}}?id={{$bd['id']}}"
                                            class="link-hover-dark-primary text-capitalize">
                                            {{$bd->heading}}</a>
                                    </h5>
                                    <ul class="list-inline blog-line">
                                        <li class="list-inline-item">
                                            <a href="{{url('blog_single')}}?id={{$bd['id']}}" class="link-hover-dark-primary">by {{$bd->author}}</a>
                                        </li>
                                        <li class="list-inline-item mr-0">
                                            <span class=" ml-5">{{date('d-m-Y',strtotime($bd->date))}} </span>
                                        </li>

                                    </ul>
                               <div class="text-box" data-maxlength="200"> 
                                    <p>
                                        {{$bd->key_description}}
                                    <!--{!!html_entity_decode(mb_strimwidth($bd["content"],0,100) )!!}...-->
                                   </p>
                                </div>
                                    <div class="blog-box d-flex justify-content-between">
                                        <p>10 Min Read </p>
                                        <a href="{{url('blog_single')}}?id={{$bd['id']}}" class="read-full-text">Read Full <i class="fa fa-long-arrow-right"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>
        </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>  
<script>
    $(function () {
    
    var maxL = 200;
    
    $('.text-box').each(function () {
        
        var text = $(this).text();
        if(text.length > maxL) {
            
            var begin = text.substr(0, maxL),
                end = text.substr(maxL);

            $(this).html(begin)
                .append($('<div class="hidden" />').html(end));
                
            
        }
        
        
    });
            
    $(document).on('click', '.readmore', function () {
				// $(this).next('.readmore').fadeOut("400");
        $(this).next('.hidden').slideToggle(400);
    })        
    
    
})
</script>
@endsection
@section('footer')
@parent
@endsection
@section('footerscript')



@parent
@endsection
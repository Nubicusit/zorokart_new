@extends('client.websitelayout')
@section('headerscript')
@parent
@endsection
@section('header')
@parent
@endsection
@section('content')

 
                <section id="section-01" class="home-main-intro career-page">
                <div class="home-main-intro-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6" data-animate="fadeInLeft">
                                <img src="{{url('public/images/careers.png')}}">
                            </div>
                            <div class="col-md-6" data-animate="fadeInRight">
                                <h2 class="heade-about">About us</h2>
                                <h3>SchoolsPe</h3>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="content mt-5 pt-5 animation-section">

            <div class="leaf">
                <div> <img src="{{url('public/images/Icons/Ic-1.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-2.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-3.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-4.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-5.png')}}" height="45px" width="35px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-6.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-7.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/Ic-8.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/ic-9.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/ic-10.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/ic-11.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/ic-12.png')}}" height="75px" width="75px"></img></div>
                <div> <img src="{{url('public/images/Icons/ic-13.png')}}" height="75px" width="75px"></img></div>
               
                <div> <img src="{{url('public/images/Icons/ic-15.png')}}" height="75px" width="75px"></img></div>

            </div>

            <section class=" about-home-inner ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 left-img-abt"><img src="{{url('public/images/abt-top.png')}}"></div>
                        <div class="col-md-7 left-abt-text">
                            <h2 class="heade-about">About Us </h2>
                            <p> <span>SchoolsPe</span> is the premier destination for student admissions across all disciplines, from pre-university to business school. We offer a convenient platform for educational institutions and the student-parent community to smoothen the admission process.
</p><p>  
As the go-to resource for all admission-related needs, we provide a wide range of institution options, expert admission counseling, and a streamlined 3-click application process for confirmed admissions at our partnered institutions. Additionally, our post-admission services and other activities add valuable support to students' journey towards a successful career.
</p> <p> 
Our goal is to help educational institutions effectively communicate their unique strengths and offerings to potential students, and to empower institutions to manage and update their own information, preventing miscommunication and ensuring timely updates. Institutions can also work with our team to include any specific admission filtering processes. We are dedicated to playing a small but meaningful role in providing quality education to the next generation of leaders in our country.</p>
                            <!-- <button class="btn btn-sb"> Read More</button> -->
                        </div>


                    </div>
                </div>

            </section>
            <section id="section-02" class=" feature-destination pt-85 abt-inner-cont mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 left-text-we">
                            <h2 class="heade-about">We Care</h2>
                            <p class="we-para">At SchoolsPe, we are the trusted source for reliable course, college, and career guidance. In addition, we offer comprehensive post-admission support to help students and parents navigate the enrollment process with ease, allowing students to focus on their studies.
<br>We understand the importance of making informed decisions when it comes to education and career paths. That's why we consult with industry experts and guides to ensure that our advice is always accurate and up-to-date. Our goal is to be a trusted advisor and guide for all students, helping them achieve their full potential.
<br>By providing accurate and reliable guidance and support, SchoolsPe is the go-to destination for students and parents to make the best decisions for their education and career aspirations.
</p>
                            <div id="accordion" class="myaccordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button
                                                class="d-flex align-items-center justify-content-between btn btn-link"
                                                data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <h3> 1. Mission</h3>
                                                <span class="fa-stack fa-sm">
                                                    <i class="fa fa-angle-up"></i>
                                                </span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>At SchoolsPe, our mission is to level the playing field in education by offering equal opportunities and access to all areas of study. We strive to create a diverse and inclusive environment that empowers individuals to reach their full potential through education.<br>
                                            As a democratizing force in education, we believe that every student should have the same chance to succeed regardless of their background or circumstances. By providing equal access to all streams of learning, we aim to break down barriers and create a more equitable educational landscape.<br>
                                            Our goal is to empower individuals to make the most of their education and achieve their full potential. We believe that education is the key to unlocking individual potential and creating a more just and prosperous society. By providing equal opportunities and access to education, we are working to create a brighter future for all.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button
                                                class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                <h3> 2. Vision</h3>
                                                <span class="fa-stack fa-2x">
                                                    <i class="fa fa-angle-right"></i>
                                                </span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>At SchoolsPe, our vision is to become the ultimate companion for individuals between the ages of 16 and 24. We aim to foster a sense of community and belonging while providing the necessary tools and resources for personal and professional growth. We strive to be a driving force in creating a prosperous and inclusive society across all fields by providing the right guidance and support to the youth. Our goal is to help them navigate this critical stage in their lives and achieve their full potential.<br>
                                            Our company is dedicated to creating a brighter future for all by providing the guidance, resources and support needed for personal and professional growth. We strive to be an inclusive and supportive community for all individuals between the ages of 16 and 24.

</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button
                                                class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                                data-toggle="collapse" data-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                <h3> 3. Values</h3>
                                                <span class="fa-stack fa-2x">
                                                    <i class="fa fa-angle-right"></i>
                                                </span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Integrity, Loyalty, Honesty, Trust and Accountability are our core values </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="left-text-we-inner"><img src="{{url('public/images/pencil.png')}}">
                                <div class="button-sec">
                                    <button class="button-sec-btn" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne"><img
                                            src="{{url('public/images/im-1.png')}}"><span>
                                            Mission
                                        </span></button>
                                    <button class="button-sec-btn" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        <img src="{{url('public/images/im-2.png')}}"><span>
                                             Vision
                                        </span></button>
                                    <button class="button-sec-btn" data-toggle="collapse" data-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree"><img
                                            src="{{url('public/images/im-3.png')}}"><span>
                                            Values
                                        </span></button></div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!--<section id="section-02" class=" feature-destination pt-85 abt-inner-content">-->
            <!--    <div class="container">-->
            <!--        <div class="">-->
            <!--            <h2 class="mb-0">-->
            <!--                <span class="see-text">Our Team-->
            <!--                </span>-->

            <!--            </h2>-->
            <!--            <p class="abt-text">We love what we do and we do it with passion. We value the experimentation-->
            <!--                of the message and smart incentives.</p>-->
            <!--        </div>-->
            <!--        <div class="row">-->
            <!--            <div class="col-md-3"><img src="{{url('public/images/abt-1 (1).png')}}">-->
            <!--                <h3>Chili Mili</h3>-->
            <!--                <p>CEO & Founder</p>-->
            <!--            </div>-->
            <!--            <div class="col-md-3"><img src="{{url('public/images/abt-2.png')}}">-->
            <!--                <h3>Chili Mili</h3>-->
            <!--                <p>CEO & Founder</p>-->
            <!--            </div>-->
            <!--            <div class="col-md-3"><img src="{{url('public/images/abt-4.png')}}">-->
            <!--                <h3>Chili Mili</h3>-->
            <!--                <p>CEO & Founder</p>-->
            <!--            </div>-->
            <!--            <div class="col-md-3"><img src="{{url('public/images/abt-5.png')}}">-->
            <!--                <h3>Chili Mili</h3>-->
            <!--                <p>CEO & Founder</p>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->
        </div>

        <br><br>

        


        <div>

            
@endsection
@section('footer')
@parent
@endsection
@section('footerscript')

@parent

@endsection
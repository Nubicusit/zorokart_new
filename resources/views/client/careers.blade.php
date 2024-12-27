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
                                <h2 class="heade-about">Join Our Team At</h2>
                                <h3>SchoolsPE</h3>
                                <a class="btn btn-sb" href="#jobs"> Join Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="content  animation-section">

            <div class="leaf leaf-careers">
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
            <section class=" about-home-inner">

                <div class="container">
                    <div class="row" data-animate="fadeInDown" id="jobs">

                        <div class="col-md-12 left-abt-text">
                            <h2 class="heade-about">Job Openings</h2>

                            <button class="btn btn-sb  job-av">10 Jobs Available</button>
                        </div>

                        <div class="col-md-12 left-abt-text carrer-form mt-5">

                            <form>
                                <div class="row align-items-end no-gutters">


                                    <div class="col-xl-12 mb-4 mb-xl-0  ">
                                        <input id="some-id" class="textfield__input" required>
                                        <label for="some-id" class="textfield__label textfield__label--required">Search
                                            Jobs....<i class="fa fa-search" aria-hidden="true"></i></label>
                                    </div>

                                </div>
                                <div class="row no-gutters mt-5 bottom-form-ca">


                                    <div class="col-xl-2 mb-4 mb-xl-0  ">
                                        <div class="selectdiv ">
                                            <label>
                                                <select>
                                                    <option selected> Date Posted </option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Last long option</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 mb-4 mb-xl-0  ">
                                        <div class="selectdiv ">
                                            <label>
                                                <select>
                                                    <option selected>Department </option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Last long option</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 mb-4 mb-xl-0  ">
                                        <div class="selectdiv ">
                                            <label>
                                                <select>
                                                    <option selected>Job Type</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Last long option</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 mb-4 mb-xl-0  ">
                                        <div class="selectdiv ">
                                            <label>
                                                <select>
                                                    <option selected> Location</option>
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Last long option</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 mb-4 mb-xl-0 last-row-cr  ">
                                        <lable class="remote-label">Remote Only</lable>
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>

                                </div>



                            </form>

                        </div>


                    </div>

                    <div class="row boxes-bottom">
                        <div class="col-md-4">
                            <div class="box" data-animate="zoomIn">
                                <h5>Business Development
                                    Representative</h5>
                                <p>Part time / Full time - contract</p>
                                <button class="btn btn-sb" data-toggle="modal" data-target="#myModal-app">Apply Now</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box" data-animate="zoomIn">
                                <h5>Business Development
                                    Representative</h5>
                                <p>Part time / Full time - contract</p>
                                <button class="btn btn-sb" data-toggle="modal" data-target="#myModal-app">Apply Now</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box" data-animate="zoomIn">
                                <h5>Business Development
                                    Representative</h5>
                                <p>Part time / Full time - contract</p>
                                <button class="btn btn-sb" data-toggle="modal" data-target="#myModal-app">Apply Now</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box" data-animate="zoomIn">
                                <h5>Business Development
                                    Representative</h5>
                                <p>Part time / Full time - contract</p>
                                <button class="btn btn-sb" data-toggle="modal" data-target="#myModal-app">Apply Now</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box" data-animate="zoomIn">
                                <h5>Business Development
                                    Representative</h5>
                                <p>Part time / Full time - contract</p>
                                <button class="btn btn-sb" data-toggle="modal" data-target="#myModal-app">Apply Now</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box" data-animate="zoomIn">
                                <h5>Business Development
                                    Representative </h5>
                                <p>Part time / Full time - contract</p>
                                <button class="btn btn-sb" data-toggle="modal" data-target="#myModal-app">Apply Now</button>
                            </div>
                        </div>

                        <div class="col-md-12 btn-section">
                            <a href="#" class="view-all btn">View all openings</a>
                        </div>
                    </div>


                </div>

            </section>

        </div>






        <br><br>

      
            <!--+++++++++++++++++++++++++++++++ modal for join us form +++++++++++++++++++++++++++++++-->

            <!-- The Modal -->
            <div class="modal fade  careers-modal" id="myModal-app">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">


                        <!-- Modal body -->
                        <div class="modal-body">
                            <h5>Business Development Representative</h5>
                            <p>Job Detail</p>

                            <form>
                                <h4>Complete The Form</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Type your Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Type your Email Id</label>
                                        <input type="email" class="form-control">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Type your Mobile No.</label>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="col-md-6">

                                        <label>Uplaod your resume</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Why you choose this Business Development?</label>
                                        <textarea class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-sb mt-5">Apply Now</button>
                            </form>
                        </div>



                    </div>
                </div>
            </div>



           

@endsection
@section('footer')
@parent
@endsection
@section('footerscript')
@parent
@endsection
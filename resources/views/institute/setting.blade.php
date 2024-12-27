@extends('institute.layouts.master')
@section('content')

       <div class="contents">

            <div class="container-fluid">
                <div class="social-dash-wrap">
                    <div class="col-xxl-8 mb-25 p-5">

                        <div class="card border-0 setting-card">
                         
                          <h3>Account setting</h3>
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-xxl-6 col-lg-8 col-sm-10">
                                        <div class="edit-profile__body mx-lg-20">
                                            <form>
                                                <div class="form-group mb-20">
                                                    <label for="name1">username</label>
                                                    <input type="text" class="form-control" id="name1" placeholder="Duran Clayton">
                                                   
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label for="email45">email</label>
                                                    <input type="email" class="form-control" id="email45" placeholder="Contact@example.com">
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5 close-acc">
                                    <div class="col-xxl-6 col-lg-8 col-sm-10">
                                        <div class="d-flex justify-content-between mt-1 align-items-center flex-wrap">
                                            <div class="text-capitalize py-10">
                                                <h6>close account</h6>
                                                <span class="fs-13 color-light fw-400">Delete your account and
                                                    account
                                                    data</span>
                                            </div>
                                            <div class="my-sm-0 my-10 py-10">



                                                <button class="btn btn-primary btn-default btn-squared fw-400 text-capitalize">close account
                                                </button>





                                            </div>
                                        </div>
                                        <div class="button-group d-flex flex-wrap pt-35 mb-35">



                                            <button class="btn btn-primary btn-default btn-squared mr-15 text-capitalize">Save Changes
                                            </button>








                                            <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize">cancel
                                            </button>





                                        </div>
                                    </div>
                                </div>
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

  @endsection

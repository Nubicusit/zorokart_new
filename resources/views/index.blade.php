<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZEROKART</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{url('public/zerokart/style.css')}}">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="flexAll">
                        <div class="logo">
                            <img src="{{url('public/zerokart/Assets/Img/logo-01.svg')}}" alt="">
                        </div>
                        <div class="search-bar">
                            <i class="bi-search"></i>
                            <input type="text" placeholder="Search...">
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="flexAll">
                        <div class="dropdown">
                            <button><i class="bi-person-circle"></i> Login <i class="bi-chevron-down"></i></button>
                            <div class="dropdown-menu">
                                <a href="#">Login</a>
                                <a href="#">Register</a>
                            </div>
                        </div>
                        <button class="cart"><i class="bi-cart3"></i> Cart</button>
                        <button class=""><i class="bi-shop-window"></i> Become a Seller</button>
                        <div class="menu-icon" onclick="openMenu()">☰</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="sidebar" class="sidebar">
        <button onclick="closeMenu()" class="close-btn">×</button>
        <p>Demo text for the side menu</p>
    </div>
    <div class="container-fluid">
         <section class="container brand-section">
        <div class="brand-container" id="brandContainer">

            <div class="brand-item sub-card">
                <div class="brand-logo"><img src="{{url('public/zerokart//Assets/Img/category girl.png')}}" alt="Brand 1"></div>
                <p class="brand-title">Brand 1</p>
                
            </div>
            <div class="brand-item">
                <div class="brand-logo"><img src="{{url('public/zerokart//Assets/Img/category kids.png')}}" alt="Brand 2"></div>
                <p class="brand-title">Brand 2</p>
            </div>
            <div class="brand-item">
                <div class="brand-logo"><img src="{{url('public/zerokart/Assets/Img/category man.png')}}" alt="Brand 3"></div>
                <p class="brand-title">Brand 3</p>
            </div>
            <div class="brand-item">
                <div class="brand-logo"><img src="{{url('public/zerokart/Assets/Img/category other.png')}}" alt="Brand 4"></div>
                <p class="brand-title">Brand 4</p>
            </div>
            <div class="brand-item">
                <div class="brand-logo"><img src="{{url('public/zerokart/Assets/Img/category Shoes.png')}}" alt="Brand 5"></div>
                <p class="brand-title">Brand 5</p>
            </div>
            <div class="brand-item">
                <div class="brand-logo"><img src="{{url('public/zerokart/Assets/Img/category kids.png')}}" alt="Brand 6"></div>
                <p class="brand-title">Brand 6</p>
            </div>
            <div class="brand-item">
                <div class="brand-logo"><img src="{{url('public/zerokart//Assets/Img/category other.png')}}" alt="Brand 7"></div>
                <p class="brand-title">Brand 7</p>
            </div>
            <div class="brand-item">
                <div class="brand-logo"><img src="{{url('public/zerokart/Assets/Img/category girl.png')}}" alt="Brand 8"></div>
                <p class="brand-title">Brand 8</p>
            </div>
        </div>
    </section>
        <div class="banner">
            <div class="slides">
                <img src="{{url('public/zerokart//Assets/Img/BANNER-01.jpg')}}" alt="Banner 1" class="slide active">
                <img src="{{url('public/zerokart//Assets/Img/BANNER-02.jpg')}}" alt="Banner 2" class="slide">
            </div>
        </div>
    </div>

    <section class="container my-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column">
                    <h2 class="font-weight-bold">Featured Now</h2>
                    <p>Discover the most trading products in Pixio</p>
                </div>
                <a href="#" class="btn btn-dark">See All</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-3 p-2">
                <div class="cont">
                    <div class="product-card">
                        <div class="product-card__image">
                            <div class="topAbsolute d-flex justify-content-between">
                                <div class="GetOff">Get 20% Off</div>
                                <div class="AddToFev">
                                    <i class="bi-heart"></i>
                                </div>
                            </div>
                            <img src="https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/2024/SEPTEMBER/28/RtF69kjx_3c8b0b753e564cc48dffdfac696b9a2e.jpg"
                                alt="Red Nike Shoes">
                        </div>
                        <div class="product-card__info">
                            <h2 class="product-card__title">Women Red & White Striped Crepe Top</h2>
                            <span class="price">₹ 199.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="cont">
                    <div class="product-card">
                        <div class="product-card__image">
                            <div class="topAbsolute d-flex justify-content-between">
                                <div class="AddToFev">
                                    <i class="bi-heart"></i>
                                </div>
                            </div>
                            <img src="https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/16269590/2021/11/27/0c241c4f-7019-468a-ad14-b324c62cc00f1637986240998HIGHLANDERMenGreySweatshirt1.jpg"
                                alt="Red Nike Shoes">
                        </div>
                        <div class="product-card__info">
                            <h2 class="product-card__title">Women Red & White Striped Crepe Top</h2>
                            <span class="price">₹ 199.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="cont">
                    <div class="product-card">
                        <div class="product-card__image">
                            <div class="topAbsolute d-flex justify-content-between">
                                <div class="AddToFev">
                                    <i class="bi-heart"></i>
                                </div>
                            </div>
                            <img src="https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/25928408/2023/11/18/eb44480c-84b6-4c14-9a27-6f506e5e6bc01700294377660LabelShauryaSanadhyaWomenKurtaSets1.jpg"
                                alt="Red Nike Shoes">
                        </div>
                        <div class="product-card__info">
                            <h2 class="product-card__title">Women Red & White Striped Crepe Top</h2>
                            <span class="price">₹ 199.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="cont">
                    <div class="product-card">
                        <div class="product-card__image">
                            <div class="topAbsolute d-flex justify-content-between">
                                <div class="AddToFev">
                                    <i class="bi-heart"></i>
                                </div>
                            </div>
                            <img src="https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/29345906/2024/5/3/4ce9f892-b085-476e-bbb8-c2814de598611714755640524Tops1.jpg"
                                alt="Red Nike Shoes">
                        </div>
                        <div class="product-card__info">
                            <h2 class="product-card__title">Women Red & White Striped Crepe Top</h2>
                            <span class="price">₹ 199.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

    <section class="container my-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column">
                    <h2 class="font-weight-bold">Most Popular products</h2>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-3 p-2">
                <div class="cont">
                    <div class="product-card">
                        <div class="product-card__image">
                            <div class="topAbsolute d-flex justify-content-between">
                                <div class="GetOff">Get 20% Off</div>
                                <div class="AddToFev">
                                    <i class="bi-heart"></i>
                                </div>
                            </div>
                            <img src="https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/2024/SEPTEMBER/28/RtF69kjx_3c8b0b753e564cc48dffdfac696b9a2e.jpg"
                                alt="Red Nike Shoes">
                        </div>
                        <div class="product-card__info">
                            <h2 class="product-card__title">Women Red & White Striped Crepe Top</h2>
                            <span class="price">₹ 199.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="cont">
                    <div class="product-card">
                        <div class="product-card__image">
                            <div class="topAbsolute d-flex justify-content-between">
                                <div class="AddToFev">
                                    <i class="bi-heart"></i>
                                </div>
                            </div>
                            <img src="https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/16269590/2021/11/27/0c241c4f-7019-468a-ad14-b324c62cc00f1637986240998HIGHLANDERMenGreySweatshirt1.jpg"
                                alt="Red Nike Shoes">
                        </div>
                        <div class="product-card__info">
                            <h2 class="product-card__title">Women Red & White Striped Crepe Top</h2>
                            <span class="price">₹ 199.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="cont">
                    <div class="product-card">
                        <div class="product-card__image">
                            <div class="topAbsolute d-flex justify-content-between">
                                <div class="AddToFev">
                                    <i class="bi-heart"></i>
                                </div>
                            </div>
                            <img src="https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/25928408/2023/11/18/eb44480c-84b6-4c14-9a27-6f506e5e6bc01700294377660LabelShauryaSanadhyaWomenKurtaSets1.jpg"
                                alt="Red Nike Shoes">
                        </div>
                        <div class="product-card__info">
                            <h2 class="product-card__title">Women Red & White Striped Crepe Top</h2>
                            <span class="price">₹ 199.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="cont">
                    <div class="product-card">
                        <div class="product-card__image">
                            <div class="topAbsolute d-flex justify-content-between">
                                <div class="AddToFev">
                                    <i class="bi-heart"></i>
                                </div>
                            </div>
                            <img src="https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/29345906/2024/5/3/4ce9f892-b085-476e-bbb8-c2814de598611714755640524Tops1.jpg"
                                alt="Red Nike Shoes">
                        </div>
                        <div class="product-card__info">
                            <h2 class="product-card__title">Women Red & White Striped Crepe Top</h2>
                            <span class="price">₹ 199.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="cont">
                    <div class="product-card">
                        <div class="product-card__image">
                            <div class="topAbsolute d-flex justify-content-between">
                                <div class="GetOff">Get 20% Off</div>
                                <div class="AddToFev">
                                    <i class="bi-heart"></i>
                                </div>
                            </div>
                            <img src="https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/2024/SEPTEMBER/28/RtF69kjx_3c8b0b753e564cc48dffdfac696b9a2e.jpg"
                                alt="Red Nike Shoes">
                        </div>
                        <div class="product-card__info">
                            <h2 class="product-card__title">Women Red & White Striped Crepe Top</h2>
                            <span class="price">₹ 199.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="cont">
                    <div class="product-card">
                        <div class="product-card__image">
                            <div class="topAbsolute d-flex justify-content-between">
                                <div class="AddToFev">
                                    <i class="bi-heart"></i>
                                </div>
                            </div>
                            <img src="https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/16269590/2021/11/27/0c241c4f-7019-468a-ad14-b324c62cc00f1637986240998HIGHLANDERMenGreySweatshirt1.jpg"
                                alt="Red Nike Shoes">
                        </div>
                        <div class="product-card__info">
                            <h2 class="product-card__title">Women Red & White Striped Crepe Top</h2>
                            <span class="price">₹ 199.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="cont">
                    <div class="product-card">
                        <div class="product-card__image">
                            <div class="topAbsolute d-flex justify-content-between">
                                <div class="AddToFev">
                                    <i class="bi-heart"></i>
                                </div>
                            </div>
                            <img src="https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/25928408/2023/11/18/eb44480c-84b6-4c14-9a27-6f506e5e6bc01700294377660LabelShauryaSanadhyaWomenKurtaSets1.jpg"
                                alt="Red Nike Shoes">
                        </div>
                        <div class="product-card__info">
                            <h2 class="product-card__title">Women Red & White Striped Crepe Top</h2>
                            <span class="price">₹ 199.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 p-2">
                <div class="cont">
                    <div class="product-card">
                        <div class="product-card__image">
                            <div class="topAbsolute d-flex justify-content-between">
                                <div class="AddToFev">
                                    <i class="bi-heart"></i>
                                </div>
                            </div>
                            <img src="https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/29345906/2024/5/3/4ce9f892-b085-476e-bbb8-c2814de598611714755640524Tops1.jpg"
                                alt="Red Nike Shoes">
                        </div>
                        <div class="product-card__info">
                            <h2 class="product-card__title">Women Red & White Striped Crepe Top</h2>
                            <span class="price">₹ 199.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center text-lg-start">
        <section class="footer-section">
            <div class="container footer-container">

                <div class="footer-column">
                    <h6>About</h6>
                    <hr />
                    <p><a href="#!">Contact Us About Us</a></p>
                    <p><a href="#!">Careers</a></p>
                    <p><a href="#!">Flipkart Stories Press Corporate information</a></p>
                </div>

                <div class="footer-column">
                    <h6>Group Companies</h6>
                    <hr />
                    <p><a href="#!">Myntra</a></p>
                    <p><a href="#!">Cleartrip</a></p>
                    <p><a href="#!">Shopsy</a></p>
                </div>

                <div class="footer-column">
                    <h6>Help</h6>
                    <hr />
                    <p><a href="#!">Payments</a></p>
                    <p><a href="#!">Shipping</a></p>
                    <p><a href="#!">Cancellation & Returns</a></p>
                    <p><a href="#!">FAQ</a></p>
                </div>

                <div class="footer-column">
                    <h6>Consumer Policy</h6>
                    <hr />
                    <p><a href="#!">Cancellation & Returns</a></p>
                    <p><a href="#!">Terms Of Use</a></p>
                    <p><a href="#!">Security</a></p>
                    <p><a href="#!">Privacy</a></p>
                    <p><a href="#!">Sitemap</a></p>
                    <p><a href="#!">Grievance Redressal EPR Compliance</a></p>
                </div>

                <div class="footer-column">
                    <h6>Registered Office Address</h6>
                    <hr />
                    <p><i class="fas fa-home"></i> Flipkart Internet Private Limited, Buildings Alyssa, Begonia & Cieve
                        Embassy Tech Village, Outer Ring Road, Devarabeesananalli Village, Bengaluru, 560103, Karnataka,
                        India</p>
                    <p><i class="fas fa-envelope"></i> CIN: U51100KA2012PTC066107</p>
                    <p><i class="fas fa-phone"></i> 044-4561478</p>
                    <p><i class="fas fa-print"></i> 044-67415800</p>
                </div>

            </div>
        </section>

        <div class="bottom-links">
            <a href="#!">Become a Seller</a>
            <a href="#!">Advertise</a>
            <a href="#!">Gift Cards</a>
            <a href="#!">Help Center</a>
            <span>© 2007-2024 this.com</span>
        </div>
    </footer>

    <script src="{{url('public/zerokart/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
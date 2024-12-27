<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZEROKART STEP 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="./Assets/Img/logo-01.svg" alt="Logo">
            <div class="d-flex align-items-end">
                <i class="p-0 bi-geo-alt"></i>
                <div class="d-flex flex-column locationArea">
                    <span class="spanLebal">Deliver to</span>
                    <span class="locationLabel">India</span>
                </div>
            </div>
        </div>

        <div class="search-bar">
            <select class="product-list">
                <option>All</option>
                <option>Category 1</option>
                <option>Category 2</option>
            </select>
            <input type="text" placeholder="Search...">
            <button class="search-button"><i class="bi-search"></i></button>
        </div>

        <div class="right-section">
            <div class="language">
                <img src="https://upload.wikimedia.org/wikipedia/en/4/41/Flag_of_India.svg" alt="">
                <select>
                    <option value="en">EN</option>
                    <option value="hi">Hindi</option>
                </select>
            </div>
            <div class="user-actions">
                <div class="flexAllIcon">
                    <div class="dropdown">
                        <button><i class="bi-person-circle"></i> Login <i class="bi-chevron-down"></i></button>
                        <div class="dropdown-menu">
                            <a href="#">Login</a>
                            <a href="#">Register</a>
                        </div>
                    </div>
                    <button class="cart"><i class="bi-cart3"></i> Cart</button>
                    <button class=""><i class="bi-shop-window"></i> Become a Seller</button>
                </div>
            </div>
        </div>
    </header>
    <div class="bottomHeader">
        <button class="all">All</button>
        <button>Today's Deals</button>
        <button>Customer Service</button>
        <button>Registry</button>
        <button>Gift Cards</button>
        <button>Sell</button>
    </div>

    <main>
        <div class="w-100 boxes">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="active carousel-item">
                        <img src="./Assets/Img/Banner.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./Assets/Img/Banner2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./Assets/Img/Banner3.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./Assets/Img/Banner4.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="w-100 textArea">
            <p>You are on amazon.com. You can also shop on Amazon India for millions of products with fast local
                delivery.</p>
            <a href="">Click here to go to ZEROKART.in</a>
        </div>
        <div class="row">
            <div class="col-sm-6 col-12 col-md-3">
                <div class="box">
                    <h5>Product 1</h5>
                    <div class="imgBox">
                        <img src="./Assets/Img/BoxIMG.jpg" alt="Product 1">
                    </div>
                    <div class="contentBox">
                        <a href="#" class="shop-now">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12 col-md-3">
                <div class="box">
                    <h5>Product 2</h5>
                    <div class="imgBox">
                        <img src="./Assets/Img/BoxIMG1.jpg" alt="Product 2">
                    </div>
                    <div class="contentBox">
                        <a href="#" class="shop-now">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12 col-md-3">
                <div class="box">
                    <h5>Product 3</h5>
                    <div class="imgBox">
                        <img src="./Assets/Img/BoxIMG1.jpg" alt="Product 3">
                    </div>
                    <div class="contentBox">
                        <a href="#" class="shop-now">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12 col-md-3">
                <div class="box">
                    <h5>Product 4</h5>
                    <div class="imgBox">
                        <img src="./Assets/Img/BoxIMG2.jpg" alt="Product 4">
                    </div>
                    <div class="contentBox">
                        <a href="#" class="shop-now">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-center text-lg-start">
        <section class="footer-section">
            <div class="container footer-container">

                <div class="footer-column">
                    <h6>About</h6>
                    <hr>
                    <p><a href="#!">Contact Us About Us</a></p>
                    <p><a href="#!">Careers</a></p>
                    <p><a href="#!">Flipkart Stories Press Corporate information</a></p>
                </div>

                <div class="footer-column">
                    <h6>Group Companies</h6>
                    <hr>
                    <p><a href="#!">Myntra</a></p>
                    <p><a href="#!">Cleartrip</a></p>
                    <p><a href="#!">Shopsy</a></p>
                </div>

                <div class="footer-column">
                    <h6>Help</h6>
                    <hr>
                    <p><a href="#!">Payments</a></p>
                    <p><a href="#!">Shipping</a></p>
                    <p><a href="#!">Cancellation &amp; Returns</a></p>
                    <p><a href="#!">FAQ</a></p>
                </div>

                <div class="footer-column">
                    <h6>Consumer Policy</h6>
                    <hr>
                    <p><a href="#!">Cancellation &amp; Returns</a></p>
                    <p><a href="#!">Terms Of Use</a></p>
                    <p><a href="#!">Security</a></p>
                    <p><a href="#!">Privacy</a></p>
                    <p><a href="#!">Sitemap</a></p>
                    <p><a href="#!">Grievance Redressal EPR Compliance</a></p>
                </div>

                <div class="footer-column">
                    <h6>Registered Office Address</h6>
                    <hr>
                    <p><i class="fa-home fas"></i> Flipkart Internet Private Limited, Buildings Alyssa, Begonia &amp;
                        Cieve
                        Embassy Tech Village, Outer Ring Road, Devarabeesananalli Village, Bengaluru, 560103, Karnataka,
                        India</p>
                    <p><i class="fa-envelope fas"></i> CIN: U51100KA2012PTC066107</p>
                    <p><i class="fa-phone fas"></i> 044-4561478</p>
                    <p><i class="fa-print fas"></i> 044-67415800</p>
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

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
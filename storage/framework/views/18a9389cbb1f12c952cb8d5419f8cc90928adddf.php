<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZEROKART STEP 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo e(url('public/zerokart/home/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('public/zerokart/home/app.css')); ?>">
</head>
<style>
    .carousel-inner
    {
      /* height:800px !important;   */
    }
</style>
<body>
    <header class="header">
        <div class="logo">
            <img src="<?php echo e(url('public/zerokart/home/Assets/Img/logo-01.svg')); ?>" alt="Logo">
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
     <?php echo $__env->yieldContent('content'); ?>
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

    <script src="<?php echo e(url('public/zerokart/home/script.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script><?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/layouts/app.blade.php ENDPATH**/ ?>
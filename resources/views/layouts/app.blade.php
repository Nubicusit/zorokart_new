<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZEROKART STEP 2</title>
    <script src="https://kit.fontawesome.com/29d1847fa7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('zerokart/home/style.css')}}">
    <link rel="stylesheet" href="{{ asset('zerokart/home/app.css')}}">
</head>
<style>
    .navbar{
        background-color: #ff5B00;
    }
    .custom-search{
        width: 500px;
    }
   @media (max-width: 768px) {
    .custom-search {
      width: 100%; /* Full width for mobile view */
    }
  }
  .container {
      /* position: relative; */
      overflow: hidden; 
      width: 100%;
      
    }
    .scroll-container {
      display: flex;
      transition: transform 0.3s ease;
      overflow-x: scroll;
      white-space: nowrap;
      scroll-behavior: smooth; /* Smooth scrolling */
    }

    /* Hide the scrollbar */
    .scroll-container::-webkit-scrollbar {
      display: none;
    }

    .category-item {
      display: inline-flex;
      flex-direction: column;
      align-items: center;
      margin: 20px; /* Increased gap between items */
      width: 120px; /* Increased width to avoid text overlap */
      text-align: center;
      white-space: nowrap; /* Prevent text from wrapping */
    }
    .category-item img {
      width: 70px;
      height: 70px;
      /* object-fit: cover; */
      border-radius: 50%;
    }
    .category-item p {
      margin-top: 10px; /* Space between the image and text */
      font-size: 14px;  /* Adjust font size if necessary */
    }
    .scroll-btn {
  position: absolute;
  top: 40%;
  transform: translateY(-50%);
  background: rgba(0, 0, 0, 0.2); /* Semi-transparent for better visibility */
  border: none;
  cursor: pointer;
  z-index: 5;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 18px;
  display: none;
}
#scroll-left {
  left: 0px;
  /* margin-left: -35px; */
}

#scroll-right {
  right: 0px;
  /* margin-right: -45px; */
}
@media (max-width: 768px) {
  .scroll-btn {
    display: none;
  }
}
.scroll-container {
  display: flex;
  overflow-x: auto;
  scroll-behavior: smooth;
  padding: 0px;
  padding-left: 10px;
  padding-right: 10px;
}

.category-item {
  margin-right: 10px;
  text-align: center;
}
.carousel-inner img {
    width: 100%;
    /* height: 500px; */
    object-fit: cover; /* Ensure the image covers the entire carousel */
}


/* fashion add and category */

/* Styling the container */
.fashion-container {
  padding: 15px;
}

/* Sidebar Styling (Left Column) */
.sidebar {
  background-color: #f9f9f9;
  padding: 1px;
  border-radius: 8px;
}

.sidebar h3 {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.fashion-item {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
}

.fashion-item img {
  width: 300px;
  height: 300px;
  margin-right: 15px;
  height: auto;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}
.fashion-item img:hover {
  transform: scale(1.05); /* Adds a zoom effect on hover */
}
.fashion-item p {
  margin: 0;
  font-weight: bold;
}

.fashion-item span {
  font-size: 0.9rem;
  color: #f39c12;
  font-weight: bold;
}

/* Banner Styling (Right Column) */
.fashionadd-banner {
  position: relative;
}

.fashionadd-banner-img {
  width: 100%;
  height: auto;
  border-radius: 8px;
}

.fashionadd-banner-text {
  position: absolute;
  top: 20%;
  left: 20px;
  color: #fff;
}

.fashionadd-banner-text h2 {
  font-size: 2rem;
  font-weight: bold;
  margin-bottom: 10px;
}

.fashionadd-banner-text p {
  font-size: 1rem;
  font-weight: light;
}

/* Make it responsive for mobile devices */
@media (max-width: 768px) {
  .fashionadd-banner-text h2 {
    font-size: 1.5rem;
  }

  .fashionadd-banner-text p {
    font-size: 0.9rem;
  }

  .sidebar h3 {
    font-size: 1.2rem;
  }

  .sidebar .row {
    justify-content: center; 
  }
  .sidebar .fashion-item {
    margin-bottom: 10px; 
  }
  .fashion-item img {
    width: 150px;
    height: auto;
  }

  .fashion-item p {
    font-size: 0.9rem;
  }

  .fashion-item span {
    font-size: 0.8rem;
  }
}
.image-container img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .image-container img:hover {
            transform: scale(1.05); /* Zoom effect on hover */
        }

        .image-container {
            margin-bottom: 1rem;
        }
</style>
<body>
    <!-- <header class="header">
        <div class="logo">
            <img src="{{asset('zerokart/home/Assets/Img/logo-01.svg')}}" alt="Logo">
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
    </div> -->
    <nav class="navbar navbar-light navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{asset('zerokart/home/Assets/Img/logo-01.svg')}}" alt="" width="120" height="50" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-white" aria-current="page" ><i class="p-0 bi-geo-alt"></i>&nbsp;Deliver to India</a>
                    <!-- <a class="nav-link active text-white" aria-current="page" ><i class="p-0 bi-geo-alt"></i>&nbsp;Deliver to India</a> -->

                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            all
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                            <li><button class="dropdown-item" type="button">Category 1</button></li>
                            <li><button class="dropdown-item" type="button">Category 2</button></li>
                        </ul>
                    </div>
                    <form class="d-flex">
                    <!-- <div class="dropdown">
                        <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            all
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                            <li><button class="dropdown-item" type="button">Category 1</button></li>
                            <li><button class="dropdown-item" type="button">Category 2</button></li>
                        </ul>
                    </div> -->
                        <input class="form-control me-2 custom-search" type="search" aria-label="Search">
                        <button class="btn text-white" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-white" type="button" id="dropdownLang" data-bs-toggle="dropdown" aria-expanded="false">
                            lang
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownLang">
                            <li><button class="dropdown-item" type="button">English</button></li>
                            <li><button class="dropdown-item" type="button">Hindi</button></li>
                        </ul>
                    </div>
                    <!-- <a class="nav-link text-white"><i class="fa-solid fa-circle-user fa-xl" style="color: #ffffff;"></i>&nbsp;Login</a> -->
                     <div class="dropdown">
                        <button class="btn dropdown-toggle text-white" type="button" id="dropdownLog" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-circle-user fa-xl" style="color: #ffffff;"></i>&nbsp;Login
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownLog">
                            <li><button class="dropdown-item" type="button">Login</button></li>
                            <li><button class="dropdown-item" type="button">Register</button></li>
                        </ul>
                    </div>
                    <a class="nav-link  text-white" aria-current="page" href="#"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #ffffff;"></i>&nbsp;Cart</a>
                    &nbsp;
                    <a class="nav-link  text-white" aria-current="page" href="#"><i class="fa-solid fa-shop fa-xl" style="color: #ffffff;"></i>&nbsp; Become a Seller</a>
                </div>
            <div>
        </div>
    </nav>
     @yield('content')
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
    <script src="{{asset('zerokart/home/script.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
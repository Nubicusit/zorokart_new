@extends('client.websitelayout2')
@section('headerscript')
@parent
@endsection
@section('header')
@parent
@endsection
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
@if(Session::has('success'))
<script>
swal("", "{!!Session::get('success') !!}", )
    .then(function() {
        // window.location.href = "{{route('institute')}}";
    })
</script>
@endif


@if(Session::has('status'))
<script>
swal("", "{!!Session::get('status') !!}", "success")
</script>
@endif



<section id="section-01" class="home-main-intro  institute-bg">
    <div class="home-main-intro-container">
        <div class="container">



            <h3>We at SchoolsPe are on the <br>
                mission to build a perfect <br>  gateway to education.</h3>
            <p>Expand your presence to new horizons<br> and attract more applications.</p>

            <a href="#section-07" class="btn btn-primary register-btn">Contact Us </a>

        </div>

    </div>
</section>
<br><br>
</div>
<div class="content mt-5 pt-5 animation-section">



    <section class="home-main-testimonial pt-4  institute-test " id="section-04">
        <div class="container">
            <h2 class="mb-4 inst-h-tx">
                <span class=" see-text insti-text">Grow With   </span>
                <span class="how-it-text isnt-txt">SchoosPe</span>
            </h2>
            <div class="container">
                <div class="row testimonials-slider">


                    <div class="box col-md-4" data-animate="zoomIn">
                        <div class="card testimonial h-100 border-0 bg-transparent">

                            <a href="#" class="author-image rounded-circle">
                                <div class="cell">
                                    <div class="circle pulse">
                                        <svg width="114" height="108" viewBox="0 0 114 108" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M42.4862 23.7154C50.7224 23.6747 58.7842 26.0736 65.6445 30.6066C66.3296 31.0567 66.5745 31.0136 66.9589 30.2674C69.4391 25.4759 70.9891 20.3206 72.8709 15.3041C74.3063 11.5054 75.6611 7.67597 77.0624 3.85883C77.7413 2.00884 78.6806 1.80226 80.1005 3.20825C82.7853 5.86606 85.47 8.52388 88.1269 11.2064C88.6229 11.7059 88.9484 11.8693 89.6614 11.4592C91.4865 10.4051 93.6112 9.98174 95.7037 10.2551C97.7963 10.5285 99.7389 11.4832 101.228 12.9702C102.718 14.4573 103.671 16.393 103.937 18.4752C104.204 20.5574 103.771 22.6688 102.704 24.48C102.329 25.1275 102.422 25.4328 102.902 25.9045C105.63 28.5747 108.328 31.2726 111.031 33.9643C112.42 35.3487 112.2 36.2891 110.33 36.9705C102.989 39.6468 95.6416 42.3046 88.3191 45.0025C86.0535 45.8745 83.8654 46.9338 81.7777 48.1691C81.291 48.4466 81.1577 48.6532 81.3809 49.2329C81.8738 50.4662 82.4442 51.5793 83.4797 52.4673C84.3228 53.202 85.1113 53.9965 85.8389 54.8445C86.6621 55.7633 87.2951 56.8346 87.7015 57.997C88.108 59.1594 88.28 60.3901 88.2078 61.6187C88.1355 62.8473 87.8203 64.0496 87.2803 65.1569C86.7403 66.2642 85.9861 67.2548 85.0608 68.0719C84.9397 68.1879 84.8459 68.3289 84.7859 68.4851C84.7258 68.6412 84.7012 68.8086 84.7136 68.9753C83.7835 79.8841 79.4123 89.1988 71.3395 96.6326C62.0576 105.17 51.0179 109.034 38.4002 107.763C19.8736 105.913 5.48269 93.2502 1.11456 75.2622C-3.7341 55.3101 7.6652 33.8841 26.9885 26.5983C31.9306 24.6918 37.1855 23.7143 42.4862 23.7154ZM34.5064 104.384C34.6149 104.514 34.8164 104.538 34.8629 104.433C34.9249 104.264 34.7234 104.298 34.6087 104.282C34.6087 104.245 34.6087 104.19 34.587 104.171C28.6192 99.5741 24.3224 93.7374 21.5291 86.7845C21.2966 86.2018 21.0455 86.4145 20.7045 86.6396C18.2557 88.2464 15.9851 90.1068 13.9306 92.1896C13.5276 92.5966 13.5679 92.8062 13.9306 93.1855C15.1141 94.3976 16.3721 95.5355 17.6973 96.5926C22.6917 100.508 28.2317 103.234 34.5064 104.384ZM79.1488 6.33473C79.0465 6.58756 78.9287 6.86814 78.8388 7.15181C77.3104 11.3235 75.7386 15.4767 74.266 19.6731C71.8944 26.4225 69.3058 33.0609 64.8136 38.7619C64.361 39.3385 64.7237 39.5543 65.0461 39.8719C68.0502 42.8627 71.0697 45.835 74.0366 48.8536C74.6008 49.4271 74.9418 49.3809 75.5464 48.9276C78.8055 46.4687 82.3689 44.4366 86.1489 42.8812C92.5353 40.2943 99.0828 38.1483 105.537 35.7434C106.306 35.4566 107.14 35.2963 107.813 34.8184L79.1488 6.33473ZM74.6876 67.2271C72.4865 67.2271 70.2854 67.2271 68.0843 67.2271C67.4922 67.2271 67.1542 67.3103 67.1542 68.0164C67.0407 73.0843 66.2195 78.1119 64.7144 82.955C64.578 83.4021 64.6338 83.6426 65.0244 83.88C67.847 85.6197 70.4331 87.7129 72.719 90.1083C73.1376 90.5431 73.3391 90.4598 73.6677 90.0282C78.6174 83.7303 81.5074 76.075 81.9482 68.0935C81.9947 67.335 81.7281 67.2024 81.0461 67.2147C78.9349 67.2517 76.8113 67.2271 74.6876 67.2271ZM2.86925 67.9732C3.31418 75.9804 6.19911 83.6633 11.1405 90.0004C11.6303 90.6356 11.8628 90.3735 12.2596 89.9696C14.4696 87.7096 16.9471 85.7249 19.638 84.0589C20.2147 83.7012 20.2891 83.3775 20.1 82.7577C18.6256 77.979 17.8131 73.0227 17.6849 68.0257C17.6849 67.4706 17.5733 67.2147 16.9254 67.2178C12.4798 67.2445 8.03619 67.2445 3.59469 67.2178C2.96536 67.2147 2.73594 67.4275 2.86925 67.9732ZM10.1267 64.4552C12.3651 64.4552 14.6065 64.4305 16.8448 64.4706C17.5051 64.4706 17.6725 64.2856 17.688 63.6443C17.8133 58.6533 18.6291 53.7033 20.1124 48.9338C20.3139 48.2832 20.1496 47.9903 19.6008 47.6511C16.9438 46.0002 14.4994 44.0328 12.3216 41.7928C11.807 41.2625 11.5466 41.1762 11.0382 41.8329C6.19826 48.1151 3.35097 55.6895 2.85995 63.5888C2.80415 64.375 3.09556 64.4644 3.7528 64.4552C5.87641 64.4336 8.00312 64.4552 10.1267 64.4552ZM41.054 39.2491C41.054 35.4443 41.0323 31.6395 41.0726 27.8408C41.0726 26.9405 40.868 26.8819 40.1425 27.2982C32.4169 31.6426 27.283 38.1607 23.9783 46.2297C23.7768 46.723 23.8791 46.9481 24.3658 47.1917C29.2994 49.6814 34.6946 51.137 40.2169 51.4683C41.0292 51.5207 41.0695 51.1815 41.0664 50.5433C41.0447 46.7816 41.054 43.0169 41.054 39.2491ZM40.9703 104.856C41.0067 104.696 41.0336 104.535 41.0509 104.372C41.0509 96.608 41.0509 88.8442 41.0757 81.0804C41.0757 80.2541 40.7222 80.2479 40.1022 80.2849C34.6586 80.6033 29.3382 82.0262 24.4681 84.4659C23.8109 84.7927 23.8326 85.1103 24.0744 85.6992C25.2388 88.5829 26.7281 91.3261 28.5138 93.8762C31.7111 98.4849 35.9857 102.253 40.9703 104.856ZM43.841 104.655C44.1696 104.794 44.3122 104.628 44.461 104.541C52.3355 100.203 57.5592 93.6171 60.8919 85.4248C61.1213 84.8575 60.9074 84.7033 60.4765 84.4998C55.6832 82.0765 50.4439 80.6497 45.078 80.3065C44.0921 80.2417 43.7945 80.4175 43.8038 81.4812C43.8596 88.8596 43.8317 96.2411 43.8317 103.622L43.841 104.655ZM43.841 26.8634C43.841 34.988 43.841 42.8966 43.841 50.8053C43.841 51.3943 44.0487 51.496 44.5758 51.4713C48.5785 51.2674 52.5273 50.4628 56.2882 49.0849C56.5982 48.9677 56.8524 48.8875 56.6726 48.3757C55.8417 45.9985 56.3812 43.9111 58.2227 42.2091C58.7156 41.7497 58.5513 41.4167 58.2847 40.9511C56.4337 37.6654 54.0875 34.6811 51.3279 32.102C49.0983 30.0085 46.578 28.2443 43.8441 26.8634H43.841ZM30.656 67.2271C27.5559 67.2271 24.4743 67.2548 21.3834 67.2116C20.6084 67.2116 20.4131 67.4213 20.4534 68.1767C20.648 72.5884 21.3406 76.9644 22.5181 81.2222C22.7661 82.1195 23.0327 82.1195 23.7892 81.7495C28.8735 79.2188 34.4376 77.7836 40.1177 77.5377C40.8711 77.5038 41.0912 77.2848 41.0788 76.5356C41.0354 73.7606 41.0292 70.9856 41.0788 68.2353C41.0943 67.4275 40.8649 67.1993 40.0495 67.2086C36.9152 67.2548 33.7841 67.2271 30.656 67.2271ZM54.1429 67.2271C51.0148 67.2271 47.8898 67.2456 44.7618 67.2271C44.0921 67.2271 43.81 67.3381 43.8317 68.0935C43.8782 70.9332 43.8627 73.776 43.8317 76.6158C43.8317 77.1985 43.903 77.5099 44.6191 77.5407C50.4119 77.748 56.0905 79.2018 61.2639 81.8019C61.9677 82.1503 62.1227 81.9838 62.3149 81.3055C63.5274 77.0212 64.2247 72.609 64.392 68.1613C64.4261 67.3042 64.082 67.2363 63.4061 67.2363C60.3184 67.2425 57.2182 67.2271 54.1429 67.2271ZM22.8343 49.5258C21.3988 54.1754 20.5959 58.9954 20.4472 63.857C20.4193 64.5662 20.8533 64.4459 21.2625 64.4459C27.5652 64.4459 33.8647 64.4459 40.1735 64.4613C40.8897 64.4613 41.085 64.2609 41.0757 63.5363C41.0364 60.7305 41.0364 57.9247 41.0757 55.1189C41.0757 54.4282 40.9145 54.1939 40.189 54.1785C38.0269 54.0982 35.8762 53.8268 33.7624 53.3676C29.9627 52.5809 26.287 51.2887 22.8343 49.5258ZM54.0809 64.4459C57.2461 64.4459 60.4114 64.4305 63.5736 64.4459C64.2339 64.4459 64.4416 64.2702 64.3765 63.6042C64.2184 61.9639 64.082 60.3174 64.0138 58.6709C63.9363 56.7746 63.2883 55.2237 61.7321 54.0305C60.9258 53.3736 60.1856 52.6404 59.5216 51.8413C58.9884 51.2247 58.5079 51.1322 57.736 51.4405C53.5799 53.1033 49.1643 54.033 44.6874 54.1877C43.9309 54.2186 43.8224 54.4961 43.8286 55.1374C43.8596 57.9371 43.8782 60.7398 43.8286 63.5425C43.81 64.3688 44.1386 64.4675 44.8269 64.4459C47.9177 64.4367 50.9931 64.4552 54.0809 64.4552V64.4459ZM50.1746 104.187C50.6118 104.458 50.9962 104.319 51.3496 104.233C58.7213 102.519 65.4496 98.7522 70.7473 93.3736C71.2682 92.8525 71.324 92.5627 70.7752 92.0169C68.8499 90.1285 66.7765 88.3954 64.5749 86.8339C63.7224 86.2172 63.4805 86.3991 63.1054 87.2902C60.2967 94.0149 56.1239 99.719 50.1746 104.196V104.187ZM34.4351 27.6343C34.2528 27.5407 34.0534 27.4848 33.8488 27.4699C33.6442 27.4551 33.4387 27.4816 33.2447 27.5479C25.9668 29.2955 19.3298 33.0436 14.0918 38.3642C13.5586 38.9038 13.5679 39.1905 14.0918 39.7116C16.0484 41.621 18.1607 43.3659 20.4069 44.9286C21.1881 45.4774 21.3896 45.2554 21.7089 44.4876C24 38.9993 27.2241 34.1339 31.6295 30.0793C32.5254 29.2468 33.4617 28.4698 34.4351 27.6343ZM59.1031 46.4085C59.0969 46.7748 59.1669 47.1384 59.3089 47.4764C59.4508 47.8144 59.6615 48.1195 59.9278 48.3726C61.8096 50.2504 63.6759 52.1435 65.5856 53.9904C66.8473 55.2083 68.2703 55.1806 69.5972 53.9904C70.4001 53.2689 71.1473 52.4981 71.9874 51.8074C72.4586 51.4158 72.4741 51.1908 72.0277 50.7437C69.0577 47.831 66.1085 44.8977 63.1798 41.9439C62.7582 41.5215 62.5598 41.5924 62.2002 41.9994C61.4685 42.8411 60.6873 43.6397 59.9185 44.4506C59.6588 44.7043 59.4529 45.0072 59.3128 45.3414C59.1728 45.6755 59.1015 46.0342 59.1031 46.3962V46.4085ZM84.4067 64.5816C85.211 63.3263 85.5611 61.8359 85.3994 60.3562C85.2377 58.8764 84.5736 57.4957 83.5169 56.4416C81.8149 54.6657 80.0261 52.9698 78.2993 51.2154C77.9428 50.8516 77.701 50.756 77.2577 51.1013C76.0176 52.0695 74.7465 53.0068 73.7545 53.9442L84.4067 64.5816ZM80.0106 64.4706C77.1616 61.637 74.5202 59.0162 71.8882 56.3861C71.6216 56.121 71.4387 56.0778 71.1255 56.3368C70.0626 57.2513 68.6849 57.7209 67.2813 57.6472C66.8504 57.6472 66.6768 57.6996 66.7264 58.2084C66.9062 60.0255 67.0437 61.859 67.1387 63.709C67.1728 64.3257 67.3992 64.4737 67.982 64.4706C71.8944 64.4459 75.7944 64.4583 80.0106 64.4583V64.4706ZM60.6842 39.4958C62.0701 37.8743 63.3579 36.1724 64.5408 34.399C64.9779 33.7824 64.9996 33.474 64.2866 33.0085C60.4138 30.4809 56.1364 28.6281 51.6379 27.5294C51.1713 27.362 50.6581 27.3774 50.2025 27.5726C54.4773 30.7897 58.0444 34.8432 60.6842 39.4834V39.4958ZM90.9139 14.006C93.8746 16.9413 96.8321 19.8643 99.7618 22.7904C100.32 23.3484 100.425 22.9044 100.614 22.5283C101.854 20.0185 101.182 16.6885 99.0115 14.7275C97.936 13.7271 96.5558 13.1118 95.0893 12.9789C93.6228 12.846 92.1535 13.2031 90.9139 13.9937V14.006Z" />
                                            <path
                                                d="M99.5126 0.219162C109.609 0.219162 116.662 10.4111 113.036 19.7177C112.635 20.747 111.925 21.1881 111.127 20.8144C110.24 20.4008 110.084 19.6748 110.451 18.8017C110.509 18.6639 110.539 18.5107 110.588 18.3667C111.509 15.6291 111.383 12.647 110.234 9.99712C109.086 7.34725 106.997 5.21788 104.371 4.02083C101.681 2.77029 98.6122 2.6068 95.8043 3.56439C95.6238 3.62566 95.4433 3.68081 95.2658 3.75126C94.4091 4.09743 93.7054 3.84929 93.3903 3.01911C93.0507 2.12153 93.4729 1.48741 94.3785 1.15043C96.0162 0.519739 97.758 0.203801 99.5126 0.219162Z"
                                                fill="url(#paint1_linear_914_2166)" />
                                            <path
                                                d="M99.1867 4.8829C106.218 4.90431 111.003 11.6323 108.79 18.0148C108.346 19.2962 107.323 19.7671 106.48 19.0668C105.801 18.5041 105.962 17.8191 106.175 17.0851C107.472 12.8801 105.122 8.72093 100.897 7.77901C99.5923 7.49164 98.233 7.58177 96.9769 8.03896C95.8811 8.41817 95.1658 8.13376 94.9041 7.31111C94.6423 6.48845 95.041 5.7973 96.0881 5.43643C97.0769 5.05702 98.1283 4.8692 99.1867 4.8829Z"
                                                fill="url(#paint2_linear_914_2166)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_914_2166" x1="55.9634" y1="2.29138"
                                                    x2="55.9634" y2="108" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FF4005" />
                                                    <stop offset="1" stop-color="#FF2E00" />
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_914_2166" x1="103.637" y1="0.218628"
                                                    x2="103.637" y2="20.9458" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FF4005" />
                                                    <stop offset="1" stop-color="#FF2E00" />
                                                </linearGradient>
                                                <linearGradient id="paint2_linear_914_2166" x1="102.081" y1="4.8822"
                                                    x2="102.081" y2="19.3912" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FF4005" />
                                                    <stop offset="1" stop-color="#FF2E00" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>
                                </div>

                            </a>

                            <div class="card-body bg-white">

                                <div class="card-text  pr-2">

                                    <h4>Reach More</h4>
                                    <p>Expand your institution's reach with SchoolsPe, reach new audiences and increase access to quality education for more students.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box  col-md-4" data-animate="zoomIn">
                        <div class="card testimonial h-100 border-0 bg-transparent">
                            <a href="#" class="author-image rounded-circle">
                                <div class="cell">
                                    <div class="circle pulse">
                                        <svg width="106" height="107" viewBox="0 0 106 107" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M104.917 64.6267C103.91 62.9406 99.7768 57.9359 88.8465 64.3228L69.5035 75.6271C68.5077 76.2087 67.4749 76.617 66.3922 76.8538C66.7992 76.2222 67.116 75.5015 67.3301 74.6996C68.312 71.0224 66.1329 67.1832 62.3692 65.9592C62.2978 65.9361 62.225 65.9178 62.1512 65.9042C56.5886 64.8975 51.0999 62.9066 46.6901 61.307C45.1582 60.7513 43.7111 60.2264 42.4814 59.8264C37.5442 58.2191 33.0814 60.2107 29.3664 62.3703L14.9345 70.7599L13.8694 68.8713C13.277 67.8212 12.3097 67.0645 11.1456 66.7408C9.98156 66.4168 8.76394 66.566 7.71732 67.1604L2.28989 70.2422C0.123747 71.4723 -0.641276 74.2415 0.584676 76.4149L16.5404 104.702C17.1327 105.752 18.1 106.509 19.2643 106.833C19.6669 106.945 20.0758 107 20.4817 107C21.2499 107 22.0078 106.802 22.6924 106.413L28.1196 103.331C29.1663 102.737 29.9205 101.766 30.2431 100.598C30.5659 99.4298 30.4172 98.2081 29.8246 97.1584L27.8362 93.6329L31.1777 91.6973L55.9722 98.3634C57.3669 98.7383 58.736 98.9256 60.0752 98.9256C62.7456 98.9254 65.2983 98.1812 67.7009 96.6974L102.804 75.0099C105.982 73.0472 106.989 68.0979 104.917 64.6267ZM27.0314 99.7053C26.9909 99.8555 26.9212 99.9961 26.8262 100.119C26.7312 100.242 26.6128 100.345 26.478 100.421L21.0507 103.503C20.9158 103.58 20.767 103.629 20.613 103.647C20.4591 103.666 20.303 103.653 20.1539 103.611C20.0042 103.57 19.8641 103.5 19.7416 103.405C19.619 103.31 19.5166 103.191 19.4401 103.056L3.4846 74.7679C3.33061 74.4942 3.29115 74.1703 3.37487 73.8674C3.45859 73.5644 3.65864 73.3072 3.93115 73.1521L9.35858 70.0703C9.53371 69.9707 9.73154 69.9184 9.93282 69.9183C10.0403 69.9183 10.1484 69.9332 10.2554 69.9628C10.4051 70.0034 10.5452 70.0734 10.6677 70.1687C10.7902 70.2641 10.8926 70.3828 10.969 70.5181L26.9247 98.8056C27.0009 98.941 27.0496 99.0903 27.0679 99.2447C27.0862 99.3992 27.0738 99.5557 27.0314 99.7053ZM101.057 72.163L65.9538 93.8505C63.1576 95.5773 60.0898 96.0092 56.8347 95.134L31.3734 88.2886C31.1621 88.2317 30.9416 88.2171 30.7247 88.2458C30.5077 88.2745 30.2986 88.3459 30.1092 88.4558L26.1947 90.7233L16.5756 73.6702L31.0369 65.2635C34.2709 63.3833 37.7719 61.8086 41.4529 63.0071C42.6301 63.3899 43.9864 63.8821 45.5567 64.4516C50.0537 66.0829 55.6425 68.11 61.4395 69.1731C63.4885 69.8893 64.6341 71.8754 64.1109 73.8344C63.474 76.2195 61.594 76.6703 59.9734 76.5702C56.8018 75.9508 53.9509 75.1393 50.9628 74.2892C49.6782 73.9237 48.3497 73.5454 46.9528 73.1701C46.5259 73.0553 46.0711 73.1154 45.6884 73.3371C45.3057 73.5588 45.0264 73.924 44.912 74.3523C44.7976 74.7806 44.8575 75.2369 45.0785 75.6209C45.2995 76.0049 45.6634 76.2851 46.0903 76.3999C47.4637 76.7691 48.7802 77.1439 50.0533 77.506C52.8963 78.315 55.618 79.0897 58.632 79.7114C58.7849 79.7805 58.9473 79.826 59.1138 79.8464C59.2525 79.8637 59.39 79.878 59.5266 79.8895C60.1679 80.0126 60.811 80.126 61.4557 80.2297C65.0409 80.805 68.222 80.2445 71.1802 78.5167L90.5234 67.2124C96.1181 63.9431 100.43 63.619 102.057 66.3449C103.181 68.2266 102.676 71.1626 101.057 72.163ZM10.6389 75.012C10.6757 75.2647 10.6625 75.5221 10.6002 75.7696C10.5378 76.0172 10.4274 76.2499 10.2754 76.4547C10.1234 76.6594 9.93265 76.8321 9.7141 76.9629C9.49556 77.0937 9.25348 77.18 9.00169 77.2169C8.7499 77.2538 8.49333 77.2406 8.24663 77.178C7.99993 77.1154 7.76793 77.0047 7.56387 76.8522C7.35982 76.6996 7.1877 76.5083 7.05736 76.289C6.92702 76.0697 6.84099 75.8268 6.80421 75.5742C6.72991 75.064 6.86066 74.545 7.16769 74.1315C7.47473 73.7181 7.9329 73.4439 8.44141 73.3693C8.94992 73.2948 9.46712 73.426 9.87923 73.734C10.2913 74.0421 10.5646 74.5018 10.6389 75.012ZM45.304 32.0939C45.2043 31.6662 45.2763 31.2163 45.5044 30.8414C45.7326 30.4665 46.0987 30.1968 46.5235 30.0905C46.9483 29.9843 47.3977 30.05 47.7746 30.2735C48.1514 30.497 48.4255 30.8603 48.5376 31.285C49.0977 33.5401 51.4009 34.2876 53.2085 34.2464C54.7805 34.2088 56.2459 33.6625 56.9424 32.8546C57.3298 32.4051 57.4733 31.8879 57.3934 31.2271C57.2607 30.1314 56.6129 28.7922 52.7482 28.1555C47.2739 27.2537 45.9963 24.4097 45.8887 22.1826C45.7393 19.1007 47.8717 16.5219 51.1953 15.7654C51.2413 15.7549 51.288 15.7461 51.3344 15.7365V14.5409C51.3344 14.0975 51.51 13.6723 51.8225 13.3588C52.1349 13.0452 52.5588 12.8691 53.0007 12.8691C53.4426 12.8691 53.8664 13.0452 54.1789 13.3588C54.4914 13.6723 54.6669 14.0975 54.6669 14.5409V15.7213C56.8835 16.1587 59.0184 17.5258 60.1167 20.1504C60.2877 20.5592 60.29 21.0194 60.1229 21.4299C59.9558 21.8403 59.633 22.1674 59.2256 22.3391C58.8181 22.5107 58.3594 22.5129 57.9503 22.3453C57.5412 22.1776 57.2152 21.8537 57.0441 21.4448C56.0987 19.186 53.7974 18.6019 51.9324 19.0263C50.565 19.3375 49.1335 20.2875 49.2172 22.0204C49.2462 22.6172 49.3228 24.2026 53.2881 24.8561C57.8185 25.6023 60.3126 27.6102 60.7015 30.8241C60.8946 32.4195 60.4664 33.878 59.4631 35.042C58.3846 36.2932 56.6502 37.1567 54.6671 37.466V38.6075C54.6671 39.0509 54.4916 39.4761 54.1791 39.7896C53.8666 40.1032 53.4428 40.2793 53.0009 40.2793C52.559 40.2793 52.1351 40.1032 51.8227 39.7896C51.5102 39.4761 51.3346 39.0509 51.3346 38.6075V37.4399C48.3212 36.8909 46.0001 34.8949 45.304 32.0939ZM53.0007 47.2618C64.3696 47.2618 73.619 37.9813 73.619 26.5743C73.619 15.1673 64.3696 5.8868 53.0007 5.8868C41.6318 5.8868 32.3824 15.1673 32.3824 26.5743C32.3824 37.9813 41.6318 47.2618 53.0007 47.2618ZM53.0007 9.2305C62.5321 9.2305 70.2865 17.0109 70.2865 26.5743C70.2865 36.1377 62.5321 43.9181 53.0007 43.9181C43.4692 43.9181 35.7149 36.1377 35.7149 26.5743C35.7149 17.0109 43.4692 9.2305 53.0007 9.2305ZM53.0007 53.1488C67.6048 53.1488 79.4861 41.2277 79.4861 26.5743C79.4861 11.9211 67.6048 0 53.0007 0C38.3965 0 26.5152 11.9211 26.5152 26.5743C26.5152 41.2275 38.3965 53.1488 53.0007 53.1488ZM53.0007 3.3437C65.7674 3.3437 76.1536 13.765 76.1536 26.5743C76.1536 39.3838 65.7674 49.8051 53.0007 49.8051C40.234 49.8051 29.8478 39.3838 29.8478 26.5743C29.8478 13.765 40.234 3.3437 53.0007 3.3437Z" />

                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body bg-white">

                                <div class="card-text  pr-2">
                                    <h4>Spend Zero</h4>
                                    <p>Get your institution listed on our platform for free with SchoolsPe's Zero Loss policy. Register now and reach a wider audience without any financial burden</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="box  col-md-4" data-animate="zoomIn">
                        <div class="card testimonial h-100 border-0 bg-transparent">
                            <a href="#" class="author-image rounded-circle">
                                <div class="cell">
                                    <div class="circle pulse">
                                        <svg width="89" height="95" viewBox="0 0 89 95" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M88.9507 30.9538L82.64 0.863472C82.5648 0.4845 82.3395 0.257117 82.1141 0.181323C81.9638 0.0297345 81.6633 -0.0460598 81.2125 0.0297345C81.0623 0.0297345 80.9872 0.105529 80.8369 0.181323L54.8429 15.8707C54.317 16.1739 54.0916 16.9319 54.4673 17.4624C54.6175 17.6898 54.7678 17.8414 54.9931 17.9172L62.1302 21.0248L60.7028 24.7387C60.252 26.0272 49.3586 53.9953 5.93505 53.9953C4.28225 53.9953 2.4792 53.9195 0.751272 53.8437H0.525891C0.375636 53.8437 0.300509 53.9195 0.150254 53.9953C0.0751271 54.0711 0 54.2227 0 54.3743C0 54.6016 0.150254 54.829 0.375636 54.9048L0.525891 54.9806C9.9168 58.164 19.6833 59.8314 29.6001 59.983C65.4358 59.983 78.2826 33.076 78.4328 32.7729L80.1608 29.059L87.4481 32.2423C87.7486 32.3939 88.1243 32.3181 88.2745 32.2423C88.4999 32.1665 88.7253 32.0149 88.8755 31.636C89.0258 31.4086 89.0258 31.1812 88.9507 30.9538ZM5.10865 95H23.8153V67.6383C17.5046 67.1835 11.2691 66.1982 5.10865 64.6065V95ZM65.1353 58.0124V95H83.842V39.2912H83.7669C81.0623 43.6115 75.1272 51.5699 65.1353 58.0124ZM35.0844 95H53.7911V63.697C48.3819 65.7434 42.2215 67.1835 35.0844 67.7141V95Z" />

                                        </svg>
                                    </div>
                                </div>

                            </a>
                            <div class="card-body bg-white">


                                <div class="card-text  pr-2">
                                    <h4>Grow More</h4>
                                    <p>Optimize your admissions process and boost enrollment with SchoolsPe. Our expert team offers a variety of services to enhance your institution's admission rate and reach more potential students.</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- Revolutionize section-desktopview -->
    <section id="section-02" class="pb-10 feature-destination pt-85  institute-revolution desktop-isti">
        <div class="container">
            <div class="mb-8  istitute-sec-3">
                <!--<h4>Revolutionize-->
                <!--</h4>-->
                <h4>Built to help you Scale to new horizons</h4>
                <!--<img src="{{url('public/images/logo.png')}}">-->
            </div>
            <div class="left-text-we-inner  test-institute-4"><img src="{{url('public/images/institute-1.png')}}">
                <div class="button-sec" data-animate="zoomIn">
                    <div class="button-sec-btn">
                        <h4>Explore the Unexplored </h4>
                        <p><span> SchoolsPe </span> will help you explore the unexplored markets.We offer cross territorial
approach and critical insights to step into new markets.</p>

                    </div>
                    <div class="button-sec-btn" data-animate="zoomIn">
                        <h4>Prospect Nurturing</h4>
                        <p>


The whole process of nurturing the prospects from counselling to complete
admission will be taken care by the expert counselling team at SchoolsPe.</p>

                    </div>
                    <div class="button-sec-btn" data-animate="zoomIn">
                        <h4>Know your Market</h4>
                        <p>
we will help you to understand and allign with the expectation of the target audiance
Which indeed helps you to improve overall as an institution.</p>

                    </div>
                    <div class="button-sec-btn" data-animate="zoomIn">
                        <h4>Attract with Ease</h4>
                        <p>
Let the crowd here your voice, Announce Offers, Discounts, Seats left etc in a few
clicks and experience it deliver to parent-student within minutes.
                        </p>

                    </div>
                    <div class="button-sec-btn" data-animate="zoomIn">
                        <h4>Adopt and Grow</h4>
                        <p>
We will help you to adopt to the ever changing processes and grow with the same
passion towards providing quality education.</p>

                    </div>
                    <div class="button-sec-btn" data-animate="zoomIn">
                        <h4>Performance at your finger tips</h4>
                        <p>
All the information regarding the total view on page, enquires, admissions etc will be
available on your dashboard with real time updates</p>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Revolutionize section-Mobile view-->
    <section id="section-02" class="pb-10 feature-destination pt-85  institute-revolution mobile-isti">
        <div class="container">
            <div class="mb-8  istitute-sec-3">
                <!--<h4>Revolutionize-->
                <!--</h4>-->
               <h4>Built to help you Scale to new horizons</h4>
                <!--<img src="{{url('public/images/logo.png')}}">-->
            </div>
            <div class="left-text-we-inner  test-institute-4 mobile-section">
                <div class="button-sec" data-animate="zoomIn">
                    <div class="button-sec-btn-1 row">
                        <div class="col-md-3">
                            <img src="{{url('public/images/inst-1.png')}}">
                        </div>
                        <div class="col-md-9">
                           <h4>Explore the Unexplored </h4>
                        <p><span> SchoolsPe </span> will help you explore the unexplored markets.We offer cross territorial
approach and critical insights to step into new markets.</p>

                        </div>

                    </div>
                    <div class="button-sec-btn-1 row" data-animate="zoomIn">
                        <div class="col-md-3">
                            <img src="{{url('public/images/inst-2.png')}}">
                        </div>
                        <div class="col-md-9">
                           <h4>Prospect Nurturing</h4>
                        <p>


The whole process of nurturing the prospects from counselling to complete
admission will be taken care by the expert counselling team at SchoolsPe.</p>
                        </div>
                    </div>
                    <div class="button-sec-btn-1 row" data-animate="zoomIn">
                        <div class="col-md-3">
                            <img src="{{url('public/images/inst-3.png')}}">
                        </div>
                        <div class="col-md-9">
 <h4>Know your Market</h4>
                        <p>
we will help you to understand and allign with the expectation of the target audiance
Which indeed helps you to improve overall as an institution.</p>
                        </div>
                    </div>
                    <div class="button-sec-btn-1 row" data-animate="zoomIn">
                        <div class="col-md-3">
                            <img src="{{url('public/images/inst-4.png')}}">
                        </div>
                        <div class="col-md-9">
                            <h4>Attract with Ease</h4>
                        <p>
Let the crowd here your voice, Announce Offers, Discounts, Seats left etc in a few
clicks and experience it deliver to parent-student within minutes.
                        </p>
                        </div>
                    </div>
                    <div class="button-sec-btn-1 row" data-animate="zoomIn">
                        <div class="col-md-3">
                            <img src="{{url('public/images/inst-5.png')}}">
                        </div>
                        <div class="col-md-9">
                            <h4>Adopt and Grow</h4>
                        <p>
We will help you to adopt to the ever changing processes and grow with the same
passion towards providing quality education.</p>
                        </div>
                    </div>
                    <div class="button-sec-btn-1 row" data-animate="zoomIn">
                        <div class="col-md-3">
                            <img src="{{url('public/images/inst-6.png')}}">
                        </div>
                        <div class="col-md-9">
                           <h4>Performance at your finger tips</h4>
                        <p>
All the information regarding the total view on page, enquires, admissions etc will be
available on your dashboard with real time updates</p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="section-02" class="pb-1 feature-destination pt-85 inst-present">
        <div class="container">
            <div class="mb-6">
                <h2 class="mb-0">
                    <span class="see-text insti-text">Perks 
                    </span>
                    <span class="how-it-text inst-txt">You May Like</span>
                </h2>
            </div>
            <div class="items review" id="contact-inst">>
                <div class="box " data-animate="zoomIn">
                    <div class="card  border-0">
                        <div class="pro-img pulse">

                            <img src="{{url('public/images/inst-ic.png')}}">
                        </div>
                         <h4>Authority on Info</h4>
                        <p>Easily create and manage your institution's page on our platform. Optimize it at any time with just a few clicks, to keep your information up to date.
                        </p>


                    </div>
                </div>
                <div class="box " data-animate="zoomIn">
                    <div class="card  border-0">
                        <div class="pro-img pulse">
                            <img src="{{url('public/images/inst-ic-1.png')}}" style="width:95px">
                        </div>
                        <h4>Eye on Statistics</h4>
                        <p>
                     Improve your institution's reach with real-time analytics on SchoolsPe. Track performance and optimize your page to attract more applications with just a few clicks
                        </p>


                    </div>
                </div>
                <div class="box card-container__card" data-animate="zoomIn">
                    <div class="card border-0">
                        <div class="pro-img pulse">
                            <img src="{{url('public/images/inst-ic-2.png')}}" style="width:65px">
                        </div>
                        <h4>Eliminate Junk</h4>
                        <p>Maximize your institution's reach and improve your enrollment rate with SchoolsPe's verified and confirmed student applications, screened through our rigorous process.</p>


                    </div>
                </div>

            
            </div>
        </div>
    </section>



 <section id="section-07" class=" tips-article  reg-sec-institute" style="margin-top:0rem !important;padding-bottom: 0rem !important;" ></section>

    <section id="section-06" class="pt-5 pb-11 tips-article  reg-sec-institute" style="margin-top:6rem !important" >
        <div class="container">

            <div class="row">
                <div class="col-md-6 left-reg-sec" data-animate="fadeInLeft">
                    <img src="{{url('public/images/Logo-1.png')}}">

                    <h3>Want to Know More ?</h3>
                    <p>For any more queries, Kindly Fill and submit the form. Our representative will get in touch with you.</p>
                </div>
                <div class="col-md-5 centered" data-animate="fadeInRight">
                     <form action="{{'contactus_store'}}" method="post" enctype="multipart/form-data">
                        @csrf
<input type="hidden" name="role" value="0">
                        <div class="form-group form-group-input1">

                            <select class="form-control inst-select" name="institute" required>
                                <option value="">Type of Institution</option>
                                <option value="1">Schools</option>
                                <option value="2">PU-Junior College</option>
                                <option value="3">Polytechnic College</option>
                                <option value="4">UG-PG College</option>
                            </select>
                        </div>
                        <div class="form-group name-group">
                            <div class="palceholder">
                                <label for="name">Your Name</label>
                                <span class="star">*</span>
                            </div>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group email-group">
                            <div class="palceholder">
                                <label>Your Contact Number</label>
                                <span class="star">*</span>
                            </div>
                            <input type="number" name="contact" class="form-control" id="mob_no_1" required>
                        </div>
                        <div class="form-group email-group">
                            <div class="palceholder">
                                <label>Your Email</label>
                                <span class="star">*</span>
                            </div>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">

                            <textarea class="form-control" rows="3" placeholder="Message" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default btn-sb sign-up-btn-1">Submit</button>
                    </form>
                </div>

            </div>
        </div>

    </section>
    <section id="section-02" class="pb-13 feature-destination ">
        <div class="container">
            <div class="mb-6">
                <h2 class="mb-0">
                    <span class="see-text insti-text">Testimonials
                    </span>

                </h2>
            </div>
            <div class="items review">
                <div class="box" data-animate="zoomIn">
                    <div class="card border-0">
                        <div class="pro-img">
                            <img src="{{url('public/images/young-user-icon 1.png')}}">
                        </div>
                        <p style="min-height: 190px;">What I appreciate about SchoolsPe is that they give equal priority to all students who approach them. Based on my requirements, they helped me find the right course and college.

I would recommend SchoolsPe to anyone seeking admission. Thanks again Team SchoolsPe.</p>
                        <h5>Swathi</h5>
                        <h6>(Student-1st PUC)</h6>
                        <div><span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>
                <div class="box" data-animate="zoomIn">
                    <div class="card border-0">
                        <div class="pro-img">
                            <img src="{{url('public/images/young-user-icon 1.png')}}">
                        </div>
                        <p style="min-height: 190px;">I would like to thank SchoolsPe for suggesting the most suitable course and institution for my son. 
                        The most impressive part is the behaviour of the team. They were very polite and answered all my questions.</p>
                        <h5>Ramesh</h5>
                        <h6>(Parent- 1st PUC)</h6>
                        <div><span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>
                <div class="box" data-animate="zoomIn">
                    <div class="card border-0">
                        <div class="pro-img">
                            <img src="{{url('public/images/young-user-icon 1.png')}}">
                        </div>
                        <p style="min-height: 190px;">Finding the right polytechnic college within our requirements was always very difficult.
                        But with Schoolspe, it became very easy. They have an amazing team of counsellors who will make it easy for you.

                                     Kudos to the team at SchoolsPe for their good work.</p>
                        <h5>Vignesh</h5>
                        <h6>(Student - Polytechnic)</h6>
                        <div><span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>
                <div class="box" data-animate="zoomIn">
                    <div class="card border-0">
                        <div class="pro-img">
                            <img src="{{url('public/images/young-user-icon 1.png')}}">
                        </div>
                        <p style="min-height: 190px;">What I appreciate about SchoolsPe is that they give equal priority to all students who approach them.
                        Based on my requirements, they helped me find the right course and college.

I would recommend SchoolsPe to anyone seeking admission. Thanks again Team SchoolsPe.</p>
                        <h5>Swathi</h5>
                        <h6>(Student-1st PUC)</h6>
                        <div><span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>
                <div class="box" data-animate="zoomIn">
                    <div class="card border-0">
                        <div class="pro-img">
                            <img src="{{url('public/images/young-user-icon 1.png')}}">
                        </div>
                        <p style="min-height: 190px;">I would like to thank SchoolsPe for suggesting the most suitable course and institution for my son. 
                        The most impressive part is the behaviour of the team. They were very polite and answered all my questions.</p>
                        <h5>Ramesh</h5>
                        <h6>(Parent- 1st PUC)</h6>
                        <div><span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


</div>


</div>

<div>





    <!---------=============== Partner login and register modal ===============================----->

    <div class="modal fade" id="myModal-log-inst">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="text-center">
                    <div role="tabpanel" class="login-tab">
                        <!-- Nav tabs -->

                        <!--++++++++++++++ HIDDEN content +++++++++++++++++++-->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a id="signin-taba" href="#home" aria-controls="home"
                                    role="tab" data-toggle="tab">Sign In</a></li>
                            <!--<li role="presentation"><a id="signup-taba" href="#profile" aria-controls="profile"-->
                            <!--        role="tab" data-toggle="tab">Sign Up</a></li>-->
                            <li role="presentation"><a id="forgetpass-taba" href="#forget_password"
                                    aria-controls="forget_password" role="tab" data-toggle="tab">Forget Password</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <!--++++++++++++++ Sing In FORM STARTS +++++++++++++++++++-->
                            <div role="tabpanel" class="tab-pane active text-center" id="home">
                                <div class="row">
                                    <div class="col-md-5 left-side-log">
                                       <button type="button" class="close inst-cls-btn" data-dismiss="modal">&times;</button>
                                        <div class="left-log-text">


                                            <h3>Welcome</h3>
                                              <p>
                                                Please Sign Up<br>
                                             Don’t have an account</p>
                                             <a href="#" class="btn btn-int-log btn-mod-reg" > Sign Up </a>
                                                <!--<a href="javascript:;" class=" btn btn-int-log btn-mod-reg">Sign Up</a> -->
                                        </div>

                                    </div>
                                    <div class="col-md-7 right-side-log">
                                        <img src="{{url('public/images/logo.png')}}" class="logo">
                                        <h6>Login In To Your Account</h6>


                                        <div id="mainWrap">
                                            <div id="xlogin">


                                                <form action="{{url('ins_login')}}" id="logForm" method="post"
                                                    class="form-horizontal">

                                                    @csrf

                                                    <div class="form-group formSubmit">
                                                        <form action="" class="billingform">


                                                            <div class="form-group md-group show-label">
                                                                <label for="" class="mobile-label"> Enter Email
                                                                    Address</label>
                                                                <input type="email" id="phone" name="email"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group md-group show-label">
                                                                <label for="" class="mobile-label"> Password</label>
                                                                <input type="password" name="password" id="password"
                                                                    class="form-control" />

                                                            </div>
                                                            <div class="for-sec" style="align-items: center;">
<!--                                                                <div style="display:flex;align-items:center">-->
<!--                                                                <input type="checkbox" id="remember" name="remember" value="remeber">-->
<!--                                                                  <label for="remember" style="    margin-top: 0.5rem;margin-left:0.5rem">Remember Me?</label><br><br>-->
<!--</div>-->
                                                                <a href="javascript:;"
                                                                    class="forgetpass-tab forgot-text">Forgot password?</a>
                                                            </div>

                                                            <div class=" submitWrap">
                                                                <input class=" btn btn-primary  btn-sb" name="submit"
                                                                    type="submit" value="Sign in"></input>



                                                            </div>
                                                            </br>
                                                            <p style="font-size:14px">By logging in, you agree to our <a href="#" style="color:#FF2E00"> Terms and Conditions</a>  of our website. </p>
                                                        </form>


                                                    </div>




                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--++++++++++++++ Sing up FORM STARTS +++++++++++++++++++-->
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="row" id="regForm">
                                    <div class="col-md-5 left-side-log">
                                          <button type="button" class="close inst-cls-btn" data-dismiss="modal">&times;</button>
                                        <div class="left-log-text">


                                            <h3>Welcome Back!</h3>
                                            
                                            <p>Please Login <br>
                                                If you have an account</p>
                                            <a href="javascript:;" class=" signin-tab btn btn-int-log">Login</a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 right-side-log">
                                        <img src="{{url('public/images/logo.png')}}" class="logo">
                                        <h6>Login In To Your Account</h6>

                                        <div id="mainWrap">
                                            <div id="xlogin">

                                                <form method="POST" action="{{ route('parent_registration') }}">
                                                    @csrf

                                                    <div class="form-group md-group show-label">
                                                        <label for="" class="mobile-label"> Your Name

                                                        </label>
                                                        <input type="text" id="phone" name="name" class="form-control">
                                                        <label for="" class="mobile-label"> Enter Email
                                                            Address</label>
                                                        <input type="email" id="phone" name="email"
                                                            class="form-control">
                                                        <label for="" class="mobile-label"> Password</label>
                                                        <input type="password" name="password" id="password"
                                                            class="form-control" />

                                                    </div>


                                                    <div class="submitWrap">

                                                        <!--<input id="login" name="submit"-->
                                                        <!--    class="btn btn-primary  btn-sb" type="submit"-->
                                                        <!--    value="Sign Up" />-->

                                                        <button type="submit"
                                                            class="btn btn-primary  btn-sb">Signin</button>
                                                    </div>
                                                </form>


                                            </div>





                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--++++++++++++++ OTP FORM STARTS +++++++++++++++++++-->
                            <div role="tabpanel" class="tab-pane " id="forget_password">
<button type="button" class="close inst-cls-btn" style="color:black" data-dismiss="modal">&times;</button>
                               <form method="POST" action="{{ route('forgotpassword') }}">
                                   @csrf
                                    <h4><span class="verify-text">Password assistance </span></h4>
                                    <p class="">Enter the email address associated with
                                        your SchoolsPe account.</p>
                                    <div class="verification-code   col-md-7">

                                        <div class="form-group  show-label">
                                            <label for="" class="mobile-label">Enter Email Address</label>
                                            <input type="email" id="phone" name="email" class="form-control">
                                        </div>

                                    </div>
                                    <div class="form-group formNotice mt-5">
                                        <div class="col-xs-12">

                                            <Button type="submit"  name="submit"
                                                class="btn   btn-sb   ">Submit</Button>
                                            <h3 class="text-center"> Didn’t received Password? <a> <span> Resend
                                                        Password
                                                    </span></a>
                                            </h3>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>


    <!---------=============== register istitution login and register modal ===============================----->

    <div class="modal fade" id="myModal-reg-inst">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
               
                <div class="text-center">
                <div role="tabpanel" class="tab-pane" id="profile-1">
           
                                <div class="row" id="regForm-1">
                                    
                                    <div class="col-md-5 left-side-log">
                                                  <button type="button" class="close inst-cls-btn" data-dismiss="modal">&times;</button>
                                        <div class="left-log-text">


                                            <h3>Welcome  </h3>
                                            <p>Please Login<br>
                                        If you have an account</p>
                                          
                                                <a href="#" class="btn btn-int-log log-mod-btn" > Login  </a>
                                                
                                                <!-- <p>Please Login <br>
                                                If you have an account</p>
                                            <a href="javascript:;" class=" signin-tab-1 btn btn-int-log">Login</a> -->
                                        </div>
                                    </div>
                                    <div class="col-md-7 right-side-log">
                                        <img src="{{url('public/images/logo.png')}}" class="logo">
                                        <h6>Register</h6>
                                        
                                         @if ($errors->any())
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
@endif


                                        <div id="mainWrap">
                                            <div id="xlogin">

                                                <form action="{{route('register.custom')}}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf


                                                    <div class="form-group md-group show-label">
                                                        <!--<label for="" class="mobile-label"> Select Institution Type</label>-->
                                                        <!--<select name="type" class="form-control" required>-->
                                                        <!--<option value="">--Select Type--</option>-->
                                                        <!--    <option value="s">School</option>-->
                                                        <!--    <option value="pu">PU Junior College</option>-->
                                                        <!--    <option value="pc">Polytechnic College</option>-->
                                                        <!--    <option value="ug">UG-PG College</option>-->
                                                        <!--</select>-->
                                                        <label for="" class="mobile-label mt-3">
                                                            Enter Your Name</label>
                                                        <input type="text" id="name" class="form-control" name="name" required>
                                                        <label for="" class="mobile-label"> Enter Your Phone number</label>
                                                        <input type="number" id="mob_no" class="form-control" name="phone" maxlength="10" required />
                                                          
                                                
                                                    
                                                        <label for="" class="mobile-label"> Enter Your Email
                                                            Address</label>
                                                        <input type="email" id="phone" class="form-control"
                                                            name="email" required>

                                                    </div>


                                                    <div class=" submitWrap">

                                                        <input  name="submit" class="btn btn-primary  btn-sb sign-up-btn"
                                                            type="submit" value="Sign Up" id="submit_login"/>
                                                    </div>
                                                      <p style="font-size: 14px;">By logging in, you agree to our <a href="#" style="color:#FF2E00"> Terms and Conditions</a>  of our website. </p>
                                                </form>


                                            </div>


                                                    @if ($errors->any())
    @foreach ($errors->all() as $error)
<script>
swal("", "{{ $error }}", " ")

</script>
@endforeach

@endif




                                        </div>
                                    </div>
                                </div>
                            </div>

                </div>



            </div>
        </div>
    </div>
    <style>
    .swal-button,
    .swal-button:hover {
        background-color: #FF4005 !important;
    }
    .swal-text {
   
    color: rgb(0 0 0);
    font-weight: 600 !important;
}
select.inst-select:invalid {
    color: #000 !important;
    </style>

    


    @endsection
    @section('footer')
    @parent
    @endsection
    @section('footerscript')
    @parent
    @endsection

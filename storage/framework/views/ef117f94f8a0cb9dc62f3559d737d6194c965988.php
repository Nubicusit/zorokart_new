<?php $__env->startSection('content'); ?>
<main>
        <div class="w-100 boxes">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="active carousel-item">
                        <img src="<?php echo e(url('public/zerokart/home/Assets/Img/Banner.jpg')); ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo e(url('public/zerokart/home/Assets/Img/Banner2.jpg')); ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo e(url('public/zerokart/home/Assets/Img/Banner3.jpg')); ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo e(url('public/zerokart/home/Assets/Img/Banner4.jpg')); ?>" class="d-block w-100" alt="...">
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
                        <img src="<?php echo e(url('public/zerokart/home/Assets/Img/BoxIMG.jpg')); ?>" alt="Product 1">
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
                        <img src="<?php echo e(url('public/zerokart/home/Assets/Img/BoxIMG1.jpg')); ?>" alt="Product 2">
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
                        <img src="<?php echo e(url('public/zerokart/home/Assets/Img/BoxIMG1.jpg')); ?>" alt="Product 3">
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
                        <img src="<?php echo e(url('public/zerokart/home/Assets/Img/BoxIMG2.jpg')); ?>" alt="Product 4">
                    </div>
                    <div class="contentBox">
                        <a href="#" class="shop-now">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
 <?php $__env->stopSection(); ?>

   
</body>

</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/home/index.blade.php ENDPATH**/ ?>
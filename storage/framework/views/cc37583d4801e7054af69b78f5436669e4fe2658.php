<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
  <style>
    .signinclass:hover
    {
color:black
    }
    body {
      background-color: #f8f9fa;
    }
    .left-section {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: #ff5b00;
      color: white;
      padding: 50px;
    }
    .left-section h2,.right-sectionn h2 {
      font-weight: bold;
    }
     .left-section .btn {
      background-color: rgba(153, 57, 0, 0.3);
      border: none;
      color: white;
      border-radius: 20px;
      padding: 10px 20px;
    }
    
    .right-sectionn {
      background-color: white;
      /* padding: 50px; */
      border-radius: 0 8px 8px 0;
    } 
    .right-sectionn .btn{
     background-color: #ff5b00 !important ;
     outline: #ff5b00; 
     border-color:#ff5b00 !important ;
    }
    .right-sectionn input {
      background-color: rgba( 255, 91, 0, 0.1);
    } */
    .right-sectionn .signup-btn,.right-sectionn input{
      padding: 10px 20px;
    } 
    .btn-social {
      margin: 5px;
      border: none;
      width: 40px;
      height: 40px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
    }
    .btn-social{
      color: white;
    }
    .btn-social.facebook { background-color: #3b5998;  }
    .btn-social.google { background-color: #db4437; }
    .btn-social.linkedin { background-color: #0077b5;} 
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row w-75 shadow-lg">
      <!-- Left Section -->
      <div class="col-md-6 left-section text-center">
        <h2>Come join us!</h2>
        <p>
          We are so excited to have you here. If you haven't already, create an account to get access to exclusive offers, rewards, and discounts.
        </p>
        <a class="btn d-dlock mt-3">Create new account? <a href="<?php echo e(url('user_login')); ?>" style="color:#fff"><b class="signinclass">Sign up.</b></a>
      </div>
      <!-- Right Section -->
      <div class="col-md-6 right-sectionn">
        <br><h2 class="mb-4 text-center">Login</h2>
        <form action="<?php echo e(url('ins_login')); ?>" method="post">
            <?php echo csrf_field(); ?>
          <div class="mb-4">
            <input type="text" class="form-control" name="email" placeholder="email">
          </div>
          <div class="mb-4">
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          
          <button type="submit" class="btn btn-dark w-100 signup-btn">Login</button>
        </form>
        <div class="text-center mt-4">or signup with</div>
        <div class="text-center mt-4">
          <a class="btn-social facebook">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
            </svg>
          </a>
          <button class="btn-social google">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
              <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"/>
            </svg>
          </button>
          <button class="btn-social linkedin">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
              <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u332918131/domains/zorokart.com/public_html/resources/views/home/user_login.blade.php ENDPATH**/ ?>
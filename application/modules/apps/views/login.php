
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" href="img/logo.svg">
      <title><?= $this->db->APP_NAME; ?></title>
      <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>temp/frontend/vendor/slick/slick.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?= base_url() ?>temp/frontend/vendor/slick/slick-theme.min.css"/>
      <!-- Icofont Icon-->
      <link href="<?= base_url() ?>temp/frontend/vendor/icons/icofont.min.css" rel="stylesheet" type="text/css">
      <!-- Bootstrap core CSS -->
      <link href="<?= base_url() ?>temp/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?= base_url() ?>temp/frontend/css/style.css" rel="stylesheet">
      <!-- Sidebar CSS -->
      <link href="<?= base_url() ?>temp/frontend/vendor/sidebar/demo.css" rel="stylesheet">
   </head>
   <body class="fixed-bottom-padding">
      <div class="theme-switch-wrapper">
         <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            <i class="icofont-moon"></i>
         </label>
         <em>Enable Dark Mode!</em>
      </div>
      <!-- sign in -->
      <div class="osahan-signin">
         <div class="border-bottom p-3 d-flex align-items-center">
            <!-- <a class="font-weight-bold text-success text-decoration-none" href="account-setup.html"><i class="icofont-rounded-left back-page"></i></a> -->
            <a class="toggle ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
         </div>
         <div class="p-3">
            <h2 class="my-0">Welcome Back</h2>
            <p class="small">Sign in to Continue.</p>
            <form action="<?= base_url() ?>apps/auth/handler" method="POST">
               <div class="form-group">
                  <label for="username">Email</label>
                  <input placeholder="Enter Email" type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp">
               </div>
               <div class="form-group">
                  <label for="password">Password</label>
                  <input placeholder="Enter Password" type="password" class="form-control" id="password" name="password">
               </div>
               <button type="submit" class="btn btn-success btn-lg rounded btn-block">Sign in</button>
            </form>
             
         </div>
      </div>
      <!-- footer fixed --> 
      <!-- Bootstrap core JavaScript -->
      <script src="<?= base_url() ?>temp/frontend/vendor/jquery/jquery.min.js"></script>
      <script src="<?= base_url() ?>temp/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="<?= base_url() ?>temp/frontend/vendor/slick/slick.min.js"></script>
      <!-- Sidebar JS-->
      <script type="text/javascript" src="<?= base_url() ?>temp/frontend/vendor/sidebar/hc-offcanvas-nav.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="<?= base_url() ?>temp/frontend/js/osahan.js"></script>
   </body>
</html>
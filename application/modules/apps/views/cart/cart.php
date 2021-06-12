
<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" href="img/logo.svg">
      <title><?= $this->db->APP_NAME ?></title>
      <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="vendor/slick/slick.min.css"/>
      <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.min.css"/>
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
      <div class="osahan-cart">
      <div class="p-3 border-bottom">
         <div class="d-flex align-items-center">
            <h5 class="font-weight-bold m-0">Cart</h5>
            <a class="toggle ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
         </div>
      </div>
      <div class="osahan-body">
         <div class="cart-items bg-white position-relative border-bottom">
            <a href="product_details.html" class="position-absolute">
            <span class="badge badge-danger m-3">10%</span>
            </a>
            <div class="d-flex  align-items-center p-3">
               <a href="product_details.html"><img src="img/cart/g1.png" class="img-fluid"></a>
               <a href="product_details.html" class="ml-3 text-dark text-decoration-none w-100">
                  <h5 class="mb-1">Bread</h5>
                  <p class="text-muted mb-2"><del class="text-success mr-1">$1.20kg</del> $0.98/kg</p>
                  <div class="d-flex align-items-center">
                     <p class="total_price font-weight-bold m-0">$2.82</p>
                     <div class="input-group input-spinner ml-auto cart-items-number">
                        <div class="input-group-prepend">
                           <button class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                        </div>
                        <input type="text" class="form-control" value="1">
                        <div class="input-group-append">
                           <button class="btn btn-success btn-sm" type="button" id="button-minus"> − </button>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
         </div>
         <div class="cart-items bg-white position-relative border-bottom">
            <div class="d-flex  align-items-center p-3">
               <a href="product_details.html"><img src="img/cart/g2.png" class="img-fluid"></a>
               <a href="product_details.html" class="ml-3 text-dark text-decoration-none w-100">
                  <h5 class="mb-1">Spinach</h5>
                  <p class="text-muted mb-2"><del class="text-success mr-1">$1.20kg</del> $0.98/kg</p>
                  <div class="d-flex align-items-center">
                     <p class="total_price font-weight-bold m-0">$3.82</p>
                     <div class="input-group input-spinner ml-auto cart-items-number">
                        <div class="input-group-prepend">
                           <button class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                        </div>
                        <input type="text" class="form-control" value="3">
                        <div class="input-group-append">
                           <button class="btn btn-success btn-sm" type="button" id="button-minus"> − </button>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
         </div>
         <div class="cart-items bg-white position-relative border-bottom">
            <div class="d-flex  align-items-center p-3">
               <a href="product_details.html"><img src="img/cart/g3.png" class="img-fluid"></a>
               <a href="product_details.html" class="ml-3 text-dark text-decoration-none w-100">
                  <h5 class="mb-1">Chilli</h5>
                  <p class="text-muted mb-2"><del class="text-success mr-1">$1.20kg</del> $0.98/kg</p>
                  <div class="d-flex align-items-center">
                     <p class="total_price font-weight-bold m-0">$2.82</p>
                     <div class="input-group input-spinner ml-auto cart-items-number">
                        <div class="input-group-prepend">
                           <button class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                        </div>
                        <input type="text" class="form-control" value="2">
                        <div class="input-group-append">
                           <button class="btn btn-success btn-sm" type="button" id="button-minus"> − </button>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
         </div>
         <div class="p-3 mt-5">
            <a href="order_address.html" class="text-decoration-none">
               <div class="rounded shadow bg-success d-flex align-items-center p-3 text-white">
                  <div class="more">
                     <h6 class="m-0">Subtotal $8.52</h6>
                     <p class="small m-0">Proceed to checkout</p>
                  </div>
                  <div class="ml-auto"><i class="icofont-simple-right"></i></div>
               </div>
            </a>
         </div>
      </div>
      <!-- Footer -->
      <div class="osahan-menu-fotter fixed-bottom bg-white text-center border-top">
         <div class="row m-0">
            <a href="<?= base_url() ?>apps/" class="text-dark small col font-weight-bold text-decoration-none p-2 selected">
               <p class="h5 m-0"><i class="text-success icofont-grocery"></i></p>
               Shop
            </a>
            <a href="<?= base_url() ?>apps/" class="text-muted col small text-decoration-none p-2">
               <p class="h5 m-0"><i class="icofont-cart"></i></p>
               Cart
            </a>
            <a href="<?= base_url() ?>apps/" class="text-muted col small text-decoration-none p-2">
               <p class="h5 m-0"><i class="icofont-bag"></i></p>
               My Order
            </a>
            <a href="<?= base_url() ?>apps/" class="text-muted small col text-decoration-none p-2">
               <p class="h5 m-0"><i class="icofont-user"></i></p>
               Account
            </a>
         </div>
      </div>
      
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
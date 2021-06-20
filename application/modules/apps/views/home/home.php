
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
      <!-- home page -->
      <div class="osahan-home-page">
         <div class="border-bottom p-3">
            <div class="title d-flex align-items-center">
               <a href="home.html" class="text-decoration-none text-dark d-flex align-items-center">
                  <img class="osahan-logo mr-2" src="<?= base_url() ?>temp/frontend/img/logo.svg">
                  <h4 class="font-weight-bold text-success m-0"><?= $this->db->APP_NAME ?></h4>
               </a> 
            </div>
            <a href="search.html" class="text-decoration-none">
               <div class="input-group mt-3 rounded shadow-sm overflow-hidden bg-white">
                  <div class="input-group-prepend">
                     <button class="border-0 btn btn-outline-secondary text-success bg-white"><i class="icofont-search"></i></button>
                  </div>
                  <input type="text" class="shadow-none border-0 form-control pl-0" placeholder="Cari Makanan Lainnya.." aria-label="" aria-describedby="basic-addon1">
               </div>
            </a>
         </div>
         <!-- body -->
         <div class="osahan-body"> 
            <!-- Pick's Today -->
            <div class="title d-flex align-items-center mb-3 mt-3 px-3">
               <h6 class="m-0">Apa yang anda cari ? </h6> 
            </div>
            <!-- pick today -->
            <div class="pick_today px-3 pb-2">
                
               <div class="row">
               	<?php foreach ($product->result() as $list): ?>
               		<div class="col-6 pr-2 pt-3">
	                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
	                        <div class="list-card-image">
	                           <a href="<?= base_url() ?>apps/detail?id=<?= $list->id ?>" class="text-dark"> 
	                              <div class="p-3">
	                                 <img src="<?= base_url() ?>assets/product/<?= $list->image ?>" class="img-fluid item-img w-100 mb-3">
	                                 <h6><?= $list->name ?></h6>
                                    <div class="btn-group osahan-radio btn-group-toggle" data-toggle="buttons">
                                       <label class="btn btn-secondary active">
                                         <?= $list->category ?>
                                       </label> 
                                     </div>
	                                 <div class="d-flex align-items-center">
	                                    <h6 class="price m-0 text-success"><?= rp($list->price) ?></h6>
	                                 <a onclick="chart(<?= $list->id ?>);" class="btn btn-success btn-sm ml-auto">+</a>
	                           </div>
	                           </div>
	                           </a>
	                        </div>
	                     </div>
	                  </div> 
               	<?php endforeach ?> 
               </div> 
            </div>
            <!-- Most sales -->
             
         </div>
      </div>
      <!-- Footer -->
      <div class="osahan-menu-fotter fixed-bottom bg-white text-center border-top">
         <div class="row m-0">
            <a href="<?= base_url() ?>apps/home" class="text-muted small col font-weight-bold text-decoration-none p-2">
               <p class="h5 m-0"><i class=" icofont-grocery"></i></p>
               Shop
            </a>
            <a href="<?= base_url() ?>apps/cart" class="text-muted col small text-decoration-none p-2">
               <p class="h5 m-0"><i class="icofont-cart"></i></p>
               Cart
            </a>
            <a href="<?= base_url() ?>apps/order" class="text-muted col small text-decoration-none p-2">
               <p class="h5 m-0"><i class="icofont-bag"></i></p>
               My Order
            </a>
            <a href="<?= base_url() ?>apps/auth/logout" class="text-muted small col text-decoration-none p-2">
               <p class="h5 m-0"><i class="icofont-user"></i></p>
               Logout
            </a>
         </div>
      </div>

      <?php $this->load->view('ajax'); ?>
      
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

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" href="img/logo.svg">
      <title>Grofar - Online Grocery Supermarket HTML Mobile Template</title>
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

      <div class="p-3 bg-white">
         <div class="d-flex align-items-center">
            <a class="font-weight-bold text-success text-decoration-none" onclick="window.history.back();"><i class="icofont-rounded-left back-page"></i> Back</a>
              
         </div>
      </div>
      <div class="px-3 bg-white pb-3">
         <div class="pt-0">
            <h2 class="font-weight-bold"><?= $detail['name'] ?></h2>
            <p class="font-weight-light text-dark m-0 d-flex align-items-center">
               Harga : <b class="h6 text-dark m-0"><?= rp($detail['price']) ?></b> 
            </p> 
         </div>
          
      </div>

      

      <div class="osahan-product">
         
         <div class="product-details">
            <div class="recommend-slider py-1">
               <div class="osahan-slider-item m-2">
                  <img src="<?= base_url() ?>assets/product/<?= $detail['image'] ?>" class="img-fluid mx-auto shadow-sm rounded" alt="Responsive image">
               </div>
                
            </div>
            <div class="details">
               <div class="p-3 bg-white">
                  <div class="d-flex align-items-center">
                    
                     <div class="btn-group osahan-radio btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="options" id="option1" checked> <?= $detail['category'] ?> 
                        </label> 
                      </div>

                     <a class="ml-auto" href="cart.html">
                        <div class="input-group input-spinner ml-auto cart-items-number">
                           <div class="input-group-prepend">
                              <button class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                           </div>
                           <input type="text" class="form-control" value="1">
                           <div class="input-group-append">
                              <button class="btn btn-success btn-sm" type="button" id="button-minus"> − </button>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="p-3">
                 
                  
                  <p class="font-weight-bold mb-2">Detail</p>
                  <p class="text-muted small"><?= $detail['description'] ?></p>
                  <p class="font-weight-bold mb-3">Mungkin anda menyukai ini.</p>
                  <div class="row">
               	<?php foreach ($product->result() as $list): ?>
               		<div class="col-6 pr-2 pt-3">
	                     <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
	                        <div class="list-card-image">
	                           <a href="<?= base_url() ?>apps/detail/<?= $list->id ?>" class="text-dark"> 
	                              <div class="p-3">
	                                 <img src="<?= base_url() ?>assets/product/<?= $list->image ?>" class="img-fluid item-img w-100 mb-3">
	                                 <h6><?= $list->name ?></h6>
	                                 <div class="d-flex align-items-center">
	                                    <h6 class="price m-0 text-success"><?= rp($list->price) ?></h6>
	                                 <a onclick="alert('Add to Cart');" class="btn btn-success btn-sm ml-auto">+</a>
	                           </div>
	                           </div>
	                           </a>
	                        </div>
	                     </div>
	                  </div> 
               	<?php endforeach ?> 
               </div> 
            </div>
               </div>
            </div>
            <div class="fixed-bottom pd-f bg-white d-flex align-items-center border-top">
               <a href="cart.html" class="btn-warning py-3 px-5 h4 m-0"><i class="icofont-cart"></i></a>
               <a href="cart.html" class="btn btn-success btn-block">Buy</a>
            </div>
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
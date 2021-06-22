
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
         <?php
         if ($cart->num_rows() > 0){
            foreach ($cart->result() as $data ) {
               ?>
                  <div class="cart-items bg-white position-relative border-bottom"> 
                     <div class="d-flex  align-items-center p-3">
                        <a href="#"><img src="<?= base_url() ?>assets/product/<?= $data->prod_image ?>" class="img-fluid"></a>
                        <a href="#" class="ml-3 text-dark text-decoration-none w-100">
                           <h5 class="mb-1"><?= $data->prod_name ?></h5>
                           <p class="text-muted mb-2"><?= rp($data->prod_price) ?></p>
                           <div class="d-flex align-items-center">
                           <input onkeyup="update_pesanan(this,'notes',<?= $data->id ?>)" placeholder="Tambahkan catatan" type="text" class="form-control" id="notes" name="notes" aria-describedby="notes">
                              <div class="input-group input-spinner ml-auto cart-items-number">
                                 <div class="input-group-prepend">
                                    <button onclick="update_qty('+',<?= $data->id ?>)" class="btn btn-success btn-sm" type="button" id="button-plus"> + </button>
                                 </div>
                                 <input id="qty_<?= $data->id ?>" onkeyup="update_pesanan(this,'qty',<?= $data->id ?>)" type="text" class="form-control" value="<?= $data->qty ?>">
                                 <div class="input-group-append">
                                    <button onclick="update_qty('-',<?= $data->id ?>)" class="btn btn-success btn-sm" type="button" id="button-minus"> − </button>
                                 </div>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
               <?php
            }
         }
            
         ?>

         <div class="cart-items bg-white position-relative border-bottom"> 
            <div class="d-flex  align-items-center p-3"> 
               <input onkeyup="update_transaksi(this,'name',<?= session('TOKEN') ?>)" placeholder="Nama Pemesan" type="text" class="form-control" id="notes" name="notes" aria-describedby="notes" required> 
                
            </div>
         </div>
         <div class="cart-items bg-white position-relative border-bottom"> 
            <div class="d-flex  align-items-center p-3"> 
               <select onchange="update_transaksi(this,'villa_id',<?= session('TOKEN') ?>)" name="form-control" style="width:100%;" required>
                  <option value="">--Pilih Villa--</option>
                  <?php 
                     foreach ($villa->result() as $list ) {
                        ?>
                           <option value="<?= $list->id ?>"><?= $list->name ?></option>
                        <?php
                     }

                  ?>
                  
               </select>
            </div>
         </div>
         
        <?php $this->load->view('ajax');  ?> 
         <div class="p-3 mt-5">
            <a href="<?= base_url() ?>apps/order" class="text-decoration-none">
               <div class="rounded shadow bg-success d-flex align-items-center p-3 text-white">
                  <div class="more">
                     <h6 class="m-0">Subtotal <font id="subTotal"><?= rp($total) ?></font></h6>
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
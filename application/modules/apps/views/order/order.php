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
   <link rel="stylesheet" type="text/css" href="vendor/slick/slick.min.css" />
   <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.min.css" />
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
   <div class="osahan-order">
      <div class="order-menu">
         <h5 class="font-weight-bold p-3 d-flex align-items-center">My Order </h5>
         <div class="row m-0 text-center">
            <div class="col pb-2 <?php if (($this->input->get('status') == '') or ($this->input->get('status') == 'selesai')) {
                                    echo 'border-success';
                                 }  ?> border-bottom">
               <a href="<?= base_url() ?>apps/order?status=selesai" class="text-<?php if (($this->input->get('status') == '' or ($this->input->get('status') == 'selesai'))) {
                                                                                    echo 'success';
                                                                                 } else {
                                                                                    echo 'muted';
                                                                                 }  ?> font-weight-bold text-decoration-none">Completed</a>
            </div>
            <div class="col pb-2 <?php if ($this->input->get('status') == 'diproses') {
                                    echo 'border-success';
                                 }  ?>  border-bottom">
               <a href="<?= base_url() ?>apps/order?status=diproses" class="text-<?php if ($this->input->get('status') == 'diproses') {
                                                                                    echo 'success';
                                                                                 } else {
                                                                                    echo 'muted';
                                                                                 }  ?> text-decoration-none">On Progress</a>
            </div>
            <div class="col pb-2 <?php if ($this->input->get('status') == 'reject') {
                                    echo 'border-success';
                                 }  ?>  border-bottom">
               <a href="<?= base_url() ?>apps/order?status=reject" class="text-<?php if ($this->input->get('status') == 'reject') {
                                                                                    echo 'success';
                                                                                 } else {
                                                                                    echo 'muted';
                                                                                 }  ?> text-decoration-none">Canceled</a>
            </div>
         </div>
      </div>
      <div class="order-body px-3 pt-3">
         <?php
         foreach ($list->result() as $data) {
            if ($data->status == $this->input->get('status')) {

         ?>
               <div class="pb-3">
                  <a href="#" class="text-decoration-none text-dark">
                     <div class="p-3 rounded shadow-sm bg-white">
                        <div class="d-flex align-items-center mb-3">
                           <p class="bg-success text-white py-1 px-2 mb-0 rounded small"><?= $data->status ?></p>
                           <p class="text-muted ml-auto small mb-0"><i class="icofont-clock-time"></i> <?= $data->created_at ?></p>
                        </div>
                        <div class="d-flex">
                           <p class="text-muted m-0">Transaction. ID<br>
                              <span class="text-dark font-weight-bold">#<?= $data->TOKEN ?></span>
                           </p>
                           <p class="text-muted m-0 ml-auto">Delivered to<br>
                              <span class="text-dark font-weight-bold"><?= $data->villa_name ?></span>
                           </p>
                           <p class="text-muted m-0 ml-auto">Total Payment<br>
                              <span class="text-dark font-weight-bold"><?= rp(total_price($data->TOKEN)) ?></span>
                           </p>
                        </div>
                     </div>
                  </a>
               </div>
         <?php

            }
         }
         ?>


      </div>
   </div>
   <!-- Footer -->
   <!-- Footer -->
   <div class="osahan-menu-fotter fixed-bottom bg-white text-center border-top">
      <div class="row m-0">
         <a href="<?= base_url() ?>apps/home" class="text-muted small col font-weight-bold text-decoration-none p-2">
            <p class="h5 m-0"><i class=" icofont-grocery"></i></p>
            Menu
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
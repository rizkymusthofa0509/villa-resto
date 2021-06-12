
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('ceo');  ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $title?></title>
    <link rel="shortcut icon" href="https://multifab.co.id/asset/images/logohd.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/front/assets/css/bootstrap.min.css" >
    <!-- Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/front/assets/fonts/line-icons.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/front/assets/css/slicknav.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/front/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>temp/front/assets/css/owl.theme.css">
    
    <link rel="stylesheet" href="<?= base_url() ?>temp/front/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>temp/front/assets/css/nivo-lightbox.css">
    <!-- Animate -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/front/assets/css/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/front/assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/front/assets/css/responsive.css">

  </head>
  <body>

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
        <?php $this->load->view('menu');  ?>
      </nav>
      <!-- Navbar End -->

      <!-- Hero Area Start -->
      <div id="hero-area" class="hero-area-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="contents text-center">
                <h2 class="head-title wow fadeInUp">PT. Multi Fabrindo Gemilang.</h2>
                <div class="header-button wow fadeInUp" data-wow-delay="0.3s">
                  <a target="_blank" href="<?= base_url() ?>auth" class="btn btn-common">Open Apps</a>
                </div>
              </div>
              <div class="img-thumb text-center wow fadeInUp" data-wow-delay="0.6s">
                <img class="img-fluid" src="<?= base_url() ?>temp/front/assets/img/hero-1.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Hero Area End -->

    </header>
   
    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
    	<i class="lni-arrow-up"></i>
    </a>
    
    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url() ?>temp/front/assets/js/jquery-min.js"></script>
    <script src="<?= base_url() ?>temp/front/assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>temp/front/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>temp/front/assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>temp/front/assets/js/jquery.mixitup.js"></script>
    <script src="<?= base_url() ?>temp/front/assets/js/wow.js"></script>
    <script src="<?= base_url() ?>temp/front/assets/js/jquery.nav.js"></script>
    <script src="<?= base_url() ?>temp/front/assets/js/scrolling-nav.js"></script>
    <script src="<?= base_url() ?>temp/front/assets/js/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>temp/front/assets/js/jquery.counterup.min.js"></script>  
    <script src="<?= base_url() ?>temp/front/assets/js/nivo-lightbox.js"></script>     
    <script src="<?= base_url() ?>temp/front/assets/js/jquery.magnific-popup.min.js"></script>     
    <script src="<?= base_url() ?>temp/front/assets/js/waypoints.min.js"></script>   
    <script src="<?= base_url() ?>temp/front/assets/js/jquery.slicknav.js"></script>
    <script src="<?= base_url() ?>temp/front/assets/js/main.js"></script>
    <script src="<?= base_url() ?>temp/front/assets/js/form-validator.min.js"></script>
    <script src="<?= base_url() ?>temp/front/assets/js/contact-form-script.min.js"></script>
      
  </body>
</html>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Tidak ditemukan</title>
  <link rel="shortcut icon" href="https://kitalearning.com/kajroh/temp/front/assets/images/favicon.png" type="image/png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/bower_components/Ionicons/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css">
    .bg{
      background-color: #ffffff;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='380' height='380' viewBox='0 0 200 200'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='88' y1='88' x2='0' y2='0'%3E%3Cstop offset='0' stop-color='%238f182a'/%3E%3Cstop offset='1' stop-color='%23e32643'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='75' y1='76' x2='168' y2='160'%3E%3Cstop offset='0' stop-color='%238f8f8f'/%3E%3Cstop offset='0.09' stop-color='%23b3b3b3'/%3E%3Cstop offset='0.18' stop-color='%23c9c9c9'/%3E%3Cstop offset='0.31' stop-color='%23dbdbdb'/%3E%3Cstop offset='0.44' stop-color='%23e8e8e8'/%3E%3Cstop offset='0.59' stop-color='%23f2f2f2'/%3E%3Cstop offset='0.75' stop-color='%23fafafa'/%3E%3Cstop offset='1' stop-color='%23FFFFFF'/%3E%3C/linearGradient%3E%3Cfilter id='c' x='0' y='0' width='200%25' height='200%25'%3E%3CfeGaussianBlur in='SourceGraphic' stdDeviation='12' /%3E%3C/filter%3E%3C/defs%3E%3Cpolygon fill='url(%23a)' points='0 174 0 0 174 0'/%3E%3Cpath fill='%23000' fill-opacity='0.15' filter='url(%23c)' d='M121.8 174C59.2 153.1 0 174 0 174s63.5-73.8 87-94c24.4-20.9 87-80 87-80S107.9 104.4 121.8 174z'/%3E%3Cpath fill='url(%23b)' d='M142.7 142.7C59.2 142.7 0 174 0 174s42-66.3 74.9-99.3S174 0 174 0S142.7 62.6 142.7 142.7z'/%3E%3C/svg%3E");
background-attachment: fixed;
background-repeat: no-repeat;
background-position: top left;
    }
  </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="layout-top-nav skin-red fixed">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container" style="width: 100%;">
        <div class="navbar-header">
          <a href="<?= base_url() ?>apps" class="navbar-brand"><b><i class="fa fa-dekstop"></i>  MULTIFAB</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <?php $this->load->view('menu');  ?>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
             
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- Inner menu: contains the tasks -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <!-- Task title and progress text -->
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <!-- The progress bar -->
                        <div class="progress xs">
                          <!-- Change the css width attribute to simulate progress -->
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?= base_url() ?>temp/lte/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Administrator</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?= base_url() ?>temp/lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    Rizky Musthofa - IT 
                    <small><?= (DATE("d")); ?> <?= call_month(DATE("m")); ?><?= (DATE("Y")); ?></small>
                  </p>
                </li>
                <!-- Menu Body -->
                 
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url() ?>apps" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url() ?>auth/logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper bg" >
    <div class="container" style="width: 100%;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <font color="white">
            <i class="fa fa-desktop"></i> 404 Not Found.
          </font>
        </h1>
         
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- <div class="callout callout-info">
            <h4>Info!</h4> 
            <p>Message.</p>
          </div> -->
        </div>

        <div align="center" style="margin-top: 100px;">
          <img src="<?= base_url() ?>assets/images/404.jpg" width="50%">
        </div>
        <br>
        <div align="center">
          <a href="<?= base_url() ?>apps" class="btn btn-sm bg-red btn-default" style="border-radius: 0px;">
          Back To Home
        </a>
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.13
      </div>
      <strong>Copyright &copy; <?= DATE("Y") ?> PT. Multi Fabrindo Gemilang.</strong> 
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>temp/lte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>temp/lte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>temp/lte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>temp/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>temp/lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>temp/lte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>temp/lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>temp/lte/dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('.dataTables').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'srcollX'     : true
    })
  })
</script>
</body>
</html>

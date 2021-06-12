

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Multifab - Application</title>
  <link rel="shortcut icon" href="https://multifab.co.id/asset/images/logohd.png" type="image/png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/bower_components/font-awesome/css/font-awesome.min.css">
   <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/bower_components/select2/dist/css/select2.min.css">
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
  <style type="text/css">
  .bold{
    font-style: 'Arial';
    font-weight: bold;
  }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="layout-top-nav skin-red fixed">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container" style="width: 100%;">
        <div class="navbar-header">
          <div class="col-md-12" style="background-color: white;
                                        height: 50px;
                                        border-radius: 0px;
                                        ">
          <!-- <a href="<?= base_url() ?>apps" class="navbar-brand"><b><i class="fa fa-dekstop"></i><font color="black">  MULTIFAB</font></b></a>  -->
          <img src="https://www.multifab.co.id/asset/images/logohd.png" width="100px;" style="margin-top: 5px;"> 
          </div>
          
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          
          
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
            <i class="fa fa-desktop"></i> Attendance Monitoring</font>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
			<!-- Content -->
			<div class="row">
			    <div class="col-md-6">
			       <div class="box box-solid  box-danger">
			            <div class="box-header with-border">
			              <h3 class="box-title"><i class="fa fa-bank"></i> Last Attandande</h3>
			              <div class="box-tools pull-right">
			                 
			              </div>
			            </div>
			            <div class="box-body" style="height: 300px;">
			              <div id="displayChart"></div>
			            </div> 
			          </div>
			    </div>
			     <div class="col-md-6">
			       <div class="box box-solid  box-danger">
			            <div class="box-header with-border">
			              <h3 class="box-title"><i class="fa fa-calendar"></i> <?= date_idn(date_now()) ?></h3> 
			            </div>
			            <div class="box-body" height="150px;">
                    <table border="0" align="center" height="140px;">
                        <tr>
                          <td style="font-family: 'Lucida Console'; font-size: 500%;"><font id="jam" >00</font>:</td>
                          <td style="font-family: 'Lucida Console'; font-size: 500%;"><font id="menit" >00</font>:</td>
                          <td style="font-family: 'Lucida Console'; font-size: 500%;"><font id="detik" >00</font></td>
                        </tr>
                        <!-- <tr>
                          <td align="center" style="font-family: 'Lucida Console';"><b>Jam</b></td>
                          <td align="center" style="font-family: 'Lucida Console';"><b>Menit</b></td>
                          <td align="center" style="font-family: 'Lucida Console';"><b>Detik</b></td>
                        </tr> -->
                      </table>
			             <table width="100%" class="table table-bordered table-striped">
			             	<tr>
			             		<td width="50%" class="bold" align="center" bgcolor="red"><font color="white">TERLAMBAT</font></td>
			             		<td width="50%" class="bold" align="center" bgcolor="red"><font color="white">TEPAT WAKTU</font></td>
			             	</tr>
			             	<tr>
			             		<td height="100px;" align="center" valign="center">
			             			<font id="terlambat_result" size="7"><b>0</b></font>
			             		</td>
			             		<td height="100px;" align="center" valign="center">
			             			<font id="tepatwaktu_result" size="7"><b>0</b></font>
			             		</td>
			             	</tr>
			             </table>
			            </div> 
			          </div>
			    </div>
			</div>
			<div class="row">
			    <div class="col-md-6">
			       <div class="box box-solid  box-danger">
			            <div class="box-header with-border">
			              <h3 class="box-title"><i class="fa fa-users"></i> Karyawan On Time</h3> 
			            </div>
			            <div class="box-body" style="height: 200px;">
			             <marquee direction = "left" width="100%" scrollamount="12" behavior="scroll">
			             	 <div id="displayImageOntime"></div>
			             </marquee>
			            </div> 
			          </div>
			    </div>
          <div class="col-md-6">
             <div class="box box-solid  box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-users"></i> Karyawan Terlambat</h3> 
                  </div>
                  <div class="box-body" style="height: 200px;">
                   <marquee direction = "left" width="100%" scrollamount="12" behavior="scroll">
                     <div id="displayImage"></div>
                   </marquee>
                  </div> 
                </div>
          </div>
			</div>
			<!-- End Content -->    
      </section>
      <!-- /.content -->


<!-- End Content-->
<script type="text/javascript">
  window.setTimeout("waktu()", 1000);
 
  function waktu() {
    var waktu = new Date();
    setTimeout("waktu()", 1000);
    document.getElementById("jam").innerHTML = waktu.getHours();
    document.getElementById("menit").innerHTML = waktu.getMinutes();
    document.getElementById("detik").innerHTML = waktu.getSeconds();
  }
</script>


<script type="text/javascript">
  run1();
  run2();
  function run1() {
     setTimeout(function(){ 
        terlambat();
        tepatwaktu();
        run1();
         }, 
    1000);
  }
  
  function terlambat() {
    $.ajax({
          url:'<?php echo base_url() ?>monitor/check/terlambat',
          type:'POST',
          async:false,
          data:{
            employee_id:"",
          },
          success:function(data){
            document.getElementById('terlambat_result').innerHTML = data;  
          }
        });
  }
  function tepatwaktu() {
    $.ajax({
          url:'<?php echo base_url() ?>monitor/check/tepatwaktu',
          type:'POST',
          async:false,
          data:{
            employee_id:"",
          },
          success:function(data){ 
            document.getElementById('tepatwaktu_result').innerHTML = data; 
          }
        });
  }
  function run2() {
    setTimeout(function(){ 
      displayImage();
      displayChart();
      displayImageOntime();
      run2();
  }, 1000);
  }
  
  function displayImage() {
    $.ajax({
          url:'<?php echo base_url() ?>monitor/check/displayImage',
          type:'POST',
          async:false,
          data:{
            employee_id:"",
          },
          success:function(data){
            document.getElementById('displayImage').innerHTML = data;  
          }
        });
  }
  function displayImageOntime() {
    $.ajax({
          url:'<?php echo base_url() ?>monitor/check/displayImageOntime',
          type:'POST',
          async:false,
          data:{
            employee_id:"",
          },
          success:function(data){
            document.getElementById('displayImageOntime').innerHTML = data;  
          }
        });
  }
  function displayChart() {
    $.ajax({
          url:'<?php echo base_url() ?>monitor/check/displayChart',
          type:'POST',
          async:false,
          data:{
            employee_id:"",
          },
          success:function(data){
            document.getElementById('displayChart').innerHTML = data;  
          }
        });
  }
</script>











    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.13
      </div>
      <strong>Copyright &copy; 2021 PT. Multi Fabrindo Gemilang.</strong> 
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
<!-- Select2 -->
<script src="<?= base_url() ?>temp/lte/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>temp/lte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>temp/lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>temp/lte/dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable();
    $('.select2me').select2({ width: '100%' });
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



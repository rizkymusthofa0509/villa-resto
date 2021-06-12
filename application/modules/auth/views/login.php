
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Apps</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>temp/lte/plugins/iCheck/square/blue.css">

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
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='800' viewBox='0 0 200 200'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='88' y1='88' x2='0' y2='0'%3E%3Cstop offset='0' stop-color='%23771221'/%3E%3Cstop offset='1' stop-color='%23be1c35'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='75' y1='76' x2='168' y2='160'%3E%3Cstop offset='0' stop-color='%238f8f8f'/%3E%3Cstop offset='0.09' stop-color='%23b3b3b3'/%3E%3Cstop offset='0.18' stop-color='%23c9c9c9'/%3E%3Cstop offset='0.31' stop-color='%23dbdbdb'/%3E%3Cstop offset='0.44' stop-color='%23e8e8e8'/%3E%3Cstop offset='0.59' stop-color='%23f2f2f2'/%3E%3Cstop offset='0.75' stop-color='%23fafafa'/%3E%3Cstop offset='1' stop-color='%23FFFFFF'/%3E%3C/linearGradient%3E%3Cfilter id='c' x='0' y='0' width='200%25' height='200%25'%3E%3CfeGaussianBlur in='SourceGraphic' stdDeviation='12' /%3E%3C/filter%3E%3C/defs%3E%3Cpolygon fill='url(%23a)' points='0 174 0 0 174 0'/%3E%3Cpath fill='%23000' fill-opacity='.5' filter='url(%23c)' d='M121.8 174C59.2 153.1 0 174 0 174s63.5-73.8 87-94c24.4-20.9 87-80 87-80S107.9 104.4 121.8 174z'/%3E%3Cpath fill='url(%23b)' d='M142.7 142.7C59.2 142.7 0 174 0 174s42-66.3 74.9-99.3S174 0 174 0S142.7 62.6 142.7 142.7z'/%3E%3C/svg%3E");
background-attachment: fixed;
background-repeat: no-repeat;
background-position: top left;
    }
  </style>
</head>
<body class="hold-transition login-page bg">
<div class="login-box">
  <div class="login-logo">
    <img src="https://multifab.co.id/asset/images/logohd.png" width="50%"><br>
    <!-- <a href="<?= base_url() ?>temp/lte/index2.html"><b>Multifab </b>Apps</a> -->
    
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Create your Session Login</p>

    <form action="<?= base_url() ?>auth/checking" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username"  value="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password"  value="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" data-toggle="modal" data-target="#myModal">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-key"></i> Sigle Sign On</a>
    </div>
    <!-- /.social-auth-links -->
 <p>
      Human Resource Information System
    </p>
    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>temp/lte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>temp/lte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url() ?>temp/lte/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: red;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-desktop"></i> Application</h4>
      </div>
      <div class="modal-body">
       <table width="200px" align="center" border="0">
         <tr>
          <td width="100px;" align="center">
             <img src="https://www.vippng.com/png/detail/3-39594_user-icon.png" style="width: 70%;"> 
           </td>
           <td width="30px;"></td>
           <td width="100px;" align="center">
             <img src="https://winaero.com/blog/wp-content/uploads/2017/07/Control-panel-windows-10-icon.png" style="width: 100%;">
           </td> 
         </tr>
         <tr>
           <td align="center">
             <label>Employee</label>
           </td>
           <td width="30px;"></td>
           <td align="center">
             <label>Admin Panel</label>
           </td>
         </tr>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

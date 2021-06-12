 <form action="<?= base_url() ?>apps/profile/auth_update" method="POST">
 	
 <div class="row"> 
  <div class="box box-danger box-solid ">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-bank"></i> Change Password</h3>
      <!-- Left -->
      <div class="box-tools pull-right">
        <!--  -->
        <!-- <button type="button" class="btn btn-box-tool" data-widget="Reload" data-toggle="tooltip" title="Reload">
          <i class="fa fa-refresh"></i></button> -->
      </div>
      <!-- End Left --> 
    </div>
    <div class="box-body">
        
      <div class="col-md-12" style="margin-top: 20px;">
         <table class="table table-bordered table-striped"> 
           <tr>
             <td class="bold">Password</td>
             <td>
               <input type="password" name="" id="" class="form-control" value="<?= $login_id['password'] ?>" >
             </td> 
           </tr>
           <tr>
             <td class="" colspan="2">Create New Password</td> 
           </tr>
           <tr>
             <td class="bold">New Password</td>
             <td>
               <input type="password" name="password" id="password" class="form-control" >
             </td> 
           </tr>
           <tr>
             <td class="bold">Confirm Password</td>
             <td>
               <input type="password" name="c_password" id="c_password" class="form-control" >
             </td> 
           </tr> 
         </table>

         <div class="col-md-12" style="margin-top: 20px;"> 
          <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
          <div class="pull-right">
            <button class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-save"></i> Save</button>
          </div> 
      </div>
      </div>
    </div> 
  </div> 
</div> 
</form>

 
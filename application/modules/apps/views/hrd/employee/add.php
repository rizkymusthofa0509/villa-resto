 

<div class="row"> 
<form action="<?= base_url() ?>apps/employee/act/add-save" method="POST">
	<div class="col-md-12">
		<div class="box box-solid  box-danger" style="border-style: 10px;">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-user"></i> Tambah Data Karyawan</h3>
              <!-- Left -->
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <b><i class="fa fa-angle-down"></i	></b></button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="Reload" data-toggle="tooltip" title="Reload">
                  <i class="fa fa-refresh"></i></button> -->
              </div>
              <!-- End Left --> 
            </div>
            <div class="box-body">
              

              <div class="col-md-12" style="margin-top: 20px;">
                 <table width="100%" class="table" border="0" style="margin-left: -20px;">
                 	 
                 	<tr>
                 		<td class="bold">Badge Number</td>
                 		<td class="">
                 			<input type="text" name="badge_number" id="badge_number" class="form-control">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">&nbsp;</td>
                 		<td class="">
							  <div class="">
				                <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
				                <div class="pull-right">
				                  <button class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-refresh"></i> Buat Badge Number</button>
				                </div>
				              </div>
                 		</td>
                 	</tr>

                 </table>
              </div>

               

            </div> 
          </div> 

	</div>

	 
        
</form>     
</div>

<!-- End Content -->




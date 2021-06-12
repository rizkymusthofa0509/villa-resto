
<div class="row"> 
        
  <div class="box box-danger box-solid ">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-bank"></i> Profile</h3>
      <!-- Left -->
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <b><i class="fa fa-angle-down"></i></b></button>
        <button type="button" class="btn btn-box-tool" data-widget="Reload" data-toggle="tooltip" title="Reload">
          <i class="fa fa-refresh"></i></button>
      </div>
      <!-- End Left --> 
    </div>
    <div class="box-body"> 
      <div class="col-md-12" style="margin-top: 20px;">
         <table border="1" width="100%" class="table table-bordered table-striped">
         	<tr>
         		<td valign="top" width="200px;" height="200px;">
         			<?php
						if ($det['photo']==""){
							?>
								<img id="output" src="<?= base_url() ?>assets/images/no.png" width="100%" height="100%" />
							<?php
						}else{
							?>
								<img id="output" src="<?= base_url() ?>assets/images/profile/<?= $det['photo'] ?>" width="100%" height="100%" />
							<?php
						}
					?>
         		</td>
         		<td valign="top">
         			<form action="<?= base_url() ?>apps/attendance/act/update" method="post">
         			<table class="table table-bordered table-striped">
         				<tr>
         					<td class="bold" width="200px;">Nama Lengkap</td>
         					<td><?= $det['full_name'] ?></td>
         				</tr>
         				<tr>
         					<td class="bold" width="200px;">Badge Number</td>
         					<td><?= $det['badge_number'] ?></td>
         				</tr>
         				<tr>
         					<td class="bold" width="200px;">Posisi</td>
         					<td><?= $det['posisi'] ?></td>
         				</tr>
         				<tr>
         					<td class="bold" width="200px;">Tanggal</td>
         					<td>
         						<input type="hidden" name="id" value="<?= $edit['id']?>" class="form-control">
         						<input type="hidden" name="badge_number" value="<?= $det['badge_number']?>" class="form-control">
         						<input type="date" name="tanggal" value="<?= $edit['tanggal'] ?>" class="form-control">
         					</td>
         				</tr>
         				<tr>
         					<td class="bold" width="200px;">Jam Masuk</td>
         					<td>
         						<input type="time" value="<?= $edit['time_in'] ?>" name="time_in" class="form-control">
         					</td>
         				</tr>
         				<tr>
         					<td class="bold" width="200px;">Jam Pulang</td>
         					<td>
         						<input type="time" value="<?= $edit['time_out'] ?>" name="time_out" class="form-control">
         					</td>
         				</tr>
                        <tr>
                            <td class="bold" width="200px;">Catatan</td>
                            <td>
                                <input type="text" name="catatan" value="<?= $edit['catatan'] ?>"  class="form-control" placeholder="Working Hour.">
                            </td>
                        </tr>
         				<tr>
         					<td class="bold" width="200px;">&nbsp;</td>
         					<td>
         						<a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
         						<button class="btn btn-sm btn-success" style="border-radius: 0px;"><i class="fa fa-save"></i> Save</button>
         						
         					</td>
         				</tr>
         			</table>
         			</form>
         		</td>
         	</tr>
         </table>
      </div>
    </div> 
  </div> 

</div>

 
<!-- End Content -->

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
         			</table>
         			
         		</td>
         	</tr>
         </table>
      </div>
    </div> 
  </div> 

</div>


<div class="row"> 
        
          <div class="box box-danger box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bank"></i> Detail attendance</h3>
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
              <div class="col-md-12">
                <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
                <a href="<?= base_url() ?>apps/attendance/act/add-new/<?= $det['badge_number'] ?>" class="btn btn-sm btn-info" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add New</a>
                <div class="pull-right">
                 <form>
                   <table>
                     <tr>
                       <td><input type="date" class="form-control" name="dari" value="<?php if ($this->input->get('dari')){echo $this->input->get('dari');}else{echo date_now();}?>"></td>
                       <td><input type="date" class="form-control" name="sampai" value="<?php if ($this->input->get('sampai')){echo $this->input->get('sampai');}else{echo date_now();}?>"></td>
                       <td><button class="btn btn-sm btn-primary" style="border-radius: 0px;"><i class="fa fa-search" ></i></button></td>
                     </tr>
                   </table>
                 </form>
                </div>
              </div>

              <div class="col-md-12" style="margin-top: 20px;">
                <table class="dataTables table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px;">No</th>
                  <th width="300px;">Date Time</th>
                  <th width="80px;">Time In</th>
                  <th width="80px;">Time Out</th> 
                  <th width="80px;">Work Time</th> 
                  <th width="80px;">Catatan</th> 
                  <th width="50px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                 $tot_workingtime = array();
                ?>
                <?php $no=1; foreach ($getAll->result() as $rgetAll): ?>
                
                <?php
                  if ($this->input->get('dari')){
                     if (($rgetAll->tanggal>=$this->input->get('dari')) AND ($rgetAll->tanggal<=$this->input->get('sampai'))){
                      ?>
                      <?php 
                        $workingTime = timeHours($rgetAll->time_in,$rgetAll->time_out);
                        array_push($tot_workingtime, $workingTime['jam'].':'.$workingTime['menit']);
                      ?>
                      <tr>
                          <td><?= $no++?></td>
                          <td><?= date_idn($rgetAll->tanggal); ?></td>
                          <td align="center"><?= substr($rgetAll->time_in,0,5) ?></td>
                          <td align="center"><?= substr($rgetAll->time_out,0,5) ?></td> 
                          <td align="center"><?= $workingTime['jam'].' Jam '.$workingTime['menit'].' Menit'; ?></td> 
                          <td><?= $rgetAll->catatan ?></td>
                          <td align="center">
                            <label class="label label-success"><a href="<?= base_url() ?>apps/attendance/act/edit/<?= $rgetAll->badge_number ?>/<?= $rgetAll->id ?>" title="Edit"><i class="fa fa-pencil" style="color: white;"></i></a></label>
                            <!-- <label class="label label-warning"><a href="<?= base_url() ?>apps/" title="Test"><i class="fa fa-eye" style="color: white;"></i></a></label> -->
                            <label class="label label-danger"><a onclick="return confirm('Are you sure you want to delete data permanently?')" href="<?= base_url() ?>apps/attendance/act/delete/<?= $rgetAll->badge_number ?>/<?= $rgetAll->id ?>" title="Delete"><i class="fa fa-trash" style="color: white;"></i></a></label> 
                          </td>
                        </tr>  
                      <?php
                     }
                  }else{
                    if (($rgetAll->tanggal>=date_now()) AND ($rgetAll->tanggal<=date_now())){
                      ?>
                      <?php 
                        $workingTime = timeHours($rgetAll->time_in,$rgetAll->time_out);
                        array_push($tot_workingtime, $workingTime['jam'].':'.$workingTime['menit']);
                      ?>
                      <tr>
                          <td><?= $no++?></td>
                          <td><?= date_idn($rgetAll->tanggal); ?></td>
                          <td align="center"><?= substr($rgetAll->time_in,0,5) ?></td>
                          <td align="center"><?= substr($rgetAll->time_out,0,5) ?></td> 
                          <td align="center"><?= $workingTime['jam'].' Jam '.$workingTime['menit'].' Menit'; ?></td> 
                          <td><?= $rgetAll->catatan ?></td>
                          <td align="center">
                            <label class="label label-success"><a href="<?= base_url() ?>apps/attendance/act/edit/<?= $rgetAll->badge_number ?>/<?= $rgetAll->id ?>" title="Edit"><i class="fa fa-pencil" style="color: white;"></i></a></label>
                            <!-- <label class="label label-warning"><a href="<?= base_url() ?>apps/" title="Test"><i class="fa fa-eye" style="color: white;"></i></a></label> -->
                            <label class="label label-danger"><a onclick="return confirm('Are you sure you want to delete data permanently?')" href="<?= base_url() ?>apps/attendance/act/delete/<?= $rgetAll->badge_number ?>/<?= $rgetAll->id ?>" title="Delete"><i class="fa fa-trash" style="color: white;"></i></a></label> 
                          </td>
                        </tr>  
                      <?php
                     }
                  }
                ?>

                  


                <?php endforeach ?>
                   <tr>
                      <td colspan="4" class="bold">Total</td> 
                      <td align="center" ><?= sum_time($tot_workingtime) ?></td> 
                      <td align="center">
                         &nbsp;
                      </td>
                       <td align="center">
                         &nbsp;
                      </td>
                    </tr>  
                </tbody>
                 
              </table>
              </div>
            </div> 
          </div> 

</div>

<!-- End Content -->
<?php
  function sum_time($data) {
    $i = 0;
    foreach ($data as $time) {
        sscanf($time, '%d:%d', $hour, $min);
        $i += $hour * 60 + $min;
    }
    if ($h = floor($i / 60)) {
        $i %= 60;
    }
    return sprintf('%02d Jam %02d Menit', $h, $i);
}
?>
  
<!-- Content -->

<div class="row"> 
        
          <div class="box box-danger box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bank"></i> Data Hari Libur</h3>
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
                <a data-toggle="modal" data-target="#tambahTanggal" class="btn btn-sm btn-info" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add New</a>
                <div class="pull-right">
                	<form action="<?= base_url()?>apps/attendance/settings/libur" method="GET"> 
                	<table>
                		<tr>
                			<td>
                				<select name="tahun" id="tahun" class="form-control select2me">
                          <option value="">ALL</option>
				                  	<?php
				                  		for ($i=2020; $i <= DATE("Y") ; $i++) { 
				                  			echo '<option value="'.$i.'" '; if ($this->input->get('tahun')==$i){echo 'selected';} echo'>'.$i.'</option>';
				                  		}
				                  	?> 
				                  </select>
                			</td>
                			<td>
                				<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Cari</button>
                			</td>
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
                  <th width="100px;">Tanggal</th>
                  <th>Deskripsi</th> 
                  <th width="50px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                	<?php $no=1; foreach ($libur->result() as $data): ?>
                		<tr>
		                      <td><?= $no++ ?></td>
		                      <td><?= date_idn($data->tanggal); ?></td>
		                      <td><?= $data->deskripsi ?></td> 
		                      <td>
		                         <label class="label label-danger"><a onclick="return confirm('Are You Sure ? ');" href="<?= base_url() ?>apps/attendance/settings/libur-destroy/<?= $data->libur_id ?>" title="Test"><i class="fa fa-trash" style="color: white;"></i></a></label> 
		                      </td>
		                    </tr>
                	<?php endforeach ?>
                     

                </tbody>
                 
              </table>
              </div>
            </div> 
          </div> 

</div>

<!-- End Content -->



<!-- Modal -->
<div id="tambahTanggal" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Hari libur</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url() ?>apps/attendance/settings/libur-save" method="POST">
          <table class="table">
            <tr>
              <td>
                Tanggal
              </td>
              <td>
                <input type="date" name="tanggal" class="form-control" value="<?= date_now() ?>"> 
              </td>
            </tr>
            <tr>
              <td>
                Deskripsi
              </td>
              <td>
                <textarea class="form-control" name="deskripsi"></textarea>
              </td>
            </tr>
            <tr>
              <td>
                Tipe Libur
              </td>
              <td>
                <select class="form-control select2me" name="tipe">
                  <option value="nasional">Nasional</option>
                  <option value="other">Lain-lain</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                &nbsp;
              </td>
              <td>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i>Simpan</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>
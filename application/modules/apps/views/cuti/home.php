<div class="row">
    <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>apps/hr/master/direktorat">
      <i class="fa fa-calendar"></i> Tahun Periode Cuti
    </a>
    <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>app">
      <i class="fa fa-bank"></i> Terbitkan Cuti
    </a>
    <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>app">
      <i class="fa fa-bank"></i> 
    </a>
     <!--  <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>app">
      <i class="fa fa-users"></i> Jabatan
    </a>
    <div class="pull-right">
      <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>app"> 
      <i class="fa fa-user"></i> Non Active
    </a>
    </div> -->
</div>  

<!-- Content -->

<div class="row"> 
        
          <div class="box box-danger box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bank"></i> Data Karyawan</h3>
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
                <a href="" class="btn btn-sm btn-info" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add New</a>
                <!--<div class="pull-right">
                  <a href="" class="btn btn-sm btn-primary" style="border-radius: 0px;" ><i class="fa fa-print"></i> Print</a>
                  <a href="" class="btn btn-sm btn-primary" style="border-radius: 0px; background-color: green;"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                  <a href="" class="btn btn-sm btn-primary" style="border-radius: 0px; background-color: green;"><i class="fa fa-file-excel-o"></i> Import Excel</a>
                </div> -->
              </div>

              <div class="col-md-12" style="margin-top: 20px;">
                <table class="dataTables table table-bordered table-striped">
                <thead>
                	<tr>
                		<th rowspan="2">No</th>
                		<th rowspan="2">Badge</th>
                		<th rowspan="2">Nama Lengkap</th>
                		<th colspan="12" align="center">Periode 2021</th> 
                	</tr>
	                <tr>  
	                  <?php
	                  	for ($i=1; $i <= 12 ; $i++) { 
	                  		echo '<th>'.$i.'</th>';
	                  	}
	                  ?> 
	                  <th>Sisa Cuti</th>
	                </tr>
                </thead>
                <tbody>
                	<?php $no=1; foreach ($employee->result() as $rlist): ?>
                		<tr>
	                      <td><?= $no++ ?></td>
	                      <td><?= $rlist->badge_number ?></td>
	                      <td><?= $rlist->full_name ?></td> 
	                      <?php
		                  	for ($i=1; $i <= 12 ; $i++) { 
		                  		?>
		                  			<td align="center">
		                  				0
		                  			</td>
		                  		<?php
		                  	}
		                  ?> 
		                  <td>0</td>
	                    </tr> 
                	<?php endforeach ?>
                    
                </tbody>
                 
              </table>
              </div>
            </div> 
          </div> 

</div>

<script type="text/javascript">
	function chosen_month(month) {
		alert(month)
	}
</script>

<!-- End Content -->
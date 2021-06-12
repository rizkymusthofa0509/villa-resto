 <form action="<?= base_url() ?>apps/attendance/tarik/proses" method="POST" >
	 <div class="row"> 
	  <div class="box box-danger box-solid ">
	    <div class="box-header with-border">
	      <h3 class="box-title"><i class="fa fa-bank"></i> Mesin Absensi</h3>
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
	             <td class="bold">Periode Awal</td>
	             <td>
	               <input type="date" name="mulai" id="mulai" class="form-control" value="<?= date_now() ?>" >
	             </td>
	             <td class="bold">Periode Akhir</td>
	             <td>
	               <input type="date" name="akhir" id="akhir" class="form-control" value="<?= date_now() ?>" >
	             </td>
	           </tr>
	           <tr>
	             <td class="bold">Mesin</td>
	             <td>
	               <select class="form-control select2me" name="device_id" id="device_id" >
	               	<?php foreach ($device->result() as $data): ?>
	               		<option value="<?= $data->device_id ?>"><?= $data->nama ?> <?= $data->lokasi ?></option>
	               	<?php endforeach ?> 
	               </select>
	             </td>
	             <td class="bold">Tipe data</td>
	             <td>
	               <select class="form-control select2me" name="tipe" id="tipe" >
	                 <option value="1">Tarik data</option>
	                 <!-- <option value="">Replace</option> -->
	               </select>
	             </td>
	           </tr>
	            
	         </table>

	         <div class="col-md-12" style="margin-top: 20px;"> 
	          <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
	          <div class="pull-right">
	          	<!-- <font size="1">
	          		Note : Tarik data Otomatis by Sistem
	          	</font> -->
	            <button class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-save"></i> Proses</button>
	          </div> 
	      </div>
	      </div>
	    </div> 
	  </div> 
	</div> 
</form>
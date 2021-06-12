 
<!-- Content -->

<div class="row"> 
        
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-bank"></i>Import Data Karyawan</h3>
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
          	
            <!-- <a href="" class="btn btn-sm btn-info" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add New</a> -->
            <div class="pull-right">
               
            </div>
          </div>

          <div class="col-md-12" style="margin-top: 20px;">
            <?php

            echo form_open_multipart('apps/employee/pages/import_data');
 
 
            ?> 
          		<div class="row">
          			<div class="col-md-12">
          				<div class="form-group">
		          			<label>Import File</label>
                    <input type="file" name="file" id="file" class="form-control">
		          			<input type="text" name="text" id="file" class="form-control" value="text">
		          		</div>
		          		<div class="form-group">
		          			<font>Note : <br>Unduh format import data karyawan <a href="<?= base_url() ?>download/">Klik disini</a></font>
		          		</div>
		          		<div class="form-group">
		          			<a onclick="window.history.back();" class="btn bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
		          			<button name="submit" class="btn btn-primary" style="border-radius: 0px;"><i class="fa fa-save"></i> Process</button>
		          		</div>
          			</div>
          		</div>
          	<?php
               echo form_close();
            ?>

          </div>
        </div> 
      </div> 

</div>

<!-- End Content -->
 <div class="row"> 
  <div class="box box-danger box-solid ">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-bank"></i> Tambah Penghargaan</h3>
      <!-- Left -->
      <div class="box-tools pull-right">
        <!--  -->
        <!-- <button type="button" class="btn btn-box-tool" data-widget="Reload" data-toggle="tooltip" title="Reload">
          <i class="fa fa-refresh"></i></button> -->
      </div>
      <!-- End Left --> 
    </div>
    <div class="box-body">
      <form action="<?= base_url() ?>apps/employee/appreciation/add-save" method="POST">
      	
      
      <div class="col-md-12" style="margin-top: 20px;">
         <table class="table table-bordered table-striped"> 
          	<tr>
             <td class="bold">Nomor Dok.</td>
             <td>
               <input type="hidden" name="doc_no" id="doc_no" class="form-control" value="<?= new_number_appreciation(); ?>" >
               <font><?= new_number_appreciation(); ?></font>
             </td> 
            </tr>
            <tr>
             <td class="bold">Nama Karyawan</td>
             <td>
               <select name="employee_id" id="employee_id" class="form-control select2me">
               	<?php foreach ($emp->result() as $remp): ?>
               		<option value="<?= $remp->employee_id ?>"><?= $remp->full_name ?></option>
               	<?php endforeach ?>
               	
               </select>
             </td> 
            </tr>
            <tr>
             <td class="bold">Bentuk Penghargaan</td>
             <td>
               <select name="item_id" id="item_id" class="form-control select2me">
               	<?php foreach ($item->result() as $ritem): ?>
               		<option value="<?= $ritem->item_id ?>"><?= $ritem->name ?></option>
               	<?php endforeach ?>
               </select>
             </td> 
            </tr>
            <tr>
             <td class="bold">Tanggal</td>
             <td>
               <input type="date" name="date" id="date" class="form-control" value="<?= date_now() ?>">
             </td> 
            </tr>
            <tr>
             <td class="bold">Keterangan</td>
             <td>
               <textarea class="form-control" name="description" id="description"></textarea>
             </td> 
            </tr>
            
            
         </table>

         <div class="col-md-12" style="margin-top: 20px;"> 
          <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
          <div class="pull-right">
            <button class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-save"></i> Save</button>
          </div> 
      </div>
      </form>  
      </div>
    </div> 
  </div> 
</div> 
 
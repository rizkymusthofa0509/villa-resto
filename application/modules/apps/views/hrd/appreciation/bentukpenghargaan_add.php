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
      <form action="<?= base_url() ?>apps/employee/appreciation/bentuk-penghargaan-save" method="POST">
      	
      
      <div class="col-md-12" style="margin-top: 20px;">
         <table class="table table-bordered table-striped"> 
          	 
            <tr>
             <td class="bold">Nama</td>
             <td>
               <input type="text" name="name" id="name" class="form-control" value="">
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
 
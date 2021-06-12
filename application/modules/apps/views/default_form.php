 <form action="<?= base_url() ?>" method="POST" >
   <div class="row"> 
    <div class="box box-danger box-solid ">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-bank"></i> Data Karyawan</h3>
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
               <td class="bold">Nomor Dok.</td>
               <td>
                 <input type="text" name="" id="" class="form-control" >
               </td>
               <td class="bold">No BPJS Kesehatan</td>
               <td>
                 <input type="text" name="" id="" class="form-control" >
               </td>
             </tr>
             <tr>
               <td class="bold">Nama Karyawan</td>
               <td>
                 <select class="form-control select2me" name="" id="" >
                  <option value="">--Pilih Karyawan--</option>
                   <option value="">asas</option>
                 </select>
               </td>
               <td class="bold">No BPJS Kesehatan</td>
               <td>
                 <input type="text" name="" id="" class="form-control" >
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
 
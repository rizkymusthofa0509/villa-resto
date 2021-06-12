 <form action="<?= base_url() ?>apps/attendance/settings/mesin-update" method="POST" >
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
               <td class="bold">Nama Mesin</td>
               <td>
                 <input type="text" name="nama" id="nama" class="form-control" value="<?= $det['nama'] ?>" >
                 <input type="hidden" name="device_id" id="device_id" class="form-control" value="<?= $det['device_id'] ?>" >
               </td> 
             </tr>
             <tr>
               <td class="bold">Lokasi Mesin</td>
               <td>
                 <input type="text" name="lokasi" id="lokasi" class="form-control" value="<?= $det['lokasi'] ?>" >
               </td> 
             </tr>
             <tr>
               <td class="bold">IP Address</td>
               <td>
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" name="ip_address" id="ip_address" value="<?= $det['ip_address'] ?>">
                      <span class="input-group-btn">
                        <a class="btn btn-info btn-flat" id="return_koneksi" onclick="return_koneksi();">Tes Koneksi</a>
                      </span>
                </div>   
               </td> 
             </tr>
             <tr>
               <td class="bold">ComKey</td>
               <td>
                 <input type="text" name="comKey" id="comKey" class="form-control" value="<?= $det['comKey'] ?>" >
               </td> 
             </tr>
             <tr>
               <td class="bold">Status Mesin</td>
               <td>
                 <select class="form-control select2me" name="status" id="status" >
                  <option value="1" <?php if($det['status']=='1'){echo "selected";} ?>>Aktif</option>
                   <option value="0" <?php if($det['status']=='0'){echo "selected";} ?>>Tidak Aktif</option>
                 </select>
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


<script type="text/javascript">
  function return_koneksi() { 
    var ip_address = document.getElementById('ip_address').value;
    var comKey = document.getElementById('comKey').value;
    $.ajax({
        url:'<?php echo base_url() ?>apps/attendance/settings/mesin-koneksi',
        type:'POST',
        async:false,
        data:{
          ip_address:ip_address,
          comKey:comKey,
        },
        success:function(data){ 
          if (data=='success'){
            document.getElementById('return_koneksi').innerHTML = '<i class="fa fa-check"></i>Koneksi Berhasil';
            document.getElementById("return_koneksi").className = 'btn btn-success btn-flat'; 
          }else{
            document.getElementById('return_koneksi').innerHTML = '<i class="fa fa-remove"></i>Koneksi Gagal';
            document.getElementById("return_koneksi").className = 'btn btn-danger btn-flat'; 
          } 
        }
      });
  }
</script>
 
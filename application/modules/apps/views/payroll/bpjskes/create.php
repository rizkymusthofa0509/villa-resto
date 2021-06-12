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
             <td class="bold">Nama Karyawan</td>
             <td>
               <select class="form-control select2me" name="employee_id" id="employee_id" onchange="employee(this);">
                <option value="">--Pilih Karyawan--</option>
                 <?php foreach ($employee->result() as $data): ?>
                   <option value="<?= $data->employee_id ?>"><?= $data->full_name ?></option>
                 <?php endforeach ?> 
               </select>
             </td>
             <td class="bold">No BPJS Kesehatan</td>
             <td>
               <input type="text" name="no_bpjskes" id="no_bpjskes" class="form-control" onkeyup="upper(this)">
             </td>
           </tr>
           <tr>
             <td class="bold">Department</td>
             <td>
                <input type="text" name="department" id="department" class="form-control" readonly>
             </td>
             <td class="bold">Tanggal Daftar</td>
             <td>
               <input type="date" name="tgl_daftar" id="tgl_daftar" class="form-control" value="<?= date_now() ?>">
             </td>
           </tr>
           <tr>
             <td class="bold">Jabatan</td>
             <td>
                <input type="text" name="" id="" class="form-control" readonly>
             </td>
             <td class="bold">Gaji Yang Dilaporkan</td>
             <td>
               <input type="text" name="laporan_gaji" id="laporan_gaji" class="form-control" placeholder="Minimum UMK" onkeyup="gp(this);">
             </td>
           </tr>
           <tr>
             <td class="bold">Posisi</td>
             <td>
                <input type="text" name="" id="" class="form-control" readonly>
             </td>
             <td class="bold">Iuran Pekerja (1%)</td>
             <td>
               <input type="text" name="iuran_pekerja" id="iuran_pekerja" class="form-control" readonly>
             </td>
           </tr>
           <tr>
             <td class="bold">Status Kepegawaian</td>
             <td>
                <input type="text" name="" id="" class="form-control" readonly>
             </td>
             <td class="bold">Iuran Perusahaan (4%)</td>
             <td>
               <input type="text" name="iuran_perusahaan" id="iuran_perusahaan" class="form-control" readonly>
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
      <h3 class="box-title"><i class="fa fa-bank"></i> BPJS Kesehatan</h3>
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
             <td colspan="6" class="bold">Data Tanggungan / Tambahan</td>
             <td width="20px;"><a href="" class="btn btn-sm btn-success" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add</a></td>
           </tr>
           <tr>
             <td class="bold">No</td>
             <td class="bold">Nama Tanggungan/Tambahan</td>
             <td class="bold">No BPJS Kesehatan</td>
             <td class="bold">Tgl Daftar</td>
             <td class="bold">Hubungan</td>
             <td class="bold">Kategori</td>
             <td class="bold">
               <!-- <a href="" class="btn btn-sm btn-danger" style="border-radius: 0px;"><i class="fa fa-trash"></i></a> -->
             </td>
           </tr>
           <!-- Loop -->
           <tr>
             <td class="bold">1</td>
             <td class="bold">
                <input type="text" name="no_bpjskes" id="no_bpjskes" class="form-control">
             </td>
             <td class="bold">
                <input type="text" name="nama" id="nama" class="form-control">
             </td>
             <td class="bold">
               <input type="text" name="tgl_daftar" id="tgl_daftar" class="form-control">
             </td>
             <td class="bold">
              <select class="form-control select2me" name="hubungan" id="hubungan">
                <option value="Suami/Istri">Suami/Istri</option>
                <option value="Anak">Anak</option>
                <option value="Ibu">Ibu</option>
                <option value="Bapak">Bapak</option>
                <option value="Orang Tua 1">Orang Tua</option> 
              </select>
             </td>
             <td class="bold">
                <select class="form-control select2me" name="kategori" id="kategori">
                  <option value="Tanggungan">Tanggungan</option>
                  <option value="Tambahan">Tambahan</option>
                </select>
             </td>
             <td class="bold">
               <a href="" class="btn btn-sm btn-danger" style="border-radius: 0px;"><i class="fa fa-trash"></i></a>
             </td>
           </tr>
           <!-- End Loop -->
            
         </table>
      </div>
      <div class="col-md-12" style="margin-top: 20px;"> 
          <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
          <div class="pull-right">
            <button class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-save"></i> Save</button>
          </div> 
      </div>
    </div> 
  </div> 
</div>

<!-- End Content -->
<script type="text/javascript">
  function employee(get) {
    var employee_id = get.value; 
    $.ajax({
        url:'<?php echo base_url() ?>apps/payroll/bpjskes/info-employee',
        type:'POST',
        // contentType: "application/json",
        // dataType: "json",
        async:false,
        data:{
          employee_id:employee_id,
        },
        success:function(res){
          document.getElementById('department').value = "Asasasas";
        }
      });
  }
</script>

<script type="text/javascript">
  function upper(get) {
    var str = get.value;
    var res = str.toUpperCase();
    $('#no_bpjskes').val(res);
  }
  function gp(data) {
    var gp = data.value;
    iuranPekerja(gp);
    iuranPerusahaan(gp);
  }
  function iuranPekerja(nominal) {
    var gp  = nominal;
    if (gp>8000000){
      var pay = 80000;
    }else{
      var pay = (gp*1)/100;
    }
    
    document.getElementById('iuran_pekerja').value = pay;
  }
  function iuranPerusahaan(nominal) {
    var gp  = nominal; 
    // if (gp>8000000){
      // var pay = 80000;
    // }else{
      var pay = (gp*4)/100;
    // }
    document.getElementById('iuran_perusahaan').value = pay;
  }

  
</script>
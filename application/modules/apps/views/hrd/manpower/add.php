<form action="<?= base_url() ?>apps/employee/manpower/save" method="POST">
  

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
               <b><font size="5"><?=new_number_manPower()?></font></b>
               <input type="hidden" name="doc_no" value="<?=new_number_manPower()?>">
             </td>
             <td class="bold">Tanggal Pengajuan</td>
             <td>
               <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" class="form-control" value="<?= date_now() ?>" > 
             </td>
           </tr>
           <tr>
             <td class="bold">Divisi yang meminta</td>
             <td>
               <select class="form-control select2me" name="division_id" id="division_id">
                <option value="">--Divisi--</option>
                 <?php foreach ($division->result() as $rdiv): ?>
                   <option value="<?= $rdiv->division_id ?>"><?= $rdiv->name ?></option>
                <?php endforeach ?>
               </select>
             </td>
             <td class="bold">Department yang meminta</td>
             <td>
               <select class="form-control select2me" name="department_id" id="department_id" >
                <option value="">--Department--</option>
                <?php foreach ($department->result() as $rdept): ?>
                   <option value="<?= $rdept->department_id ?>"><?= $rdept->name ?></option>
                <?php endforeach ?>
                
               </select>
             </td>
           </tr>
            <tr>
             <td class="bold">Untuk Jabatan</td>
             <td>
               <select class="form-control select2me" name="jabatan_id" id="jabatan_id" >
                <option value="">--Jabatan--</option>
                 <?php foreach ($jabatan->result() as $rjabatan): ?>
                   <option value="<?= $rjabatan->jabatan_id ?>"><?= $rjabatan->name ?></option>
                <?php endforeach ?>
               </select>
             </td>
             <td class="bold">Untuk Posisi</td>
             <td>
               <input type="text" name="position" id="position" class="form-control" >
             </td>
           </tr>
            <tr>
             <td class="bold">Jumlah</td>
             <td>
               <input type="text" name="jumlah" id="jumlah" class="form-control" >
             </td>
             <td class="bold">Skill</td>
             <td>
               <textarea name="skill" id="skill" class="form-control"></textarea>
             </td>
           </tr>
           <tr>
             <td class="bold">Jenis Kelamin</td>
             <td>
               <select class="form-control select2me" name="gender" id="gender" >
                <option value="">--Jenis Kelamin--</option>
                 <option value="Laki-laki">Laki-laki</option>
                 <option value="Perempuan">Perempuan</option>
               </select>
             </td>
             <td class="bold">Usia Max./ antara (tahun)</td>
             <td>
               <input type="text" name="age" id="age" class="form-control" >
             </td>
           </tr>
           <tr>
             <td class="bold">Pendidikan Min.</td>
             <td>
              <select class="form-control select2me" name="education" id="education" >
                <option value="">--Pendidikan--</option>
                 <option value="SD">SD</option>
                 <option value="SMP">SMP</option>
                 <option value="SMA">SMA</option>
                 <option value="D3">D3</option>
                 <option value="S1">S1</option>
                 <option value="S2">S2</option>
                 <option value="S3">S3</option>
               </select>
             </td>
             <td class="bold">Major</td>
             <td>
               <input type="text" name="major" id="major" class="form-control" >
             </td>
           </tr>
           <tr>
             <td class="bold">Sertifikat</td>
             <td>
               <input type="text" name="sertifikat" id="sertifikat" class="form-control" >
             </td>
             <td class="bold">Pengalaman Kerja Min. (tahun)</td>
             <td>
               <input type="text" name="pengalaman" id="pengalaman" class="form-control" >
             </td>
           </tr>
           <tr>
             <td class="bold">Uraian Kerja</td>
             <td>
               <textarea name="uraian" id="uraian" class="form-control"></textarea>
             </td>
             <td class="bold">Alasan</td>
             <td>
               <select class="form-control select2me" name="alasan" id="alasan" multiple >
                <option value="">--Pilih Karyawan--</option>
                 <option value="">Mengisi Formasi Baru</option>
                 <option value="">Mengganti Karyawan Resigned</option>
                 <option value="">Mengganti Karyawan Habis Kontrak</option>
                 <option value="">Mengganti Karyawan PHK</option>
                 <option value="">Mengganti Karyawan Rotasi/Mutasi</option>
                 <option value="">Menambah Karyawan</option>
               </select>
             </td>
           </tr>
            <tr>
             <td class="bold">Tujuan</td>
             <td>
               <textarea name="tujuan" id="tujuan" class="form-control"></textarea>
             </td>
             <td class="bold">Status Karyawan</td>
             <td>
               <select class="form-control select2me" name="status_karyawan" id="status_karyawan" >
                <option value="">--Status Karyawan--</option>
                 <option>Tetap</option>
                 <option>Kontrak</option>
                 <option>Harian Lepas</option>
               </select>
             </td>
           </tr>
            <tr>
             <td class="bold">Tanggal dibutuhkan</td>
             <td>
               <input type="date" name="tanggal_butuh" id="tanggal_butuh" class="form-control" >
               <label><a href="">Clear</a> (dd/mm/yyyy)</label>
             </td>
             <td class="bold" colspan="2"></td> 
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
 
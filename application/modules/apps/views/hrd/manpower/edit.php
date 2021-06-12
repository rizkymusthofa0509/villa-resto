<form action="<?= base_url() ?>apps/employee/manpower/update" method="POST">
  

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
               <b><font size="5"><?= $det['doc_no']?></font></b>
               <input type="hidden" name="doc_no" value="<?= $det['doc_no']?>">
               <input type="hidden" name="recruitment_id" value="<?= $det['recruitment_id']?>">
             </td>
             <td class="bold">Tanggal Pengajuan</td>
             <td>
               <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" class="form-control" value="<?= $det['tanggal_pengajuan']?>" > 
             </td>
           </tr>
           <tr>
             <td class="bold">Divisi yang meminta</td>
             <td>
               <select class="form-control select2me" name="division_id" id="division_id">
                <option value="">--Divisi--</option>
                 <?php foreach ($division->result() as $rdiv): ?>
                   <option value="<?= $rdiv->division_id ?>" <?php if ($rdiv->division_id==$det['division_id']){echo 'selected';} ?> ><?= $rdiv->name ?></option>
                <?php endforeach ?>
               </select>
             </td>
             <td class="bold">Department yang meminta</td>
             <td>
               <select class="form-control select2me" name="department_id" id="department_id" >
                <option value="">--Department--</option>
                <?php foreach ($department->result() as $rdept): ?>
                   <option value="<?= $rdept->department_id ?>" <?php if ($rdept->department_id==$det['department_id']){echo 'selected';} ?> ><?= $rdept->name ?></option>
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
                   <option value="<?= $rjabatan->jabatan_id ?>" <?php if ($rjabatan->jabatan_id==$det['jabatan_id']){echo 'selected';} ?>  ><?= $rjabatan->name ?></option>
                <?php endforeach ?>
               </select>
             </td>
             <td class="bold">Untuk Posisi</td>
             <td>
               <input type="text" name="position" id="position" class="form-control" value="<?= $det['position'] ?>">
             </td>
           </tr>
            <tr>
             <td class="bold">Jumlah</td>
             <td>
               <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?= $det['jumlah'] ?>">
             </td>
             <td class="bold">Skill</td>
             <td>
               <textarea name="skill" id="skill" class="form-control"><?= $det['skill'] ?></textarea>
             </td>
           </tr>
           <tr>
             <td class="bold">Jenis Kelamin</td>
             <td>
               <select class="form-control select2me" name="gender" id="gender" >
                <option value="">--Jenis Kelamin--</option>
                 <option value="Laki-laki" <?php if ($det['gender']=='Laki-laki'){echo 'selected';}?> >Laki-laki</option>
                 <option value="Perempuan" <?php if ($det['gender']=='Perempuan'){echo 'selected';}?> >Perempuan</option>
               </select>
             </td>
             <td class="bold">Usia Max./ antara (tahun)</td>
             <td>
               <input type="text" name="age" id="age" class="form-control" value="<?= $det['age'] ?>" >
             </td>
           </tr>
           <tr>
             <td class="bold">Pendidikan Min.</td>
             <td>
              <select class="form-control select2me" name="education" id="education" >
                <option value="">--Pendidikan--</option>
                 <option <?php if($det['education']=="SD"){echo "selected";} ?> value="SD">SD</option>
                 <option <?php if($det['education']=="SMP"){echo "selected";} ?> value="SMP">SMP</option>
                 <option <?php if($det['education']=="SMA"){echo "selected";} ?> value="SMA">SMA</option>
                 <option <?php if($det['education']=="D3"){echo "selected";} ?> value="D3">D3</option>
                 <option <?php if($det['education']=="S1"){echo "selected";} ?> value="S1">S1</option>
                 <option <?php if($det['education']=="S2"){echo "selected";} ?> value="S2">S2</option>
                 <option <?php if($det['education']=="S3"){echo "selected";} ?> value="S3">S3</option>
               </select>
             </td>
             <td class="bold">Major</td>
             <td>
               <input type="text" name="major" id="major" class="form-control" value="<?= $det['major'] ?>" >
             </td>
           </tr>
           <tr>
             <td class="bold">Sertifikat</td>
             <td>
               <input type="text" name="sertifikat" id="sertifikat" class="form-control" value="<?= $det['sertifikat'] ?>" >
             </td>
             <td class="bold">Pengalaman Kerja Min. (tahun)</td>
             <td>
               <input type="text" name="pengalaman" id="pengalaman" class="form-control" value="<?= $det['pengalaman'] ?>" >
             </td>
           </tr>
           <tr>
             <td class="bold">Uraian Kerja</td>
             <td>
               <textarea name="uraian" id="uraian" class="form-control"><?= $det['uraian'] ?></textarea>
             </td>
             <td class="bold">Alasan</td>
             <td>
               <select class="form-control select2me" name="alasan" id="alasan" >
                <option value="">--Pilih Karyawan--</option>
                 <option <?php if($det['alasan']=='Mengisi Formasi Baru'){echo'selected';} ?> >Mengisi Formasi Baru</option>
                 <option <?php if($det['alasan']=='Mengganti Karyawan Resigned'){echo'selected';} ?> >Mengganti Karyawan Resigned</option>
                 <option <?php if($det['alasan']=='Mengganti Karyawan Habis Kontrak'){echo'selected';} ?> >Mengganti Karyawan Habis Kontrak</option>
                 <option <?php if($det['alasan']=='Mengganti Karyawan PHK'){echo'selected';} ?> >Mengganti Karyawan PHK</option>
                 <option <?php if($det['alasan']=='Mengganti Karyawan Rotasi/Mutasi'){echo'selected';} ?> >Mengganti Karyawan Rotasi/Mutasi</option>
                 <option <?php if($det['alasan']=='Menambah Karyawan'){echo'selected';} ?> >Menambah Karyawan</option>
               </select>
             </td>
           </tr>
            <tr>
             <td class="bold">Tujuan</td>
             <td>
               <textarea name="tujuan" id="tujuan" class="form-control"><?= $det['tujuan'] ?></textarea>
             </td>
             <td class="bold">Status Karyawan</td>
             <td>
               <select class="form-control select2me" name="status_karyawan" id="status_karyawan" >
                <option  <?php if($det['status_karyawan']==''){echo 'selected';}  ?> >--Status Karyawan--</option>
                 <option <?php if($det['status_karyawan']=='Tetap'){echo 'selected';}  ?> >Tetap</option>
                 <option <?php if($det['status_karyawan']=='Kontrak'){echo 'selected';}  ?> >Kontrak</option>
                 <option <?php if($det['status_karyawan']=='Harian Lepas'){echo 'selected';}  ?> >Harian Lepas</option>
               </select>
             </td>
           </tr>
            <tr>
             <td class="bold">Tanggal dibutuhkan</td>
             <td>
               <input type="date" name="tanggal_butuh" id="tanggal_butuh" class="form-control" value="<?= $det['tanggal_butuh'] ?>" >
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
 
 
<script type="text/javascript" src="<?= base_url() ?>assets/qrcode/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/qrcode/qrcode.js"></script>
<div class="row"> 
<!-- <form action="<?= base_url() ?>apps/employee/act/update" method="POST"> -->
<?php echo form_open_multipart('apps/employee/act/update');?>
	<input type="hidden" name="employee_id" id="employee_id" value="<?= $det['employee_id']?>">
	<div class="col-md-4">
		<div class="box box-solid  box-danger" style="border-style: 10px;">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-user"></i> Profil Karyawan</h3>
              <!-- Left -->
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <b><i class="fa fa-angle-down"></i></b></button> 
              </div>
              <!-- End Left --> 
            </div>
            <div class="box-body">
              

              <div class="col-md-12" style="margin-top: 20px;">
                 <table width="100%" class="table" border="0" style="margin-left: -20px;">
                    <tr>
                        <td class="bold">QR Code</td>
                        <td align="center" valign="center">
                            <input id="text" type="hidden" value="http://info.multifab.co.id/?key=<?= $det['uuid'] ?>" style="width:80%" /><br />
                            <div id="qrcode"></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="10%" class="bold">Status Account</td>
                        <td width="">
                            <table width="100%">
                                <tr>
                                    <td>
                                         <a href="<?= base_url() ?>apps/employee/status/Inactive/<?= $det['employee_id']?>" class="btn btn-sm bg-<?= $det['status']=='Inactive'?'red':'white' ?>" style="border-radius: 0px; background-color: white; width: 50%; float: left;">&nbsp;&nbsp;<font color="black">In-active</font>&nbsp;&nbsp;</a> 
                                         <a href="<?= base_url() ?>apps/employee/status/Active/<?= $det['employee_id']?>" class="btn btn-sm bg-<?= $det['status']=='Active'?'green':'white' ?>" style="border-radius: 0px; width: 50%">&nbsp;&nbsp;Active&nbsp;&nbsp;</a>     
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                 	<tr>
                 		<td width="10%" class="bold">Photo</td>
                 		<td width="">
                 			<table width="200px;" border="1">
                 				<tr>
                 					<td height="200px;">
                 						<?php
                 							if ($det['photo']==""){
                 								?>
	                 								<img id="output" src="<?= base_url() ?>assets/images/no.png" width="100%" height="100%" />
                 								<?php
                 							}else{
                 								?>
                 									<img id="output" src="<?= base_url() ?>assets/images/profile/<?= $det['photo'] ?>" width="100%" height="100%" />
                 								<?php
                 							}
                 						?>
                 						
                 					</td>
                 				</tr>
                 			</table>
                 			<input name="photo" type="file" class="btn btn-sm bg-navy" style="border-radius: 0px; width: 200px;" accept="image/*" onchange="loadFile(event)">
							<input type="hidden" name="photo_old" value="<?= $det['photo'] ?>">
                 			<!-- <a href="" class="btn btn-sm bg-navy">Select Image</a> -->
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Badge Number</td>
                 		<td class="">
                 			<input type="text" name="badge_number" id="badge_number" class="form-control" value="<?= $det['badge_number'] ?>">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Golongan</td>
                 		<td class="">
                 			<select class="form-control select2me" name="golongan" id="golongan" >
                 				<?php foreach ($golongan->result() as $gol): ?>
                 					<option value="<?= $gol->golongan ?>" <?php if ($det['golongan']==$gol->golongan){echo 'selected';} ?> ><?= $gol->golongan ?></option>
                 				<?php endforeach ?>
                 				
                 				<option value="Perempuan" <?php if ($det['golongan']=="Perempuan"){echo 'selected';} ?> >Perempuan</option> 
                 			</select>
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Nama Lengkap</td>
                 		<td class="">
                 			<input type="text" name="full_name" id="nama_lengkap" class="form-control" onkeyup="upper(this);" value="<?= $det['full_name'] ?>">
                 			
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Tempat Lahir</td>
                 		<td class="">
                 			<input type="text" name="pob" id="pob" class="form-control" value="<?= $det['pob'] ?>">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Tanggal Lahir</td>
                 		<td class="">
                 			<input type="date" name="dob" id="dob" class="form-control" onchange="getAge()" value="<?= $det['dob'] ?>">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Usia</td>
                 		<td class="">
                 			<input type="text" name="age" id="age" class="form-control" disabled>
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Jenis Kelamin</td>
                 		<td class="">
                 			<select class="form-control select2me" name="gender" id="gender" >
                 				<option value="Laki-Laki" <?php if ($det['gender']=="Laki-Laki"){echo 'selected';} ?> >Laki-Laki</option>
                 				<option value="Perempuan" <?php if ($det['gender']=="Perempuan"){echo 'selected';} ?> >Perempuan</option> 
                 			</select>
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Agama</td>
                 		<td class="">
                 			<select class="form-control select2me" name="religion" id="religion" >
                 				<option <?php if ($det['religion']=="Islam"){echo 'selected';} ?> value="Islam">Islam</option>
                 				<option <?php if ($det['religion']=="Kristen Protestan"){echo 'selected';} ?> value="Kristen Protestan">Kristen Protestan</option>
                 				<option <?php if ($det['religion']=="Kristen Khatolik"){echo 'selected';} ?> value="Kristen Khatolik">Kristen Khatolik</option>
                 				<option <?php if ($det['religion']=="Hindu"){echo 'selected';} ?> value="Hindu">Hindu</option>
                 				<option <?php if ($det['religion']=="Budha"){echo 'selected';} ?> value="Budha">Budha</option>
                 			</select>
                 		</td>
                 	</tr> 
                 	<tr>
                 		<td class="bold">Status Pernikahan</td>
                 		<td class="">
                 			<select class="form-control select2me" name="marital" id="marital" >
                 				<option <?php if ($det['marital']=="Menikah"){echo 'selected';} ?>  value="Menikah">Menikah</option>
                 				<option <?php if ($det['marital']=="Belum Menikah"){echo 'selected';} ?>  value="Belum Menikah">Belum Menikah</option>
                 				<option <?php if ($det['marital']=="Pernah Menikah"){echo 'selected';} ?>  value="Pernah Menikah">Pernah Menikah</option> 
                 			</select>
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Kewarganegaraan</td>
                 		<td class="">
                 			<input type="text" name="nationality" id="nationality" class="form-control" value="<?= $det['nationality'] ?>">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Telepone</td>
                 		<td class="">
                 			<input type="text" name="phone" id="phone" class="form-control" value="<?= $det['phone'] ?>">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Handphone</td>
                 		<td class="">
                 			<input type="text" name="mobile" id="mobile" class="form-control" value="<?= $det['mobile'] ?>">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">E-mail Company</td>
                 		<td class="">
                 			<input type="text" name="email" id="email" class="form-control" value="<?= $det['email'] ?>">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">E-mail Personal</td>
                 		<td class="">
                 			<input type="text" name="email_personal" id="email_personal" class="form-control" value="<?= $det['email_personal'] ?>">
                 		</td>
                 	</tr>

                 </table>
              </div>

               

            </div> 
          </div> 

	</div>

	<div class="col-md-8">
		<div class="box box-danger box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-user"></i> Profil Detail Karyawan</h3>
              <!-- Left -->
              <div class="box-tools pull-right">
                <a href="<?= base_url() ?>apps/employee/act/resume/<?= $det['employee_id']?>" class="btn bg-white bg-sm"><i class="fa fa-file-pdf-o"></i> Preview</a>
                <a href="<?= base_url() ?>apps/attendance/profile/<?= $det['badge_number']?>" class="btn bg-white bg-sm"><i class="fa fa-clock-o"></i> Attendance</a>
              </div>
              <!-- End Left --> 
            </div>
            <div class="box-body">
			 <!-- Custom Tabs -->
	          <div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
	              <li><a href="#alamat" data-toggle="tab">Alamat</a></li>
	              <li><a href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
	              <li><a href="#pelatihan" data-toggle="tab">Pelatihan</a></li>
	              <li><a href="#keluarga" data-toggle="tab">Keluarga</a></li>
	              <li><a href="#pengalaman" data-toggle="tab">Pengalaman</a></li>
	              <li><a href="#karir" data-toggle="tab">Jenjang Karir</a></li>
	                
	            </ul>
	            <div class="tab-content">
	              
	              <div class="tab-pane active" id="profile">
	                 <table class="table" width="100%">
	                 	<tr>
	                 		<td class="bold" width="20%">NIK</td>
	                 		<td>
	                 			<input type="text" name="nik" id="nik" class="form-control" value="<?= $det['nik'] ?>">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">No. KTP</td>
	                 		<td>
	                 			<input type="text" name="id_number" id="id_number" class="form-control" value="<?= $det['id_number'] ?>">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Join Date</td>
	                 		<td>
	                 			<input type="date" name="join_date" id="join_date" class="form-control" value="<?= $det['join_date'] ?>">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Status Kepegawaian</td>
	                 		<td>
	                 			<select class="form-control select2me" name="pegawai" id="pegawai" >
	                 				<option <?php if ($det['pegawai']=="Tetap"){echo 'selected';} ?> value="Tetap">Tetap</option>
	                 				<option <?php if ($det['pegawai']=="Kontrak"){echo 'selected';} ?> value="Kontrak">Kontrak</option>
	                 				<option <?php if ($det['pegawai']=="Honorer"){echo 'selected';} ?> value="Honorer">Honorer</option> 
	                 				<option <?php if ($det['pegawai']=="OJT"){echo 'selected';} ?> value="OJT">OJT</option> 
                                    <option <?php if ($det['pegawai']=="PHL"){echo 'selected';} ?> value="PHL">PHL</option> 
	                 				<option <?php if ($det['pegawai']=="Outsource"){echo 'selected';} ?> value="Outsource">Outsource</option> 
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Kategori</td>
	                 		<td>
	                 			<select class="form-control select2me" name="category" id="category" >
	                 				<option <?php if ($det['category']=="Direct"){echo 'selected';} ?> value="Direct">Direct</option> 
	                 				<option <?php if ($det['category']=="Inderect"){echo 'selected';} ?> value="Inderect">Inderect</option> 
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr hidden>
	                 		<td class="bold">Sub-Direktorat</td>
	                 		<td>
	                 			<select class="form-control select2me" name="subdirektorat_id" id="subdirektorat_id" >
	                 				<?php foreach ($subdirektorat->result() as $data): ?>
	                 					<option <?php if ($det['subdirektorat_id']==$data->subdirektorat_id){echo 'selected';} ?>  value="<?= $data->subdirektorat_id ?>"><?= $data->name ?></option>
	                 				<?php endforeach ?>
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Divisi</td>
	                 		<td>
	                 			<select class="form-control select2me" name="division_id" id="division_id" >
	                 				<?php foreach ($division->result() as $data): ?>
	                 					<option <?php if ($det['division_id']==$data->division_id){echo 'selected';} ?> value="<?= $data->division_id ?>"><?= $data->name ?></option>
	                 				<?php endforeach ?>
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr >
	                 		<td class="bold">Departmen</td>
	                 		<td>
	                 			<select class="form-control select2me" name="department_id" id="department_id" >
	                 				<?php foreach ($department->result() as $data): ?>
	                 					<option  <?php if ($det['department_id']==$data->department_id){echo 'selected';} ?> value="<?= $data->department_id ?>"><?= $data->name ?></option>
	                 				<?php endforeach ?>
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Jabatan</td>
	                 		<td>
	                 			<select class="form-control select2me" name="jabatan_id" id="jabatan_id" >
	                 				<?php foreach ($jabatan->result() as $data): ?>
	                 					<option  <?php if ($det['jabatan_id']==$data->jabatan_id){echo 'selected';} ?> value="<?= $data->jabatan_id ?>"><?= $data->name ?></option>
	                 				<?php endforeach ?>
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Posisi</td>
	                 		<td>
	                 			<input type="text" name="posisi" id="posisi" class="form-control" value="<?= $det['posisi'] ?>">
	                 		</td>
	                 	</tr>
	                 	<tr hidden>
	                 		<td class="bold">Status Leader</td>
	                 		<td>
	                 			<select class="form-control select2me" name="leader" id="leader" >
	                 				<option <?php if ($det['leader']=='Leader'){echo 'selected';} ?> value="Leader">Leader</option> 
	                 				<option <?php if ($det['leader']=='Non Leader'){echo 'selected';} ?> value="Non Leader">Non Leader</option> 
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr hidden>
	                 		<td class="bold">Performance Group</td>
	                 		<td>
	                 			<select class="form-control select2me" name="performance_group" id="performance_group" >
	                 				<?php foreach ($department->result() as $data): ?>
	                 					<option <?php if ($det['performance_group']==$data->department_id){echo 'selected';} ?> value="<?= $data->department_id ?>"><?= $data->name ?></option>
	                 				<?php endforeach ?>
	                 			</select>
	                 		</td>
	                 	</tr>
	                 </table>
	              </div> 
	              <div class="tab-pane" id="alamat">
	                 <table width="100%" class="table table-bordered table-striped">
	                 	<tr>
	                 		<td>
	                 			<table class="table " width="100%">
	                 				<tr>
	                 					<td class="bold">Alamat Sesuai KTP</td>
	                 					<td>
	                 						<textarea class="form-control" name="alamat1" id="alamat1"><?= $det_address['alamat1'] ?></textarea>
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Negara</td>
	                 					<td>
	                 						<input type="text" name="negara1" id="negara1" value="<?= $det_address['negara1'] ?>" class="form-control">
	                 					</td>
	                 				</tr>
									<tr>
	                 					<td class="bold">Propinsi</td>
	                 					<td>
	                 						<input type="text" name="propinsi1" id="propinsi1" value="<?= $det_address['propinsi1'] ?>" class="form-control">
	                 					</td>
	                 				</tr> 
									<tr>
	                 					<td class="bold">Kota</td>
	                 					<td>
	                 						<input type="text" name="kota1" id="kota1" value="<?= $det_address['kota1'] ?>" class="form-control">
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Kecamatan</td>
	                 					<td>
	                 						<input type="text" name="kecamatan1" id="kecamatan1" value="<?= $det_address['kecamatan1'] ?>" class="form-control">
	                 					</td>
	                 				</tr>
									<tr>
	                 					<td class="bold">Kelurahan</td>
	                 					<td>
	                 						<input type="text" name="kelurahan1" id="kelurahan1" value="<?= $det_address['kelurahan1'] ?>" class="form-control">
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Kode POS</td>
	                 					<td>
	                 						<input type="text" name="kodepos1" id="kodepos1" value="<?= $det_address['kodepos1'] ?>" class="form-control">
	                 					</td>
	                 				</tr>
	                 			</table>
	                 		</td>
	                 		<td>
	                 			<table class="table " width="100%">
	                 				<tr>
	                 					<td class="bold">Alamat Sesuai Domisili</td>
	                 					<td>
	                 						<textarea class="form-control" name="alamat2" id="alamat2"><?= $det_address['alamat2'] ?></textarea>
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Negara</td>
	                 					<td>
	                 						<input type="text" name="negara2" id="negara2" value="<?= $det_address['negara2'] ?>" class="form-control">
	                 					</td>
	                 				</tr>
									<tr>
	                 					<td class="bold">Propinsi</td>
	                 					<td>
	                 						<input type="text" name="propinsi2" id="propinsi2" value="<?= $det_address['propinsi2'] ?>" class="form-control">
	                 					</td>
	                 				</tr> 
									<tr>
	                 					<td class="bold">Kota</td>
	                 					<td>
	                 						<input type="text" name="kota2" id="kota2" value="<?= $det_address['kota2'] ?>" class="form-control">
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Kecamatan</td>
	                 					<td>
	                 						<input type="text" name="kecamatan2" id="kecamatan2" value="<?= $det_address['kecamatan2'] ?>" class="form-control">
	                 					</td>
	                 				</tr>
									<tr>
	                 					<td class="bold">Kelurahan</td>
	                 					<td>
	                 						<input type="text" name="kelurahan2" id="kelurahan2" value="<?= $det_address['kelurahan2'] ?>" class="form-control">
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Kode POS</td>
	                 					<td>
	                 						<input type="text" name="kodepos2" id="kodepos2" value="<?= $det_address['kodepos2'] ?>" class="form-control">
	                 					</td>
	                 				</tr>
	                 			</table>
	                 		</td>
	                 	</tr>
	                 </table>
	              </div> 
	              <div class="tab-pane" id="pendidikan">
	              	 <a onclick="ajax_pendidikan_add();" class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add</a>
	                 <div id="ajax_pendidikan"></div>
	              </div>
	              <div class="tab-pane" id="pelatihan">
	                 <a onclick="ajax_pelatihan_add();" class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add</a>
	                 <div id="ajax_pelatihan"></div>
	              </div>
	              <div class="tab-pane" id="keluarga">
	              	<table class="table table-bordered table-striped" width="100%">
	                 	 
	                 	<tr>
	                 		<td class="bold">Jumlah Tanggungan</td>
	                 		<td>
	                 			<input type="text" name="tanggungan" id="tanggungan" value="<?= $det_family['tanggungan'] ?>" class="form-control">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Jumlah Anak</td>
	                 		<td>
	                 			<input type="text" name="anak" id="anak" value="<?= $det_family['anak'] ?>" class="form-control">
	                 		</td>
	                 	</tr> 
	                 </table>
	                 <br>
	                 <a onclick="ajax_family_detail_add();" class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add</a>
	                 <div id="ajax_family_detail"></div>
	                 <br>
	                 <table class="table table-bordered table-striped" width="100%">
	                 	<tr>
	                 		<td colspan="2" class="bold">EMERGENCY CONTACT</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Nama Lengkap</td>
	                 		<td>
	                 			<input type="text" name="emer_name" id="emer_name" value="<?= $det_family['emer_name'] ?>" class="form-control">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Jenis Kelamin</td>
	                 		<td>
	                 			<input type="text" name="emer_gender" id="emer_gender" value="<?= $det_family['emer_gender'] ?>" class="form-control">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Hubungan</td>
	                 		<td>
	                 			<input type="text" name="emer_relation" id="emer_relation"  value="<?= $det_family['emer_relation'] ?>" class="form-control">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Nomor HP</td>
	                 		<td>
	                 			<input type="text" name="emer_nohp" id="emer_nohp" value="<?= $det_family['emer_nohp'] ?>"  class="form-control">
	                 		</td>
	                 	</tr>
	                 </table>
	              </div>
	              <div class="tab-pane" id="pengalaman">
	                 <a onclick="ajax_pengalaman_add();" class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add</a>
	                 <div id="ajax_pengalaman"></div>
	              </div>
	              <div class="tab-pane" id="karir">
	                 <a onclick="ajax_jenjang_add();" class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add</a>
	                 <div id="ajax_jenjang"></div>
	              </div>


	            </div>
	            <!-- /.tab-content -->
	          </div>
	          <!-- nav-tabs-custom --> 

              <div class="col-md-12">
                <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
                <div class="pull-right">
                  <button class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-save"></i> Save</button>
                </div>
              </div>

            </div> 
          </div> 

	</div>
        
</form>     
</div>
<?php  $this->load->view('hrd/employee/ajax'); ?>

<script type="text/javascript">
	function upper(get) {
		var str = get.value;
	var res = str.toUpperCase();
	$('#nama_lengkap').val(res);
	}
	getAge()
	function getAge() {
		var date = document.getElementById('dob').value;
		if(date === ""){
			alert("Please complete the required field!");
	    }else{
			var today = new Date();
			var birthday = new Date(date);
			var year = 0;
			if (today.getMonth() < birthday.getMonth()) {
				year = 1;
			} else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
				year = 1;
			}
			var age = today.getFullYear() - birthday.getFullYear() - year;
	 
			if(age < 0){
				age = 0;
			}
			document.getElementById('age').value = age;
		}
	}
</script>
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>

<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
    width : 100,
    height : 100
});

function makeCode () {      
    var elText = document.getElementById("text");
    
    if (!elText.value) {
        alert("Input a text");
        elText.focus();
        return;
    }
    
    qrcode.makeCode(elText.value);
}

makeCode();

$("#text").
    on("blur", function () {
        makeCode();
    }).
    on("keydown", function (e) {
        if (e.keyCode == 13) {
            makeCode();
        }
    });
</script>


 

<div class="row"> 
<form action="<?= base_url() ?>apps/employee/act/add-save" method="POST">
	<div class="col-md-4">
		<div class="box box-solid  box-danger" style="border-style: 10px;">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-user"></i> Profil Karyawan</h3>
              <!-- Left -->
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <b><i class="fa fa-angle-down"></i	></b></button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="Reload" data-toggle="tooltip" title="Reload">
                  <i class="fa fa-refresh"></i></button> -->
              </div>
              <!-- End Left --> 
            </div>
            <div class="box-body">
              

              <div class="col-md-12" style="margin-top: 20px;">
                 <table width="100%" class="table" border="0" style="margin-left: -20px;">
                 	<tr>
                 		<td width="10%" class="bold">Photo</td>
                 		<td width="">
                 			<table width="200px;" border="1">
                 				<tr>
                 					<td height="200px;">
                 						<img id="output" src="<?= base_url() ?>assets/images/no.png" width="100%" height="100%" />
                 					</td>
                 				</tr>
                 			</table>
                 			<input name="photo" type="file" class="btn btn-sm bg-navy" style="border-radius: 0px; width: 200px;" accept="image/*" onchange="loadFile(event)">
							
                 			<!-- <a href="" class="btn btn-sm bg-navy">Select Image</a> -->
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Badge Number</td>
                 		<td class="">
                 			<input type="text" name="badge_number" id="badge_number" class="form-control">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Nama Lengkap</td>
                 		<td class="">
                 			<input type="text" name="full_name" id="nama_lengkap" class="form-control" onkeyup="upper(this);">
                 			
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Tempat Lahir</td>
                 		<td class="">
                 			<input type="text" name="pob" id="pob" class="form-control">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Tanggal Lahir</td>
                 		<td class="">
                 			<input type="date" name="dob" id="dob" class="form-control" onchange="getAge()">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Usia</td>
                 		<td class="">
                 			<input type="text" name="age" id="age" class="form-control">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Jenis Kelamin</td>
                 		<td class="">
                 			<select class="form-control" name="gender" id="gender" >
                 				<option value="Laki-Laki">Laki-Laki</option>
                 				<option value="Perempuan">Perempuan</option> 
                 			</select>
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Agama</td>
                 		<td class="">
                 			<select class="form-control" name="religion" id="religion" >
                 				<option value="Islam">Islam</option>
                 				<option value="Kristen Protestan">Kristen Protestan</option>
                 				<option value="Kristen Khatolik">Kristen Khatolik</option>
                 				<option value="Hindu">Hindu</option>
                 				<option value="Budha">Budha</option>
                 			</select>
                 		</td>
                 	</tr> 
                 	<tr>
                 		<td class="bold">Status Pernikahan</td>
                 		<td class="">
                 			<select class="form-control" name="marital" id="marital" >
                 				<option value="Menikah">Menikah</option>
                 				<option value="Belum Menikah">Belum Menikah</option>
                 				<option value="Pernah Menikah">Pernah Menikah</option> 
                 			</select>
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Kewarganegaraan</td>
                 		<td class="">
                 			<input type="text" name="nationality" id="nationality" class="form-control">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Telepone</td>
                 		<td class="">
                 			<input type="text" name="phone" id="phone" class="form-control">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">Handphone</td>
                 		<td class="">
                 			<input type="text" name="mobile" id="mobile" class="form-control">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">E-mail Company</td>
                 		<td class="">
                 			<input type="text" name="email" id="email" class="form-control">
                 		</td>
                 	</tr>
                 	<tr>
                 		<td class="bold">E-mail Personal</td>
                 		<td class="">
                 			<input type="text" name="email_personal" id="email_personal" class="form-control">
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
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <b><i class="fa fa-angle-down"></i></b></button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="Reload" data-toggle="tooltip" title="Reload">
                  <i class="fa fa-refresh"></i></button> -->
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
	                 			<input type="text" name="nik" id="nik" class="form-control">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">No. KTP</td>
	                 		<td>
	                 			<input type="text" name="id_number" id="id_number" class="form-control">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Join Date</td>
	                 		<td>
	                 			<input type="date" name="join_date" id="join_date" class="form-control">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Status Kepegawaian</td>
	                 		<td>
	                 			<select class="form-control" name="pegawai" id="pegawai" >
	                 				<option value="Tetap">Tetap</option>
	                 				<option value="Kontrak">Kontrak</option>
	                 				<option value="Honorer">Honorer</option> 
	                 				<option value="OJT">OJT</option> 
	                 				<option value="PHL">PHL</option> 
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Kategori</td>
	                 		<td>
	                 			<select class="form-control" name="category" id="category" >
	                 				<option value="Direct">Direct</option> 
	                 				<option value="Inderect">Inderect</option> 
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Sub-Direktorat</td>
	                 		<td>
	                 			<select class="form-control" name="subdirektorat_id" id="subdirektorat_id" >
	                 				<?php foreach ($subdirektorat->result() as $data): ?>
	                 					<option value="<?= $data->subdirektorat_id ?>"><?= $data->name ?></option>
	                 				<?php endforeach ?>
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Divisi</td>
	                 		<td>
	                 			<select class="form-control" name="division_id" id="division_id" >
	                 				<?php foreach ($division->result() as $data): ?>
	                 					<option value="<?= $data->division_id ?>"><?= $data->name ?></option>
	                 				<?php endforeach ?>
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Departmen</td>
	                 		<td>
	                 			<select class="form-control" name="department_id" id="department_id" >
	                 				<?php foreach ($department->result() as $data): ?>
	                 					<option value="<?= $data->department_id ?>"><?= $data->name ?></option>
	                 				<?php endforeach ?>
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Jabatan</td>
	                 		<td>
	                 			<select class="form-control" name="jabatan_id" id="jabatan_id" >
	                 				<?php foreach ($jabatan->result() as $data): ?>
	                 					<option value="<?= $data->jabatan_id ?>"><?= $data->name ?></option>
	                 				<?php endforeach ?>
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Posisi</td>
	                 		<td>
	                 			<input type="text" name="posisi" id="posisi" class="form-control">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Status Leader</td>
	                 		<td>
	                 			<select class="form-control" name="leader" id="leader" >
	                 				<option value="Leader">Leader</option> 
	                 				<option value="Non Leader">Non Leader</option> 
	                 			</select>
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Performance Group</td>
	                 		<td>
	                 			<select class="form-control" name="performance_group" id="performance_group" >
	                 				<?php foreach ($department->result() as $data): ?>
	                 					<option value="<?= $data->department_id ?>"><?= $data->name ?></option>
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
	                 						<textarea class="form-control" name="" id=""></textarea>
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Negara</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
									<tr>
	                 					<td class="bold">Propinsi</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Propinsi</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
									<tr>
	                 					<td class="bold">Kota</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Kecamatan</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
									<tr>
	                 					<td class="bold">Kelurahan</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Kode POS</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
	                 			</table>
	                 		</td>
	                 		<td>
	                 			<table class="table " width="100%">
	                 				<tr>
	                 					<td class="bold">Alamat Sesuai Domisili</td>
	                 					<td>
	                 						<textarea class="form-control" name="" id=""></textarea>
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Negara</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
									<tr>
	                 					<td class="bold">Propinsi</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Propinsi</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
									<tr>
	                 					<td class="bold">Kota</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Kecamatan</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
									<tr>
	                 					<td class="bold">Kelurahan</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
	                 				<tr>
	                 					<td class="bold">Kode POS</td>
	                 					<td>
	                 						<input type="text" name="" id="" class="form-control">
	                 					</td>
	                 				</tr>
	                 			</table>
	                 		</td>
	                 	</tr>
	                 </table>
	              </div> 
	              <div class="tab-pane" id="pendidikan">
	              	 <a href="" class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add</a>
	                 <table class="table table-bordered table-striped" width="100%">
	                 	<tr>
	                 		<td class="bold">No</td>
	                 		<td class="bold">Sekolah/Univ/Akademi</td>
	                 		<td class="bold">Kota</td>
	                 		<td class="bold">Strata</td>
	                 		<td class="bold">Jurusan</td>
	                 		<td class="bold">Mulai</td>
	                 		<td class="bold">Berakhir</td>
	                 		<td class="bold">IPK</td>
	                 		<td class="bold">#</td>
	                 	</tr> 
	                 		<tr>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 		</tr>
	                 	</td>
	                 </table>
	              </div>
	              <div class="tab-pane" id="pelatihan">
	                 <a href="" class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add</a>
	                 <table class="table table-bordered table-striped" width="100%">
	                 	<tr>
	                 		<td class="bold">No</td>
	                 		<td class="bold">Bidang</td>
	                 		<td class="bold">Nama Lembaga</td>
	                 		<td class="bold">Kota</td>
	                 		<td class="bold">Bln/Tahun</td>
	                 		<td class="bold">Sertifikat</td>
	                 		<td class="bold">Tingkat</td>
	                 		<td class="bold">#</td>
	                 	</tr> 
	                 		<tr>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 		</tr>
	                 	</td>
	                 </table>
	              </div>
	              <div class="tab-pane" id="keluarga">
	              	<table class="table table-bordered table-striped" width="100%">
	                 	 
	                 	<tr>
	                 		<td class="bold">Jumlah Tanggungan</td>
	                 		<td>
	                 			<input type="text" name="" id="" class="form-control">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Jumlah Anak</td>
	                 		<td>
	                 			<input type="text" name="" id="" class="form-control">
	                 		</td>
	                 	</tr> 
	                 </table>
	                 <br>
	                 <a href="" class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add</a>
	                 <table class="table table-bordered table-striped" width="100%">
	                 	<tr>
	                 		<td class="bold">No</td>
	                 		<td class="bold">Nama Lengkap</td>
	                 		<td class="bold">Jenis Kelamin</td>
	                 		<td class="bold">Hubungan</td>
	                 		<td class="bold">Tempat Lahir</td>
	                 		<td class="bold">Tanggal Lahir</td>
	                 		<td class="bold">Usia</td>
	                 		<td class="bold">Pendidikan</td> 
	                 		<td class="bold">Pekerjaan</td> 
	                 		<td class="bold">#</td>
	                 	</tr> 
	                 		<tr>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 		</tr>
	                 	</td>
	                 </table>
	                 <br>
	                 <table class="table table-bordered table-striped" width="100%">
	                 	<tr>
	                 		<td colspan="2" class="bold">EMERGENCY CONTACT</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Nama Lengkap</td>
	                 		<td>
	                 			<input type="text" name="" id="" class="form-control">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Jenis Kelamin</td>
	                 		<td>
	                 			<input type="text" name="" id="" class="form-control">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Hubungan</td>
	                 		<td>
	                 			<input type="text" name="" id="" class="form-control">
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td class="bold">Nomor HP</td>
	                 		<td>
	                 			<input type="text" name="" id="" class="form-control">
	                 		</td>
	                 	</tr>
	                 </table>
	              </div>
	              <div class="tab-pane" id="pengalaman">
	                 <a href="" class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add</a>
	                 <table class="table table-bordered table-striped" width="100%">
	                 	<tr>
	                 		<td class="bold">No</td>
	                 		<td class="bold">Nama Perusahaan</td>
	                 		<td class="bold">Bidang Usaha</td>
	                 		<td class="bold">Departement</td>
	                 		<td class="bold">Jabatan</td>
	                 		<td class="bold">Posisi</td>
	                 		<td class="bold">Dari</td>
	                 		<td class="bold">Sampai</td>
	                 		<td class="bold">Lama Kerja</td>
	                 		<td class="bold">#</td>
	                 	</tr> 
	                 		<tr>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 		</tr>
	                 	</td>
	                 </table>
	              </div>
	              <div class="tab-pane" id="karir">
	                 <a href="" class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add</a>
	                 <table class="table table-bordered table-striped" width="100%">
	                 	<tr>
	                 		<td class="bold">No</td>
	                 		<td class="bold">Status</td>
	                 		<td class="bold">Sub-Direktorat</td>
	                 		<td class="bold">Divisi</td>
	                 		<td class="bold">Departement</td>
	                 		<td class="bold">Jabatan</td>
	                 		<td class="bold">Mulai Dari</td>
	                 		<td class="bold">Sampai Dengan</td> 
	                 		<td class="bold">#</td>
	                 	</tr> 
	                 		<tr>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 			<td>x</td>
	                 		</tr>
	                 	</td>
	                 </table>
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

<!-- End Content -->




<script type="text/javascript">
	function upper(get) {
		var str = get.value;
	var res = str.toUpperCase();
	$('#nama_lengkap').val(res);
	}

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
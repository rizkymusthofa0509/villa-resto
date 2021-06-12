<?php
/*
-- ---------------------------------------------------------------
-- JOB CAREER 
-- CREATED BY : RIZKY MUSTHOFA
-- COPYRIGHT  : Copyright (c) 2020 
-- LICENSE    : http://opensource.org/licenses/MIT  MIT License
-- CREATED ON : 2020-06-09
-- UPDATED ON : V.1
-- APP NAME   : JOB CAREER
-- ---------------------------------------------------------------
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    // $this->load->library('session');
	    /*Model*/
	    $this->load->model(array('M_employee','M_import','M_manpower','M_appreciation'));  
	    $this->load->helper(array('url','html','form'));
	    // $this->load->helper('dompet_helper');   
	    login();
	}

 	public function dashboard()
 	{
 		$data['title'] 	= 'Multifab - Data Karyawan';
		$data['modul']  = 'Dashboard Employee';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps',
								'HRD'     => 'apps/hrd',  
								'Employee' => 'apps/employee'  
						  );
		$data['pages']  = 'hrd/employee/dashboard';


		$data['getAll'] = $this->M_employee->filter('Active');
		$this->load->view('main',$data); 

 	}

	public function pdf()
	{
		//load mPDF library
		// $this->load->library('m_pdf');
		include_once APPPATH.'/third_party/mpdf/mpdf.php';
		//load mPDF library
 
 
		//now pass the data//
		 $this->data['title']="MY PDF TITLE 1.";
		 $this->data['description']="";
		 $this->data['description']=$this->official_copies;
		 //now pass the data //
 
		
		$html=$this->load->view('hrd/employee/pdf',$this->data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
 	 
		//this the the PDF filename that user will get to download
		$pdfFilePath ="mypdfName-".time()."-download.pdf";
 
		
		//actually, you can pass mPDF parameter on this load() function
		$pdf = $this->m_pdf->load();
		//generate the PDF!
		$pdf->WriteHTML($html,2);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		$pdf->Output($pdfFilePath, "D");
	}

	public function create_account()
	{
		$buka = $this->db->query("SELECT * FROM employee");
		foreach ($buka->result() as $data) {
			$i['badge_number'] = $data->badge_number;
			$i['username']     = $data->email;
			$i['password']     = 'multif@b';
			$i['first_name']   = $data->full_name;
			$insert = $this->db->insert('tbl_account',$i); 
		}
	}
	
	public function index()
	{ 
		$data['title'] 	= 'Multifab - Data Karyawan';
		$data['modul']  = 'Data Karyawan';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps',
								'HRD'     => 'apps/hrd',  
								'Employee' => 'apps/employee'  
						  );
		$data['pages']  = 'hrd/employee/list';


		$data['getAll'] = $this->M_employee->getAll();
		// session_flash('Info','Ini adalah alert');

		$this->load->view('main',$data); 
	}

	public function filter($status='')
	{ 
		$data['title'] 	= 'Multifab - Data Karyawan';
		$data['modul']  = 'Data Karyawan';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps',
								'HRD'     => 'apps/hrd',  
								'Employee' => 'apps/employee'  
						  );
		$data['pages']  = 'hrd/employee/list';

		if ($this->input->get('filter')){
			$status = $this->input->get('filter');
			$data['getAll'] = $this->M_employee->filter($status);
		}else{
			$data['getAll'] = $this->M_employee->status($status);
		}

		
		// session_flash('Info','Ini adalah alert');

		$this->load->view('main',$data); 
	}
 
	public function act($action='',$id='')
	{
		switch ($action) {
			case 'add-new':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Tambah Data Karyawan';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Add New'   => 'apps/employee/act/add-new',  
								  );
				$data['pages']  = 'hrd/employee/add';

				$data['subdirektorat'] = $this->db->query("SELECT * FROM subdirektorat");
				$data['division']      = $this->db->query("SELECT * FROM division");
				$data['department']      = $this->db->query("SELECT * FROM department");
				$data['jabatan']      = $this->db->query("SELECT * FROM jabatan");

				$this->load->view('main',$data);
			break;

			case 'add-save': 
				$badge                      = post('badge_number');

				$cek = $this->db->query("SELECT badge_number FROM employee WHERE badge_number='$badge' ");
				if ($cek->num_rows() == 0){

					$insert['badge_number'] 	= post('badge_number'); 
					$i = $this->db->insert('employee',$insert);
					$i = $this->db->insert('tbl_account',$insert);

					$open = $this->db->query("SELECT employee_id FROM employee WHERE badge_number='$badge' ")->row_array();

					$loop['employee_id']        = $open['employee_id'];
	 
					$in = $this->db->insert('employee_address',$loop);
					$in = $this->db->insert('employee_family',$loop);


					redirect('apps/employee/act/edit-user/'.$open['employee_id']);
				}else{
					set_flashdata('info','
								<div class="alert alert-danger" role="alert">
								  Nomor Sudah digunakan.
								</div>
							');
					redirect('apps/employee/act/add-new');
				}

			break;

			case 'edit-user':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Update Data Karyawan';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Update'   => '',  
								  );
				$data['pages']  = 'hrd/employee/edit';

				$data['subdirektorat']= $this->db->query("SELECT * FROM subdirektorat");
				$data['division']     = $this->db->query("SELECT * FROM division");
				$data['department']   = $this->db->query("SELECT * FROM department");
				$data['jabatan']      = $this->db->query("SELECT * FROM jabatan");
				$data['golongan']     = $this->db->query("SELECT * FROM golongan");

				$data['det'] 		  = $this->db->query("SELECT * FROM employee WHERE employee_id='$id' ")->row_array();  
				$data['det_address']  = $this->db->query("SELECT * FROM employee_address WHERE employee_id='$id' ")->row_array();  
				$data['det_family']   = $this->db->query("SELECT * FROM employee_family WHERE employee_id='$id' ")->row_array();  

				$this->load->view('main',$data);
			break;
			case 'ajax_pendidikan_add':
				$i['employee_id'] = post('employee_id');
				$in = $this->db->insert('employee_education',$i);
			break;
			case 'ajax_pendidikan_update':
				$upt[post('field')] = post('upt');
				$this->db->where(array(post('param')=>post('id')));
				$this->db->update(post('table'),$upt);
			break;
			case 'ajax_pendidikan_delete':
				$upt[post('field')] = post('upt');
				$this->db->where(array(post('param')=>post('id')));
				$this->db->delete(post('table'));
			break;
			case 'ajax_pendidikan':
				echo 
				'
					<table class="table table-bordered table-striped" width="100%">
	                 	<tr> 
	                 		<td class="bold">Sekolah/Univ/Akademi</td>
	                 		<td class="bold">Kota</td>
	                 		<td class="bold">Strata</td>
	                 		<td class="bold">Jurusan</td>
	                 		<td class="bold">Mulai</td>
	                 		<td class="bold">Berakhir</td>
	                 		<td class="bold">IPK</td>
	                 		<td class="bold">#</td>
	                 	</tr> 
	                 	';
	                 	$employee_id = post('employee_id'); 
	                 	$pendidikan  = $this->db->query("SELECT * FROM employee_education WHERE employee_id='$employee_id' ORDER BY education_id DESC ");
	                 	foreach ($pendidikan->result() as $pend_res) {
	                 		?>
		                 		<tr> 
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_education','school_name','<?=$pend_res->education_id ?>','education_id',this)" value="<?= $pend_res->school_name ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_education','kota','<?=$pend_res->education_id ?>','education_id',this)" value="<?= $pend_res->kota ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_education','strata','<?=$pend_res->education_id ?>','education_id',this)" value="<?= $pend_res->strata ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_education','jurusan','<?=$pend_res->education_id ?>','education_id',this)" value="<?= $pend_res->jurusan ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_education','mulai','<?=$pend_res->education_id ?>','education_id',this)" value="<?= $pend_res->mulai ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_education','berakhir','<?=$pend_res->education_id ?>','education_id',this)" value="<?= $pend_res->berakhir ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_education','ipk','<?=$pend_res->education_id ?>','education_id',this)" value="<?= $pend_res->ipk ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<label class="label label-danger"><a onclick="delete_ajax('employee_education','ipk','<?=$pend_res->education_id ?>','education_id',this)" ><font color="white"><i class="fa fa-trash"></i></font></a></label>
		                 			</td>
		                 		</tr> 
	                 		<?php
	                 	} 
	                 		echo'
	                 	</td>
	                 </table>
				';
				// echo post('employee_id');
			break;
			case 'ajax_pelatihan_add':
				$i['employee_id'] = post('employee_id');
				$in = $this->db->insert('employee_training',$i);
			break;

			case 'ajax_pelatihan':
				echo 
				'
					<table class="table table-bordered table-striped" width="100%">
	                 	<tr> 
	                 		<td class="bold">Bidang</td>
	                 		<td class="bold">Nama Lembaga</td>
	                 		<td class="bold">Kota</td>
	                 		<td class="bold">Bln/Tahun</td>
	                 		<td class="bold">Sertifikat</td>
	                 		<td class="bold">Tingkat</td>
	                 		<td class="bold">#</td>
	                 	</tr> 
	                 	';
	                 	$employee_id = post('employee_id'); 
	                 	$training  = $this->db->query("SELECT * FROM employee_training WHERE employee_id='$employee_id' ORDER BY id DESC ");
	                 	foreach ($training->result() as $pend_res) {
	                 		?>
		                 		<tr> 
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_training','bidang','<?=$pend_res->id ?>','id',this)" value="<?= $pend_res->bidang ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_training','lembaga','<?=$pend_res->id ?>','id',this)" value="<?= $pend_res->lembaga ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_training','kota','<?=$pend_res->id ?>','id',this)" value="<?= $pend_res->kota ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_training','jam_bln_thn','<?=$pend_res->id ?>','id',this)" value="<?= $pend_res->jam_bln_thn ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_training','sertifikat','<?=$pend_res->id ?>','id',this)" value="<?= $pend_res->sertifikat ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_training','tingkat','<?=$pend_res->id ?>','id',this)" value="<?= $pend_res->tingkat ?>" class="form-control">
		                 			</td> 

		                 			<td>
		                 				<label class="label label-danger"><a onclick="delete_ajax('employee_training','id','<?=$pend_res->id ?>','id',this)" ><font color="white"><i class="fa fa-trash"></i></font></a></label>
		                 			</td>
		                 		</tr> 
	                 		<?php
	                 	} 
	                 		echo'
	                 	</td>
	                 </table>
				';
				// echo post('employee_id');
			break;

			case 'ajax_pengalaman_add':
				$i['employee_id'] = post('employee_id');
				$in = $this->db->insert('employee_experience',$i);
			break;

			case 'ajax_pengalaman':
				echo 
				'
					<table class="table table-bordered table-striped" width="100%">
	                 	<tr> 
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
	                 	';
	                 	$employee_id = post('employee_id'); 
	                 	$pengalaman  = $this->db->query("SELECT * FROM employee_experience WHERE employee_id='$employee_id' ORDER BY experience_id DESC ");
	                 	foreach ($pengalaman->result() as $pend_res) {
	                 		?>
		                 		<tr> 
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_experience','nama_perusahaan','<?=$pend_res->experience_id ?>','experience_id',this)" value="<?= $pend_res->nama_perusahaan ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_experience','bidang_usaha','<?=$pend_res->experience_id ?>','experience_id',this)" value="<?= $pend_res->bidang_usaha ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_experience','departemen','<?=$pend_res->experience_id ?>','experience_id',this)" value="<?= $pend_res->departemen ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_experience','jabatan','<?=$pend_res->experience_id ?>','experience_id',this)" value="<?= $pend_res->jabatan ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_experience','posisi','<?=$pend_res->experience_id ?>','experience_id',this)" value="<?= $pend_res->posisi ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_experience','dari','<?=$pend_res->experience_id ?>','experience_id',this)" value="<?= $pend_res->dari ?>" class="form-control">
		                 			</td> 
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_experience','sampai','<?=$pend_res->experience_id ?>','experience_id',this)" value="<?= $pend_res->sampai ?>" class="form-control">
		                 			</td> 
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_experience','lama_kerja','<?=$pend_res->experience_id ?>','experience_id',this)" value="<?= $pend_res->lama_kerja ?>" class="form-control">
		                 			</td> 

		                 			<td>
		                 				<label class="label label-danger"><a onclick="delete_ajax('employee_experience','experience_id','<?=$pend_res->experience_id ?>','experience_id',this)" ><font color="white"><i class="fa fa-trash"></i></font></a></label>
		                 			</td>
		                 		</tr> 
	                 		<?php
	                 	} 
	                 		echo'
	                 	</td>
	                 </table>
				';
				// echo post('employee_id');
			break;

			case 'ajax_jenjang_add':
				$i['employee_id'] = post('employee_id');
				$in = $this->db->insert('employee_career',$i);
			break;

			case 'ajax_jenjang':
				echo 
				'
					<table class="table table-bordered table-striped" width="100%">
	                 	<tr>
	                 		<td class="bold">Status</td>
	                 		<td class="bold">Sub-Direktorat</td>
	                 		<td class="bold">Divisi</td>
	                 		<td class="bold">Departement</td>
	                 		<td class="bold">Jabatan</td>
	                 		<td class="bold">Mulai Dari</td>
	                 		<td class="bold">Sampai Dengan</td> 
	                 		<td class="bold">#</td>
	                 	</tr> 
	                 	';
	                 	$employee_id = post('employee_id'); 
	                 	$career  = $this->db->query("SELECT * FROM employee_career WHERE employee_id='$employee_id' ORDER BY career_id DESC ");
	                 	foreach ($career->result() as $pend_res) {
	                 		?>
		                 		<tr> 
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_career','pegawai','<?=$pend_res->career_id ?>','career_id',this)" value="<?= $pend_res->pegawai ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_career','subdirektorat','<?=$pend_res->career_id ?>','career_id',this)" value="<?= $pend_res->subdirektorat ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_career','divisi','<?=$pend_res->career_id ?>','career_id',this)" value="<?= $pend_res->divisi ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_career','departemen','<?=$pend_res->career_id ?>','career_id',this)" value="<?= $pend_res->departemen ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_career','jabatan','<?=$pend_res->career_id ?>','career_id',this)" value="<?= $pend_res->jabatan ?>" class="form-control">
		                 			</td> 
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_career','mulai','<?=$pend_res->career_id ?>','career_id',this)" value="<?= $pend_res->mulai ?>" class="form-control">
		                 			</td> 
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_career','sampai','<?=$pend_res->career_id ?>','career_id',this)" value="<?= $pend_res->sampai ?>" class="form-control">
		                 			</td> 

		                 			<td>
		                 				<label class="label label-danger"><a onclick="delete_ajax('employee_career','career_id','<?=$pend_res->career_id ?>','career_id',this)" ><font color="white"><i class="fa fa-trash"></i></font></a></label>
		                 			</td>
		                 		</tr> 
	                 		<?php
	                 	} 
	                 		echo'
	                 	</td>
	                 </table>
				';
				// echo post('employee_id');
			break;

			case 'ajax_family_detail_add':
				$i['employee_id'] = post('employee_id');
				$in = $this->db->insert('employee_family_detail',$i);
			break;

			case 'ajax_family_detail':
				echo 
				'
					<table class="table table-bordered table-striped" width="100%">
	                 	<tr> 
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
	                 	';
	                 	$employee_id = post('employee_id'); 
	                 	$career  = $this->db->query("SELECT * FROM employee_family_detail WHERE employee_id='$employee_id' ORDER BY detail_id DESC ");
	                 	foreach ($career->result() as $pend_res) {
	                 		?>
		                 		<tr> 
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_family_detail','nama_lengkap','<?=$pend_res->detail_id ?>','detail_id',this)" value="<?= $pend_res->nama_lengkap ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_family_detail','jenis_kelamin','<?=$pend_res->detail_id ?>','detail_id',this)" value="<?= $pend_res->jenis_kelamin ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_family_detail','hubungan','<?=$pend_res->detail_id ?>','detail_id',this)" value="<?= $pend_res->hubungan ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_family_detail','tempat_lahir','<?=$pend_res->detail_id ?>','detail_id',this)" value="<?= $pend_res->tempat_lahir ?>" class="form-control">
		                 			</td>
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_family_detail','tanggal_lahir','<?=$pend_res->detail_id ?>','detail_id',this)" value="<?= $pend_res->tanggal_lahir ?>" class="form-control">
		                 			</td> 
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_family_detail','usia','<?=$pend_res->detail_id ?>','detail_id',this)" value="<?= $pend_res->usia ?>" class="form-control">
		                 			</td> 
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_family_detail','pendidikan','<?=$pend_res->detail_id ?>','detail_id',this)" value="<?= $pend_res->pendidikan ?>" class="form-control">
		                 			</td> 
		                 			<td>
		                 				<input type="text" onkeyup="update_ajax('employee_family_detail','pekerjaan','<?=$pend_res->detail_id ?>','detail_id',this)" value="<?= $pend_res->pekerjaan ?>" class="form-control">
		                 			</td> 

		                 			<td>
		                 				<label class="label label-danger"><a onclick="delete_ajax('employee_family_detail','detail_id','<?=$pend_res->detail_id ?>','detail_id',this)" ><font color="white"><i class="fa fa-trash"></i></font></a></label>
		                 			</td>
		                 		</tr> 
	                 		<?php
	                 	} 
	                 		echo'
	                 	</td>
	                 </table>
				';
				// echo post('employee_id');
			break;

			case 'update':

				$config['upload_path']          = './assets/images/profile/';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config); 
                $nama_file = post('photo_old');
                    if ($this->upload->do_upload('photo'))
	                {
	                        $data = array('upload_data' => $this->upload->data());
	                        print_r($data);
	                        $nama_file = $data['upload_data']['file_name'];
	                } 	
                

				
				$employee_id = post('employee_id');
				// echo $employee_id;
				$satu['photo']          = $nama_file;
				$satu['badge_number']	= post('badge_number');
				$satu['golongan']	    = post('golongan');
				$satu['full_name']		= post('full_name');
				$satu['pob']			= post('pob');
				$satu['dob']			= post('dob');
				// $satu['age']			= post('age');
				$satu['gender']			= post('gender');
				$satu['religion']		= post('religion');
				$satu['marital']		= post('marital');
				$satu['nationality']	= post('nationality');
				$satu['phone']		 	= post('phone');
				$satu['mobile']		 	= post('mobile');
				$satu['email']		 	= post('email');
				$satu['email_personal']	= post('email_personal');

				$satu['nik'] 				= post('nik');
				$satu['id_number'] 			= post('id_number');
				$satu['join_date'] 			= post('join_date');
				$satu['pegawai'] 			= post('pegawai');
				$satu['category'] 			= post('category');
				$satu['subdirektorat_id'] 	= post('subdirektorat_id');
				$satu['division_id'] 		= post('division_id');
				$satu['department_id'] 		= post('department_id');
				$satu['jabatan_id'] 		= post('jabatan_id');
				$satu['posisi'] 			= post('posisi');
				$satu['leader'] 			= post('leader');
				$satu['performance_group'] 	= post('performance_group');

				$s = $this->db->where(array('employee_id' =>$employee_id));
				$s = $this->db->update('employee',$satu);

				$dua['alamat1']				= post('alamat1');
				$dua['negara1']				= post('negara1');
				$dua['propinsi1']			= post('propinsi1');
				$dua['kota1']				= post('kota1');
				$dua['kecamatan1']			= post('kecamatan1');
				$dua['kelurahan1']			= post('kelurahan1');
				$dua['kodepos1']			= post('kodepos1');
				$dua['alamat2']				= post('alamat2');
				$dua['negara2']				= post('negara2');
				$dua['propinsi2']			= post('propinsi2');
				$dua['kota2']				= post('kota2');
				$dua['kecamatan2']			= post('kecamatan2');
				$dua['kelurahan2']			= post('kelurahan2');
				$dua['kodepos2']			= post('kodepos2');
				$d = $this->db->where(array('employee_id' =>$employee_id));
				$d = $this->db->update('employee_address',$dua);

				$tiga['tanggungan']			= post('tanggungan');
				$tiga['anak']				= post('anak');
				$tiga['emer_name']			= post('emer_name');
				$tiga['emer_gender']		= post('emer_gender');
				$tiga['emer_relation']		= post('emer_relation');
				$tiga['emer_nohp']			= post('emer_nohp');
				$t = $this->db->where(array('employee_id' =>$employee_id));
				$t = $this->db->update('employee_family',$tiga);


				$bg = post('badge_number');
				$sso['username']		 	= post('email');
				// $sso['password']		 	= 'multif@b';
				$sso['first_name']		 	= post('full_name');

				$sso_up = $this->db->where(array('badge_number' =>$bg));
				$sso_up = $this->db->update('tbl_account',$sso);

				set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Berhasil Disimpan.
								</div>
							');
				redirect('apps/employee');


			break;

			case 'resume':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Update Data Karyawan';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Resume'   => '',  
								  );
				$data['pages']  = 'hrd/employee/resume';

				$data['subdirektorat']= $this->db->query("SELECT * FROM subdirektorat");
				$data['division']     = $this->db->query("SELECT * FROM division");
				$data['department']   = $this->db->query("SELECT * FROM department");
				$data['jabatan']      = $this->db->query("SELECT * FROM jabatan");
				$data['golongan']     = $this->db->query("SELECT * FROM golongan");

				$data['det'] 		  = $this->db->query("SELECT * FROM employee WHERE employee_id='$id' ")->row_array();  
				$data['det_address']  = $this->db->query("SELECT * FROM employee_address WHERE employee_id='$id' ")->row_array();  
				$data['det_family']   = $this->db->query("SELECT * FROM employee_family WHERE employee_id='$id' ")->row_array();  
				$data['det_training']   = $this->db->query("SELECT * FROM employee_training WHERE employee_id='$id' ");  
				$data['det_experience']   = $this->db->query("SELECT * FROM employee_experience WHERE employee_id='$id' ");  

				$this->load->view('main',$data);  
			break;

			case 'pdf':
				 

				$data['subdirektorat']= $this->db->query("SELECT * FROM subdirektorat");
				$data['division']     = $this->db->query("SELECT * FROM division");
				$data['department']   = $this->db->query("SELECT * FROM department");
				$data['jabatan']      = $this->db->query("SELECT * FROM jabatan");
				$data['golongan']     = $this->db->query("SELECT * FROM golongan");

				$data['det'] 		  = $this->db->query("SELECT * FROM employee WHERE employee_id='$id' ")->row_array();  
				$data['det_address']  = $this->db->query("SELECT * FROM employee_address WHERE employee_id='$id' ")->row_array();  
				$data['det_family']   = $this->db->query("SELECT * FROM employee_family WHERE employee_id='$id' ")->row_array();  
				$data['det_training']   = $this->db->query("SELECT * FROM employee_training WHERE employee_id='$id' ");  
				$data['det_experience']   = $this->db->query("SELECT * FROM employee_experience WHERE employee_id='$id' ");  

				$html = $this->load->view('hrd/employee/pdf',$data, true);
				$pdf  = pdf();
				$pdf->SetTitle('Curriculum Vitae');
				$pdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
				$pdf->WriteHTML($html);
				$pdf->Output();
			break;

					
			default:
				set_flashdata('info','
								<div class="alert alert-info" role="alert">
								  Halaman Tidak ditemukan.
								</div>
							');
				redirect('apps/employee');
			break;
		}
	}



	public function pages($action='',$id='')
	{ 
		switch ($action) {
			case 'print':
				# code...
			break;
			case 'eksport':
				# code...
			break;
			case 'import':
				$data['title'] 	= 'Import';
				$data['modul']  = 'Import Data Karyawan';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Import'   => 'apps/employee/import',  
								  );
				$data['pages']  = 'hrd/employee/import';
		 
				$this->load->view('main',$data); 
			break;

			
			case 'import_data':
				// if ($this->input->post('submit')) {
                 
			                $path = APPPATH. '/upload/';
			                require_once APPPATH . "/third_party/PHPExcel.php";
			                $config['upload_path'] = $path;
			                $config['allowed_types'] = 'xlsx|xls|csv';
			                $config['remove_spaces'] = TRUE;
			                $this->load->library('upload', $config);
			                $this->upload->initialize($config);            
			                if (!$this->upload->do_upload('file')) {
			                    $error = array('error' => $this->upload->display_errors());
			                } else {
			                    $data = array('upload_data' => $this->upload->data());
			                }
			                if(empty($error)){
			                  if (!empty($data['upload_data']['file_name'])) {
			                    $import_xls_file = $data['upload_data']['file_name'];
			                } else {
			                    $import_xls_file = 0;
			                }
			                $inputFileName = $path . $import_xls_file;
			                 
			                try {
			                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
			                    $objPHPExcel = $objReader->load($inputFileName);
			                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
			                    $flag = true;
			                    $i=0;
			                    foreach ($allDataInSheet as $value) {
			                      if($flag){
			                        $flag =false;
			                        continue;
			                      }
			                      $inserdata[$i]['name']          = $value['A'];
			                      $inserdata[$i]['phone']          = $value['B'];
			                      $inserdata[$i]['address']     = $value['C']; 
			                      $i++;
			                    }               
			                    $result = $this->M_import->importData($inserdata);   
			                    if($result){
			                      echo "Imported successfully";
			                    }else{
			                      echo "ERROR !";
			                    }             
			      
			              } catch (Exception $e) {
			                   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
			                            . '": ' .$e->getMessage());
			                }
			              }else{
			                  echo $error['error'];
			                }
			                 
			                 
			        // }
			break;
			
			default:
				redirect('apps/employee');
			break;
		}

		
	}


	public function manpower($action='',$id='')
	{
		switch ($action) {
			case 'add-new':
				$data['title'] 	= 'Recruitment';
				$data['modul']  = 'Recruitment';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Request'  => 'apps/employee/manpower',  
								  );
				$data['pages']  = 'hrd/manpower/add';
				$data['division']     = $this->db->query("SELECT * FROM division");
				$data['department']   = $this->db->query("SELECT * FROM department");
				$data['jabatan']      = $this->db->query("SELECT * FROM jabatan");
		 
				$this->load->view('main',$data); 
			break;
			
			case 'save':
				$insert['doc_no']            = post('doc_no');
				$insert['tanggal_pengajuan'] = post('tanggal_pengajuan');
				$insert['division_id']       = post('division_id');
				$insert['department_id']     = post('department_id');
				$insert['jabatan_id']        = post('jabatan_id');
				$insert['position']          = post('position');
				$insert['jumlah']            = post('jumlah');
				$insert['skill']             = post('skill');
				$insert['gender']            = post('gender');
				$insert['age']               = post('age');
				$insert['education']         = post('education');
				$insert['major']             = post('major');
				$insert['sertifikat']        = post('sertifikat');
				$insert['pengalaman']        = post('pengalaman');
				$insert['uraian']            = post('uraian');
				$insert['alasan']            = post('alasan');
				$insert['tujuan']            = post('tujuan');
				$insert['status_karyawan']   = post('status_karyawan');
				$insert['tanggal_butuh']     = post('tanggal_butuh');
				$insert['status'] 			 = post('status');
				$insert['create_by'] 		 = session('id');
				$insert['create_date'] 		 = date_now();
				$insert['update_by'] 		 = session('id');
				$insert['update_date'] 		 = date_now();

				$i = $this->db->insert('hr_recruitment',$insert);
				if ($i){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Success saved.
								</div>
							');
					redirect('apps/employee/manpower');
				}

			break;

			case 'edit':
				$data['title'] 	= 'Recruitment';
				$data['modul']  = 'Recruitment';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Request'  => 'apps/employee/manpower',  
								  );
				$data['pages']  = 'hrd/manpower/edit';
				$data['division']     = $this->db->query("SELECT * FROM division");
				$data['department']   = $this->db->query("SELECT * FROM department");
				$data['jabatan']      = $this->db->query("SELECT * FROM jabatan");
				$data['det']          = $this->db->query("SELECT * FROM hr_recruitment WHERE recruitment_id='$id' ")->row_array();
				$this->load->view('main',$data); 
			break;

			case 'update':
				$insert['doc_no']            = post('doc_no');
				$insert['tanggal_pengajuan'] = post('tanggal_pengajuan');
				$insert['division_id']       = post('division_id');
				$insert['department_id']     = post('department_id');
				$insert['jabatan_id']        = post('jabatan_id');
				$insert['position']          = post('position');
				$insert['jumlah']            = post('jumlah');
				$insert['skill']             = post('skill');
				$insert['gender']            = post('gender');
				$insert['age']               = post('age');
				$insert['education']         = post('education');
				$insert['major']             = post('major');
				$insert['sertifikat']        = post('sertifikat');
				$insert['pengalaman']        = post('pengalaman');
				$insert['uraian']            = post('uraian');
				$insert['alasan']            = post('alasan');
				$insert['tujuan']            = post('tujuan');
				$insert['status_karyawan']   = post('status_karyawan');
				$insert['tanggal_butuh']     = post('tanggal_butuh');
				$insert['status'] 			 = post('status');
				$insert['create_by'] 		 = session('id');
				$insert['create_date'] 		 = date_now();
				$insert['update_by'] 		 = session('id');
				$insert['update_date'] 		 = date_now();

				$i = $this->db->where(array('recruitment_id'=>post('recruitment_id')));
				$i = $this->db->update('hr_recruitment',$insert);
				if ($i){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Success for updated.
								</div>
							');
					redirect('apps/employee/manpower');
				}
			break;

			case 'delete':
				$del = $this->db->query("DELETE FROM hr_recruitment WHERE recruitment_id='$id' ");
				if ($del){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Success for deleted.
								</div>
							');
					redirect('apps/employee/manpower');
				}
			break;


			case 'dashboard':
				$data['title'] 	= 'Recruitment';
				$data['modul']  = 'Monitoring';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Request'  => 'apps/employee/manpower',  
								  );
				$data['pages']  = 'hrd/manpower/dashboard';
				$data['list']   = $this->M_manpower->getAll();
				$data['candidate']   = $this->M_manpower->candidate($id);
				
				$this->load->view('main',$data); 
			break;

			case 'candidate':
				$data['title'] 	= 'Recruitment';
				$data['modul']  = 'Monitoring';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Dashboard'  => 'apps/employee/dashboard',  
										'Candidate'=> 'apps/employee/manpower/candidate/'.$id,  
								  );
				$data['pages']  = 'hrd/manpower/candidate';
				$data['list']   = $this->M_manpower->getAll();
				$data['candidate']   = $this->M_manpower->candidate();
				
				$this->load->view('main',$data); 
			break;


			default:
				$data['title'] 	= 'Recruitment';
				$data['modul']  = 'Recruitment';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Request'  => 'apps/employee/manpower',  
								  );
				$data['pages']  = 'hrd/manpower/list';
				$data['list']   = $this->M_manpower->getAll();
				
		 
				$this->load->view('main',$data); 
			break;
		}
	}

	public function appreciation($action='',$id='')
	{
		switch ($action) {
			// BENTUK PENGHARGAAN
			case 'bentuk-penghargaan':
				$data['title'] 	= 'Appreciation';
				$data['modul']  = 'Appreciation';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Appreciation'  => 'apps/employee/appreciation',  
										'Bentuk penghargaan'  => 'apps/employee/appreciation/bentuk-penghargaan',  
								  );
				$data['pages']  = 'hrd/appreciation/bentukpenghargaan';

				$data['list']   = $this->M_appreciation->bentukpenghargaan();
		 
				$this->load->view('main',$data); 
			break;

			case 'bentuk-penghargaan-add':
				$data['title'] 	= 'Appreciation';
				$data['modul']  = 'Appreciation';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Appreciation'  => 'apps/employee/appreciation',  
										'Bentuk penghargaan'  => 'apps/employee/appreciation/bentuk-penghargaan',  
								  );
				$data['pages']  = 'hrd/appreciation/bentukpenghargaan_add';

				$data['list']   = $this->M_appreciation->bentukpenghargaan();
		 
				$this->load->view('main',$data); 
			break;

			case 'bentuk-penghargaan-save':
				 $in['name']        = post('name');
				 $in['description'] = post('description');
				 $insert = $this->db->insert('hr_appreciation_item',$in);
				 if ($insert){
				 	set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Success for insert data.
								</div>
							');
					redirect('apps/employee/appreciation/bentuk-penghargaan');
				 }
			break;
			case 'bentuk-penghargaan-edit':
				$data['title'] 	= 'Appreciation';
				$data['modul']  = 'Appreciation';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Appreciation'  => 'apps/employee/appreciation',  
										'Bentuk penghargaan'  => 'apps/employee/appreciation/bentuk-penghargaan',  
								  );
				$data['pages']  = 'hrd/appreciation/bentukpenghargaan_edit';
				$data['det']    = $this->db->query("SELECT * FROM hr_appreciation_item WHERE item_id='$id' ")->row_array();
				$data['list']   = $this->M_appreciation->bentukpenghargaan();
		 
				$this->load->view('main',$data); 
			break;
			case 'bentuk-penghargaan-update':
				 $in['name']        = post('name');
				 $in['description'] = post('description');
				 $update = $this->db->where('item_id',post('item_id'));
				 $update = $this->db->update('hr_appreciation_item',$in);
				 if ($update){
				 	set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Success for updated data.
								</div>
							');
					redirect('apps/employee/appreciation/bentuk-penghargaan');
				 }
			break;
			case 'bentuk-penghargaan-delete':
				 $del = $this->db->query("DELETE FROM hr_appreciation_item WHERE item_id='$id' ");
				 if ($del){
				 	set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Success for deleted.
								</div>
							');
					redirect('apps/employee/appreciation/bentuk-penghargaan');
				 }
			break;

			case 'add-new':
				$data['title'] 	= 'Appreciation';
				$data['modul']  = 'Appreciation';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Appreciation'  => 'apps/employee/appreciation',  
										'Bentuk penghargaan'  => 'apps/employee/appreciation/bentuk-penghargaan',  
								  );
				$data['pages']  = 'hrd/appreciation/appreciation_add';

				$data['list']   = $this->M_appreciation->bentukpenghargaan();
				$data['emp'] 	= $this->M_employee->getAll();
				$data['item'] 	= $this->M_appreciation->bentukpenghargaan();
		 
				$this->load->view('main',$data); 
			break;
			
			case 'add-save':
				$insert['doc_no']      = post('doc_no');
				$insert['employee_id'] = post('employee_id');
				$insert['item_id']     = post('item_id');
				$insert['date']        = post('date');
				$insert['description'] = post('description');
				$insert['status']      = '1';
				$insert['create_date'] = date_now();
				$insert['create_by']   = session('id');

				$i = $this->db->insert('hr_appreciation',$insert);
				if ($i){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Success for insert data.
								</div>
							');
					redirect('apps/employee/appreciation');
				}
			break;

			case 'edit':
				$data['title'] 	= 'Appreciation';
				$data['modul']  = 'Appreciation';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Appreciation'  => 'apps/employee/appreciation',  
										'Bentuk penghargaan'  => 'apps/employee/appreciation/bentuk-penghargaan',  
								  );
				$data['pages']  = 'hrd/appreciation/appreciation_edit';

				$data['list']   = $this->M_appreciation->bentukpenghargaan();
				$data['emp'] 	= $this->M_employee->getAll();
				$data['item'] 	= $this->M_appreciation->bentukpenghargaan();

				$data['det']    = $this->db->query("SELECT * FROM hr_appreciation WHERE appreciation_id='$id' ")->row_array();
		 
				$this->load->view('main',$data); 
			break;

			case 'add-update':
				$update['doc_no']      = post('doc_no');
				$update['employee_id'] = post('employee_id');
				$update['item_id']     = post('item_id');
				$update['date']        = post('date');
				$update['description'] = post('description');
				$update['status']      = '1';
				$update['create_date'] = date_now();
				$update['create_by']   = session('id');

				$u = $this->db->where(array('appreciation_id'=>post('appreciation_id')));
				$u = $this->db->update('hr_appreciation',$update);
				if ($u){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Success for updated.
								</div>
							');
					redirect('apps/employee/appreciation');
				}
			break;

			case 'delete':
				$d = $this->db->query("DELETE FROM hr_appreciation WHERE appreciation_id='$id' ");
				if ($d){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Success for deleted.
								</div>
							');
					redirect('apps/employee/appreciation');
				}
			break;


			default:
				$data['title'] 	= 'Appreciation';
				$data['modul']  = 'Appreciation';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Appreciation'  => 'apps/employee/appreciation',  
								  );
				$data['pages']  = 'hrd/appreciation/list';

				$data['list']   = $this->M_appreciation->getAll();
		 
				$this->load->view('main',$data); 
			break;
		}
		
	}

	public function warning($action='',$id='')
	{
		switch ($action) {
			// BENTUK PENGHARGAAN
			case 'variable':
			 # code...
		 	break;
			default:
				$data['title'] 	= 'Warning';
				$data['modul']  = 'Warning';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										'HRD'      => 'apps/hrd',  
										'Employee' => 'apps/employee', 
										'Warning'  => 'apps/employee/warning',  
								  );
				$data['pages']  = 'hrd/warning/list';

				$data['list']   = $this->M_appreciation->getAll();
		 
				$this->load->view('main',$data); 
			break;
		}
		
	}



	public function status($status='',$id='')
	{
		$update = $this->db->query("UPDATE employee SET status='$status' WHERE employee_id='$id' ");
		if ($update){
			redirect('apps/employee/act/edit-user/'.$id);
		}
	}
 
  
 
}

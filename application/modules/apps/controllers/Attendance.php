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
class Attendance extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    // $this->load->library('session');
	    /*Model*/
	    $this->load->model(array('M_location','M_attendance','M_employee','M_master','M_device'));  
	    // $this->load->helper('apps_helper');  
	    login(); 
	}
	
	public function index()
	{ 
		$data['title'] 	= 'Multifab - Application';
		$data['modul']  = 'Dashboard Attendance';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps',
								 'Attendance'     => 'apps/attendance'
						  );
		$data['pages']    = 'attendance/dashboard';

		$tanggal = date_now();
		if ($this->input->get('date')){
			$tanggal = $this->input->get('date');
		}

		$data['late']     = $this->M_attendance->late($tanggal);
		$data['onTime']   = $this->M_attendance->onTime($tanggal);
		$data['getAll']   = $this->M_attendance->getAll($tanggal);
		$this->load->view('main',$data); 
	}

	public function profile($badge_number='')
	{ 
		$data['title'] 	= 'Multifab - Application';
		$data['modul']  = 'Profile Attendance';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'    => 'apps',
								 'Attendance'  => 'apps/attendance',
								 'Profile'     => 'apps/attendance/profile/'.$badge_number
						  );
		$data['pages']  = 'attendance/profile';

		$data['late']   = $this->M_attendance->late(date_now());
		$data['onTime'] = $this->M_attendance->onTime(date_now());
		$data['det'] 	= $this->db->query("SELECT * FROM employee WHERE badge_number='$badge_number' ")->row_array();  
		$data['getAll'] = $this->M_attendance->getAllProfile($badge_number);
		$this->load->view('main',$data); 
	}

	public function act($action='',$badge_number='',$id='')
	{
		switch ($action) {
			case 'add-new':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Add Manual Attendance';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'    => 'apps',
										 'Attendance'  => 'apps/attendance',
										 'Profile'     => 'apps/attendance/profile/'.$badge_number.'',
										 'Add New'     => 'apps/attendance/act/add-new/'.$badge_number
								  );
				$data['det'] 	= $this->db->query("SELECT * FROM employee WHERE badge_number='$badge_number' ")->row_array();  
				$data['pages']  = 'attendance/add_new'; 
				$this->load->view('main',$data); 
			break;

			case 'add-save':
				$insert['badge_number']              = post('badge_number');
				$insert['tanggal']                   = post('tanggal');
				$insert['time_in']                   = post('time_in');
				$insert['time_out']                  = post('time_out');
				$insert['attendance_tipe_id_in']     = '2';
				$insert['attendance_tipe_id_out']    = '2';
				$insert['catatan']                   = post('catatan');
				$in = $this->db->insert('attendance',$insert);
				if ($in){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Data Hasben Saved.
								</div>
							');
					redirect('apps/attendance/profile/'.post('badge_number'));
				}
			break;

			case 'edit':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Edit Attendance';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'    => 'apps',
										 'Attendance'  => 'apps/attendance',
										 'Profile'     => 'apps/attendance/profile/'.$badge_number.'',
										 'Edit'        => 'apps/attendance/act/edit/'.$badge_number
								  );
				$data['det'] 	= $this->db->query("SELECT * FROM employee WHERE badge_number='$badge_number' ")->row_array();  
				$data['edit'] 	= $this->db->query("SELECT * FROM attendance WHERE id='$id' ")->row_array();  
				$data['pages']  = 'attendance/edit'; 
				$this->load->view('main',$data); 
			break;

			case 'update':
				$update['badge_number']              = post('badge_number');
				$update['tanggal']                   = post('tanggal');
				$update['time_in']                   = post('time_in');
				$update['time_out']                  = post('time_out');
				$update['attendance_tipe_id_in']     = '2';
				$update['attendance_tipe_id_out']    = '2';
				$update['catatan']                   = post('catatan');
				// $in = $this->db->where(array('id'=>post('id'));
				$in = $this->db->where('id',post('id'));
				$in = $this->db->update('attendance',$update);
				if ($in){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Success for Updated.
								</div>
							');
					redirect('apps/attendance/profile/'.post('badge_number'));
				}
			break;
			
			case 'delete':
				$del = $this->db->query("DELETE FROM attendance WHERE id='$id' ");
				if ($del){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Success for Delete data.
								</div>
							');
					redirect('apps/attendance/profile/'.$badge_number);
				}
			break;

			default:
				redirect('apps/attendance');
			break;
		}
	}


	public function settings($action='',$id='')
	{
		switch ($action) {



			//Settings Lokasi
			case 'location':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Settings Location';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'    => 'apps',
										 'Attendance'  => 'apps/attendance',
										 'Settings'     => 'apps/attendance/settings',   
										 'Location'     => 'apps/attendance/settings/location',   
								  ); 
				$data['pages']  = 'attendance/settings/settings_location'; 
				$data['list']   = $this->M_location->getAll();
				$this->load->view('main',$data);
			break;
			case 'location-add':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Settings Location';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'    => 'apps',
										 'Attendance'  => 'apps/attendance',
										 'Settings'     => 'apps/attendance/settings',   
										 'Location'     => 'apps/attendance/settings/location',   
								  ); 
				$data['pages']  = 'attendance/settings/settings_location_add'; 
				$data['list']   = $this->M_location->getAll();
				$this->load->view('main',$data);
			break;
			case 'location-save':
				$insert_location['name'] 			= post('name');
				$insert_location['lat'] 			= post('lat');
				$insert_location['description '] 	= post('description');
				$insert_location['lon'] 			= post('lon');
				$insert_location['radius'] 			= post('radius');

				$insert = $this->db->insert('attendance_location',$insert_location);
				if ($insert){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Sucess for insert.
								</div>
							');
					redirect('apps/attendance/settings/location');
				}	

			break;
			case 'location-edit':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Settings Location';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'    => 'apps',
										 'Attendance'  => 'apps/attendance',
										 'Settings'     => 'apps/attendance/settings',   
										 'Location'     => 'apps/attendance/settings/location',   
								  ); 
				$data['pages']  = 'attendance/settings/settings_location_edit'; 
				$data['det']    = $this->db->query("SELECT * FROM attendance_location WHERE location_id='$id' ")->row_array();
				$this->load->view('main',$data);
			break;
			case 'location-update':
				$update_location['name'] 			= post('name');
				$update_location['lat'] 			= post('lat');
				$update_location['description'] 	= post('description');
				$update_location['lon'] 			= post('lon');
				$update_location['radius'] 		    = post('radius');

				$update = $this->db->where(array('location_id'=>post('location_id')));
				$update = $this->db->update('attendance_location',$update_location);
				if ($update){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Sucess for updated.
								</div>
							');
					redirect('apps/attendance/settings/location');
				}	

			break;
			case 'location-delete': 
				$delete   = $this->db->query("DELETE FROM attendance_location WHERE location_id='$id'");
				if ($delete){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Sucess for deleted.
								</div>
							');
					redirect('apps/attendance/settings/location');
				}
			break;
			case 'location-maps': 
				$data['list']   = $this->M_location->getAll();
				$this->load->view('attendance/settings/settings_location_maps',$data);
			break;








			//Setting Jam Kerja
			case 'working-time':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Working Time';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'    => 'apps',
										 'Attendance'  => 'apps/attendance',
										 'Settings'     => 'apps/attendance/settings',   
										 'Working Time'  => 'apps/attendance/settings/working-time',   
								  ); 
				$data['list']   = $this->db->query("SELECT * FROM `attendance_shift_hours`");
				$data['pages']  = 'attendance/settings/settings_working'; 
				$this->load->view('main',$data);
			break;
			case 'working-time-add':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Working Time';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'    => 'apps',
										 'Attendance'  => 'apps/attendance',
										 'Settings'     => 'apps/attendance/settings',   
										 'Working Time'  => 'apps/attendance/settings/working-time',   
								  ); 
				$data['pages']  = 'attendance/settings/settings_working_add'; 
				$this->load->view('main',$data);
			break;
			
			case 'working-time-save':
				$insert_location['name'] 			= post('name');
				$insert_location['datang'] 			= post('datang');
				$insert_location['pulang'] 	        = post('pulang'); 
				$insert_location['tj_shift'] 	    = post('tj_shift');

				$insert = $this->db->insert('attendance_shift_hours',$insert_location);
				if ($insert){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Sucess for insert.
								</div>
							');
					redirect('apps/attendance/settings/working-time');
				}	

			break;
			case 'working-time-edit':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Working Time';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'    => 'apps',
										 'Attendance'  => 'apps/attendance',
										 'Settings'     => 'apps/attendance/settings',   
										 'Working Time'  => 'apps/attendance/settings/working-time',   
								  ); 
				$data['pages']  = 'attendance/settings/settings_working_edit'; 
				$data['det']    = $this->db->query("SELECT * FROM attendance_shift_hours WHERE hours_id='$id' ")->row_array();
				$this->load->view('main',$data);
			break;
			case 'working-time-update':
				$update_location['name'] 			= post('name');
				$update_location['datang'] 			= post('datang');
				$update_location['pulang'] 	        = post('pulang'); 
				$update_location['tj_shift'] 	    = post('tj_shift');  
				$update = $this->db->where(array('hours_id'=>post('hours_id')));
				$update = $this->db->update('attendance_shift_hours',$update_location);
				if ($update){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Sucess for updated.
								</div>
							');
					redirect('apps/attendance/settings/working-time');
				}	
			break;
			case 'working-time-delete':
				 $delete = $this->db->query("DELETE FROM attendance_shift_hours WHERE hours_id='$id' ");
				if ($delete){
					set_flashdata('info','
								<div class="alert alert-danger" role="alert">
								  Sucess for deleted.
								</div>
							');
					redirect('apps/attendance/settings/working-time');
				}	
			break;








			//Setting Hari Libur
			case 'libur':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Hari Libur';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'    => 'apps',
										 'Attendance'  => 'apps/attendance',
										 'Settings'     => 'apps/attendance/settings',   
								  ); 
				$data['pages']  = 'attendance/settings/settings_libur';
				if ($this->input->get('tahun')){
					$data['libur']  = $this->M_attendance->hariLibur($this->input->get('tahun'));
				}else{
					$data['libur']  = $this->M_attendance->hariLibur('');
				}
				
				$this->load->view('main',$data);
			break;
			case 'libur-save':
				$split = explode('-', post('tanggal'));
				$i['tanggal']	= post('tanggal');
				$i['periode']   = $split[0];
				$i['deskripsi']	= post('deskripsi');
				$i['tipe']	    = post('tipe');
				$insert         = $this->db->insert("attendance_hari_libur",$i); 
				if ($insert){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Sucess for insert data.
								</div>
							');
					redirect('apps/attendance/settings/libur');
				}	
			break;
			case 'libur-destroy':
				$destroy = $this->db->query("DELETE FROM attendance_hari_libur WHERE libur_id='$id' ");
				if ($destroy){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Sucess for deleted.
								</div>
							');
					redirect('apps/attendance/settings/libur');
				}	
			break;






			//Settings Mesin Absensi
			case 'mesin':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Hari Libur';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'    => 'apps',
										 'Attendance'  => 'apps/attendance',
										 'Settings'    => 'apps/attendance/settings',   
										 'Device'      => 'apps/attendance/settings/mesin',   
								  ); 
				$data['list']   = $this->M_device->getAll();
				$data['pages']  = 'attendance/settings/settings_mesin'; 
				$this->load->view('main',$data);
			break;
			case 'mesin-add':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Hari Libur';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										 'Attendance'   => 'apps/attendance',
										 'Settings'     => 'apps/attendance/settings',   
										 'Device'       => 'apps/attendance/settings/mesin',   
										 'Add'          => 'apps/attendance/settings/mesin-add',   
								  );  
				$data['pages']  = 'attendance/settings/settings_mesin_add'; 
				$this->load->view('main',$data);
			break;
			case 'mesin-save':
				$post['nama']       = post('nama');
				$post['lokasi']     = post('lokasi');
				$post['ip_address'] = post('ip_address');
				$post['status']     = post('status');
				$post['comKey']     = post('comKey');
				$insert = $this->db->insert('attendance_device',$post);
				if ($insert){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Sucess for insert data.
								</div>
							');
					redirect('apps/attendance/settings/mesin');
				}
			break;
			case 'mesin-edit':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Hari Libur';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										 'Attendance'   => 'apps/attendance',
										 'Settings'     => 'apps/attendance/settings',   
										 'Device'       => 'apps/attendance/settings/mesin',   
										 'Edit'          => 'apps/attendance/settings/mesin-edit/'.$id,   
								  );  
				$data['det']    = $this->db->query("SELECT * FROM attendance_device WHERE device_id='$id' ")->row_array();
				$data['pages']  = 'attendance/settings/settings_mesin_edit'; 
				$this->load->view('main',$data);
			break;
			case 'mesin-update':
				$post['nama']       = post('nama');
				$post['lokasi']     = post('lokasi');
				$post['ip_address'] = post('ip_address');
				$post['status']     = post('status');
				$post['comKey']     = post('comKey');
				$update = $this->db->where(array('device_id'=>post('device_id')));
				$update = $this->db->update('attendance_device',$post);
				if ($update){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Sucess for updated.
								</div>
							');
					redirect('apps/attendance/settings/mesin');
				}

			break;
			case 'mesin-destroy':
				$destroy = $this->db->query("DELETE FROM attendance_device WHERE device_id='$id' ");
				if ($destroy){
					set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Sucess for deleted.
								</div>
							');
					redirect('apps/attendance/settings/mesin');
				}	
			break;
			case 'mesin-koneksi':
				$IP     = post('ip_address');
				$ComKey = post('comKey');
				$Connect = fsockopen($IP, "80", $errno, $errstr, 1);
				if($Connect){
					echo "success";
				}else echo "failed"; 
			break;

			//Default Menu Settings
			default:
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Edit Attendance';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'    => 'apps',
										 'Attendance'  => 'apps/attendance',
										 'Settings'     => 'apps/attendance/settings',   
								  ); 
				$data['pages']  = 'attendance/settings/home'; 
				$this->load->view('main',$data);
			break;
		}
	}


	public function reports($action='',$id='')
	{
		switch ($action) {
			case 'filter-report':
				$data['start_date'] 	= $this->input->get('start_date');
				$data['end_date'] 	    = $this->input->get('end_date');
				$data['division_id'] 	= $this->input->get('division_id');
				$data['employee_id'] 	= $this->input->get('employee_id');
				$data['status_pegawai'] = $this->input->get('status_pegawai');
				$where = '';

				if ($this->input->get('status_pegawai')=="ALL"){
					$where .= ' AND emp.pegawai!="" ';
				}else if ($this->input->get('status_pegawai')=="Outsource"){
					$where .= ' AND emp.pegawai="Outsource" ';
				}else if ($this->input->get('status_pegawai')!="Outsource"){
					$where .= ' AND emp.pegawai!="Outsource" ';
				}



				if ($this->input->get('employee_id')=="ALL"){
					$where .= ' AND emp.badge_number!="" ';
				}else if($this->input->get('employee_id')!="ALL"){
					$where .= ' AND emp.badge_number="'.$this->input->get('employee_id').'" ';
				}

				if ($this->input->get('division_id')=='ALL'){
					$where .= ' AND emp.division_id!="" ';
				}else if ($this->input->get('division_id')!='ALL'){
					$where .= ' AND emp.division_id="'.$this->input->get('division_id').'" ';
				}

				
				$data['emp']  = $this->M_employee->attendance_report($where);
	 	 

				if (($this->input->get('excel'))=='TRUE'){
					excel();
				}

				

				switch ($this->input->get('report_type')) { //Report Type
					case 'Worktime':
						if (($this->input->get('pdf'))=='TRUE'){
						 $html = $this->load->view('attendance/reports/filter-reports',$data, true);
						}else{
						 $html = $this->load->view('attendance/reports/filter-reports',$data); 
						} 
					break;
					case 'Uang Makan':
						if (($this->input->get('pdf'))=='TRUE'){
						 $html = $this->load->view('attendance/reports/uang-makan',$data, true);
						}else{
						 $html = $this->load->view('attendance/reports/uang-makan',$data);
						}  
					break; 
					case 'Late':
						if (($this->input->get('pdf'))=='TRUE'){
						 $html = $this->load->view('attendance/reports/Late',$data, true);
						}else{
						 $html = $this->load->view('attendance/reports/Late',$data);
						}  
					break; 
					case 'Ontime':
						if (($this->input->get('pdf'))=='TRUE'){
						 $html = $this->load->view('attendance/reports/Ontime',$data, true);
						}else{
						 $html = $this->load->view('attendance/reports/Ontime',$data);
						}  
					break; 
					case 'Summary Attendance':
						if (($this->input->get('pdf'))=='TRUE'){
						 $html = $this->load->view('attendance/reports/calendar',$data, true);
						}else{
						 $html = $this->load->view('attendance/reports/calendar',$data);
						}  
					break; 
				} 

				if (($this->input->get('pdf'))=='TRUE'){
					ini_set('max_execution_time', '300');
					ini_set("pcre.backtrack_limit", "5000000");
					$content = $html;
					$pdf = pdf();
					$pdf->AddPage("P","","","","","5","5","5","5","","","","","","","","","","","","A4");
					$pdf->WriteHTML($content);

					$pdf->Output();
					echo $html;
				}else{
					echo $html;
				}
				
			break;
			
			default:
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Attandande Reports';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'    => 'apps',
										 'Attendance'  => 'apps/attendance',
										 'Reports'     => 'apps/attendance/reports',   
								  ); 
				$data['pages']  = 'attendance/reports/home'; 


				$data['emp']    = $this->M_employee->status('Active');
				$data['div']    = $this->M_master->getAllDivision();
				$this->load->view('main',$data);
			break;
		}
	}

	public function SpdList()
	{
		$data['start_date']  = post('start_date');
		$data['end_date']    = post('end_date');
		$data['forname']     = post('forname'); 
		// echo post('start_date').' '.post('end_date');
		$this->load->view('attendance/reports/SpdList',$data);
	}



	public function crone_job()
	{
		// http://192.168.64.2/hrms.multifab.co.id/apps/attendance/crone_job
		// $employee   = $this->db->query("SELECT * FROM attendance_log ");
		$employee   = $this->db->query("SELECT * FROM employee ");
		$tgl        = date_now(); 
		$batas      = timeBatas(); 
		
		foreach ($employee->result() as $remployee) 
		{
			$emp = $remployee->badge_number;
			$in  = $this->db->query("SELECT badge_number,DATE(`tanggal`) as tanggal, TIME(`tanggal`) as waktu, device FROM attendance_log WHERE DATE(tanggal)='$tgl' AND TIME(`tanggal`)<='$batas' and badge_number='$emp' ORDER BY id_log ASC LIMIT 1 ");
			
			//Time IN
			if ($in->num_rows() > 0){
				$data_in = $in->row_array();
				$badge_number_in = $data_in['badge_number'];
				$tanggal_in      = $data_in['tanggal'];
				$waktu_in        = $data_in['waktu'];
				$insert_time['badge_number']       = $badge_number_in;
				$insert_time['tanggal']            = $tanggal_in;
				$insert_time['time_in']            = substr($waktu_in,0,8);
				$insert_time['time_out']           = '';
				$insert_time['attendance_tipe_id_in'] = $data_in['device'];

				$cek    = $this->db->query("SELECT * FROM attendance WHERE badge_number='$badge_number_in' AND tanggal='$tanggal_in' ");
				if ($cek->num_rows() == 0){
					$insert = $this->db->insert('attendance',$insert_time);	
				} 
			}

			//Time Out
			$out = $this->db->query("SELECT badge_number,DATE(`tanggal`) as tanggal, TIME(`tanggal`) as waktu, device FROM attendance_log WHERE DATE(tanggal)='$tgl' AND TIME(`tanggal`)>='$batas' and badge_number='$emp' ORDER BY id_log DESC LIMIT 1 ");
			if ($out->num_rows() > 0){
				$data_out = $out->row_array();
				$badge_number_out = $data_out['badge_number'];
				$tanggal_out      = $data_out['tanggal'];
				$waktu_out        = $data_out['waktu'];
				$update_time['time_out']               = substr($waktu_out,0,8);
				$update_time['attendance_tipe_id_out'] = $data_out['device'];
				$upd = $this->db->where(array('badge_number'=>$badge_number_out,'tanggal'=>	$tanggal_out));
				$upd = $this->db->update('attendance',$update_time);
			}

		}		

	}

	public function synchronize($date='')
	{
		$data      = json_decode($this->encode()); 
		// $emp       = $this->db->query("SELECT * FROM employee as a WHERE a.status='Active' ");
		// foreach ($emp->result() as $remp) {
		// 	$remp->badge_number;
		// } 
	}

	public function encode()
	 {
	 	$IP     = '192.168.5.221';
		$ComKey = '83581';

		$Connect = fsockopen($IP, "80", $errno, $errstr, 1);
		if($Connect){
			$soap_request='<GetAttLog><ArgComKey xsi:type=\"xsd:integer\">'.$ComKey.'</ArgComKey><Arg><PIN xsi:type=\"xsd:integer\">All</PIN></Arg></GetAttLog>';
			$newLine="\r\n";
			fputs($Connect, "POST /iWsService HTTP/1.0".$newLine);
		    fputs($Connect, "Content-Type: text/xml".$newLine);
		    fputs($Connect, "Content-Length: ".strlen($soap_request).$newLine.$newLine);
		    fputs($Connect, $soap_request.$newLine);
			$buffer="";
			while($Response=fgets($Connect, 1024)){
				$buffer=$buffer.$Response;
			}
		}else echo "Koneksi Gagal";
		
		function Parse_Data($data,$p1,$p2){
			$data=" ".$data;
			$hasil="";
			$awal=strpos($data,$p1);
			if($awal!=""){
				$akhir=strpos(strstr($data,$p1),$p2);
				if($akhir!=""){
					$hasil=substr($data,$awal+strlen($p1),$akhir-strlen($p1));
				}
			}
			return $hasil;	
		}

		$buffer=Parse_Data($buffer,"<GetAttLogResponse>","</GetAttLogResponse>");
		$buffer=explode("\r\n",$buffer);
		$no=1;

		$test['status']  = 200;
		$test['message'] = 'Success';
		$test['data']    = array();

		$no = 1;
		if (count($buffer) > 0){
			for ($a=0;$a<count($buffer);$a++) { 
				$data=Parse_Data($buffer[$a],"<Row>","</Row>");
				if (Parse_Data($data,"<PIN>","</PIN>")!=""){

					$res['id']        = $no++;
					$res['mechine_id']= '1';
					$res['pin']       = Parse_Data($data,"<PIN>","</PIN>");
					$res['waktu']     = Parse_Data($data,"<DateTime>","</DateTime>");
					$res['verified']  = Parse_Data($data,"<Verified>","</Verified>");
					$res['status']    = Parse_Data($data,"<Status>","</Status>");

					array_push($test['data'],$res);
				}
			}
		}else{
			$test['status']  = 404;
			$test['message'] = 'Failed';
			$test['data']    = array();
		}

		

		return (json_encode($test));
	 }

	 public function tarik($action='',$id='')
	 {
	 	switch ($action) {
	 		case 'proses':
	 			$mulai 		= post('mulai');
				$akhir 		= post('akhir');
				$device_id 	= post('device_id');
				$tipe 		= post('tipe');

				// echo $mulai.' '.$akhir.' '.$device_id.' '.$tipe;
				switch ($device_id) {
					case '1': //Mesin Jakarta
						 $mesin = json_decode($this->encode());
						 // var_dump($mesin);
						 $start_date = date("Y-m-d",strtotime($mulai));
						 $end_date   = date("Y-m-d",strtotime($akhir));
						 if ($mesin->status=="200"){
						 	 while (strtotime($start_date) <= strtotime($end_date)) {
						 	 	$tgl  = date("Y-m-d",strtotime($start_date));
						 	 	//Drop Log Data tanggal itu.
						 	 	$this->db->query("DELETE FROM `attendance_log` WHERE tanggal='$tgl' ");
						 	 	foreach ($mesin->data as $absen) {
									$tgl_mesin = date("Y-m-d",strtotime($absen->waktu)); 
									$wkt_mesin = date("H:i:s",strtotime($absen->waktu)); 
									if (($tgl_mesin==$tgl)){
										$insert['id_crone']     = $absen->id;
										$insert['badge_number'] = $absen->pin;
										$insert['tanggal']      = $tgl_mesin;
										$insert['waktu']        = $wkt_mesin;
										$insert['device_id']    = $device_id;
										$insert['verified']     = $absen->verified;
										$i = $this->db->insert('attendance_log',$insert);	
									}
								}
								$this->absensi($tgl);
						 	 	$start_date = date ("Y-m-d", strtotime("+1 day", strtotime($start_date)));
						 	 }

						 	 set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Log Absensi periode '.date_idn($mulai).' s/d '.date_idn($akhir).' berhasil proses.
								</div>
							');
							redirect('apps/attendance/tarik');

						    
						 }else{
						 	set_flashdata('info','
								<div class="alert alert-danger" role="alert">
								  Message : <i>API Mesin "device_id:'.$device_id.'" tidak ditemukan.</i>
								</div>
							');
							redirect('apps/attendance/tarik');
						 }
						 
					break;
					
					default: //Jika mesin tidak ditemukan
						set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Data tidak ditemukan.
								</div>
							');
						redirect('apps/attendance/tarik');
					break;
				}

	 		break;
	 		
	 		default:
	 			$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Tarik data absensi';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'    => 'apps',
										 'Attendance'  => 'apps/attendance',
										 'Tarik'     => 'apps/attendance/tarik',   
								  ); 
				$data['pages']  = 'attendance/tarik/home'; 

 				$data['device'] = $this->M_device->getAll();
				$this->load->view('main',$data);
 			break;
	 	}
	 }

	public function absensi($tanggal='')
  	{
  		$tgl    = $tanggal;
  		$query  = $this->db->select('attendance_log.*');
        $query  = $this->db->from('attendance_log'); 
        $query  = $this->db->where('tanggal',$tgl); 
        $query  = $this->db->get(); 
  		$getlog = $query;

  		$emp    = $this->db->query("SELECT * FROM employee as a WHERE a.status='Active' ");
  		foreach ($emp->result() as $remp) {
  			$badge_number = $remp->badge_number;
  			$in_cek = $this->db->query("SELECT * FROM attendance_log WHERE tanggal='$tgl' AND badge_number='$badge_number' ORDER BY id_crone ASC LIMIT 1");
  			if ($in_cek->num_rows() >0){
  				$in = $in_cek->row_array();
  				$i['badge_number']            = $badge_number;
				$i['tanggal']                 = $tgl;
				$i['time_in']                 = $in['waktu'];
				$i['time_out']                = '';
				$i['attendance_tipe_id_in']   = $in['device_id'];
				$i['attendance_tipe_id_out']  = '';
				$i['verified_in']             = $in['verified'];
				$i['verified_out']            = '';  

				$cek_insert  = $this->db->query("SELECT * FROM `attendance` WHERE badge_number='$badge_number' and DATE(`tanggal`)='$tgl' ");
				if (($cek_insert->num_rows() == 0) OR ($cek_insert->num_rows() == NULL)){
					$insert = $this->db->insert('attendance',$i);
				}
				
  			}
  			$out_cek = $this->db->query("SELECT * FROM attendance_log WHERE tanggal='$tgl' AND badge_number='$badge_number' ORDER BY id_crone DESC LIMIT 1");
  			
			if ($out_cek->num_rows() > 0){
				$cek_insert  = $this->db->query("SELECT * FROM `attendance` WHERE badge_number='$badge_number' and DATE(`tanggal`)='$tgl' ");
				$w = $cek_insert->row_array();
				$out = $out_cek->row_array();
				$i['time_out']                = $out['waktu'];
				$i['attendance_tipe_id_out']  = $out['device_id'];
				$i['verified_out']            = $out['verified'];
				$update = $this->db->where(array('badge_number'=>$badge_number,'tanggal'=>$tgl,'id'=>$w['id']));
				$update = $this->db->update('attendance',$i);
			}

			
  		}
  		 
  	}
 
  
 
}

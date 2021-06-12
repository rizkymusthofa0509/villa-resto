<?php
/*
-- ---------------------------------------------------------------
-- MASTER
-- CREATED BY : RIZKY MUSTHOFA
-- COPYRIGHT  : Copyright (c) 2020 
-- LICENSE    : http://opensource.org/licenses/MIT  MIT License
-- CREATED ON : Oktober 2020
-- UPDATED ON : V.1
-- APP NAME   : ACCOUNTING APPS
-- ---------------------------------------------------------------
*/
	
	function durationTime($start,$end)
	{
		$tgl1 = new DateTime($start);
		$tgl2 = new DateTime($end);
		$d = $tgl2->diff($tgl1)->days + 1;
		return $d;
	}
	
	function offDay($tgl='')
	{
		 
		$ci     =& get_instance(); 
		$cek_tanggal   = $ci->db->query("SELECT *  FROM `attendance_hari_libur` WHERE tanggal='$tgl' ");
		if ($cek_tanggal->num_rows() > 0){
			return TRUE;
		}else{
			$hari = date("D",strtotime($tgl));
			switch ($hari) {
				case 'Sat':
					return TRUE;
				break;
				case 'Sun':
					return TRUE;
				break; 
				default:
					return FALSE;
				break;

			}

		} 

	}

	function offDayReturn($tgl='')
	{
		$ci     =& get_instance(); 
		$cek_tanggal   = $ci->db->query("SELECT *  FROM `attendance_hari_libur` WHERE tanggal='$tgl' ")->row_array();
		return $cek_tanggal['deskripsi'];
	}

	function forname($get='')
	 {
	 	$ci     =& get_instance(); 
		$forname   = $ci->db->query("SELECT *  FROM `employee` WHERE (`badge_number` IN ('$get') OR `badge_number` IS NULL)");
		return $forname;
	 } 

	function getSpdList($start_date='',$end_date='')
	{ 
		return json_decode(file_get_contents('http://erp.multifab.co.id/api/spd_list.php?dari=2021-01-01&sampai=2021-12-31'));
	}
	function JarakLokasi($lat_from,$long_from,$lat_dest,$long_dest)
	{
		return 0;
	}
	function getTime_in($tanggal='',$badge_number='')
	{
		$ci     =& get_instance();
		// return $ci->session->set_flashdata($name,$value); 
		$time   = $ci->db->query("SELECT time_in FROM `attendance` WHERE badge_number='$badge_number' and DATE(tanggal)='$tanggal' ");
		if ($time->num_rows() > 0){
			$data = $time->row_array();
			return substr($data['time_in'],0,5);
		}else{
			return '00:00';
		}
	} 
	function getTime_out($tanggal='',$badge_number='')
	{
		$ci     =& get_instance();
		$time   = $ci->db->query("SELECT time_out FROM `attendance` WHERE badge_number='$badge_number' and DATE(tanggal)='$tanggal' ");
		if ($time->num_rows() > 0){
			$data = $time->row_array();
			if ($data['time_out']==""){  
				return '00:00';	
			}else{
				if (substr($data['time_out'], 0,5)==substr(getTime_in($tanggal,$badge_number),0,5)){
					return '00:00';
				}else{
					return substr($data['time_out'],0,5);
				} 
			}
			
		}else{
			return '00:00';
		} 
	} 

	function CatatanAttandance($tanggal='',$badge_number='')
	{
		$ci     =& get_instance();
		$time   = $ci->db->query("SELECT catatan FROM `attendance` WHERE badge_number='$badge_number' and DATE(tanggal)='$tanggal' ");
		if ($time->num_rows() > 0){
			$data = $time->row_array();
			return $data['catatan'];
		}else{
			return "";
		}
		
	}

	function HitungTerlambat($tanggal='',$badge_number='')
	{
		$data['jam']   = 0;
		$data['menit'] = 0;
		if (getTime_in($tanggal,$badge_number) !=''){
			if (getTime_in($tanggal,$badge_number)>timeIn()){
				$jam = timeHours(timeIn(),getTime_in($tanggal,$badge_number))['jam'];
				$menit = timeHours(timeIn(),getTime_in($tanggal,$badge_number))['menit'];
				$data['jam']   = $jam;
				$data['menit'] = $menit;
				return $data;
			}else{
				return $data;
			}
		}else{
			return $data;
		}	 
	}
	function HitungPulangCepat($tanggal='',$badge_number='')
	{
		$data['jam']   = 0;
		$data['menit'] = 0;
		if (getTime_out($tanggal,$badge_number) !="00:00"){
			if (getTime_out($tanggal,$badge_number)<timeOut()){
				$jam = timeHours(getTime_out($tanggal,$badge_number),timeOut())['jam'];
				$menit = timeHours(getTime_out($tanggal,$badge_number),timeOut())['menit'];
				$data['jam']   = $jam;
				$data['menit'] = $menit;
				return $data;
			}else{
				return $data;
			} 
		}else{
			return $data;
		}	
	}
	function HitungLembur($tanggal='',$badge_number='')
	{
		$data['jam']   = 0;
		$data['menit'] = 0;
		if (getTime_out($tanggal,$badge_number) !="00:00"){
			if (getTime_out($tanggal,$badge_number)>timeOut()){
				$jam = timeHours(timeOut(),getTime_out($tanggal,$badge_number))['jam'];
				$menit = timeHours(timeOut(),getTime_out($tanggal,$badge_number))['menit'];
				$data['jam']   = $jam;
				$data['menit'] = $menit;
				return $data;
			}else{
				return $data;
			}
		}else{
			return $data;
		}
	}

	function UangMakan($badge_number='',$tanggal='')
	{
		$ci     =& get_instance();
		$time   = $ci->db->query("SELECT time_in,time_out FROM `attendance` WHERE badge_number='$badge_number' and DATE(tanggal)='$tanggal' ");
		if ($time->num_rows() > 0){
			$data = $time->row_array();
			if (substr($data['time_in'],0,5)>timeIn()){  
				return FALSE;	
			}else{
				return TRUE;
			} 
		}else{
			return FALSE;
		}  
		
	}

	function timeIn()
	{
		$ci     =& get_instance();
		$get    = $ci->db->query("SELECT * FROM attendance_shift_hours WHERE hours_id='1' ")->row_array();
		return substr(($get['datang']),0,5);
	}
	function timeOut()
	{
		$ci     =& get_instance();
		$get    = $ci->db->query("SELECT * FROM attendance_shift_hours WHERE hours_id='1' ")->row_array();
		return substr(($get['pulang']),0,5);
	}
	function timeBatas()
	{
		// $ci     =& get_instance();
		// $get    = $ci->db->query("SELECT * FROM attendance_shift_hours WHERE id='1' ")->row_array();
		return '12:00:00';
	}


	function timeHours($start='',$end='')
	{
		if ($start=='' OR $end=='' OR $end=='00:00'){
			$jam = '0';
			$menit = '0';
		} 
		else{
			$awal  = strtotime(date_now().' '.$start);
			$akhir = strtotime(date_now().' '.$end);

			$diff  = $akhir - $awal;
			$jam   = floor($diff / (60 * 60)); 
			$menits   = $diff - $jam * (60 * 60);
			$menit   = floor($menits/60);

		}

		$data['jam'] = $jam;
		$data['menit'] = $menit;

		return $data;
	}


	function time_istirahat($mulai='',$akhir='')
	{
		$waktu_istirahat_s = '12:00'; //Start
		$waktu_istirahat_e = '13:00'; //End
		//Mengecek, apakah jam istirahat ada pada range waktu mulai dan akhir ?
		if ( ($mulai<=$waktu_istirahat_s) AND ($akhir>=$waktu_istirahat_e) ){
			//Apakah jam masuk karywan kurang dari jam istirahat ? , apakah jam waktu pulang lebih dari jam istirahat.
			return TRUE;
		}else{
			return FALSE;
		}


	}

	//Man Power Request.
	function new_number_manPower()
	{
		$ci     =& get_instance();
		$tahun  = DATE("Y");
		$no    = $ci->db->query("SELECT LEFT(`doc_no`,4)+1 as nomor FROM `hr_recruitment` WHERE RIGHT(doc_no,4)='$tahun'");
		
		$auto = '';

		if ($no->num_rows() > 0){
			$get = $no->row_array();
			if (strlen($get['nomor'])==1){
				$auto = '000'.$get['nomor'].'/HR-REC/'.getRomawi(DATE("m")).'/'.$tahun;
			}else if (strlen($get['nomor'])==2){
				$auto = '00'.$get['nomor'].'/HR-REC/'.getRomawi(DATE("m")).'/'.$tahun;
			}else if (strlen($get['nomor'])==3){
				$auto = '0'.$get['nomor'].'/HR-REC/'.getRomawi(DATE("m")).'/'.$tahun;
			}else if (strlen($get['nomor'])==4){
				$auto = ''.$get['nomor'].'/HR-REC/'.getRomawi(DATE("m")).'/'.$tahun;
			}
		}else{
			$auto = '0001/HR-REC/'.getRomawi(DATE("m")).'/'.$tahun;
		}
			

		return $auto;
	}

	function new_number_appreciation()
	{
		$ci     =& get_instance();
		$tahun  = DATE("Y");
		$no    = $ci->db->query("SELECT LEFT(`doc_no`,4)+1 as nomor FROM `hr_appreciation` WHERE RIGHT(doc_no,4)='$tahun'");
		
		$auto = '';

		if ($no->num_rows() > 0){
			$get = $no->row_array();
			if (strlen($get['nomor'])==1){
				$auto = '000'.$get['nomor'].'/HR-REWRD/'.getRomawi(DATE("m")).'/'.$tahun;
			}else if (strlen($get['nomor'])==2){
				$auto = '00'.$get['nomor'].'/HR-REWRD/'.getRomawi(DATE("m")).'/'.$tahun;
			}else if (strlen($get['nomor'])==3){
				$auto = '0'.$get['nomor'].'/HR-REWRD/'.getRomawi(DATE("m")).'/'.$tahun;
			}else if (strlen($get['nomor'])==4){
				$auto = ''.$get['nomor'].'/HR-REWRD/'.getRomawi(DATE("m")).'/'.$tahun;
			}
		}else{
			$auto = '0001/HR-REWRD/'.getRomawi(DATE("m")).'/'.$tahun;
		}
			

		return $auto;
	}

	function new_number_warning()
	{
		$ci     =& get_instance();
		$tahun  = DATE("Y");
		$no    = $ci->db->query("SELECT LEFT(`doc_no`,4)+1 as nomor FROM `hr_warning` WHERE RIGHT(doc_no,4)='$tahun'");
		
		$auto = '';

		if ($no->num_rows() > 0){
			$get = $no->row_array();
			if (strlen($get['nomor'])==1){
				$auto = '000'.$get['nomor'].'/HR-WARN/'.getRomawi(DATE("m")).'/'.$tahun;
			}else if (strlen($get['nomor'])==2){
				$auto = '00'.$get['nomor'].'/HR-WARN/'.getRomawi(DATE("m")).'/'.$tahun;
			}else if (strlen($get['nomor'])==3){
				$auto = '0'.$get['nomor'].'/HR-WARN/'.getRomawi(DATE("m")).'/'.$tahun;
			}else if (strlen($get['nomor'])==4){
				$auto = ''.$get['nomor'].'/HR-WARN/'.getRomawi(DATE("m")).'/'.$tahun;
			}
		}else{
			$auto = '0001/HR-WARN/'.getRomawi(DATE("m")).'/'.$tahun;
		}
			

		return $auto;
	}


	function candidate($recruitment_id='')
	{
		$ci     =& get_instance(); 
		return $ci->db->query("SELECT * FROM hr_recruitment_candidate WHERE recruitment_id='$recruitment_id'");
	}

	function label_status($status='')
	{
		switch ($status) {
			case '0': // OFF
				echo '<label class="label bg-red">Non Active</label>';
			break;
			case '1': // OFF
				echo '<label class="label bg-green">Active</label>';
			break;
			
			default:
				echo '<label class="label bg-info">Not Found.</label>';
			break;
		}
	}


?>
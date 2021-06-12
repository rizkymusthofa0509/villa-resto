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
class Crone extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    // $this->load->library('session');
	    /*Model*/
	    $this->load->model(array('M_absensi'));  
	    // $this->load->helper(array('url','html','form'));
	    // $this->load->helper('dompet_helper');   
	    // login();
	}

 
	 // public function index()
	 // { 
		
		// $data = json_decode($this->encode());
		// $max  = $this->db->query("SELECT MAX(id_crone) as nilai FROM attendance_log")->row_array(); 
		// if ($data->status == '200'){
		// 	foreach ($data->data as $get) {
		// 		if ($get->id > $max['nilai']){
		// 			$insert['id_crone']     =  $get->id;
		// 			$insert['badge_number'] =  $get->pin;
		// 			$insert['tanggal']      =  $get->waktu;
		// 			$insert['verified']     =  $get->verified;
		// 			$insert['device']       =  $get->mechine_id;
		// 			$this->db->insert('attendance_log',$insert);
		// 		}
		// 	}
		// }else{
		// 	echo "404";
		// } 
				 
	 // }

	 // public function index()
	 // {
	 // 	$data = json_decode($this->encode());
	 // 	$date = date_now();

		// if ($data->status == '200'){
		// 	foreach ($data->data as $get) { 
		// 		$split = explode(" ",$get->waktu);
		// 		$split        = explode(" ",$get->waktu);
		// 		$cek          = $get->waktu;
		// 		$tgl          = $split[0];
		// 		$wkt          = $split[1]; 
		// 		$badge_number = $get->pin;
		// 		if ($tgl == $date){  
		// 			$cekUser = $this->db->query("SELECT * FROM attendance WHERE DATE(tanggal)=DATE('$tgl') AND badge_number='$badge_number' ");
		// 			if ($cekUser->num_rows()==0){
		// 				//Insert
		// 				if ($this->db->query("SELECT * FROM attendance WHERE badge_number='$badge_number' AND DATE(tanggal)='$tgl' ")->num_rows()==0){
		// 					$i['badge_number']            = $badge_number;
		// 					$i['tanggal']                 = $tgl;
		// 					$i['time_in']                 = $wkt;
		// 					$i['time_out']                = '';
		// 					$i['attendance_tipe_id_in']   = $get->mechine_id;
		// 					$i['attendance_tipe_id_out']  = '';
		// 					$i['verified_in']             = $get->verified;
		// 					$i['verified_out']            = ''; 

		// 					$insert = $this->db->insert('attendance',$i);
		// 				}
						
		// 			}else{ 
		// 				$i['time_out']                = $wkt;
		// 				$i['attendance_tipe_id_out']  = $get->mechine_id;
		// 				$i['verified_out']            = $get->verified;
		// 				$update = $this->db->where(array('badge_number'=>$badge_number,'tanggal'=>$tgl));
		// 				$update = $this->db->update('attendance',$i);
		// 			} 
		// 		} 
 
		// 	}
		// }else{
		// 	echo "Time Out";
		// } 
	 // }

	 public function index()
	 {
	 	$data      = json_decode($this->encode());
	 	$date_now  = date_now();
	 	//Load Semua Karyawan 
	 	$emp  = $this->db->query("SELECT * FROM employee as a WHERE a.status='Active' ");
	 	foreach ($emp->result() as $remp) {
	 		$badge = $remp->badge_number;

	 		if ($data->status == '200'){
	 			foreach ($data->data as $get) { 
	 				// $split        = explode(" ","2021-02-23 08:08:47");
	 				$split        = explode(" ",$get->waktu);
					$tgl          = $split[0];
					$wkt          = $split[1]; 
					$badge_number = $get->pin; 
					if ($tgl==$date_now){ 
						if ($badge_number == $badge){
							$cek_insert  = $this->db->query("SELECT * FROM `attendance` WHERE badge_number='$badge_number' and DATE(`tanggal`)=DATE(NOW()) ");
							$w = $cek_insert->row_array();
							if ($cek_insert->num_rows()==0){
								$i['badge_number']            = $badge_number;
								$i['tanggal']                 = $tgl;
								$i['time_in']                 = $wkt;
								$i['time_out']                = '';
								$i['attendance_tipe_id_in']   = $get->mechine_id;
								$i['attendance_tipe_id_out']  = '';
								$i['verified_in']             = $get->verified;
								$i['verified_out']            = '';  
								if (($w['time_in']==NULL) ){
									$insert = $this->db->insert('attendance',$i);	
								}
							}else{
								
								$i['time_out']                = $wkt;
								$i['attendance_tipe_id_out']  = $get->mechine_id;
								$i['verified_out']            = $get->verified;
								$update = $this->db->where(array('badge_number'=>$badge_number,'tanggal'=>$tgl,'id'=>$w['id']));
								$update = $this->db->update('attendance',$i);
							} 
						}
					}
	 			}
	 		} 
	 	}
	 }

	  public function date($date='')
	 {
	 	$data      = json_decode($this->encode());
	 	$date_now  = $date;
	 	//Load Semua Karyawan 
	 	$emp  = $this->db->query("SELECT * FROM employee as a WHERE a.status='Active' ");
	 	foreach ($emp->result() as $remp) {
	 		$badge = $remp->badge_number;

	 		if ($data->status == '200'){
	 			foreach ($data->data as $get) { 
	 				// $split        = explode(" ","2021-02-23 08:08:47");
	 				$split        = explode(" ",$get->waktu);
					$tgl          = $split[0];
					$wkt          = $split[1]; 
					$badge_number = $get->pin; 
					if ($tgl==$date_now){ 
						if ($badge_number == $badge){
							$cek_insert  = $this->db->query("SELECT * FROM `attendance` WHERE badge_number='$badge_number' and DATE(`tanggal`)='$date' ");
							$w = $cek_insert->row_array();
							if ($cek_insert->num_rows()==0){
								$i['badge_number']            = $badge_number;
								$i['tanggal']                 = $tgl;
								$i['time_in']                 = $wkt;
								$i['time_out']                = '';
								$i['attendance_tipe_id_in']   = $get->mechine_id;
								$i['attendance_tipe_id_out']  = '';
								$i['verified_in']             = $get->verified;
								$i['verified_out']            = '';  
								if ($w['time_in']==""){
									$insert = $this->db->insert('attendance',$i);	
								}
							}else{
								
								$i['time_out']                = $wkt;
								$i['attendance_tipe_id_out']  = $get->mechine_id;
								$i['verified_out']            = $get->verified;
								$update = $this->db->where(array('badge_number'=>$badge_number,'tanggal'=>$tgl,'id'=>$w['id']));
								$update = $this->db->update('attendance',$i);
							} 
						}
					}
	 			}
	 		} 
	 	}
	 }

	 public function tarik()
	 {
	 	$mulai 		= post('mulai');
		$akhir 		= post('akhir');
		$device_id 	= 1; 
	 	$mesin = json_decode($this->encode());
		 // var_dump($mesin);
		 $start_date = DATE("Y-m-d");
		 $end_date   = DATE("Y-m-d");
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
				$this->absensiProses($tgl);
		 	 	$start_date = date ("Y-m-d", strtotime("+1 day", strtotime($start_date)));
		 	 }
 
		 }
	}

	public function absensiProses($tanggal='')
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
  

  	public function absensi()
  	{
  		$tgl    = DATE("Y-m-d");
  		$getlog = $this->M_absensi->logs($tgl);
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

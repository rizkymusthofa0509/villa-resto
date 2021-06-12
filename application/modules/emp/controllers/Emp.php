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
class Emp extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    // $this->load->library('session');
	    /*Model*/
	    // $this->load->model('M_dashboard');  
	    // $this->load->helper('dompet_helper');  
	    // login(); 
	}
	 

	public function index()
	{ 
		$data['title'] 	= 'Multifab - Application';
		$data['modul']  = 'Attandance';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Attandance'     => 'apps'
						  );
		$data['pages']  = 'attandance/home';
		// session_flash('Info','Ini adalah alert');

		$this->load->view('temp',$data); 
	}

	public function jarak()
	{
		$lat = post('lat');
		$lon = post('lon');
		$lat_to = post('lat_to');
		$lon_to = post('lon_to');
		echo $this->getDistanceBetween($lat,$lon,$lat_to,$lon_to, 'm');
	}

	function getDistanceBetween($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'Mi') 
	{ 
		$theta = $longitude1 - $longitude2; 
		$distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)))  + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
		$distance = acos($distance); 
		$distance = rad2deg($distance); 
		$distance = $distance * 60 * 1.1515; 
		switch($unit) 
		{ 
			case 'Mi': break; 
			case 'Km' : $distance = $distance * 1.609344; 
			case 'm' : $distance = ($distance * 1.609344)*100; 
		} 
		// return (round($distance,2)); 
		return (round($distance,0)); 
	}

	public function ajax($action='')
	{
		switch ($action) {
			case 'load_absensi':
			    $month = post('month');
			    $year  = post('year');
			    $badge_number = post('badge_number');
				$data['list'] = $this->db->query("SELECT * FROM attendance WHERE badge_number='$badge_number' and MONTH(tanggal)='$month' and YEAR(tanggal)='$year' order by DATE(tanggal) DESC");
				// $data['list'] = "";
				$this->load->view('attandance/load_absensi',$data);
			break;
			
			default:
				# code...
			break;
		}
	}

	public function pdf()
	{
			$content = "
			<html> 
			<body>
				<h1>MPDF WORK !</h1> 
				Selamat datang di rachmat.ID
			</body>
			</html>
			";
			$jajal = pdf();
			$jajal->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
			$jajal->WriteHTML($content);
			$jajal->Output();
	}

	function excel()
	{
		excel();
		$this->load->view('test');
 	}


}





















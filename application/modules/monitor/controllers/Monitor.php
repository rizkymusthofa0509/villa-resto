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
class Monitor extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    // $this->load->library('session');
	    /*Model*/
	    $this->load->model(array('M_absensi'));  
	    // $this->load->helper(array('url','html','form'));
	    // $this->load->helper('dompet_helper');   
	    // login();
	    if (session('monitor_id')==""){
	    	redirect('monitor/auth');
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
		$data['pages']  = '';
 

		$this->load->view('main',$data); 
	}
 
 	public function check($pages='',$id='')
 	{
 		$sett = $this->db->query("SELECT * FROM attendance_shift_hours WHERE hours_id='1' ")->row_array();

 		switch ($pages) {
 			case 'terlambat':
 				$late = $this->M_absensi->terlambat(date_now(),$sett['datang']);
 				echo $late->num_rows();
			break;
			case 'tepatwaktu':
 				$late = $this->M_absensi->tepatwaktu(date_now(),$sett['datang']);
 				echo $late->num_rows();
			break;

			case 'displayImage':
				$data['list'] = $this->M_absensi->terlambat(date_now(),$sett['datang']);
 				// echo $late->num_rows();
				$this->load->view('displayImage',$data);
			break;
			case 'displayChart':
				$data['list'] = $this->M_absensi->LastAbsen(date_now(),$sett['datang'])->row_array();
				$this->load->view('displayChart',$data);
			break;
			case 'displayImageOntime':
				$data['list'] = $this->M_absensi->tepatwaktu(date_now(),$sett['datang']);
				$this->load->view('displayImageOntime',$data); 
			break;
 			
 			default:
 				echo "";
			break;
 		}
 	}

 	public function absensi()
 	{
 		$data['title'] 	= 'Multifab - Data Karyawan';
		$data['modul']  = 'Data Karyawan';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps',
								'HRD'     => 'apps/hrd',  
								'Employee' => 'apps/employee'  
						  );
		$data['pages']  = '';
 

		$this->load->view('absensi',$data); 
 	}
  
 
}

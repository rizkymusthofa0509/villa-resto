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
class Auth extends CI_Controller {
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
 

		$this->load->view('auth',$data); 
	} 
	
	public function checking()
	{
		$username = post('username');
		$password = post('password'); 

		$cek = $this->db->query("SELECT * FROM login WHERE username='$username' AND password='$password' ");
		if ($cek->num_rows() > 0){
			$data = $cek->row_array();
			$this->session->set_userdata('monitor_id',$data['login_id']);
			$this->session->set_userdata('full_name',$data['full_name']);
			redirect('monitor');
		}else{
			redirect('monitor/auth');
		}
 
	}
 
}

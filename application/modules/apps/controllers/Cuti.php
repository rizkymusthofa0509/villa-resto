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
class Cuti extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    // $this->load->library('session');
	    /*Model*/
	    $this->load->model('M_employee');  
	    // $this->load->helper('dompet_helper');  
	    // login(); 
	}
	
	public function index()
	{ 
		$data['title'] 	= 'Cuti Karyawan';
		$data['modul']  = 'Dashboard';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps',
								 'Cuti'     => 'apps/cuti'
						  );
		$data['pages']  = 'cuti/home'; 
		$data['employee'] = $this->M_employee->status('Active');
		$this->load->view('main',$data); 
	}
 
}





















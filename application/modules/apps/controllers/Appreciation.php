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
class Appreciation extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    // $this->load->library('session');
	    /*Model*/
	    // $this->load->model('M_dashboard');  
	    // $this->load->helper('dompet_helper');   
	    login();
	}
	
	public function index()
	{ 
		$data['title'] 	= 'Multifab - Application';
		$data['modul']  = 'Penghargaan';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps',
								 'HRD'		    => 'apps/hrd',
								 'Penghargaan'   => 'apps/appreciation'
						  );
		$data['pages']  = 'appreciation/list';
		// session_flash('Info','Ini adalah alert');

		$data['list']   = $this->db->query("SELECT * FROM hr_appreciation");

		$this->load->view('main',$data); 
	}

	public function master($action='',$id='')
	{
		switch ($action) {
			case 'bentuk-penghargaan':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Jenis Sanksi';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										 'HRD'		    => 'apps/hrd',
										 'Penghargaan'   => 'apps/appreciation',
										 'Penghargaan'   => 'apps/appreciation/master/bentuk-penghargaan'
								  );
				$data['pages']  = 'appreciation/bentuk_penghargaan';

				$data['list']   = $this->db->query("SELECT * FROM hr_appreciation_item");
				// session_flash('Info','Ini adalah alert');

				$this->load->view('main',$data); 
			break;
			
			default:
				# code...
			break;
		}
	}
 
  
 
}

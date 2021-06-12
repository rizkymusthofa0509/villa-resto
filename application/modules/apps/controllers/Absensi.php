<?php
/*
-- ---------------------------------------------------------------
-- JOB CAREER 
-- CREATED BY : RIZKY MUSTHOFA
-- COPYRIGHT  : Copyright (c) 2020 
-- LICENSE    : http://opensource.org/licenses/MIT  MIT License
-- CREATED ON : 2020-06-09
-- UPDATED ON : V.1
-- APP NAME   : ABSENSI
-- ---------------------------------------------------------------
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Absensi extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    // $this->load->library('session');
	    /*Model*/
	    $this->load->model('M_absensi');  
	    // $this->load->helper('dompet_helper');  
	    // login(); 
	}
	
	// <i class="fab fa-signal-alt-slash"></i>
	public function index()
	{ 
		$data['title'] 	= 'Multifab - Application';
		$data['modul']  = 'Absensi';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps',
								 'Absensi'     => 'apps/absensi'
						  );
		$data['pages']  = 'absensi/home';

		$this->load->view('main',$data); 
	}



	public function pages($action='',$id='')
	{ 
		switch ($action) {
			case 'list':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Absensi';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										 'Absensi'     => 'apps/absensi',
										 'Today'     => 'apps/absensi/pages/list'
								  );
				$data['pages']  = 'absensi/list';


				$data['list']   = $this->M_absensi->Today(date_now());

				$this->load->view('main',$data);
			break;
			
			default:
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Absensi';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										 'Absensi'     => 'apps/absensi'
								  );
				$data['pages']  = '404';

				$this->load->view('main',$data); 
			break;
		}
		
	}

	
 
  
 
}

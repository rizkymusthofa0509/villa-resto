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
class Payroll extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    // $this->load->library('session');
	    /*Model*/
	    // $this->load->model('M_dashboard');  
	    $this->load->model('M_employee');  
	    $this->load->model('M_bpjs');  
	    // $this->load->helper('dompet_helper');  
	    // login(); 
	}
	
	public function index()
	{ 
		$data['title'] 	= 'Multifab - Application';
		$data['modul']  = 'Dashboard';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps'
						  );
		$data['pages']  = 'dashboard';
		// session_flash('Info','Ini adalah alert');

		$this->load->view('main',$data); 
	}
 

	public function component($modul='',$action='',$id='')
	{ 
		switch ($modul) {
			case 'komponen-gaji': 
				switch ($action) {
					case 'list':
						$data['title'] 	= 'Multifab - Application';
						$data['modul']  = 'Dashboard';
						$data['link']   = array('<i class="fa fa-home"></i> 
												 Dashboard'     => 'apps'
										  );
						$data['pages']  = 'dashboard';	
					break;
					case 'detail':
						$data['title'] 	= 'Multifab - Application';
						$data['modul']  = 'Dashboard';
						$data['link']   = array('<i class="fa fa-home"></i> 
												 Dashboard'     => 'apps'
										  );
						$data['pages']  = 'dashboard';	
					break;	
				}
			break;
			
			default:
				# code...
			break;
		}
		$this->load->view('main',$data); 
	}

	public function bpjskes($action='',$id='')
	{
		switch ($action) {
			case 'create-bpjskes':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Dashboard';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										 'BPJS Kesehatan'     => 'apps/payroll/bpjskes',
										 'Create'     => 'apps/payroll/bpjskes/create-bpjskes'
								  );
				$data['pages']  = 'payroll/bpjskes/create';	

				$data['employee'] = $this->M_employee->getAll();


			break;

			case 'info-employee':
				$res['department'] = 'as';
				$res['jabatan']    = 'as';
				$res['posisi']     = 'as';
				$res['status']     = 'as';
				echo json_decode($res);
			break;
			
			default:
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'BPJS Kesehatan';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps',
										 'BPJS Kesehatan'     => 'apps/payroll/bpjskes', 								  );
				$data['pages']  = 'payroll/bpjskes/list';	

				$data['list']   = $this->M_bpjs->bpjskesAll();
			break;
		}
		$this->load->view('main',$data); 
	}


	public function bpjsket($action='',$id='')
	{
		switch ($action) {
			case 'setup':
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'Dashboard';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps'
								  );
				$data['pages']  = 'payroll/bpjsket/list';	
			break;
			
			default:
				$data['title'] 	= 'Multifab - Application';
				$data['modul']  = 'BPJS Tenaga Kerja';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'     => 'apps'
								  );
				$data['pages']  = 'payroll/bpjsket/list';		
			break;
		}
		$this->load->view('main',$data); 
	}
 
  
 
}

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
class Hr extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    // $this->load->library('session');
	    /*Model*/
	    $this->load->model('M_master');  
	    // $this->load->helper('dompet_helper');  
	    login(); 
	}
	
	public function index()
	{ 
		$data['title'] 	= 'Admin';
		$data['modul']  = 'Dashboard';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps'
						  );
		$data['pages']  = 'dashboard';
		// session_flash('Info','Ini adalah alert');

		$this->load->view('main',$data); 
	}

	public function master($action='',$id='')
	{ 
		switch ($action) {
			/*Master Direktorat*/
			case 'direktorat':
				$data['title'] 	= 'Admin';
				$data['modul']  = 'Master Sub-Direktorat';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'           => 'apps',
										 'HRD'                => 'apps/employee',
										 'Master'             => 'apps/hr/master',
										 'Sub-Direktorat'     => 'apps/hr/master/direktorat',
								  );
				$data['pages']  = 'hrd/master/direktorat/list';

				/*Data Apps*/
				$data['list']   = $this->M_master->getAllSubDirektorat();
				$this->load->view('main',$data); 
			break;

			case 'direktorat-detail':
				echo "oke".$id;
			break;

			/*Master Division*/
			case 'division':
				$data['title'] 	= 'Admin';
				$data['modul']  = 'Master Division';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'           => 'apps',
										 'HRD'                => 'apps/employee',
										 'Master'             => 'apps/hr/master',
										 'Division'    		  => 'apps/hr/master/division',
								  );
				$data['pages']  = 'hrd/master/division/list';

				/*Data Apps*/
				$data['list']   = $this->M_master->getAllDivision();
				$this->load->view('main',$data); 
			break;

			case 'division-detail':
				echo "oke".$id;
			break;

			/*Master Division*/
			case 'department':
				$data['title'] 	= 'Admin';
				$data['modul']  = 'Master Department';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'           => 'apps',
										 'HRD'                => 'apps/employee',
										 'Master'             => 'apps/hr/master',
										 'department'    	  => 'apps/hr/master/department',
								  );
				$data['pages']  = 'hrd/master/department/list';

				/*Data Apps*/
				$data['list']   = $this->M_master->getAllDepartment();
				$this->load->view('main',$data); 
			break;

			case 'department-add':
				$data['title'] 	= 'Master data';
				$data['modul']  = 'Master Department Add';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'           => 'apps',
										 'HRD'                => 'apps/employee',
										 'Master'             => 'apps/hr/master',
										 'department'    	  => 'apps/hr/master/department',
								  );
				$data['pages']  = 'hrd/master/department/add';

				$data['division'] = $this->M_master->getAllDivision();

				/*Data Apps*/
				$data['list']   = $this->M_master->getAllDepartment();
				$this->load->view('main',$data); 
			break;

			case 'department-save':
				$insert['division_id'] 	= post('division_id');
				$insert['code'] 	    = post('code');
				$insert['name'] 	    = post('name');
				$insert['description'] 	= post('description');

					$i = $this->db->insert('department',$insert);
					if ($i){
						set_flashdata('info','
								<div class="alert alert-info" role="alert">
								  Berhasil disimpan.
								</div>
							');
						redirect('apps/hr/master/department');
					}

			break;

			case 'department-detail':
				echo "oke".$id;
			break;

			/*Master Jabatan*/
			case 'jabatan':
				$data['title'] 	= 'Admin';
				$data['modul']  = 'Master Division';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'           => 'apps',
										 'HRD'                => 'apps/employee',
										 'Master'             => 'apps/hr/master',
										 'jabatan'    	  => 'apps/hr/master/jabatan',
								  );
				$data['pages']  = 'hrd/master/jabatan/list';

				/*Data Apps*/
				$data['list']   = $this->M_master->getAllJabatan();
				$this->load->view('main',$data); 
			break;

			case 'jabatan-detail':
				echo "oke".$id;
			break;

			
			default:
				$data['title'] 	= 'Admin';
				$data['modul']  = 'Master DAta HRD';
				$data['link']   = array('<i class="fa fa-home"></i> 
										 Dashboard'           => 'apps',
										 'HRD'                => 'apps/employee',
										 'Master'             => 'apps/hr/master',
								  );
				$data['pages']  = 'hrd/master/home';

				$this->load->view('main',$data); 
			break;
		}
		
	}
 
  
 
}

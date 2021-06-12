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
class Profile extends CI_Controller {
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
		redirect('apps/profile/auth');
	}

	public function auth()
	{
		$data['title'] 	= 'Multifab - Application';
		$data['modul']  = 'Change Password';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps'
						  );
		$data['pages']  = 'profile/auth'; 

		$login_id         = session('id');
		$data['login_id'] = $this->db->query("SELECT * FROM login where login_id='$login_id' ")->row_array();

		$this->load->view('main',$data); 
	}

	public function auth_update()
	{ 
		if (post('password')!=post('c_password')){
					set_flashdata('info','
								<div class="alert alert-danger" role="alert">
								  New Password Not Match.
								</div>
							');
					redirect('apps/profile/auth');
		}else{
			$login_id         = session('id');
			$password = post('password');
			$update = $this->db->query("UPDATE login SET password='$password' WHERE login_id='$login_id' ");
			if ($update){
				set_flashdata('info','
								<div class="alert alert-success" role="alert">
								  Password hasbeen updated.
								</div>
							');
				redirect('apps/profile/auth');
			}
		}
	}
 
 
  
 
}

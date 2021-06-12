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
	    $this->load->library('session');
	    /*Model*/
	    // $this->load->model('M_dashboard');  
	    // $this->load->helper('dompet_helper');   
	}
	
	public function index()
	{ 
		$data['title'] 	= 'Login Pages';
		$this->load->view('login',$data); 
	}

	public function checking()
	{
		$username = post('username');
		$password = post('password'); 

		$cek = $this->db->query("SELECT * FROM login WHERE username='$username' AND password='$password' ");
		if ($cek->num_rows() > 0){
			$data = $cek->row_array();
			$this->session->set_userdata('id',$data['login_id']);
			$this->session->set_userdata('full_name',$data['full_name']);
			redirect('apps');
		}else{
			redirect('auth');
		}
 
	}

	public function logout()
	{
		session_destroy();
		redirect('auth');
	}
  
 
}

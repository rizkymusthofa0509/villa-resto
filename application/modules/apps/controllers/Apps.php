<?php
/*
-- ---------------------------------------------------------------
-- JOB CAREER 
-- CREATED BY : RIZKY MUSTHOFA
-- COPYRIGHT  : Copyright (c) 2020 
-- LICENSE    : http://opensource.org/licenses/MIT  MIT License
-- CREATED ON : 2021-06-12
-- UPDATED ON : V.1
-- APP NAME   : VILLA RESTO
-- ---------------------------------------------------------------
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Apps extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/ 
	    $this->load->model(array('M_account'));


	    $this->base_url = 'apps';
		login_app();
	}
	
	public function index()
	{ 
		if (session('id')==''){
			redirect('apps/auth');	
		}else{
			redirect('apps/home');
		} 
	}

	public function handler()
	{
		$username = post('username');
		$password = post('password');
		echo $username.' '.$password;
	}

	 
 
}

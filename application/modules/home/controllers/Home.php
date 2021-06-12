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
class Home extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    // $this->load->library('session');
	    /*Model*/
	    // $this->load->model('M_dashboard');  
	    // $this->load->helper('dompet_helper');   
	}
	
	public function index()
	{ 
		// $data['title']     	   = 'Multifab Application';
		// $data['modul']     	   = 'Official';
		// $data['pages']     	   = 'default/home'; 
		// $this->load->view('home',$data); 
		redirect('/auth');
	}
  
 
}

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
class Travels extends CI_Controller {
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
		$data['title'] 	= 'Perjalanan Dinas ';
		$data['modul']  = 'Perjalanan Dinas';
		$data['link']   = array('<i class="fa fa-home"></i> 
								 Dashboard'     => 'apps'
						  );
		$data['pages']  = 'travels/home';
		// session_flash('Info','Ini adalah alert');

		$this->load->view('main',$data); 
	} 
 
  
 
}

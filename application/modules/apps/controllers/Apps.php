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
class Apps extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/ 
	}
	
	public function index()
	{ 
		echo "as";
	}

	 
 
}

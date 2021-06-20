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
class Detail extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/ 
	    $this->load->model(array('M_account','M_product')); 

	    $this->base_url = 'apps';
		login_app();
	}
	
	public function index($id='')
	{ 
		if ($this->input->get('id')){
			$data['product'] = $this->M_product->getAll();
			$data['detail'] = $this->M_product->getDetail($this->input->get('id'))->row_array();
			$this->load->view('detail/detail',$data);	
		}else{
			redirect('apps');
		}
		
	}
 
	 
 
}

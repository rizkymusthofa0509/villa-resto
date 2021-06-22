<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/ 
	    $this->load->model(array('M_account','M_product'));


	    $this->base_url = 'apps';
		login_app();
	}
	
	public function index()
	{ 
		$data['product'] = $this->M_product->getAll();
		$this->load->view('home/home',$data); 
	}

	 
	 
 
}

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
class Order extends CI_Controller {
 	function __construct() {
	    parent::__construct(); 

	    /*Load session*/
	    $this->load->library('session');
	    /*Model*/ 
	    $this->load->model(array('M_account','M_product','M_transaction','M_transaction_detail'));


	    $this->base_url = 'apps';
		login_app();
	}
	
	public function index()
	{ 
		if ($this->input->get('status')!=''){
			switch ($this->input->get('status')) {
				case 'reject':
					$data['list'] = $this->M_transaction->getStatus(['reject']);
				break;
				case 'dipesan':
					$data['list'] = $this->M_transaction->getStatus(['dipesan','diproses']);
				break;
				case 'diproses':
					$data['list'] = $this->M_transaction->getStatus(['dipesan','diproses']);
				break;
				case 'selesai':
					$data['list'] = $this->M_transaction->getStatus(['selesai']);
				break;
				
				default:
					$data['list'] = $this->M_transaction->getStatus(['dipesan','diproses']);
				break;
			}
		}else{
			$data['list'] = $this->M_transaction->getStatus(['dipesan','diproses']);
		} 
		$this->load->view('order/order',$data); 
	}

	 
	 
 
}
